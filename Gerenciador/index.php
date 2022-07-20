<?php

require_once('class/config.php');
require_once('class/DB.php');
require_once('autoload.php');

$sql = $pdo->prepare("SELECT * FROM projeto");
$sql->execute();
$dados = $sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyProject</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container"></div>


        <!-- header -->
        <header>
            <h1 class='title'>MyProject</h1>
        </header>


        <!-- main -->
        <main>
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
            <div class="text-center">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a class="btn btn-primary" role="button" href="cadastrar_projeto.php">Cadastrar Projeto</a>
                    <a class="btn btn-danger" role="button" href="cadastrar_atividade.php">Cadastrar Atividade</a>
                </div>
                <h2 class="display-4"> Lista de Projetos</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Início</th>
                            <th scope="col">Data Final</th>
                            <th scope="col">% Andamento</th>
                            <th scope="col">Atrasado?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a role="button" class="btn btn-success">Editar</a>
                                    <a role="button" class="btn btn-danger">Apagar</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a role="button" class="btn btn-success">Editar</a>
                                    <a role="button" class="btn btn-danger">Apagar</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a role="button" class="btn btn-success">Editar</a>
                                    <a role="button" class="btn btn-danger">Apagar</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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