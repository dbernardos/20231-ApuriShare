<?php require('inicia_sessao.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial - Apurishare</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Poppins', sans-serif;
        }

        .centro {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .botoes {
            margin-top: 20px;
        }

        .botoes button {
            background-color: #343a40;
            color: #fff;
        }

        .botoes button:hover {
            background-color: #292b2c;
        }

        .link-opacity-10-hover {
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        .link-opacity-10-hover:hover {
            opacity: 1;
        }

        .sair button {
            background-color: #dc3545;
            color: #fff;
        }

        .sair button:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="border-bottom: 1px solid #ccc; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
        <a class="navbar-brand" href="tela_inicial.php">
            <img src="./img/logo_preta.png" alt="Logo do ApuriShare" style="max-height: 50px;">
        </a>
        <div class="navbar-nav ml-auto">
            <?php
            echo "<h4><a class='nav-link' href='iniciacao_partida.php'>Salas de {$_SESSION['nickname']}</a></h4>";
            ?>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center" style="height: 75vh">
        <div class="centro text-center">
            <h1>Entre ou Crie Salas</h1>
            <div class="botoes mt-4">
                <a href="./entrar_sala.php"><button type="button" class="btn btn-outline-dark mr-3">Entrar</button></a>
                <a href="./criar_sala.php"><button type="button" class="btn btn-outline-dark">Criar</button></a>
            </div>
            <p class="mt-4">Entre em salas para realizar atividades e desafios feitos pelos usuários!</p>
        </div>
    </div>
    <div class="sair text-center">
        <a href="./sair.php">
            <button type="submit" class="btn btn-outline-dark">
                <img src="./img/Icon_Sair.png" width="10" height="20"><strong> Sair da Conta</strong>
            </button>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kAx2jc5Pv5B1f5F6F5F5F5F5F5"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
