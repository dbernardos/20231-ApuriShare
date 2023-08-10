<?php
include("conexao")
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/iniciacao_partida.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>
<body>
    <?php
    $sql_code = "SELECT s.nome as snome, s.idsala as sidsala, u.nickname, s.QuantidadeMaximaUsuarios as qnt FROM sala as s inner join usuario as u";
    ?>
    <a href="./Tela_Inicial.html"><button class="btnX btn btn-outline-dark"> X </button></a>
    <div class="esquerda">
        <h1><?php  echo $dados['qnt']; ?></h1>
    </div>

    <div class="centro">
    <h1><?php  echo $dados['snome']; ?></h1>
    <br><br>
    <h3>Clique no botão para a iniciar a atividade!</h3>
    <br><br>
    <button class="btn btn-outline-dark">Iniciar</button>
    <br><br>
</div>

</body>
</html>