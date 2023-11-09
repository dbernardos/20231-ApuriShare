<?php 

    include_once('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];

    $sql_code = "SELECT * FROM sala";
    //SELECT * FROM sala as s INNER JOIN sala_usuario as su ON s.chaveAcesso = su.fk_sala 
    //WHERE su.fk_usuario = '$nome_user'

    $chaveAcesso = $_SESSION['chaveAcesso'];
    $sql = mysqli_query($con, "SELECT * from sala WHERE chaveAcesso = '$chaveAcesso'");
    
    while($dados = mysqli_fetch_assoc($sql)){
    
    $numeroMax = $dados['qntUsers'];

    $participantes = "SELECT count(*) from sala_usuario where tipoUsuario = 'participante' 
    and fk_sala = '$chaveAcesso'";
    $resultado = mysqli_query($con, $participantes);
    $row = mysqli_fetch_row($resultado);
    
    if ($row) {
    $users = $row[0];
    } else {
    // Não há resultados a serem retornados
    echo "Nenhum resultado encontrado.";
    }

    if($users < $numeroMax){
       header('Location: salaEspera.php');
    }
    else{
       header('Location: entrar_sala.php');
    }
    
    }
?>