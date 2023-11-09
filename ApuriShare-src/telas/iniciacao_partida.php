<?php
require('conexao.php');
require('inicia_sessao.php');
require('../regra/regra_iniciacao_partida.php');
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/geral.css">
    <link rel="stylesheet" href="./css/iniciacao_partida.css">
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="10">
    <title>ApuriShare</title>
</head>

<body>
    <div class="grid">
        <?php foreach ($sql_resultado as $dados) :
            $registrados = contaParticipantes($dados['chaveAcesso'], $con)
        ?>
            <div class="table-cell">
                <form action="iniciacao_partida.php" method="POST">
                    <div class="centro">
                        <h2><?php echo $dados['nome']; ?></h2>
                        <h2>Código: <?php echo $dados['chaveAcesso'] ?></h2>
                        <br>
                        <h3>Capacidade: <?php echo $dados['qntUsers']; ?></h3>
                        <h3>Registrados: <?php echo $registrados; ?></h3>
                        <br>
                        <h4><?php echo $dados['statusSituacao'] ?></h4>

                        <input type="hidden" name="chave_acesso" value="<?php echo $dados['chaveAcesso']; ?>">
                        <input type="hidden" name="id_situacao" value="<?php echo $dados['idSituacao']; ?>">
                        <input type="submit" value="<?php echo $dados['descricaoSituacao'] ?>" name="btnIniciar" class="btn btn-outline-dark">

                        <br><br>
                    </div>
                </form>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>