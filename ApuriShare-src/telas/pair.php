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
    <?php while ($dados = mysqli_fetch_assoc($sql)) : ?>
        <center>
            <form action="pair.php" method="POST">
                <div class="cabecalho">
                    <h2>Agora responda a pergunta levando em consideração a resposta de outro participante</h2>
                </div>
                <div class="atividade">
                    <br>
                    <h3> <?php echo $dados['nome'] ?></h3>
                    <p> <?php echo $dados['atividade'] ?> </p>

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
                        <h3> <?php echo $nome_user ?> </h3>
                        <p> <?php echo $respostaThink ?></p>
                    </div>
                    <br><br>
                    <div class="resp2">
                        <h3> <?php while ($dupla = mysqli_fetch_assoc($sql_dupla)) {
                                    echo $dupla['fk_usuario_par'];
                                } ?></h3>
                        <p><?php while ($dupla = mysqli_fetch_assoc($sql_dupla)) {
                                echo $dupla['resposta'];
                            } ?></p>
                    </div>
                </div>
            </form>
        </center>
    <?php
        if ($dados['fk_situacao'] === '4') :
            header('Location: share.php');
        endif;
    endwhile; ?>
</body>

</html>