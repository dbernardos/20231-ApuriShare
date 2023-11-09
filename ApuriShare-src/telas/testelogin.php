<?php
include_once('conexao.php');
session_start();

if (isset($_POST['submit']) && !empty($_POST['nickname']) && !empty($_POST['senha'])) {
    $nickname = $_POST['nickname'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE nickname = '$nickname'";
    $result = $con->query($sql);

    if (mysqli_num_rows($result) < 1) {
        $error_message = "Nickname não encontrado. Por favor, verifique o nickname.";
    } else {
        $user = mysqli_fetch_assoc($result);
        if ($user['senha'] != $senha) {
            $error_message = "Senha incorreta. Por favor, verifique a senha.";
        } else {
            $_SESSION['nickname'] = $nickname;
            $_SESSION['senha'] = $senha;
            header('Location: tela_inicial.php');
        }
    }
}

if (isset($error_message)) {
    $_SESSION['login_error'] = $error_message;
    header('Location: login.php');
}
?>
