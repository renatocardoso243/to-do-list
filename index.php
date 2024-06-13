<?php
require_once('database/connect.php');

$tarefas = [];

$sql = $myPDO->query("SELECT * FROM tarefas ORDER BY id ASC");

if ($sql->rowCount() > 0) {
    $tarefas = $sql->fetchAll(PDO::FETCH_ASSOC);
    
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>to-do-list</title>
</head>
<body>
    <div id="to_do">
        <h1>Things to do</h1>

        <form action="./acoes/create.php" method="POST" class="formulario">
            <input type="text" name="descricao" placeholder="Digite sua tarefa aqui" required>
            <button type="submit" class="botao_formulario">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>
        
        <div id="tarefas">
            <?php foreach($tarefas as $tarefa): ?>
                <div class="tarefa">
                    <input 
                        type="checkbox" 
                        name="progresso" 
                        class="progresso <?= $tarefa['completo'] ? 'feito' : '' ?>"
                        data-task-is="<?= $tarefa['id']?>"
                        <?= $tarefa['completo'] ? 'checked' : ''?> 
                    >

                    <p class="decricao_tarefa">
                        <?= $tarefa['descricao'] ?>
                    </p>

                    <div class="acoes_tarefas">
                        <a class="botao_acao botao_editar">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="acoes/delete.php?id=<?= $tarefa['id']?>" class="botao_acao botao_deletar"> 
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </div>
                    <form action="acoes/update.php" method="POST" class="formulario editar_tarefa hidden">
                        <input type="text" class="hidden" name="id" value="<?= $tarefa['id'] ?>">
                        <input 
                            type="text" 
                            name="descricao" 
                            placeholder="Edite sua tarefa aqui" 
                            value="<?= $tarefa['descricao'] ?>">

                        <button type="submit" class="botao_formulario botao_conformacao">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>
                </div>
            <?php endforeach ?>       
        </div>
    </div>

    <script src="src/javascript/script.js"></script>
</body>
</html>