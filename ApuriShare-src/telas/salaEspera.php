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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2"> <!-- Atualiza a página a cada 2 segundos -->
    <title>Esperando partida iniciar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

</head>
<body>
    <a href="./tela_inicial.php" class="btn btn-outline-dark">Voltar</a>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
            <a href="./tela_inicial.php"><button class="btnX btn btn-outline-dark"> X </button></a>
            </div>
            <div class="col-md-6">
                <h1><?php echo $dados['nome']; ?></h1>
                <h1>
                    <?php 
                        while($resposta = mysqli_fetch_assoc($sql_usuarios)){

                        }
                    ?>
                </h1>
                <br><br>
                <?php 
                    $situacao = $dados['fk_situacao'];
                    if($situacao == 1){
                        echo "<h3>Aguarde até a atividade ser iniciada!</h3>";
                    }else if($situacao == 2){
                        header('Location: think.php');
                    }else{
                        echo "<h3>A sala solicitada foi finalizada!</h3>";
                    }
                ?>
                <br><br>
            </div>
        </div>
    </div>
</body>
<?php } ?>
</html>