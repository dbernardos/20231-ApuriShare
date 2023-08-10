<?php

    print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['nickname']) && !empty($_POST['senha']))
    {
        include_once('conexao.php');
        $nickname = $_POST['nickname'];
        $senha = $_POST['senha'];

        $sql ="SELECT * from usuario where nickname = '$nickname' 
        and senha = '$senha'";

        $result = $con->query($sql);

        print_r($sql);
        print_r($result);

        if(mysqli_num_rows($result) < 1){
            header('Location: login.php');
        }
        else{
            header('Location: tela_inicial.php');
        }
    }
    else{
        header('Location: login.php');
    }

?>