<?php
require('conexao.php');
require('inicia_sessao.php');
require('../regra/regra_think.php');
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/salaThink.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>

<body>
    <?php include('menu.php'); ?>
    <?php 
        $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
        while ($dados = mysqli_fetch_assoc($sql)) : ?>
        <center>
            <form action="think.php" method="POST">
                <div class="atividade">
                    <h3> <?php echo $dados['nome'] ?> </h3>
                    <p> <?php echo $dados['atividade'] ?> </p>
                </div>
                <div class="resposta">
                    <h3><?php echo $nome_user ?></h3>
                    <textarea class="form-control textoarea" placeholder="Escreva sua resposta" name="txtRespostaThink" id="txtRespostaThink" required></textarea>
                    <input type="submit" value="Enviar" name="btnEnviar" id="btnEnviar" class="btn btn-outline-dark btnEnviar">
                </div>
            </form>
        </center>
    <?php
    endwhile; ?>
</body>

</html>