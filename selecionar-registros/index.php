<?php
require('db/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionando Dados</title> 
    <style>
        table{
            border-collapse: collapse;
            width:100%;
        }
        th,td{
            padding:10px;
            text-align:center;
            border:1px solid #ccc;
        }
        p{
            padding:20px;
            border:1px solid #ccc;
        }
    </style>   
</head>
<body>
    <h1>Aula Selecionando Dados</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Digite seu nome" required>
        <input type="email" name="email" placeholder="Digite seu email" required>
        <button type="submit" name="salvar">Salvar</button>
    </form> 
    <br>
    <?php

//INSERIR UM DADO NO BANCO (MODO SIMPLES)
//$sql = $pdo->prepare("INSERT INTO clientes VALUES (null,'Dimitri','teste@teste.com','18-09-2021')");
//$sql->execute();

//MODO CORRETO ANTI SQL INJECTION

 if (isset($_POST['salvar'])&& isset($_POST['nome'])&& isset($_POST['email'])){
    
    $nome = limparPost($_POST['nome']);
    $email= limparPost($_POST['email']);
    $data=date('d-m-Y');

    //VALIDAÇÃO DE CAMPO VAZIO
    if ($nome=="" || $nome==null){
        echo "<b style='color:red'>Nome não pode ser vazio</b>";
        exit();
    }

    if ($email=="" || $email==null){
        echo "<b style='color:red'>Email não pode ser vazio</b>";
        exit();
    }
    
    //VALIDAÇÕES DE NOME E EMAIL

    //VERIFICAR SE NOME ESTA CORRETO
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
        echo "<b style='color:red'>Somente permitido letras e espaços em branco para o nome</b>";
        exit();
    }

    //VERIFICAR SE É UM EMAIL VÁLIDO
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<b style='color:red'>Formato de email inválido!</b>";
        exit();
    }

    $sql = $pdo->prepare("INSERT INTO clientes VALUES (null,?,?,?)");
    $sql->execute(array($nome,$email,$data));

    echo "<b style='color:green'>Cliente inserido com sucesso!</b>";

 }
    ?>

    <?php

        //SELECIONAR DADOS DA TABELA
        $sql = $pdo->prepare("SELECT * FROM projeto");
        $sql->execute();
        $dados = $sql->fetchAll();

        //EXEMPLO COM FILTRAGEM
        /*
         $sql = $pdo->prepare("SELECT * FROM clientes WHERE email = ?");
         $email = 'teste2@gmail.com';
         $sql->execute(array($email));
         $dados = $sql->fetchAll();
        */
        
        /*
        echo "<pre>";
        print_r($dados);
        echo "</pre>";
        */
    ?>

    <?php
    //VERIFICAR SE TEM DADOS (ARRAY DADOS MAIOR QUE ZERO)
    if(count($dados) > 0){
        //CONSTROI PARTE DE CIMA DA TABELA
        echo "<br><br><table>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Data de Início</th>
            <th>Data Final</th>
            <th>% Andamento</th>
            <th>Atrasado?</th>
        </tr>";

        //LAÇO DE REPETIÇÃO PARA ADICIONAR LINHA
        foreach($dados as $chave => $valor){
            echo " <tr>
                        <td>".$valor['id_projeto']."</td>
                        <td>".$valor['nome_projeto']."</td>
                        <td>".$valor['dt_inicio']."</td>
                        <td>".$valor['dt_fim']."</td>
                        <td>".$valor['porc_completo']."</td>
                        <td>".$valor['atrasado']."</td>
                   </tr>";
        }

        //FECHA TABELA
        echo "</table>";
    }else{
        //CASO NÃO TENHA NENHUM DADO ADICIONADO
        echo "<p>Nenhum cliente cadastrado</p>";
    }

    ?>    
</body>
</html>