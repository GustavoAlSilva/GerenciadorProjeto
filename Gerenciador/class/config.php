<?php

// Configurações do Banco de Dados:
define('SERVIDOR','localhost');
define('USUARIO','root');
define('SENHA','');
define('BANCO','gerenciador_projeto');

function limpaPost($dados){
    $dados = trim($dados); // Tirar espaços em branco do início e do final;
    $dados = stripslashes($dados); // Tirar as barras;
    $dados = htmlspecialchars($dados); // Tirar injeções de HTML;
    return $dados;
}