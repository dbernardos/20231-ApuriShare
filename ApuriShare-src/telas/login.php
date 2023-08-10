<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./css/login.css">
    <title>Entrar</title>
</head>
<body>
    <div class="entrar">
        <h1>Entrar</h1>
    <div>

    <div class="formulario">
        <form>
            <div class="InputBox">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" require>
            </div>
            <br><br>
            <div class="InputBox">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" require>
            </div>
            <br><br>
            <div class="InputBotao">
            <input type="submit" name="enviar" id="enviar" class="enviar">
            </div>
            <br><br>
        </form>
        <p>Se ainda não possui uma conta: <a href="./cadastro.php">registrar</a></p>
    </div>
</body>
</html>