<?php
    $nome_user = $_SESSION['nickname'];
    $codigoRespostaPair = $_SESSION['codigoRespostaPair'];
    $chaveAcesso = $_SESSION['chaveAcesso'];
    echo $codigoRespostaPair;
    if(isset($_POST['btnEnviar'])){
        $respostaPair = $_POST['txtRespostaPair'];
        $codigoRespostaPair = $_SESSION['codigoRespostaPair'];
         
        $comando = "UPDATE resposta SET resposta = '$respostaPair' WHERE codigo = $codigoRespostaPair";
        echo "\n" . $comando . " \n";
        $sql = mysqli_query($con, $comando);
        $_SESSION['espera'] = false;
        header('Location: salaEspera.php');
    
    }

        $comando = "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'";
        $sql = mysqli_query($con, $comando);

        $sql_think = mysqli_query($con, "SELECT * from resposta WHERE fk_usuario = '$nome_user' and resposta = '$respostaThink'");
        
        $sql_dupla = mysqli_query($con, "SELECT * from resposta where fk_usuario = '$nome_user' and situacao = 'pares' and fk_sala = '$chaveAcesso'");
        
?>
