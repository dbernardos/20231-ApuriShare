<?php 
    include_once('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];

        $chaveAcesso = $_SESSION['chaveAcesso'];

        $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
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
        <a href="./tela_inicial.php"><button class="btnX btn btn-outline-dark"> X </button></a>
</div>
<br><br>
<div class="border border-bottom-0 atividade">
    <br>
    <h1> <?php  echo $dados['nome']; ?> </h1>
    <br>
    <p> <?php  echo $dados['atividade']; ?> </p>
</div>
<br>
<div class="respShare">
    <H3>Resposta dos Participantes</H3>
    <h4>Jorge e Mathues<!--<?php  echo $dados['fk.usuarios']; ?>--></h4>
    <p>b)<!--<?php  echo $dados['respostaPair']; ?>--></p>
    <br>
</div>
<br>
<div class="resposta">
    <h4>Resposta Correta:</h4><br>
    <p> <?php  echo $dados['observacao']; ?></p>
    <br>
</div>

        </center>
        <?php } ?>
    </form>
    

</body>
</html>