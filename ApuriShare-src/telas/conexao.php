<?php
    $server = "127.0.0.1";
    $user = "root";
    $pwp = "";
    $db = "apurishare";

    $con = new mysqli($server, $user, $pwp, $db);

    if($con->connect_errno){
        echo "<span> Falha ao conectar!</span>";
    }else{
        echo "<span>Conectado com sucesso!</span>";
    }

    ?>