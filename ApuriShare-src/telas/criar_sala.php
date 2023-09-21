<?php 
    require('conexao.php');
    require('inicia_sessao.php');

    if(isset($_POST['btnCriarSala'])){   
        $nome = $_POST['txtNome'];
        $atividade = $_POST['txtAtividade'];
        $observacao = $_POST['txtObservacao'];
        $tempoThink = $_POST['txtThink'];
        $tempoPair = $_POST['txtPair'];
        $usuarios = $_POST['QntUsers'];

        $sql = "INSERT into sala(nome, atividade, observacao, tempoThink, tempoPair, qntUsers)
        values ('$nome', '$atividade', '$observacao', '$tempoThink','$tempoPair','$usuarios')";
        executar_sql($con, $sql); // SERIA LEGAL FAZER UMA CONDIÇÃO PARA VER SE FOI INSERIDO MESMO

        $usuario = $_SESSION['nickname'];
        //if (mysqli_query($con, $sql)) {
            // Obter o ID do último registro inserido
            $ultimo_id = mysqli_insert_id($con);
            $_SESSION['idsala'] = $ultimo_id;
        
        $sql = "INSERT INTO sala_usuario(fk_sala, fk_usuario) values ('$ultimo_id', '$usuario')";
        executar_sql($con, $sql); // SERIA LEGAL FAZER UMA CONDIÇÃO PARA VER SE FOI INSERIDO MESMO

        header('Location: iniciacao_partida.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/geral.css">
    <link rel="stylesheet" href="./css/criar_sala.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>

<body>
<?php include('menu.php');?>
    <center>
        <br><br><br><br>
        <form action="criar_sala.php" method="POST">
        <div class="esquerda">
                <br>
                <h3>Nome da Sala</h3>
                <input type="text" name="txtNome" id="nome" required> <br>
                <div class="textareas">
                    <br>
                    <h3>Atividade</h3>
                    <textarea class="form-control textoarea" placeholder="Se João comprar um..." name="txtAtividade" id="atividade" required></textarea>
                    <br>
                    <h3>Comentário</h3>
                    <textarea class="form-control textoarea" placeholder="A resposta desta questão pode ser..." name="txtObservacao" id="comentario" required></textarea>
                </div>
                <br><br>
                <h3>Adicionar Imagem</h3>
                <br>
                <div class="addImagem">
                    <input type="file" name="imagem" id="imagem">
                </div>
                <br>
                <br>
            <br>
        </div>

        <div class="direita">
            <br>
            <h3>Primeiro Tempo</h3>
            <input type="time" name="txtThink" required> <br>
            <br>
            <h3>Segundo Tempo</h3>
            <input type="time" name="txtPair" required> <br>
            <br>
            <h3>Número Máximo de Pessoas</h3>

            <div class="selecao">
                <input type="number" name="QntUsers" required>
            </div>
            <br><br><br><br>
            <input type="submit" name="btnCriarSala" id="btnCriarSala" value="Criar Sala" class="btn btn-outline-dark btnApuri">
                <br><br>
                <p><strong>Ps: Todos os campos devem ser preenchidos!</strong></p>
                <br><br>
        </div>
        </form>
        
    </center>
</body>
</html>