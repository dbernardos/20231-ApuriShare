<?php
    include_once('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

    if(isset($_POST['btnEnviar'])){

        $situacao = "individual";
        $respostaThink = $_POST['txtRespostaThink'];

        $sql = mysqli_query($con, "INSERT into resposta(resposta, fk_sala, fk_usuario, situacao)
        values ('$respostaThink', '$chaveAcesso', '$nome_user', '$situacao')");

        header('Location: esperaBtnThink.php');
        
        $_SESSION['respostaThink'] = $respostaThink;
    }
        
        
    
        $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
        while($dados = mysqli_fetch_assoc($sql)){
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
    <form action="think.php" method="POST">
    <div class="atividade">
        <h3> <?php echo $dados['nome']?> </h3>
        <p> <?php echo $dados['atividade']?> </p>
    </div>
    <div class="resposta">
        <h3><?php echo $nome_user ?></h3>
        <textarea class="form-control textoarea" placeholder="Escreva sua resposta" name="txtRespostaThink" id="resposta" required></textarea>
        <input type="submit" value="Enviar" name="btnEnviar" class="btn btn-outline-dark btnEnviar">
    </div>
    
    </form>
    </center>
    <?php
    if($dados['fk_situacao'] === '3'){
            header('Location: pair.php');
        }
    }?>
</body>
</html>