<?php 
    include_once('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

        $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
        $sql_id = mysqli_query($con, "SELECT * from resposta WHERE fk_sala = '$chaveAcesso' AND situacao = 'pares'");
        while($dados = mysqli_fetch_assoc($sql)){
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/salaShare.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>
<body>
    <form>
        <center>
<br>
<div class="cabecalho">
        <h2>Finalização da Atividade</h2>
        <a href="./tela_inicial.php" name="btnX" class="btnX btn btn-outline-dark"> X </a>
</div>
<br><br>
<div class="border border-2 atividade">
    <br>
    <h1> <?php  echo $dados['nome']; ?> </h1>
    <br>
    <p> <?php  echo $dados['atividade']; ?> </p>
</div>
<br>
<div class="border border-2 respShare">
    <H3>Resposta dos Participantes</H3><br>
    <?php
    while($resposta = mysqli_fetch_assoc($sql_id)){
            echo "<span>Dupla: </span> {$resposta['fk_usuario']} | {$resposta['fk_usuario_par']} <br> <span>Resposta:</span> <br>{$resposta['resposta']} | {$resposta['resposta_par']}<br>";
}?>
    <br>
</div>
<br>
<div class="border border-2 resposta">
    <h4>Resposta Correta:</h4><br>
    <p> <?php  echo $dados['observacao']; ?></p>
    <br>
</div>

        </center>
        <?php } ?>
    </form>
    

</body>
</html>