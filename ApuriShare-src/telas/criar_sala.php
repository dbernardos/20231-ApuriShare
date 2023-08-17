<?php 
    if(isset($_POST['submit'])){

        include_once('conexao.php');
        $nome = $_POST['txtNome'];
        $atividade = $_POST['txtAtividade'];
        $comentario = $_POST['txtComentario'];
        $imagem = $_POST['imagem'];
        $assunto = $_POST['txtThink'];
        $tempoThink = $_POST['txtPair'];
        $tempoPair = $_POST['txtassunto'];
        $usuarios = $_POST['QntUsers'];

        $sql = mysqli_query($con, "INSERT into sala
        (nome, atividade, comentario, enderecoImagem, assunto, tempoThink, TempoPair, QuantidadeMaximaUsuarios)
        values ('$nome', '$atividade', '$comentario', '$imagem','$assunto','$tempoThink','$TempoPair','$usuarios')");
        
        header('Location: iniciacao_partida.php');
    }
    else{
        print_r("erro");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/criar_sala.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>

<body>
    <div class="cabecalho">
        <h1>Criando Sala</h1>
        <a href="tela_inicial.php"><button class="btn btn-outline-dark"> X </button></a>
    </div>
    <center>
        <br><br><br><br>
        
        <div class="esquerda">
            <form action="criar_sala.php" method="POST">
                <br>
                <h3>Nome da Sala</h3>
                <input type="text" name="txtNome" id="nome" require> <br>
                <div class="textareas">
                    <br>
                    <h3>Atividade</h3>
                    <textarea class="form-control textoarea" placeholder="Se João comprar um..." name="txtAtividade" id="atividade" require></textarea>
                    <br>
                    <h3>Comentário</h3>
                    <textarea class="form-control textoarea" placeholder="A resposta desta questão pode ser..." name="txtComentario" id="comentario" require></textarea>
                </div>
                <br><br>
                <h3>Adicionar Imagem</h3>
                <br>
                <div class="addImagem">
                    <input type="file" name="imagem" id="imagem" require>
                </div>
                <br>
                <br>
            </form>
            <br>
        </div>

        <div class="direita">
            </form>
            <br>
            <h3>Assunto/Materia</h3>
            <input type="text" name="txtAssunto" id="assunto" require> <br>
            <br>
            <h3>Primeiro Tempo</h3>
            <input type="number" name="txtThink" require> <br>
            <br>
            <h3>Segundo Tempo</h3>
            <input type="number" name="txtPair" require> <br>
            <br>
            <h3>Número Máximo de Pessoas</h3>

            <div class="selecao">
                <select class="form-select numPessoas" aria-label="Default select example">
                    <option selected name="QntUsers">Escolha a Quantidade</option>
                    <option value="2">2</option>
                    <option value="8">8</option>
                    <option value="12">12</option>
                    <option value="18">18</option>
                    <option value="22">22</option>
                </select>
            </div>
            <br><br><br><br>
            <input type="submit" id="submit" value="Criar Sala" class="btn btn-outline-dark btnApuri">
            <form>
                <br><br>
                <p><strong>Ps: Todos os campos devem ser preenchidos!</strong></p>
                <br><br>
        </div>

        
    </center>
</body>
</html>