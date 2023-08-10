<?php 
    include("conexao.php")
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
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
        <div class="esquerda">
            <form action="" method="post">
                <br>
                <h3>Nome da Sala</h3>
                <input type="text" name="txtNome"> <br>
                <div class="textareas">
                    <br>
                    <h3>Atividade</h3>
                    <textarea class="form-control textoarea" placeholder="Se João comprar um..." name="txtAtividade"></textarea>
                    <br>
                    <h3>Comentário</h3>
                    <textarea class="form-control textoarea" placeholder="A resposta desta questão pode ser..." name="txtComentario"></textarea>
                </div>
                <br><br>
                <h3>Adicionar Imagem</h3>
                <br>
                <div class="addImagem">
                    <input type="file" name="imagem">
                </div>
                <br>
                <br>
                <button class="btn btn-outline-dark btnApuri" name="btnEnviar" >Enviar</button>
            </form>
            <br>
        </div>

        <div class="direita">
            </form>
            <br>
            <h3>Assunto/Materia</h3>
            <input type="text" name="txtAssunto"> <br>
            <br>
            <h3>Primeiro Tempo</h3>
            <input type="text" name="txtPair"> <br>
            <br>
            <h3>Segundo Tempo</h3>
            <input type="text" name="txtThink"> <br>
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
<?php
        
        $sql_code = "SELECT atividade, assunto, comentario, nome, criador, tempoPair, tempoThink, enderecoImagem, QuantidadeMaximaUsuarios FROM sala";
        
        if(isset($_POST['btnCriar'])){
            $sql_code = "INSERT INTO sala VALUES (".$_POST['txtAtividade'].",'" .$_POST['txtAssunto']."','" .$_POST['txtComentario']."','" .$_POST['txtNome']."',
            '" .$_POST['criador']."','" .$_POST['txtPair']."','" .$_POST['txtThink']."','" .$_POST['imagem']."','" .$_POST['QntUsers']."')"; //Em criador colocar o usuario logado (Aprendendo como faz...)
            $sql_query = $con->query($sql_code);
            
            echo "<span>Sala Adcionado!</span>";
        }
    ?>
            <br><br><br><br>
            <button class="btn btn-outline-dark btnApuri" name="btnCriar" >Criar</button>
            <form>
                <br><br><br>
                <p><strong>Ps: Todos os campos devem ser preenchidos!</strong></p>
                <br><br><br>
        </div>

        
    </center>
</body>
</html>