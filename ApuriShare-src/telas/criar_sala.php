<?php 
require('conexao.php');
require('inicia_sessao.php');

if(isset($_POST['btnCriarSala'])){   
    $nome = $_POST['txtNome'];
    $atividade = $_POST['txtAtividade'];
    $observacao = $_POST['txtObservacao'];
    $usuarios = $_POST['QntUsers'];

    $sql = "INSERT into sala(nome, atividade, observacao, qntUsers)
    values ('$nome', '$atividade', '$observacao', '$usuarios')";
    executar_sql($con, $sql);

    $usuario = $_SESSION['nickname'];
    $ultimo_id = mysqli_insert_id($con);
    $_SESSION['idsala'] = $ultimo_id;
    
    $sql = "INSERT INTO sala_usuario(fk_sala, fk_usuario, tipoUsuario) values ('$ultimo_id', '$usuario', 'criador')";
    executar_sql($con, $sql);

    header('Location: iniciacao_partida.php');
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
<title>ApuriShare - Criar Sala</title>
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
        display: flex;
        justify-content: space-between;
    }

    .esquerda {
        width: 45%;
        padding-right: 20px;
    }

    .direita {
        width: 45%;
        padding-left: 20px;
    }

    .form-container {
        display: flex;
        justify-content: space-between;
        width: 100%; /* Ocupa toda a largura da tela */
    }

    .btnCriarSala {
        background-color: #343a40;
        color: #fff;
        width: 100%;
    }

    .btnCriarSala:hover {
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
<nav class="navbar navbar-expand-lg navbar-light" style="border-bottom: 1px solid #ccc; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
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
        <form action="criar_sala.php" method="POST">
            <div class="form-container">
                <div class="esquerda">
                    <h1>Criar Sala</h1>
                    <h3>Nome da Sala</h3>
                    <input type="text" name="txtNome" id="nome" required>
                    <h3>Atividade</h3>
                    <textarea class="form-control textoarea" placeholder="Se João comprar um..." name="txtAtividade" id="atividade" required></textarea>
                    <h3>Comentário</h3>
                    <textarea class="form-control textoarea" placeholder="A resposta desta questão pode ser..." name="txtObservacao" id="comentario"></textarea>
                </div>
                <div class="direita">
                    <h3>Adicionar Imagem</h3>
                    <input type="file" name="imagem" id="imagem">
                    <h3>Número Máximo de Pessoas</h3>
                    <div class="selecao">
                        <input type="number" name="QntUsers" required>
                    </div>
                    <div class="aviso">Ps: Todos os campos devem ser preenchidos!</div>
                    <div class="botoes">
                        <input type="submit" name="btnCriarSala" class="btn btn-outline-dark" value="Criar Sala">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
