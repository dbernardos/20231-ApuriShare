<?php
require('conexao.php');
require('inicia_sessao.php');
require('../regra/regra_pair.php');
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
                    <h3> <?php echo $nome_user1 ?></h3>
                    <p> <?php echo $atividade ?> </p>

                </div>
                <div class="respShare">
                    <br>
                    <h3>Nova Resposta</h3>
                    <textarea class="form-control textoarea" placeholder="Escreva sua resposta" name="txtRespostaPair" id="txtRespostaPair" required></textarea>
                    <input type="submit" value="Enviar" name="btnEnviar" class="btn btn-outline-dark btnEnviar">
                </div>
                <div class="respostas">
                    <div class="resp1">
                        <br>
                        <h3> <?php echo $nome_user1 ?> </h3>
                        <p> <?php 
                                while ($dupla = mysqli_fetch_assoc($sql_respostaThink1)):
                                    echo $dupla['resposta'];
                                endwhile; 
                            ?></p>
                    </div>
                    <br><br>
                    <div class="resp2">
                        <h3> <?php echo $nome_user2; ?></h3>
                        <p><?php 
                            while ($dupla = mysqli_fetch_assoc($sql_respostaThink2)):
                                echo $dupla['resposta'];
                            endwhile; 
                        ?></p>
                    </div>
                </div>
            </form>
        </center>
    <?php
        if ($situacao == 4) :
            header('Location: share.php');
        endif;
 ?>
</body>

</html>