<?php

    session_start();

    if(isset($_POST['submit']) && !empty($_POST['nickname']) && !empty($_POST['senha']))
    {
        include_once('conexao.php');
        $nickname = $_POST['nickname'];
        $senha = $_POST['senha'];

        $sql ="SELECT * from usuario where nickname = '$nickname' 
        and senha = '$senha'";

        $result = $con->query($sql);

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['nickname']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else{
            $_SESSION['nickname'] = $nickname;
            $_SESSION['senha'] = $senha;
            header('Location: tela_inicial.php');
        }
    }
    else{
        header('Location: login.php');
    }

?>