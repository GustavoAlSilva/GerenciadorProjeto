<?php

require_once('class/config.php');
require_once('autoload.php');

// Verificar se exite o POST com todos os dados:
if (isset($_POST['nome_projeto']) && isset($_POST['dt_inicio']) && isset($_POST['dt_fim']) && isset($_POST['porc_completo']) && isset($_POST['atrasado'])){
    // Receber os valores vindos do POST e limpá-los:
    $nome_projeto = limpaPost($_POST['nome_projeto']);
    $dt_inicio = limpaPost($_POST['dt_inicio']);
    $dt_fim = limpaPost($_POST['dt_fim']);
    $porc_completo = limpaPost($_POST['porc_completo']);
    $atrasado = limpaPost($_POST['atrasado']);

    // Verificar se os valores vindos do POST não estão vazios:
    if(empty($nome_projeto) or empty($dt_inicio) or empty($dt_fim) or empty($porc_completo) or empty($atrasado)){
        $erro_geral = "Todos os campos são obrigatórios!";
    }else{
        // Instanciar a classe Projeto:
        $projeto = new Projeto($nome_projeto, $dt_inicio, $dt_fim, $porc_completo, $atrasado);

        // Validar o cadastro:
        $projeto->validar_cadastro();

        // Se não houver nenhum erro:
        if(empty($projeto->erro)){
            // Inserir:
            if($projeto->insert()){
                header('location: index.php');
            }else{
                // Deu erro:
                $erro_geral = $projeto->erro["erro_geral"];
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/teste.css" rel="stylesheet">
        <title>Cadastrar Projeto</title>
    </head>
    <body>
        <form method="POST">
            <h1>Cadastrar Projeto</h1>
            
            <?php if(isset($erro_geral)){?>
            <div class="erro-geral animate__animated animate__rubberBand">
                <?php echo $erro_geral; ?>
            </div>
            <?php } ?>

            <div class="input-group">
                <input <?php if (isset ($projeto->erro["erro_nome"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="nome_projeto" <?php if(isset($_POST['nome_projeto'])){echo 'value="'.$_POST['nome_projeto'].'"';}?> placeholder="Nome do projeto" required>
                <div class="erro"><?php if(isset($projeto->erro["erro_nome"])){echo $projeto->erro["erro_nome"];}?></div>
            </div>

            <div class="input-group">
                <input <?php if (isset ($projeto->erro["erro_dt_inicio"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="dt_inicio" <?php if(isset($_POST['dt_inicio'])){echo 'value="'.$_POST['dt_inicio'].'"';}?> placeholder="Data de início do projeto" required>
                <div class="erro"><?php if(isset($projeto->erro["erro_dt_inicio"])){echo $projeto->erro["erro_dt_inicio"];}?></div>
            </div>

            <div class="input-group">
                <input <?php if (isset ($projeto->erro["erro_dt_fim"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="dt_fim" <?php if(isset($_POST['dt_fim'])){echo 'value="'.$_POST['dt_fim'].'"';}?> placeholder="Data final do projeto" required>
                <div class="erro"><?php if(isset($projeto->erro["erro_dt_fim"])){echo $projeto->erro["erro_dt_fim"];}?></div>
            </div>

            <div class="input-group">
                <input <?php if (isset ($projeto->erro["erro_porc_completo"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="porc_completo" <?php if(isset($_POST['porc_completo'])){echo 'value="'.$_POST['porc_completo'].'"';}?> placeholder="Porcentagem concluída do projeto" required>
                <div class="erro"><?php if(isset($projeto->erro["erro_porc_completo"])){echo $projeto->erro["erro_porc_completo"];}?></div>
            </div>

            <div class="input-group">
                <input <?php if (isset ($projeto->erro["erro_atrasado"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="atrasado" <?php if(isset($_POST['atrasado'])){echo 'value="'.$_POST['atrasado'].'"';}?> placeholder="O projeto está atrasado?" required>
                <div class="erro"><?php if(isset($projeto->erro["erro_atrasado"])){echo $projeto->erro["erro_atrasado"];}?></div>
            </div>

            <button class="btn-blue" type="submit">Cadastrar</button>
        </form>
    </body>
</html>