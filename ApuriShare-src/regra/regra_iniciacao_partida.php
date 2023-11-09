<?php 
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
    $participantesPar = verificaNumeroDeParticipantes(contaParticipantes($_POST['chave_acesso'], $con));
    
    if ($_POST['id_situacao'] == 1 && $participantesPar) :
        
        $sql_update = "UPDATE sala SET fk_situacao =  2 WHERE chaveAcesso = {$_POST['chave_acesso']}";
        mysqli_query($con, $sql_update);

    elseif ($_POST['id_situacao'] == 2 && $participantesPar) :
        //LOGICA PARA O SORTEIO DOS PARES
        recuperaParticipantes($_POST['chave_acesso'], $con);

        $sql_update = "UPDATE sala SET fk_situacao =  3 WHERE chaveAcesso = {$_POST['chave_acesso']}";
        mysqli_query($con, $sql_update);

    elseif ($_POST['id_situacao'] == 3) :
        $sql_update = "UPDATE sala SET fk_situacao =  4 WHERE chaveAcesso = {$_POST['chave_acesso']}";
        mysqli_query($con, $sql_update);

    elseif ($_POST['id_situacao'] == 4) :
        $sql_update = "UPDATE sala SET fk_situacao =  5 WHERE chaveAcesso = {$_POST['chave_acesso']}";
        mysqli_query($con, $sql_update);

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
        error_log("\n Erro na consulta SQL (contar participantes): " . mysqli_error($con), 3, "file.log");
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
        $sorteados = sorteiaParticipantes($vetParticipantes);
        $sorteado0 = $vetParticipantes[$sorteados[0]];
        $sorteado1 = $vetParticipantes[$sorteados[1]];
        error_log("\nsorteado >>> {$sorteado0} e {$sorteado1} ", 3, "file.log");

        // Insere os dois participantes na tabela de respostas
        $comando = "INSERT INTO resposta VALUES (NULL, '', '', 'pares', '$chave', '$sorteado0', '$sorteado1')"; 
        executar_sql($con, $comando);

        unset($vetParticipantes[$sorteados[0]]);
        unset($vetParticipantes[$sorteados[1]]);
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
