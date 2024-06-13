<?php

require_once('../database/connect.php');

//DELETAR

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $sql = $myPDO->prepare('DELETE FROM tarefas WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();

    header('Location: ../index.php');
    exit;
    } else {
        header('Location: ../index.php');
    }


