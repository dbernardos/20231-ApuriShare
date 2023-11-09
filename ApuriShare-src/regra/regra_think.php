<?php
    $chaveAcesso = $_SESSION['chaveAcesso'];
    $nome_user = $_SESSION['nickname'];

    if(isset($_POST['btnEnviar'])){
        $situacao = "individual";
        $respostaThink = $_POST['txtRespostaThink'];

        // Enviar resposta para o banco de dados
        $comando = "INSERT INTO resposta VALUES (NULL, '$respostaThink', '', '$situacao', '$chaveAcesso', '$nome_user', '')"; 
        error_log("\n regra think: $comando", 3, "file.log");
        mysqli_query($con, $comando);

        // mysqli_insert_id(): obter a chave primária do registro inserido
        $_SESSION['codigoRespostaThink'] = mysqli_insert_id($con);
        header('Location: esperaBtnThink.php');
    }
        
?>