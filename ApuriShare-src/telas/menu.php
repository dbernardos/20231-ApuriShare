<?php 
    session_start();
    include_once('conexao.php');

    if((!isset($_SESSION['nickname']) == true) and (!isset($_SESSION['senha']) == true)){

        unset($_SESSION['nickname']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $dados = $_SESSION['nickname'];
?>

<div class="cabecalho">
        <h2>ApuriShare</h2>
        <?php
            echo "<h3><a href='tela_inicial.php'> $dados</a></h3>";
        ?>
</div>
<br><br>