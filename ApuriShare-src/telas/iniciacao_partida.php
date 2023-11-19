<?php
require('conexao.php');
require('inicia_sessao.php');
require('../regra/regra_iniciacao_partida.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <meta http-equiv="refresh" content="2">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial - Apurishare</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .navbar {
            border-bottom: 1px solid #ccc;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            max-height: 50px;
        }

        .navbar h4 {
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .table-cell {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: box-shadow 0.3s;
        }

        .table-cell:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .centro {
            text-align: center;
        }

        h2, h3, h4 {
            margin: 10px 0;
        }

        .btn-iniciar {
            background-color: #007bff;
            color: #ffffff;
            border: 1px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-iniciar:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="tela_inicial.php">
            <img src="./img/logo_preta.png" alt="Logo do ApuriShare">
        </a>
        <div class="navbar-nav ml-auto">
            <?php
            echo "<h4><a class='nav-link' href='iniciacao_partida.php'>Salas de {$_SESSION['nickname']}</a></h4>";
            ?>
        </div>
    </nav>

    <div class="grid">
        <?php foreach ($sql_resultado as $dados) :
            $registrados = contaParticipantes($dados['chaveAcesso'], $con)
        ?>
            <div class="table-cell">
                <form action="iniciacao_partida.php" method="POST">
                    <div class="centro">
                        <h2><?php echo $dados['nome']; ?></h2>
                        <h2>Código: <?php echo $dados['chaveAcesso'] ?></h2>
                        <br>
                        <h3>Capacidade: <?php echo $dados['qntUsers']; ?></h3>
                        <h3>Registrados: <?php echo $registrados; ?></h3>
                        <br>
                        <h4><?php echo $dados['statusSituacao'] ?></h4>

                        <input type="hidden" name="chave_acesso" value="<?php echo $dados['chaveAcesso']; ?>">
                        <input type="hidden" name="id_situacao" value="<?php echo $dados['idSituacao']; ?>">
                        <input type="submit" value="<?php echo $dados['descricaoSituacao'] ?>" name="btnIniciar" class="btn btn-iniciar">

                        <br><br>
                    </div>
                </form>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>
