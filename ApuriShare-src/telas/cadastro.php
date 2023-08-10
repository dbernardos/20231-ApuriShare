<?php
    if(isset($_POST['submit'])){

        include_once('conexao.php');
        $nome = $_POST['nome'];
        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = mysqli_query($con, "Insert into usuario(nome, nickname, email, senha)
        values ('$nome', '$nickname', '$email', '$senha')");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./css/cadastro.css">
    <title>Criar conta</title>
</head>
<body>
    <div class="entrar">
        <h1>Criar Conta</h1>
    <div>

    <div class="formulario">
            <form action="cadastro.php" method="POST">
                <div class="InputBox">
                    <label for="nome">Nome:</label> <br>
                    <input type="text" name="nome" id="nome" require>
                </div>
                <br><br>
                <div class="InputBox">
                    <label for="nickname">Nickname:</label><br>
                    <input type="text" name="nickname" id="nickname" require>
                </div>
                <br><br>
                <div class="InputBox">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" require>
                </div>
                <br><br>
                <div class="InputBox">
                    <label for="Senha">Senha:</label><br>
                    <input type="password" name="senha" id="senha" require>
                </div>
                <br><br>
                <div class="InputBox">
                    <label for="confsenha">Confirmar Senha:</label><br>
                    <input type="password" name="confsenha" id="confsenha" require>
                </div>
                <br><br>
                <div class="InputBox">
                    <input type="radio" name="aceitar" id="aceitar" require><br>
                    <label for="confsenha">Concordar com os termos de uso e privacidade do ApuriShare</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" class="enviar">
                <br><br>
            </form>
        <p>Se já possui uma conta: <a href="./login.php">entrar</a></p>
    </div>
</body>
</html>