<?php
    $server   = "localhost";
    $user     = "root";
    $password = "";
    $banco    = "gerenciador_projeto";

    $conexao = mysqli_connect($server, $user, $password);
    if ($conexao) {
        $database = mysqli_select_db($conexao, $banco);
        if(!$database){
            echo "Erro: Banco de Dados inexistente!<br/>";
        }
    } else {
       echo "Erro: Não foi possível efetuar a conexão.<br/>";  
    }    
?>