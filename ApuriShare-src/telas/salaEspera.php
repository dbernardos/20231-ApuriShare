<?php
    include('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];

    $sql_code = "SELECT * FROM sala";
    //SELECT * FROM sala as s INNER JOIN sala_usuario as su ON s.chaveAcesso = su.fk_sala 
    //WHERE su.fk_usuario = '$nome_user'

    $chaveAcesso = $_SESSION['chaveAcesso'];
    $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
    while($dados = mysqli_fetch_assoc($sql)){

?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/iniciacao_partida.css">
    <meta http-equiv="refresh" content="5"> <!-- Atualiza a página a cada 10 segundos -->
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

    <?php 
        if($dados['fk_situacao'] === '1'){
            echo "<h3>Aguarde até a atividade ser iniciada!</h3>";
        }else if($dados['fk_situacao'] === '2'){
            header('Location: think.php');
        }else{
            echo "<h3>A sala solicitada foi finalizada!</h3>";
        }
    ?>
    
    <br><br>
    </div>
</body>
<?php } ?>
</html>