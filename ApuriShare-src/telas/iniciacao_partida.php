<?php
require('conexao.php');
require('inicia_sessao.php');

$sql_select = "SELECT * FROM sala AS s 
        INNER JOIN sala_usuario AS su 
        INNER JOIN situacao si
        ON s.chaveAcesso = su.fk_sala 
        AND s.fk_situacao = si.idSituacao
        WHERE su.fk_usuario = '{$_SESSION['nickname']}'
        AND su.tipoUsuario	= 'criador'
        ORDER BY s.chaveAcesso DESC";
$sql_resultado = buscar_dados($con, $sql_select);

if (isset($_POST['btnIniciar'])) :
    $horaAtual = date('H:i:s');

    if ($_POST['id_situacao'] == 1 && verificaNumeroDeParticipantes(contaParticipantes($_POST['chave_acesso'], $con))) :
        $sql_update = "UPDATE sala SET fk_situacao =  2 WHERE chaveAcesso = {$_POST['chave_acesso']}";
        executar_sql($con, $sql_update);

    elseif ($_POST['id_situacao'] == 2) :
        //LOGICA PARA O SORTEIO DOS PARES
        recuperaParticipantes($_POST['chave_acesso'], $con);

        $sql_update = "UPDATE sala SET fk_situacao =  3 WHERE chaveAcesso = {$_POST['chave_acesso']}";
        executar_sql($con, $sql_update);

    elseif ($_POST['id_situacao'] == 3) :
        $sql_update = "UPDATE sala SET fk_situacao =  4 WHERE chaveAcesso = {$_POST['chave_acesso']}";
        executar_sql($con, $sql_update);

    elseif ($_POST['id_situacao'] == 4) :
        $sql_update = "UPDATE sala SET fk_situacao =  5 WHERE chaveAcesso = {$_POST['chave_acesso']}";
        executar_sql($con, $sql_update);

    elseif ($_POST['id_situacao'] == 5) :
        echo "A tarefa foi finalizada (compartilhar), precisamos pensar se manda para outra página ou o que faz";
    endif;
endif;

// FUNÇÃO PARA VERIFICAR SE TEM NUMERO PAR DE PARTICIPANTES
function verificaNumeroDeParticipantes($qtde)
{
    if ($qtde % 2 == 0) {
        error_log("\n Numero par de participantes: $qtde", 3, "file.log");
        return true;
    } else {
        error_log("\n Numero impar de participantes: $qtde", 3, "file.log");
        return false;
    }
}

// FUNÇÃO PARA CONTAR PARTICIPANTES
function contaParticipantes($chave, $con)
{
    $comando = "SELECT COUNT(*) from sala_usuario WHERE fk_sala = '$chave' AND tipoUsuario = 'participante'";
    $qtde_users = mysqli_query($con, $comando);

    if ($qtde_users) {
        // Obtém a primeira (e única) linha do resultado
        $row = mysqli_fetch_row($qtde_users);
        return $row[0];
    } else {
        error_log("\n Erro na consulta SQL para contar participantes: " . mysqli_error($con), 3, "file.log");
        return 0;
    }
}

// FUNÇÃO PARA RECUPERAR OS PARTICIPANTES E ORGANIZAR O ARRAY
function recuperaParticipantes($chave, $con)
{
    $comando = "SELECT * from sala_usuario WHERE fk_sala = {$chave} AND tipoUsuario = 'participante'";
    $participantes = buscar_dados($con, $comando);

    $vetParticipantes = [];
    $contador = 0;

    foreach ($participantes as $dados) {
        $contador++;
        $vetParticipantes[$contador] = $dados['fk_usuario'];
    }

    $tam = count($vetParticipantes) / 2;

    for ($i = 0; $i < $tam; $i++) {
        $sorteado = sorteiaParticipantes($vetParticipantes);

        // Insere os dois participantes na tabela de respostas
        //$comando = "INSERT INTO resposta VALUES (NULL, 'pares', {$chave}, {$vetParticipantes[$sorteado[1]]}, {$vetParticipantes[$sorteado[2]]}})"; 
        //executar_sql($con, $comando);

        // << ATENÇÃO >> AQUI ESTÁ O NICKNAME DO SORTEADO: $vetParticipantes[$sorteado]
        error_log("\nsorteado >>> {$vetParticipantes[$sorteado[1]]} e {$vetParticipantes[$sorteado[2]]} ", 3, "file.log");
        unset($vetParticipantes[$sorteado[1]]);
        unset($vetParticipantes[$sorteado[2]]);
        imprimeVetor($vetParticipantes);
    }
}

// FUNÇÃO APENAS PARA IMPRIMIR O ARRAY
function imprimeVetor($vetor)
{
    foreach ($vetor as $dados) {
        error_log("\nrestante: {$dados} ", 3, "file.log");
    }
}

// FUNÇÃO PARA SORTEAR OS PARES DENTRO DO ARRAY
function sorteiaParticipantes($vetParticipantes)
{
    return array_rand($vetParticipantes, 2);
}

// FUNÇÃO PARA CONTROLAR O TEMPORIZADOR (Talvez não seja mais necessario)
/*function retornaHoraInicio($id, $hrThink, $hrPair, $tpThink, $tpPair)
{
    $horaAtual = date('H:i:s');

    if ($id === 1) :
        return $tpThink;
    elseif ($id === 2) :
        return $tpThink - ($horaAtual - $hrThink);
    elseif ($id === 2) :
        return $tpPair - ($horaAtual - $hrPair);
    endif;
}*/
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/geral.css">
    <link rel="stylesheet" href="./css/iniciacao_partida.css">
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="10">
    <title>ApuriShare</title>
</head>

<body>
    <?php include('menu.php'); ?>
    </br>
    </br>
    <div class="grid">
        <?php foreach ($sql_resultado as $dados) :
            $registrados = contaParticipantes($dados['chaveAcesso'], $con)
        ?>
            <div class="table-cell">
                <form action="iniciacao_partida.php" method="POST">
                    <div class="centro">
                        <h2><?php echo $dados['nome']; ?></h2>
                        <h2>Código: <?php echo $dados['chaveAcesso'] ?></h2>
                        <br>
                        <h3>Capacidade: <?php echo $dados['qntUsers']; ?></h3>
                        <h3>Registrados: <?php echo $registrados; ?></h3>
                        <br>
                        <h4><?php echo $dados['statusSituacao'] ?></h4>

                        <input type="hidden" name="chave_acesso" value="<?php echo $dados['chaveAcesso']; ?>">
                        <input type="hidden" name="id_situacao" value="<?php echo $dados['idSituacao']; ?>">
                        <input type="submit" value="<?php echo $dados['descricaoSituacao'] ?>" name="btnIniciar" class="btn btn-outline-dark">

                        <br><br>
                    </div>
                </form>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>