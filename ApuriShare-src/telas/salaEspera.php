<?php
<<<<<<< HEAD
    include_once('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];

    $sql_code = "SELECT * FROM sala";
    //SELECT * FROM sala as s INNER JOIN sala_usuario as su ON s.chaveAcesso = su.fk_sala 
    //WHERE su.fk_usuario = '$nome_user'

    $sql_query = $con->query($sql_code);
        while($dados = mysqli_fetch_assoc($sql_query)){ 

=======
    include('conexao.php')
    
    $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
    
>>>>>>> 106533f165882736c65d4a3f70a943ad97c02ad5
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
    <a href="./tela_inicial.php"><button class="btnX btn btn-outline-dark"> X </button></a>
    <div class="esquerda">
        <h1><?php echo $dados['qntUsers']; ?></h1>
    </div>

    <div class="centro">
    <h1><?php echo $dados['nome']; ?></h1>
    <br><br>
    <h3>Aguarde até a atividade<br>ser iniciada!</h3>
    <br><br>
    </div>
<?php } ?>
</body>
</html>