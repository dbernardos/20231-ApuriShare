<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="./css/cabeçalho-rodapé.css">
    <title>Entrar</title>
</head>
<body>
    <!-- Cabeçalho -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #ccc;">
        <a class="navbar-brand" href="index.html">
            <img src="./img/logo_preta.png" alt="Logo do ApuriShare" style="max-height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Menu hamburguer">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Criar conta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Entrar</a>
                </li>
            </ul>
        </div>
    </nav>  

    <!--FORMULÁRIO-->

        <div class="container" style="margin-top: 30vh; margin-bottom: 30vh;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Entrar
                        </div>
                        <div class="card-body">
                            <form action="testelogin.php" method="POST">
                            <?php

            if (isset($_SESSION['login_error'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
                unset($_SESSION['login_error']); 
            }
            ?>
                                <div class="form-group">
                                    <label for="nickname">Apelido:</label>
                                    <input type="text" class="form-control" id="nickname" name="nickname" required>
                                </div>
                                <div class="form-group">
                                    <label for="senha">Senha:</label>
                                    <input type="password" class="form-control" id="senha" name="senha" required>
                                </div>

                                
                                <input type="submit" name="submit" id="submit" class="btn btn-primary enviar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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