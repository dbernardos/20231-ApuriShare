<?php
require('conexao.php');
require('inicia_sessao.php');
require('../regra/regra_entrar_sala.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/geral.css">
    <link rel="stylesheet" href="./css/entrar_sala.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>

<body>
    <?php include('menu.php'); ?>

    <div class="centro">
        <form method="POST">
            <h1>Chave de Acesso</h1> <br><br>
            <div class="cod">
                <input type="text" name="txtCodigo" maxlength="6" placeholder="Insira o código">
            </div>
            <br>
            <input type="submit" value="Entrar" class="btn btn-outline-dark btnEntrar" name="btnEntrar" id="btnEntrar"><br><br>
        </form>
    </div>

</body>

</html>