<?php
    require('conexao.php');
    require('inicia_sessao.php');

    $nome_user = $_SESSION['nickname'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

    $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
    $sql_usuarios = mysqli_query($con, "SELECT * from sala_usuario WHERE fk_sala = '$chaveAcesso'");

    if(isset($_POST['btnSair'])){
            $comando = "DELETE from sala_usuario WHERE fk_sala = '$chaveAcesso' AND fk_usuario = '$nome_user' AND tipoUsuario = 'participante'";
            $saindo = mysqli_query($con, $comando);
            
            header('Location: ./tela_inicial.php');
    }

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
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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
    <div class="container">
        <h1 class="text-center"><?php echo $dados['nome']; ?></h1>
        <h1 class="text-center">
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
                echo "<h3 class='text-center'>Aguarde até a atividade ser iniciada!</h3>";
            }else if($situacao == 2){
                header('Location: think.php');
            }else{
                echo "<h3 class='text-center'>A sala solicitada foi finalizada!</h3>";
            }
        ?>
        <br><br>
        <div class="text-center">
            <button type="submit" name="btnSair" class="btn btn-close"><i class="fas fa-times"></i> Sair</button>
        </div>
        </div>
</body>
<?php } ?>
</html>
