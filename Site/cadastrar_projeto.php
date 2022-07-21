<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyProject</title>
    <link href="css/style_cadastrar_editar.css" rel="stylesheet" />
</head>
<body>
    <?php
        include('conexao.php');
        if (isset($_POST['submit'])){
            $nome_projeto = mysqli_real_escape_string($conexao, $_POST['nome_projeto']);
            $dt_inicio = mysqli_real_escape_string($conexao, $_POST['dt_inicio']);
            $dt_fim = mysqli_real_escape_string($conexao, $_POST['dt_fim']);
            $porc_completo = mysqli_real_escape_string($conexao, $_POST['porc_completo']);
            if($dt_fim < $dt_inicio){
                $atrasado = "Sim";
            }else{
                $atrasado = "Não";
            }
            $sql = "INSERT INTO projeto VALUES('','$nome_projeto','$dt_inicio','$dt_fim','$porc_completo','$atrasado')";
                        
            $query = mysqli_query($conexao, $sql);
            if ($query){
                header("location:index.php");
            } else {
                echo "Erro: Os dados não foram inseridos.<br/>";
                echo "Comando: ".$sql."<br/>";
            }
        }
    ?>
    <form method="POST">
        <h1>Cadastrar Projeto</h2>

        <div class="input-group">
            <input type="text" name="nome_projeto" placeholder="Nome do projeto"><br/>
        </div>

        <div class="input-group">
            <input type="date" name="dt_inicio" placeholder="Data de início do projeto"><br/>
        </div>

        <div class="input-group">
            <input type="date" name="dt_fim" placeholder="Data final do projeto"><br/>
        </div>

        <div class="input-group">
            <input type="text" name="porc_completo" placeholder="Porcentagem concluída do projeto"><br/>
        </div>

        <input class="btn-cadastrar" type="submit" name="submit" value="Cadastrar">
        <a href="index.php" class="btn-voltar">Voltar</a>
    </form>
</body>
</html>