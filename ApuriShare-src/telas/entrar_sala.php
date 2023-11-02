<?php
require('conexao.php');
require('inicia_sessao.php');
require('../regra/regra_entrar_sala.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/geral.css">
    <link rel="stylesheet" href="./css/entrar_sala.css">
    <meta charset="UTF-8">
    <title>ApuriShare - Entrar na Sala</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
        }

        .centro {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .cod input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btnEntrar {
            background-color: #343a40;
            color: #fff;
        }

        .btnEntrar:hover {
            background-color: #292b2c;
        }

        h1 {
            color: #343a40;
        }

        h3 {
            color: #343a40;
            margin-top: 20px;
        }

        .sala-info {
            color: #333;
        }

        .sala-info span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="centro text-center">
            <form method="POST">
                <h1>Chave de Acesso</h1><br><br>
                <div class="cod">
                    <input type="text" name="txtCodigo" maxlength="6" placeholder="Insira o código">
                </div>
                <br>
                <input type="submit" value="Entrar" class="btn btnEntrar" name="btnEntrar" id="btnEntrar"><br><br>
            </form>

            <h3>Salas Registradas</h3>
            <div class="sala-info">
                <?php
                foreach (listarSalasRegistradas($con) as $dados) :
                    echo "<span>Chave de acesso:</span> {$dados['sChave']} | <span>Nome da sala:</span> {$dados['sNome']}<br>";
                endforeach;
                ?>
            </div>
        </div>
    </div>

</body>

</html>
