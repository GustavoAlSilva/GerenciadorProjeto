<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyProject</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container"></div>
        <!-- header -->
        <header>
            <nav>
                <h1 class='title'>MyProject</h1>
                <ul class="menu">
                    <li><a href="index.php" target="_parent">Início</a></li>
                    <li><a href="cadastrar_projeto.php" target="_parent">Cadastrar Projeto</a></li>
                </ul>
            </nav>
        </header>


        <!-- main -->
        <main>
            <h2 class="list-title"> Lista de Atividades</h2>
            <?php
                include('conexao.php');
                if (isset($_GET['id_projeto'])){
                    $id_projeto = $_GET['id_projeto'];
                    $sql = "SELECT * FROM atividade WHERE id_projeto='$id_projeto'";
                    $query = mysqli_query($conexao, $sql);
                    echo "<table>
                        <tr>
                            <th>#</th>
                            <th># Projeto</th>
                            <th>Nome</th>
                            <th>Data de Início</th>
                            <th>Data Final</th>
                            <th>Finalizada?</th>";
                    echo "<tbody>";
                    if ($query){
                        while ($registro= mysqli_fetch_array($query)) {
                            echo "<td>".$registro['id_atividade']."</td>";
                            echo "<td>".$registro['id_projeto']."</td>";
                            echo "<td>".$registro['nome_atividade']."</td>";
                            echo "<td>".$registro['dt_inicio']."</td>";
                            echo "<td>".$registro['dt_fim']."</td>";
                            echo "<td>".$registro['finalizada']."</td>";
                            echo "<td style='width:100px'><center><a href='alterar_atividade.php?id_atividade=".$registro['id_atividade']."' class='btn-editar'>Editar</a></center></td>";
                            echo "<td style='width:100px'><center><a href='deletar_atividade.php?id_atividade=".$registro['id_atividade']."' class='btn-apagar'>Deletar</a></center></td></tr>";
                        }
                    }
                }
                echo "</tbody>";
                echo "</table>" 
            ?>
            <div>
                <input class="btn-cadastrar" type="button" name="cadastro" value="Novo Cadastro" onclick="parent.location='cadastrar_atividade.php'">
            </div>
        </main>

        <!-- footer -->
        <footer>
                <div class="container_footer">
                    <div>
                        <h4>Sobre</h4>
                        <ul>
                        <a href="#"><li>Quem Somos</li></a>
                        <a href="#"><li>Trabalhe Conosco</li></a>
                        </ul>
                    </div>
                    <div>
                        <h4>Contato</h4>
                        <ul>
                        <li>myproject@gmal.com</li>
                        <li>(47) 99123-4567</li>
                        </ul>
                    </div>
                    <div>
                        <h4>Políticas</h4>
                        <ul>
                        <a href="#"><li>Política de Privacidade</li></a>
                        </ul>
                    </div>
                </div> <!-- container_footer-->
            </footer>
        </div> <!-- container -->
</body>
</html>