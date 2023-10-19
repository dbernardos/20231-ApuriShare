<?php
    include('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];
    $respostaThink = $_SESSION['respostaThink'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

    if(isset($_POST['btnEnviar'])){
        $respostaPair = $_POST['txtRespostaPair'];
        
        
        $sql = mysqli_query($con, "UPDATE resposta SET resposta = '$respostaPair' where fk_usuario = '$nome_user' where fk_sala = '$chaveAcesso'");

        header('Location: esperaBtnPair.php');
    
    }

        $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
        $sql_think = mysqli_query($con, "SELECT * from resposta WHERE fk_usuario = '$nome_user' and resposta = '$respostaThink'");
        
        $sql_dupla = mysqli_query($con, "SELECT * from resposta where fk_usuario = '$nome_user' and situacao = 'pares' and fk_sala = '$chaveAcesso'");
        
        
        while($dados = mysqli_fetch_assoc($sql)){


    /*$sql_user = mysqli_query($con, "SELECT a.fk_usuario, b.fk_usuario 
                            FROM resposta a 
                            JOIN resposta b ON a.fk_sala = b.fk_sala 
                            WHERE a.fk_sala = '$chaveAcesso' AND a.fk_usuario != b.fk_usuario 
                            ORDER BY RAND() 
                            ");
    */
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
        <h2>Agora responda a pergunta levando em consideração a resposta de outro participante</h2>
    </div>
    <div class="atividade">
        <br>
        <h3> <?php echo $dados['nome']?></h3>
        <p> <?php echo $dados['atividade']?> </p>
        
    </div>
    <div class="respShare">
        <br>
        <h3>Nova Resposta</h3>
        <textarea class="form-control textoarea" placeholder="Escreva sua resposta" name="txtRespostaPair" id="resposta" required></textarea>
        <input type="submit" value="Enviar" name="btnEnviar" class="btn btn-outline-dark btnEnviar">
    </div>
    <div class="respostas">
        <div class="resp1">
            <br>
            <h3> <?php echo $nome_user ?> </h3>
            <p> <?php echo $respostaThink ?></p>
        </div>
        <br><br>
        <div class="resp2">
        <h3> <?php while($dupla = mysqli_fetch_assoc($sql_dupla)){
                echo $dupla['fk_usuario_par']; 
            }?></h3>
            <p><?php while($dupla = mysqli_fetch_assoc($sql_dupla)){
                echo $dupla['resposta']; 
            }?></p>
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