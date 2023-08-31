<?php
    include('conexao.php');


    if(isset($_POST['btnEnviar'])){
        $resposta = $_POST['txtResposta'];
        
        $sql = mysqli_query($con, "");
    }else{
        print_r("Não foi possível enviar sua resposta.");
    }
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
    <center>
        <div class="cabecalho">
        <h2>00:00</h2>
    </div>
    <div class="atividade">
        <br>
        <h3>Atividade Teste</h3>
        <p>2+2+4</p><!-- Depois substituir<p><?php echo $dados['atividade']; ?></p>-->
        
    </div>
    <div class="respShare">
        <br>
        <h3>Resposta em conjunto</h3>
        <textarea class="form-control textoarea" placeholder="Escreva sua resposta" name="txtResposta" id="resposta" required></textarea>
        <input type="submit" value="Enviar" id="btnEnviar" class="btn btn-outline-dark btnEnviar">
    </div>
    <div class="respostas">
        <div class="resp1">
            <br>
            <h3>usuario1</h3>
            <p>testetestetestetestetesteteste</p><!--<p><?php echo $dados['']; ?></p>-->
        </div>
        <br><br>
        <div class="resp2">
            <h3>usuario2</h3>
            <p>testetestetestetestetesteteste</p><!--<p><?php echo $dados['']; ?></p>-->
        </div>
    </div>
    
    </center>
</body>
</html>