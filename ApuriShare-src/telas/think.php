<?php
    include('conexao.php');

    $sql = mysqli_query($con, "SELECT s.atividade as aatividade, s.tempoThink as stempoThink, su.fk_usuario as sufk_usuario, a.respostaThink as arespostaThink 
    FROM sala as s INNER JOIN sala_usuario as su INNER JOIN atividade as a ");


    if(isset($_POST['btnEnviar'])){
        $resposta = $_POST['txtResposta'];
        
        $sql = mysqli_query($con, "INSERT INTO atividade(respostaThink) values('$resposta')");
        header('Location: iniciacao_partida.php');
    }
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
        <h2>00:00</h2>
    </div>
    <div class="atividade">
        <h3>Professor</h3>
        <p>2+2+4</p>
    </div>
    <div class="resposta">
        <h3>usuario</h3>
        <textarea class="form-control textoarea" placeholder="Escreva sua resposta" name="txtResposta" id="resposta" required></textarea>
        <input type="submit" value="Enviar" id="btnEnviar" class="btn btn-outline-dark btnEnviar">
    </div>
    </center>
</body>
</html>