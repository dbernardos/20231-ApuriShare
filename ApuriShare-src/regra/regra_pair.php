<?php
    $nome_user = $_SESSION['nickname'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

    if(isset($_POST['btnEnviar'])){
        $respostaPair = $_POST['txtRespostaPair'];
        //$codigoRespostaPair = $_SESSION['codigoRespostaPair'];
         
        $comando = "UPDATE resposta SET resposta = '$respostaPair' WHERE codigo = $id_resposta_par";
        echo "\n" . $comando . " \n";
        $sql = mysqli_query($con, $comando);
        
        header('Location: esperaBtnPair.php');
    }

    // Recuperar a tupla da resposta do par
    $comando = "SELECT * FROM resposta WHERE fk_sala = '$chaveAcesso' AND situacao = 'pares' AND (fk_usuario = '$nome_user' OR fk_usuario_par = '$nome_user')";
    $sql_respostaPares = mysqli_query($con, $comando);

    // Recuperar o nome dos dois usuarios
    foreach ($sql_respostaPares as $dados){
        $id_resposta_par = $dados['codigo'];
        $nome_user1 = $dados['fk_usuario'];
        $nome_user2 = $dados['fk_usuario_par'];;
    }
    
    // Recuperar a resposta individual do primeiro usuario
    $comando = "SELECT * FROM resposta WHERE fk_sala = '$chaveAcesso' AND fk_usuario = '$nome_user1' AND situacao = 'individual'";
    $sql_respostaThink1 = mysqli_query($con, $comando);
        
    // Recuperar a resposta individual do segundo usuario
    $comando = "SELECT * FROM resposta WHERE fk_sala = '$chaveAcesso' AND fk_usuario = '$nome_user2' AND situacao = 'individual'";
    $sql_respostaThink2 = mysqli_query($con, $comando);

    // Recuperar informações da sala
    $comando = "SELECT * FROM sala WHERE chaveAcesso = '$chaveAcesso'";
    $sql_sala = mysqli_query($con, $comando);
    foreach($sql_sala as $dadosSala){
        $atividade = $dadosSala['atividade']; 
        $situacao = $dadosSala['fk_situacao'];
    }
?>