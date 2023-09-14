<?php
    include_once('conexao.php');

    session_start();
    
    $nome_user = $_SESSION['nickname'];

    $sql_code = "SELECT * FROM sala as s 
    INNER JOIN sala_usuario as su 
    ON s.chaveAcesso = su.fk_sala 
    WHERE su.fk_usuario = '$nome_user'";
    //SELECT * FROM sala as s INNER JOIN sala_usuario as su ON s.chaveAcesso = su.fk_sala 
    //WHERE su.fk_usuario = '$nome_user'

    
    if(isset($_POST['btnIniciar'])){
        $dados['statusSala'] === 'iniciada'
        
        header('Location: esperaCriador.php'); //ERRO AQUI
    }

    $sql_query = $con->query($sql_code);
        while($dados = mysqli_fetch_assoc($sql_query)){
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
    <br><br>
    <h3>Clique no botão para a iniciar a atividade!</h3>
    <br><br>
    <input type="submit" value="Iniciar sala" name="btnIniciar" class="btn btn-outline-dark">
    <br><br>
</div>

<?php }?>
</form>
</body>
</html>