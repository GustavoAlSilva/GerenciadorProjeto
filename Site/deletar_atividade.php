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
        if (isset($_GET['id_atividade'])){
            $id_atividade = $_GET['id_atividade'];
            $sql = "DELETE FROM atividade WHERE id_atividade='$id_atividade'";
            $query = mysqli_query($conexao, $sql);
                
            if ($query){
                header('location:atividades.php');
            } else {
                echo "Erro: Os Dados não foram deletados.<br/>";
                echo "Comando: ".$sql."<br/>";
            }
        }
    ?>
</body>
</html>