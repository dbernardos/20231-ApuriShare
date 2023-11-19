<?php

// FUNÇÃO PARA CONTAR PARTICIPANTES
function contaParticipantes($chave, $con)
{
    $comando = "SELECT COUNT(*) from sala_usuario WHERE fk_sala = '$chave' AND tipoUsuario = 'participante'";
    $qtde_users = mysqli_query($con, $comando);

    if ($qtde_users) {
        // Obtém a primeira (e única) linha do resultado
        $row = mysqli_fetch_row($qtde_users);
        return $row[0]; //numero de participantes na sala
    } else {
        error_log("\n Erro na consulta SQL (contar participantes): " . mysqli_error($con), 3, "file.log");
        return 0;
    }

    $_SESSION['qtde_users'] = $qtde_users;
}

if (isset($_POST['btnEntrar'])) {
    $chaveAcesso = $_POST['txtCodigo'];
    $nickname = $_SESSION['nickname'];

    $comando = "SELECT qntUsers FROM sala WHERE chaveAcesso = '$chaveAcesso'";
    $qtde_users_total = mysqli_query($con, $comando);

    $row = mysqli_fetch_row($qtde_users_total);
    error_log("\n NUMERO: " . $row[0], 3, "file.log");  





    if ((verificaSituacaoSala($chaveAcesso, $con) || verificaParticipanteRegistrado($chaveAcesso, $con)) && contaParticipantes($chaveAcesso, $con) < $row[0]) {
        $sql = "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'";
        $sql_query = $con->query($sql);

        if (!(verificaParticipanteRegistrado($chaveAcesso, $con))) {
            $sql = "INSERT INTO sala_usuario(fk_sala, fk_usuario, tipoUsuario) values ('$chaveAcesso', '$nickname', 'participante')";
            executar_sql($con, $sql);
        }
        $_SESSION['chaveAcesso'] = $chaveAcesso;
        header('Location: salaEspera.php');
    }
}

function listarSalasRegistradas($con) {
    $nickname = $_SESSION['nickname'];
    $sql = "SELECT s.chaveAcesso AS sChave, s.nome AS sNome 
            FROM sala s
            INNER JOIN sala_usuario su 
            INNER JOIN usuario u
            ON s.chaveAcesso = su.fk_sala 
            AND su.fk_usuario = u.nickname
            WHERE u.nickname = '$nickname'
            AND su.tipoUsuario = 'participante'";

    $sql_query = buscar_dados($con, $sql);
    return $sql_query;
}

function verificaParticipanteRegistrado($chave, $con) {
    $nickname = $_SESSION['nickname'];
    $comando = "SELECT COUNT(*) from sala_usuario WHERE fk_sala = '$chave' AND fk_usuario = '$nickname' AND tipoUsuario = 'participante'";
    $registro = mysqli_query($con, $comando);

    if ($registro) {
        $row = mysqli_fetch_row($registro);
        if ($row[0] == 1) {
            error_log("\n O usuário já está registrado: $nickname", 3, "file.log");
            return true;
        }
    } else {
        error_log("\n Erro na consulta SQL (situação da sala): " . mysqli_error($con), 3, "file.log");
    }
    error_log("\n O usuário será registrado: $nickname", 3, "file.log");
    return false;
}

function verificaSituacaoSala($chave, $con) {
    $comando = "SELECT fk_situacao from sala WHERE chaveAcesso = '$chave'";
    $situacao = @mysqli_query($con, $comando);

    if ($situacao && mysqli_num_rows($situacao) > 0) {
        $row = mysqli_fetch_row($situacao);
        if ($row[0] == 1) {
            return true;
        }
    } else {
        if ($situacao === null) {
            @error_log("\n Erro na consulta SQL (situação da sala): " . mysqli_error($con), 3, "file.log");
        }
        return false;
    }
    return false;
}