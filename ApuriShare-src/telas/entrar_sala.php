<?php
require('conexao.php');
require('inicia_sessao.php');
require('../regra/regra_entrar_sala.php');

$chaveAcesso = isset($_POST['txtCodigo']) ? $_POST['txtCodigo'] : null;
$mostrarMensagem = false;  // Inicialmente, não mostra a mensagem

if (isset($_POST['btnEntrar'])) {
    if (verificaSituacaoSala($chaveAcesso, $con) || verificaParticipanteRegistrado($chaveAcesso, $con)) {
        header('Location: salaEspera.php');
        exit;  // Redireciona sem mostrar a página
    } else {
        $mostrarMensagem = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar Sala</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Poppins', sans-serif;
        }

        .centro {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .cod input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btnEntrar {
            background-color: #343a40;
            color: #fff;
        }

        .btnEntrar:hover {
            background-color: #292b2c;
        }

        h1 {
            color: #343a40;
        }

        h3 {
            color: #343a40;
            margin-top: 20px;
        }

        .botoes {
            margin-top: 20px;
        }

        .botoes input {
            background-color: #343a40;
            color: #fff;
        }

        .botoes input:hover {
            background-color: #292b2c;
        }
    </style>
</head>
<body>
    <nav id="header" class="navbar navbar-expand-lg navbar-light" style="border-bottom: 1px solid #ccc; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
        <a class="navbar-brand" href="tela_inicial.php">
            <img src="./img/logo_preta.png" alt="Logo do ApuriShare" style="max-height: 50px;">
        </a>
        <div class="navbar-nav ml-auto">
            <?php
            echo "<h4><a class='nav-link' href='iniciacao_partida.php'>Salas de {$_SESSION['nickname']}</a></h4>";
            ?>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 20vh; margin-bottom: 20vh;">
        <div class="centro text-center">
            <?php
            if ($mostrarMensagem) {
                echo '<div class="aviso">A sala solicitada encontra-se em andamento</div>';
            }
            ?>
            <form method="POST">
                <h1>Chave de Acesso</h1><br><br>
                <div class="cod">
                    <input type="text" name="txtCodigo" maxlength="6" placeholder="Insira o código">
                </div>
                <br>
                <div class="botoes">
                    <input type="submit" value="Entrar" class="btn btn-outline-dark" name="btnEntrar" id="btnEntrar"><br><br>
                </div>
            </form>

            <h3>Salas Registradas</h3>
            <div class="sala-info">
                <?php
                foreach (listarSalasRegistradas($con) as $dados) :
                    echo "<span>Chave de acesso:</span> {$dados['sChave']} | <span>Nome da sala:</span> {$dados['sNome']}<br>";
                endforeach;
                ?>
            </div>
        </div>
    </div>

    <script>
        <?php
        if ($mostrarMensagem) {
            echo 'document.querySelector(".aviso").style.display = "block";';
        } else {
            echo 'document.querySelector(".aviso").style.display = "none";';
        }
        ?>
    </script>
</body>
</html>
