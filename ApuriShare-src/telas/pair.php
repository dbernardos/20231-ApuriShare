<?php
    include('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];
    $id_respostaThink = $_SESSION['codigo'];


    if(isset($_POST['btnEnviar'])){

        $respostaPair = $_POST['txtRespostaPair'];

        $sql = mysqli_query($con, "UPDATE atividade SET respostaPair = '$respostaPair' 
        where codigo = '$id_respostaThink'");

        header('Location: esperaBtnPair.php');
        }
        else{
           echo "erro!";
        }

        $chaveAcesso = $_SESSION['chaveAcesso'];

        $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
        $sql_id = mysqli_query($con, "SELECT * from atividade WHERE codigo = '$id_respostaThink'");

//juntanto pessoas aleatorias
    $sql = mysqli_query($con, "SELECT a.fk_usuario, b.fk_usuario 
                            FROM atividade a 
                            JOIN atividade b ON a.fk_sala = b.fk_sala 
                            WHERE a.fk_sala = '$chaveAcesso' AND a.fk_usuario != b.fk_usuario 
                            ORDER BY RAND() 
                            LIMIT $qntUsers;");

        
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
    <center>
        <form action="pair.php" method="POST">
        <div class="cabecalho">
        <h2> <?php echo $dados['tempoPair']?></h2>
    </div>
    <div class="atividade">
        <br>
        <h3> <?php echo $dados['nome']?></h3>
        <p> <?php echo $dados['atividade']?> </p>
        
    </div>
    <div class="respShare">
        <br>
        <h3>Resposta em conjunto</h3>
        <textarea class="form-control textoarea" placeholder="Escreva sua resposta" name="txtRespostaPair" id="resposta" required></textarea>
        <input type="submit" value="Enviar" name="btnEnviar" class="btn btn-outline-dark btnEnviar">
    </div>
    <div class="respostas">
        <div class="resp1">
            <br>
            <h3> <?php echo $nome_user ?> </h3>
            <p> <?php
            while($resposta = mysqli_fetch_assoc($sql_id)){
                echo $resposta['respostaThink']; 
            }
             ?></p>
        </div>
        <br><br>
        <div class="resp2">
            <h3><?php echo $dados['b.fk_usuario'] ?></h3>
            <p>testetestetestetestetesteteste</p><!--<p><?php echo $dados['']; ?></p>-->
        </div>
    </div>
        </form>
    </center>
    <?php
    if($dados['fk_situacao'] === '4'){
            header('Location: share.php');
        }
    }?>
</body>
</html>