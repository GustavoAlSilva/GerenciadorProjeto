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
        if (isset($_GET['id_projeto'])){
            $id_projeto = $_GET['id_projeto'];
                
            if (isset($_POST['submit'])){
                $nome_projeto =$_POST['nome_projeto'];
                $dt_inicio =$_POST['dt_inicio'];
                $dt_fim =$_POST['dt_fim'];
                $porc_completo =$_POST['porc_completo'];
                $atrasado =$_POST['atrasado'];
                $sql = "UPDATE projeto SET nome_projeto='$nome_projeto', dt_inicio='$dt_inicio', dt_fim='$dt_fim', porc_completo='$porc_completo', atrasado='$atrasado' WHERE id_projeto='$id_projeto'";
                $query = mysqli_query($conexao, $sql);
                if ($query){
                    header('location:index.php');
                } else {
                    echo "Erro: Os Dados não foram alterados.<br/>";
                    echo "Comando: ".$sql."<br/>";
                }
            }
    ?>
    <form method="POST">
        <h1>Editar Projeto</h2>

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

        <div class="input-group">
            <input type="text" name="atrasado" placeholder="O projeto está atrasado?"><br/>
        </div>

        <input class="btn-cadastrar" type="submit" name="submit" value="Editar">
        <a href="index.php" class="btn-voltar">Voltar</a>
    </form>
    <?php
        }
    ?>
</body>
</html>