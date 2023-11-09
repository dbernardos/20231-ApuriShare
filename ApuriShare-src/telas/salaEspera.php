<?php
    require('conexao.php');
    require('inicia_sessao.php');

    $nome_user = $_SESSION['nickname'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

    $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
    $sql_usuarios = mysqli_query($con, "SELECT * from sala_usuario WHERE fk_sala = '$chaveAcesso'");

    while($dados = mysqli_fetch_assoc($sql)){
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2"> <!-- Atualiza a página a cada 2 segundos -->
    <title>Esperando partida iniciar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
        }
        .btn-close {
            color: #ffffff;
            background-color: #007bff;
            border: 1px solid #007bff;
        }
        .btn-close:hover {
            color: #ffffff;
            background-color: #0056b3;
            border: 1px solid #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <h1><?php echo $dados['nome']; ?></h1>
                <h1>
                    <?php 
                        while($resposta = mysqli_fetch_assoc($sql_usuarios)){
                            // Aqui você pode exibir informações dos usuários, se necessário
                        }
                    ?>
                </h1>
                <br><br>
                <?php 
                    $situacao = $dados['fk_situacao'];
                    if($situacao == 1){
                        echo "<h3>Aguarde até a atividade ser iniciada!</h3>";
                    }else if($situacao == 2){
                        header('Location: think.php');
                    }else{
                        echo "<h3>A sala solicitada foi finalizada!</h3>";
                    }
                ?>
                <br><br>
                <a href="./tela_inicial.php" class="btn btn-outline-dark">Voltar</a>
                <button class="btn btn-close" onclick="fecharPagina()"><i class="fas fa-times"></i> Fechar</button>
            </div>
        </div>
    </div>

    <script>
        function fecharPagina() {
            window.close();
        }
    </script>
</body>
<?php } ?>
</html>
