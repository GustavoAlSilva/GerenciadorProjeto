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
            $id_projeto = mysqli_real_escape_string($conexao, $_POST['id_projeto']);
            $nome_atividade = mysqli_real_escape_string($conexao, $_POST['nome_atividade']);
            $dt_inicio = mysqli_real_escape_string($conexao, $_POST['dt_inicio']);
            $dt_fim = mysqli_real_escape_string($conexao, $_POST['dt_fim']);
            $finalizada = mysqli_real_escape_string($conexao, $_POST['finalizada']);
            $sql = "INSERT INTO atividade VALUES('','$id_projeto','$nome_atividade','$dt_inicio','$dt_fim','$finalizada')";
                    
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
        <h1>Cadastrar Atividade</h2>

        <div class="input-group">
            <input type="text" name="id_projeto" placeholder="ID do projeto"><br/>
        </div>

        <div class="input-group">
            <input type="text" name="nome_atividade" placeholder="Nome da atividade"><br/>
        </div>

        <div class="input-group">
            <input type="date" name="dt_inicio" placeholder="Data de início da atividade"><br/>
        </div>

        <div class="input-group">
            <input type="date" name="dt_fim" placeholder="Data final da atividade"><br/>
        </div>

        <div class="input-group">
            <input type="text" name="finalizada" placeholder="A atividade está finalizada?"><br/>
        </div>

        <input class="btn-cadastrar" type="submit" name="submit" value="Cadastrar">
        <a href="atividades.php" class="btn-voltar">Voltar</a>
    </form>
</body>
</html>