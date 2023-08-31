<?php
    include_once('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];
    if(isset($_POST['submit'])){

        $respostaThink = $_POST['txtRespostaThink'];

        $sql = mysqli_query($con, "INSERT into atividade(respostaThink)
        values ('$respostaThink')");
        }
        else{
            print_r("erro");
        }

    $sql_code = "SELECT * FROM sala";

    $sql_query = $con->query($sql_code);
        while($dados = mysqli_fetch_assoc($sql_query)){
?>

    <!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/salaThink.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>
<body>
    <center>
        <div class="cabecalho">
        <h2> <?php echo $dados['tempoThink']?> </h2>
    </div>
    <div class="atividade">
        <h3> <?php echo $dados['nome']?> </h3>
        <p> <?php echo $dados['atividade']?> </p>
    </div>
    <div class="resposta">
        <h3>usuario</h3>
        <textarea class="form-control textoarea" placeholder="Escreva sua resposta" name="txtRespostaThink" id="resposta" required></textarea>
        <input type="submit" value="Enviar" id="btnEnviar" class="btn btn-outline-dark btnEnviar">
    </div>
    </center>
    <?php } ?>
</body>
</html>