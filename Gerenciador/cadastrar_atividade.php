<?php

require_once('class/config.php');
require_once('autoload.php');

// Verificar se exite o POST com todos os dados:
if (isset($_POST['id_projeto']) && isset($_POST['nome_atividade']) && isset($_POST['dt_inicio']) && isset($_POST['dt_fim']) && isset($_POST['finalizada'])){
    // Receber os valores vindos do POST e limpá-los:
    $id_projeto = limpaPost($_POST['id_projeto']);
    $nome_atividade = limpaPost($_POST['nome_atividade']);
    $dt_inicio = limpaPost($_POST['dt_inicio']);
    $dt_fim = limpaPost($_POST['dt_fim']);
    $finalizada = limpaPost($_POST['finalizada']);

    // Verificar se os valores vindos do POST não estão vazios:
    if(empty($id_projeto) or empty($nome_atividade) or empty($dt_inicio) or empty($dt_fim) or empty($finalizada)){
        $erro_geral = "Todos os campos são obrigatórios!";
    }else{
        // Instanciar a classe Projeto:
        $atividade = new Atividade($id_projeto, $nome_atividade, $dt_inicio, $dt_fim, $finalizada);

        // Validar o cadastro:
        $atividade->validar_cadastro();

        // Se não houver nenhum erro:
        if(empty($atividade->erro)){
            // Inserir:
            if($atividade->insert()){
                header('location: index.php');
            }else{
                // Deu erro:
                $erro_geral = $atividade->erro["erro_geral"];
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
        <title>Cadastrar Atividade</title>
    </head>
    <body>
        <form method="POST">
            <h1>Cadastrar Atividade</h1>
            
            <?php if(isset($erro_geral)){?>
            <div class="erro-geral animate__animated animate__rubberBand">
                <?php echo $erro_geral; ?>
            </div>
            <?php } ?>

            <div class="input-group">
                <input <?php if (isset ($atividade->erro["erro_id_projeto"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="id_projeto" <?php if(isset($_POST['id_projeto'])){echo 'value="'.$_POST['id_projeto'].'"';}?> placeholder="ID do projeto correspondente" required>
                <div class="erro"><?php if(isset($atividade->erro["erro_id_atividade"])){echo $atividade->erro["erro_id_projeto"];}?></div>
            </div>

            <div class="input-group">
                <input <?php if (isset ($atividade->erro["erro_nome"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="nome_atividade" <?php if(isset($_POST['nome_atividade'])){echo 'value="'.$_POST['nome_atividade'].'"';}?> placeholder="Nome da atividade" required>
                <div class="erro"><?php if(isset($atividade->erro["erro_nome"])){echo $atividade->erro["erro_nome"];}?></div>
            </div>

            <div class="input-group">
                <input <?php if (isset ($atividade->erro["erro_dt_inicio"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="dt_inicio" <?php if(isset($_POST['dt_inicio'])){echo 'value="'.$_POST['dt_inicio'].'"';}?> placeholder="Data de início da atividade" required>
                <div class="erro"><?php if(isset($atividade->erro["erro_dt_inicio"])){echo $atividade->erro["erro_dt_inicio"];}?></div>
            </div>

            <div class="input-group">
                <input <?php if (isset ($atividade->erro["erro_dt_fim"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="dt_fim" <?php if(isset($_POST['dt_fim'])){echo 'value="'.$_POST['dt_fim'].'"';}?> placeholder="Data final da atividade" required>
                <div class="erro"><?php if(isset($atividade->erro["erro_dt_fim"])){echo $atividade->erro["erro_dt_fim"];}?></div>
            </div>

            <div class="input-group">
                <input <?php if (isset ($atividade->erro["erro_finalizada"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="text" name="finalizada" <?php if(isset($_POST['finalizada'])){echo 'value="'.$_POST['finalizada'].'"';}?> placeholder="A atividade está finalizada?" required>
                <div class="erro"><?php if(isset($atividade->erro["erro_finalizada"])){echo $atividade->erro["erro_finalizada"];}?></div>
            </div>

            <button class="btn-blue" type="submit">Cadastrar</button>
        </form>
    </body>
</html>