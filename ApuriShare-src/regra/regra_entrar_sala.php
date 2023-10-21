<?php
if (isset($_POST['btnEntrar'])) {
    $chaveAcesso = $_POST['txtCodigo'];
    $nickname = $_SESSION['nickname'];

    // verificar se a sala não foi iniciada
    if (verificaSituacaoSala($chaveAcesso, $con) || verificaParticipanteRegistrado($chaveAcesso, $con)) {
        $sql = "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'";
        $sql_query = $con->query($sql);

        // verificar se o usuário ainda não foi cadastrado
        if(!(verificaParticipanteRegistrado($chaveAcesso, $con))){
            $sql = "INSERT INTO sala_usuario(fk_sala, fk_usuario, tipoUsuario) values ('$chaveAcesso', '$nickname', 'participante')";
            executar_sql($con, $sql);
        }
        $_SESSION['chaveAcesso'] = $chaveAcesso;
        header('Location: salaEspera.php');
    }
}

// FUNÇÃO PARA RESGATAR AS SALAS QUE UM USUÁRIO ESTÁ REGISTRADO
function listarSalasRegistradas($con){
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

// FUNÇÃO PARA VERIFICAR SE O USUARIO ESTÁ REGISTRADO NA SALA
function verificaParticipanteRegistrado($chave, $con){
    $nickname = $_SESSION['nickname'];
    $comando = "SELECT COUNT(*) from sala_usuario WHERE fk_sala = $chave AND fk_usuario = '$nickname' AND tipoUsuario = 'participante'";
    $registro = mysqli_query($con, $comando);

    if ($registro) {
        // Obtém a primeira (e única) linha do resultado
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


// FUNÇÃO PARA VERIFICAR SE A SALA AINDA NÃO FOI INICIADA
function verificaSituacaoSala($chave, $con)
{
    $comando = "SELECT fk_situacao from sala WHERE chaveAcesso = $chave";
    $situacao = mysqli_query($con, $comando);

    if ($situacao) {
        // Obtém a primeira (e única) linha do resultado
        $row = mysqli_fetch_row($situacao);
        // 1 significa que a partida ainda nao foi iniciada
        if ($row[0] == 1) { 
            return true;
        }
    } else {
        error_log("\n Erro na consulta SQL (situação da sala): " . mysqli_error($con), 3, "file.log");
    }
    echo "A sala solicitada encontra-se em andamento";
    return false;
}
?>