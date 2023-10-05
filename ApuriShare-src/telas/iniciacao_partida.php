<?php
    require('conexao.php');
    require('inicia_sessao.php');

    $id_sala = $_SESSION['idsala'];
    $users = $_SESSION['usuarios'];

    $sql_select = "SELECT * FROM sala AS s 
        INNER JOIN sala_usuario AS su 
        INNER JOIN situacao si
        ON s.chaveAcesso = su.fk_sala 
        AND s.fk_situacao = si.idSituacao
        WHERE su.fk_usuario = '{$_SESSION['nickname']}'
        AND su.tipoUsuario	= 'criador'
        ORDER BY s.chaveAcesso DESC";
    
    $sql_id = mysqli_query($con, "SELECT * from sala_usuario WHERE fk_sala = '$id_sala' 
    AND tipoUsuario = 'participante'");

    $sql_resultado = buscar_dados($con, $sql_select);

    if(isset($_POST['btnIniciar'])):
        $horaAtual = date('H:i:s');

        if ($_POST['id_situacao'] == 1 && $users % 2 == 0):
            $sql_update = "UPDATE sala SET fk_situacao =  2, horaInicioThink = '$horaAtual' WHERE chaveAcesso = {$_POST['chave_acesso']}";
            executar_sql($con, $sql_update);

        elseif ($_POST['id_situacao'] == 2):
            $sql_update = "UPDATE sala SET fk_situacao =  3, horaInicioPair = '$horaAtual' WHERE chaveAcesso = {$_POST['chave_acesso']}";
            executar_sql($con, $sql_update);
            
        elseif($_POST['id_situacao'] == 3):
            $sql_update = "UPDATE sala SET fk_situacao =  4, horaInicioPair = '$horaAtual' WHERE chaveAcesso = {$_POST['chave_acesso']}";
            executar_sql($con, $sql_update);
        
        elseif($_POST['id_situacao'] == 4):
            $sql_update = "UPDATE sala SET fk_situacao =  5, horaInicioPair = '$horaAtual' WHERE chaveAcesso = {$_POST['chave_acesso']}";
            executar_sql($con, $sql_update);

        elseif($_POST['id_situacao'] == 5):
            echo "A tarefa foi finalizada (compartilhar), precisamos pensar se manda para outra página ou o que faz";
        endif;
        
        //
        $comando = "SELECT * from sala_usuario WHERE fk_sala = '$id_sala' 
        AND tipoUsuario = 'participante'";

        $participantes = buscar_dados($con, $comando);

        foreach($participantes as $dados){
            echo $dados['fk_usuario'];
        }
    endif;

    function retornaHoraInicio($id, $hrThink, $hrPair, $tpThink, $tpPair){
        $horaAtual = date('H:i:s');

        if ($id === 1):
            return $tpThink;
        elseif ($id === 2):
            return $tpThink - ($horaAtual - $hrThink);
        elseif ($id === 2):
            return $tpPair - ($horaAtual - $hrPair);
        endif;
    }

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
<?php include('menu.php');?>
</br>
</br>
        <div class="grid">
            <?php foreach($sql_resultado as $dados): ?>
                <div class="table-cell">
                    <form action="iniciacao_partida.php" method="POST">
                        <div class="centro">
                            <h2><?php  echo $dados['nome']; ?></h2>
                            <h2>Código: <?php echo $dados['chaveAcesso'] ?></h2>
                            <br>
                            <h3>Capacidade: <?php  echo $dados['qntUsers']; ?></h3>
                            <h3>Registrados: <?php while($resposta = mysqli_fetch_assoc($sql_id)){
                                            echo "<td>".$resposta['fk_usuario']."</td><br>";
                                            }?></h3>
                            <h3>Tempo restante: <?php echo retornaHoraInicio($dados['idSituacao'], $dados['horaInicioThink'], $dados['horaInicioThink'], $dados['tempoThink'], $dados['tempoPair']); ?></h3>
                            <br>
                            <h4><?php  echo $dados['statusSituacao'] ?></h4>

                            <input type="hidden" name="chave_acesso" value="<?php echo $dados['chaveAcesso']; ?>">
                            <input type="hidden" name="id_situacao" value="<?php echo $dados['idSituacao']; ?>">
                            <input type="submit" value="<?php  echo $dados['descricaoSituacao'] ?>" name="btnIniciar" class="btn btn-outline-dark">
                            
                            <br><br>
                        </div>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
</body>
</html>