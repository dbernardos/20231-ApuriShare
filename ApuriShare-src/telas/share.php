<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/iniciacao_partida.css">
    <meta charset="UTF-8">
    <title>ApuriShare</title>
</head>
<body>
    <a href="./tela_inicial.php"><button class="btnX btn btn-outline-dark"> X </button></a>
    <div class="atividade">
        <h1><?php  echo $dados['qntUsers']; ?></h1>
    </div>

    <div class="direita">
    <h1><?php  echo $dados['nome']; ?></h1>
    <br>
    <h3><?php  echo $dados['atividade']; ?></h3>
</div>
<div class="resposta">
    <h3>Resposta Correta:</h3><br>
    <p><?php  echo $dados['abservacao']; ?></p>
    <br>
</div>
<div class="respShare">
    <H2>RESPOSTAS DOS PARTICIPANTES</H2>
    <h3><?php  echo $dados['fk.usuarios']; ?></h3>
    <p><?php  echo $dados['respostaPair']; ?></p>
    <br><br>
</div>

<?php }?>

</body>
</html>