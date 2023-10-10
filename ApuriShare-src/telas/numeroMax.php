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

    $participantes = "SELECT COUNT(*) AS num_participantes FROM sala_usuario WHERE tipoUsuario = 'participante' AND fk_sala = '$chaveAcesso'";
   $resultado = mysqli_query($con, $participantes);

   if ($resultado) {
      $row = mysqli_fetch_assoc($resultado);
      $num_participantes = $row['num_participantes'];

      $update_query = "UPDATE sala_usuario SET numeroUsers = '$num_participantes' WHERE chaveAcesso = '$chaveAcesso'";
      $sql_max = mysqli_query($con, $update_query);

   if ($sql_max) {
        echo "Atualização bem-sucedida. Número de participantes: " . $num_participantes;
   } else {
        echo "Erro ao atualizar: " . mysqli_error($con);
   }

   } else {
    echo "Erro na consulta: " . mysqli_error($con);
   }

    if($users < $numeroMax){
       header('Location: salaEspera.php');
    }
    else{
       header('Location: entrar_sala.php');
    }
    
    }
?>