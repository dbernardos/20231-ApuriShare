<?php 
    include_once('conexao.php');

    if(isset($_POST['btnEntrar'])){
        $chaveAcesso = $_POST['txtCodigo'];

        $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
        header('Location: salaEspera.php');
    }
    else{
        print_r("Erro");
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
        <h2>Insira o Código</h2> <br><br>
        <div class="cod">
        <input type="text" name="txtCodigo" maxlength="6" placeholder="000-000">
        </div>
        <br>
        <input type="submit" value="Entrar" class="btn btn-outline-dark btnEntrar" name="btnEntrar" id="btnEntrar"><br><br>
    </div>

</body>
</html>