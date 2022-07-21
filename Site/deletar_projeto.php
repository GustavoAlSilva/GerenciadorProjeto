<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MyProject</title>
</head>
<body>
    <?php
        include('conexao.php');
        if (isset($_GET['id_projeto'])){
            $id_projeto = $_GET['id_projeto'];
            $sql = "DELETE FROM projeto WHERE id_projeto='$id_projeto'";
            $query = mysqli_query($conexao, $sql);
                
            if ($query){
                header('location:index.php');
            } else {
                echo "Erro: Os Dados não foram deletados.<br/>";
                echo "Comando: ".$sql."<br/>";
            }
        }
    ?>
</body>
</html>