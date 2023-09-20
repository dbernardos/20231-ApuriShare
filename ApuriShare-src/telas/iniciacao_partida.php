<?php
    require('conexao.php');
    session_start();

    $nome_user = $_SESSION['nickname'];
    $id_sala = $_SESSION['idsala'];

    $sql_code = "SELECT * FROM sala WHERE chaveAcesso = $id_sala";
    $sql_resultado = buscar_dados($con, $sql_code);

    if(isset($_POST['btnIniciar'])){
        foreach($sql_resultado as $dados){

            //if($dados['statusSala'] === 'criada'){
                $sql_code = "UPDATE sala SET statusSala = 'iniciada' WHERE chaveAcesso = $id_sala";
                executar_sql($con, $sql_code);
                header('Location: esperaCriador.php');
           // }
        }
    }

    foreach($sql_resultado as $dados):
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/iniciacao_partida.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>
<body>

    <form action="iniciacao_partida.php" method="POST">
    <a href="./tela_inicial.php"><button class="btnX btn btn-outline-dark"> X </button></a>
    <div class="esquerda">
        <h1><?php  echo $dados['qntUsers']; ?></h1>
    </div>

    <div class="centro">
    <h1><?php  echo $dados['nome']; ?></h1>
    <h1>Codigo: <?php echo $id_sala ?></h1>
    <br><br>
    <h3>Clique no botão para a iniciar a atividade!</h3>
    <br><br>
    <input type="submit" value="Iniciar sala" name="btnIniciar" class="btn btn-outline-dark">
    <br><br>
</div>

<?php endforeach ?>
</form>
</body>
</html>