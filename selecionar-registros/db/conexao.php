<?php
//CONFIGURAÇÕES GERAIS
$servidor="localhost";
$usuario="root";
$senha="";
$banco="gerenciador_projeto";

//CONEXAO
$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);

//FUNÇÃO PARA SANITIZAR (LIMPAR ENTRADAS)
function limparPost($dado){
    $dado = trim($dado);
    $dado = stripslashes($dado);
    $dado = htmlspecialchars($dado);
    return $dado;
}

?>