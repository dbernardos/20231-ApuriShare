<?php
    require('conexao.php');
    require('inicia_sessao.php');
    require('../regra/regra_think.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/salaThink.css">
    <title>ApuriShare</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 80%;
            margin-top: 50px;
            margin-bottom: 50px;
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
            text-align: center;
        }

        .btnEnviar {
            margin-top: 15px;
            background-color: #343a40;
            color: white;
            border: none;
            width: 100%;
            max-width: 150px; /* Ajuste a largura máxima conforme desejado */
            margin-left: auto;
            margin-right: auto;
        }

        .btnEnviar:hover {
            background-color: #292b2c;
            color: white;
        }

        .link-opacity-10-hover {
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        .link-opacity-10-hover:hover {
            opacity: 1;
        }

        @media (min-width: 768px) {
            /* Estilos para dispositivos com largura maior que 768px */
            .container {
                max-width: 600px;
            }
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
                    <p class="mb-0"><?php echo $dados['atividade'] ?></p>
                </div>
            </div>
            <form action="think.php" method="POST">
                <div class="resposta">
                    <h3 class="mb-3"><?php echo $nome_user ?></h3>
                    <textarea class="form-control mb-3" placeholder="Escreva sua resposta" name="txtRespostaThink" id="txtRespostaThink" required></textarea>
                    <input type="submit" value="Enviar" name="btnEnviar" id="btnEnviar" class="btn btnEnviar">
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
