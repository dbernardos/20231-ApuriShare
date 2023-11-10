<?php 
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if((!isset($_SESSION['nickname']) == true) and (!isset($_SESSION['senha']) == true)){

            unset($_SESSION['nickname']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
    }
?>