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
            <?php
            if (isset($nome_user)) :
            ?>
                <div class="atividade">
                    <br>
                    <h3> <?php echo $nome_user ?></h3>
                    <p> <?php echo isset($atividade) ? $atividade : '' ?> </p>
                </div>
            <?php endif; ?>

            <div class="respShare">
                <br>
                <h3>Nova Resposta</h3>
                <textarea class="form-control textoarea" placeholder="Escreva sua resposta" name="txtRespostaPair" id="txtRespostaPair" required></textarea>
                <input type="submit" value="Enviar" name="btnEnviar" class="btn btn-outline-dark btnEnviar">
            </div>

            <div class="respostas">
                <?php while ($dupla = mysqli_fetch_assoc($sql_respostaThink1)) : ?>
                    <div class="resp1">
                        <br>
                        <h3> <?php echo isset($dupla['nome_user1']) ? $dupla['nome_user1'] : '' ?> </h3>
                        <p> <?php echo isset($dupla['resposta']) ? $dupla['resposta'] : '' ?></p>
                    </div>
                <?php endwhile; ?>

                <?php while ($dupla = mysqli_fetch_assoc($sql_respostaThink2)) : ?>
                    <div class="resp2">
                        <h3> <?php echo isset($dupla['nome_user2']) ? $dupla['nome_user2'] : '' ?></h3>
                        <p><?php echo isset($dupla['resposta']) ? $dupla['resposta'] : '' ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </form>
    </center>
    <?php
    if (isset($situacao) && $situacao == 4) :
        header('Location: share.php');
    endif;
    ?>
</body>

</html>
