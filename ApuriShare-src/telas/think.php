<?php
    require('conexao.php');
    require('inicia_sessao.php');
    require('../regra/regra_think.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/salaThink.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .atividade {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .resposta {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btnEnviar {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
        while ($dados = mysqli_fetch_assoc($sql)) :
        ?>
            <div class="text-center">
                <h3 class="mt-3"><?php echo $dados['nome'] ?></h3>
                <div class="atividade">
                    <p><?php echo $dados['atividade'] ?></p>
                </div>
            </div>
            <form action="think.php" method="POST">
                <div class="resposta">
                    <h3><?php echo $nome_user ?></h3>
                    <textarea class="form-control mb-3" placeholder="Escreva sua resposta" name="txtRespostaThink" id="txtRespostaThink" required></textarea>
                    <input type="submit" value="Enviar" name="btnEnviar" id="btnEnviar" class="btn btn-outline-dark btnEnviar">
                </div>
            </form>
            <?php
            if ($dados['fk_situacao'] == 3) :
                header('Location: pair.php');
            endif;
        endwhile; ?>
    </div>
</body>

</html>
