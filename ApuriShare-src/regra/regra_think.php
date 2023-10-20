<?php
    $nome_user = $_SESSION['nickname'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

    if (isset($_POST['btnIniciar'])){
        $situacao = "individual";
        $respostaThink = $_POST['txtRespostaThink'];

        // Enviar resposta para o banco de dados
        $comando = "INSERT INTO resposta VALUES (NULL, '$respostaThink', '$situacao', $chaveAcesso, '$nome_user', '')"; 
        executar_sql($con, $comando);
        header('Location: esperaBtnThink.php');
    }
        
?>