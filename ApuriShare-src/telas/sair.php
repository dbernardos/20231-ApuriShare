<?php
    session_start();
    unset($_SESSION['nickname']);
    unset($_SESSION['senha']);
    header('Location: index.html');
?>