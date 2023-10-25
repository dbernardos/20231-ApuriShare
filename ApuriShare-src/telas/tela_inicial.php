<?php require('inicia_sessao.php'); ?>

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
        <title>ApuriShare</title>
    </head>
    <body>
        
        
        
        <?php
            echo "<h4><a href='iniciacao_partida.php'>Salas de {$_SESSION['nickname']}</a></h4>";
        ?>
        <center>
            <div class="centro">
                <h1>Entre ou Crie Salas</h1><br><br>
                <div class="botoes">
                    <a href="./entrar_sala.php"><button type="button" class="btn btn-outline-dark"> Entrar </button></a>
                    <a href="./criar_sala.php"><button type="button" class="btn btn-outline-dark"> Criar </button></a>    
                </div>
                <br>
                <p>Entre em salas para realizar atividades e desafios feitos pelos usúario!</p>
                <a href="" class="link-opacity-10-hover">Não sabe como funciona? Clique aqui</a>
                <br><br>
            </div>
        </center>
            <br><br>
            <div class="sair">
                <a href="./sair.php"><button type="submit" class="btn btn-outline-dark"><img src="./img/Icon_Sair.png" width="20" height="20"><strong> Sair da Conta</strong></button></a>
            </div>
    </body>   

</html>