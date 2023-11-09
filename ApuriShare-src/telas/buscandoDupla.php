<?php

include_once('conexao.php');

    session_start();
    $nome_user = $_SESSION['nickname'];
    $vetorDuplas = $_SESSION['sorteado'];
    
    $sorteado = array();//inicializa vetor

    for ($i = 0; $i < count($vetorDuplas); $i++){
        $sorteado = $vetorDuplas[$i];

        if($sorteado[0] == $nome_user || $sorteado[1] == $nome_user){
            break;
        }

    }

    if($sorteado[0] == $nome_user){
        //aqui sou eu
        $dupla = $sorteado[1];
        $_SESSION['dupla'] = $dupla;
    }else{
        $dupla = $sorteado[0];
        $_SESSION['dupla'] = $dupla;
    }

?>