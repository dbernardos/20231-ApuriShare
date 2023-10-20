<?php
    $nome_user = $_SESSION['nickname'];
    $respostaThink = $_SESSION['respostaThink'];
    $chaveAcesso = $_SESSION['chaveAcesso'];

    if(isset($_POST['btnEnviar'])){
        $respostaPair = $_POST['txtRespostaPair'];
        
        
        $sql = mysqli_query($con, "UPDATE resposta SET resposta = '$respostaPair' where fk_usuario = '$nome_user' where fk_sala = '$chaveAcesso'");

        header('Location: esperaBtnPair.php');
    
    }

        $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
        $sql_think = mysqli_query($con, "SELECT * from resposta WHERE fk_usuario = '$nome_user' and resposta = '$respostaThink'");
        
        $sql_dupla = mysqli_query($con, "SELECT * from resposta where fk_usuario = '$nome_user' and situacao = 'pares' and fk_sala = '$chaveAcesso'");
        
        
        


    /*$sql_user = mysqli_query($con, "SELECT a.fk_usuario, b.fk_usuario 
                            FROM resposta a 
                            JOIN resposta b ON a.fk_sala = b.fk_sala 
                            WHERE a.fk_sala = '$chaveAcesso' AND a.fk_usuario != b.fk_usuario 
                            ORDER BY RAND() 
                            ");
    */
    ?>