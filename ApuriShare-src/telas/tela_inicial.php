<?php 
    include("conexao.php")
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/tela_inicial.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>
<body>
    <?php 

    $sql_code = "SELECT nickname FROM usuario";
    
    ?>
    <div class="cabecalho">
        <h2>ApuriShare</h2>
        <h3><?php  echo $dados['nickname']; ?></h3>
    </div>

    <br><br>
<center>
    <div class="centro">
        <h1>Entre ou Crie Salas</h1><br><br>
        <div class="botoes">
            <a href="./entrar_sala.php"><button type="button" class="btn btn-outline-dark"> Entrar </button></a>
            <a href="./criar_sala.php"><button type="button" class="btn btn-outline-dark"> Criar </button></a>    
        </div>
        <br>
        <p>Entre em salas para realizar atividades e desafios feitos pelos usúario!</p>
        <a href="" class="link-opacity-10-hover">Não sabe como funciona? Clique aqui</a>
        <br><br>
    </div>
</center>
    <br><br>
    <div class="sair">
        <a href="./index.html"><button type="submit" class="btn btn-outline-dark"><img src="./img/Icon_Sair.png" width="20" height="20"><strong> Sair da Conta</strong></button></a>
    </div>
    

</html>