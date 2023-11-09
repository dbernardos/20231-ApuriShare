<?php
require('conexao.php');
require('inicia_sessao.php');
require('../regra/regra_pair.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/salaShare.css">
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

        .cabecalho {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .atividade {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .respShare {
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

        .respostas {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .resp1,
        .resp2 {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
            flex: 0 1 calc(50% - 20px);
        }

        .resp1 p,
        .resp2 p {
            margin-bottom: 0;
        }

        @media (min-width: 768px) {
            /* Estilos para dispositivos com largura maior que 768px */
            .container {
                max-width: 600px;
            }

            .respostas {
                flex-wrap: nowrap;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="cabecalho text-center">
            <h2>Agora responda a pergunta levando em consideração a resposta de outro participante</h2>
        </div>
        <form action="pair.php" method="POST">
            <div class="atividade">
                <h3><?php echo $nome_user ?></h3>
                <p><?php echo $atividade ?></p>
            </div>
            <div class="respShare">
                <h3>Nova Resposta</h3>
                <textarea class="form-control mb-3" placeholder="Escreva sua resposta" name="txtRespostaPair" id="txtRespostaPair" required></textarea>
                <input type="submit" value="Enviar" name="btnEnviar" class="btn btnEnviar">
            </div>
        </form>
        <div class="respostas">
            <div class="resp1">
                <h3><?php echo $nome_user1 ?></h3>
                <p><?php while ($dupla = mysqli_fetch_assoc($sql_respostaThink1)) : echo $dupla['resposta']; endwhile; ?></p>
            </div>
            <div class="resp2">
                <h3><?php echo $nome_user2 ?></h3>
                <p><?php while ($dupla = mysqli_fetch_assoc($sql_respostaThink2)) : echo $dupla['resposta']; endwhile; ?></p>
            </div>
        </div>
        <?php if ($situacao == 4) : header('Location: share.php'); endif; ?>
    </div>
</body>

</html>
