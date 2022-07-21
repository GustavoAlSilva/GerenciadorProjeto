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
        if (isset($_GET['id_atividade'])){
            $id_atividade = $_GET['id_atividade'];
                
            if (isset($_POST['submit'])){
                $id_projeto =$_POST['id_projeto'];
                $nome_atividade =$_POST['nome_atividade'];
                $dt_inicio =$_POST['dt_inicio'];
                $dt_fim =$_POST['dt_fim'];
                $finalizada =$_POST['finalizada'];
                $sql = "UPDATE atividade SET id_projeto='$id_projeto', nome_atividade='$nome_atividade', dt_inicio='$dt_inicio', dt_fim='$dt_fim', finalizada='$finalizada' WHERE id_atividade='$id_atividade'";
                $query = mysqli_query($conexao, $sql);
                if ($query){
                    header('location:atividades.php');
                } else {
                    echo "Erro: Os Dados não foram alterados.<br/>";
                    echo "Comando: ".$sql."<br/>";
                }
            }
    ?>
    <form method="POST">
        <h1>Editar Atividade</h2>

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

        <input class="btn-cadastrar" type="submit" name="submit" value="Editar">
        <a href="atividades.php" class="btn-voltar">Voltar</a>
    </form>
    <?php
        }
    ?>
</body>
</html>