<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/cadastro.css">
    <title>Criar conta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="./css/cabeçalho-rodapé.css">

    <style>

    </style>
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


    <!--Formulário-->
    <div class="container" style="margin-top: 20vh; margin-bottom:20vh;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Criar conta</div>
                    <div class="card-body">
                    <?php
                        if (isset($_POST['submit'])) {
                            include('conexao.php');
                            $nome = $_POST['nome'];
                            $nickname = $_POST['nickname'];
                            $senha = $_POST['senha'];
                            $senha = $_POST['senha'];
                            $confirmar_senha = $_POST['confirmar_senha'];

                            $query = "SELECT * FROM usuario WHERE nickname = '$nickname'";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $errors[] = "O nickname já está em uso.";
                            }

                            if ($confirmar_senha != $senha) {
                                $errors[] = "As senhas não coincidem.";
                            }

                            // Se houver erros, exibi-los
                            if (!empty($errors)) {
                                foreach ($errors as $error) {
                                    echo "<div class='alert alert-danger' role='alert'>Erro: $error</div>";
                                }
                            } else {
                                mysqli_query($con, "INSERT into usuario(nome, nickname, senha) values ('$nome', '$nickname', '$senha')");
                                header('Location: login.php');
                            }
                        }
                        ?>

                        <form action="cadastro.php" method="POST">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="form-group">
                                <label for="nickname">Apelido:</label>
                                <input type="text" class="form-control" id="nickname" name="nickname" required>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>
                            <div class="form-group">
                                <label for="confsenha">Confirmar senha:</label>
                                <input type="password" class="form-control" id="confsenha" name="confirmar_senha"
                                    required>
                            </div>

        <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="aceitar" name="aceitar"
                                        required>
                                    <label class="custom-control-label" for="aceitar">Aceitar os Termos de Uso</label>
                                </div>
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