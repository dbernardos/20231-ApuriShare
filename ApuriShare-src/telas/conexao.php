<?php
    $server = "127.0.0.1";
    $user = "root";
    $pwp = "";
    $db = "apurishare";

    $con = new mysqli($server, $user, $pwp, $db);

    if($con->connect_errno){
        echo "<span> Falha ao conectar!</span>";
    }

    function executar_sql($conexao, $comando){
        $resultado = mysqli_query($conexao, $comando);
        return $resultado;
    }

    function buscar_dados($conexao, $comando){
        $resultado = mysqli_query($conexao, $comando);
        $dados = [];

        while($dado = mysqli_fetch_assoc($resultado)){
            $dados[] = $dado;
        }
        return $dados;
    }

    ?>