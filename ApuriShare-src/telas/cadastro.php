<?php
    if(isset($_POST['submit'])){

        include_once('conexao.php');
        $nome = $_POST['nome'];
        $nickname = $_POST['nickname'];
        $senha = $_POST['senha'];
        $confsenha = $_POST['confsenha'];

        if($confsenha == $senha){

        $sql = mysqli_query($con, "INSERT into usuario(nome, nickname, senha)
        values ('$nome', '$nickname', '$senha')");
        header('Location: login.php');
        }
        else{
            print_r("erro");
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
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
                    <input type="text" name="nome" id="nome" required>
                </div>
                <br><br>
                <div class="InputBox">
                    <label for="nickname">Nickname:</label><br>
                    <input type="text" name="nickname" id="nickname" required>
                </div>
                <br><br>
                <div class="InputBox">
                    <label for="Senha">Senha:</label><br>
                    <input type="password" name="senha" id="senha" required>
                </div>
                <br><br>
                <div class="InputBox">
                    <label for="confsenha">Confirmar Senha:</label><br>
                    <input type="password" name="confsenha" id="confsenha" required>
                </div>
                <br><br>
                <div class="InputBox">
                    <input type="radio" name="aceitar" id="aceitar" required><br>
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