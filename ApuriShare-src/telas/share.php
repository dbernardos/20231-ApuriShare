<?php 
    include_once('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

    $sql = mysqli_query($con, "SELECT * FROM sala WHERE chaveAcesso = '$chaveAcesso'");
    $sql_id = mysqli_query($con, "SELECT * FROM resposta WHERE fk_sala = '$chaveAcesso' AND situacao = 'pares'");

    while ($dados = mysqli_fetch_assoc($sql)) {
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sala Share - Apurishare</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f8f9fa;
                font-size: 20px;
                margin-bottom: 60px; /* Adicionado espaço na parte inferior para acomodar o botão */
            }

            .cabecalho {
                background-color: #292b2c;
                color: white;
                padding: 30px; 
                margin-bottom: 30px; 
            }

            .atividade,
            .respShare,
            .resposta {
                border: 3px solid #007bff; 
                border-radius: 20px; 
                padding: 40px; 
                margin-bottom: 30px; 
                background-color: #ffffff;
            }

            .btn-sair {
                background-color: #dc3545;
                border: none;
                font-size: 24px;
                padding: 10px 20px;
                color: white;
                cursor: pointer;
                transition: background-color 0.3s;
                position: relative; /* Alterado para relative */
                bottom: 0; /* Coloca o botão no final do conteúdo */
                width: auto; /* Alterado para ajustar automaticamente ao conteúdo */
                margin: 0 auto; /* Centraliza horizontalmente */
                display: block; /* Para centralizar automaticamente o margin: 0 auto */
            }

            .btn-sair a {
                color: white;
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cabecalho text-center">
                        <h2 style="font-size: 36px;">Finalização da Atividade</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="border atividade">
                        <h1 style="font-size: 32px;"><?php echo $dados['nome']; ?></h1>
                        <p style="font-size: 28px;"><?php echo $dados['atividade']; ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="border respShare">
                        <h3 style="font-size: 30px;">Resposta dos Participantes</h3>
                        <?php
                        while ($resposta = mysqli_fetch_assoc($sql_id)) {
                            echo "<p><strong>Dupla:  </strong> {$resposta['fk_usuario']} e {$resposta['fk_usuario_par']}<br><br> <strong>Resposta pair do {$resposta['fk_usuario']}:</strong> {$resposta['resposta']} 
                            <br> <hr> <strong>Resposta pair do {$resposta['fk_usuario_par']}:</strong> {$resposta['resposta_par']}</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="border resposta">
                        <h4 style="font-size: 30px;">Resposta Correta:</h4>
                        <p style="font-size: 28px;"><?php echo $dados['observacao']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function redirecionar() {
                window.location.href = 'tela_inicial.php';
            }
        </script>

        <form method="POST" action="share.php">
            <button type="button" name="btnSair" class="btn btn-sair" onclick="redirecionar()">
                Fechar <i class="fas fa-times"></i>
            </button>
        </form>
    </body>

</html>

<?php } ?>
