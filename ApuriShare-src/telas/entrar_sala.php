<?php
    include("conexao.php")
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
        <button class="btn btn-outline-dark" name="btnEntrar">Entrar</button><br><br>
    </div>

<?php
    $sql_code = "SELECT idsala FROM sala";
        
        if(isset($_POST['btnEntrar'])){
            $pesquisa = $_POST['txtCodigo'];
            $sql_code = "SELECT * FROM sala WHERE idsala like '%$pesquisa%'";
        }
?>

</body>
</html>