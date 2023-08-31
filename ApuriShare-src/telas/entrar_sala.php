<?php 
    include_once('conexao.php');

    if(isset($_POST['btnEntrar'])){
        $chaveAcesso = $_POST['txtCodigo'];

        $sql = "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'";
        $sql_query = $con->query($sql);

        // Iniciar a sessão ou retomá-la, se já existir
        session_start();

        // Armazenar a variável $chaveAcesso na sessão
        $_SESSION['chaveAcesso'] = $chaveAcesso;

        header('Location: salaEspera.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/entrar_sala.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>

<body>
    <div class="cabecalho">
        <h1>Entre em uma Sala</h1>
        <a href="./tela_inicial.php"><button class="btn btn-outline-dark"> X </button></a>
    </div>
    <br>
    <div class="centro">
        <form method="POST">
        <h2>Insira o Código</h2> <br><br>
        <div class="cod">
        <input type="text" name="txtCodigo" maxlength="6" placeholder="ID Sala">
        </div>
        <br>
        <input type="submit" value="Entrar" class="btn btn-outline-dark btnEntrar" name="btnEntrar" id="btnEntrar"><br><br>
        </form>
    </div>

</body>
</html>