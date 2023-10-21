<?php
    require('conexao.php');
    require('inicia_sessao.php');

    $nome_user = $_SESSION['nickname'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

    $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
    $sql_usuarios = mysqli_query($con, "SELECT * from sala_usuario WHERE fk_sala = '$chaveAcesso'");

    while($dados = mysqli_fetch_assoc($sql)){
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/iniciacao_partida.css">
    <meta http-equiv="refresh" content="10"> <!-- Atualiza a página a cada 10 segundos -->
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>
<body>
    <a href="./tela_inicial.php"><button class="btnX btn btn-outline-dark"> X </button></a>
    <div class="esquerda">
    </div>

    <div class="centro">
    <h1><?php echo $dados['nome']; ?></h1>
    <h1><?php while($resposta = mysqli_fetch_assoc($sql_usuarios)){
        }?></h1>
    <br><br>

    <?php 
        $situacao = $dados['fk_situacao'];
        //$espera = $_SESSION['espera']; 

        if($situacao == 1){
            echo "<h3>Aguarde até a atividade ser iniciada!</h3>";
        }else if($situacao == 2){
            header('Location: think.php');
        }else{
            echo "<h3>A sala solicitada foi finalizada!</h3>";
        }
        
        // era uma lógica para ter apenas uma sala de espera, mas não deu certo por enquanto
        /*if($situacao == 2 && $espera){
            //$_SESSION['espera'] = false;
            header('Location: think.php');
        }else if($situacao == 3 && $espera){
            header('Location: pair.php');
        }else if($situacao == 4 && $espera){
            header('Location: share.php');
        }else if($situacao == 5){
            echo "<h3>A sala solicitada foi finalizada!</h3>";
        }*/
    ?>
    
    <br><br>
    </div>
</body>
<?php } ?>
</html>