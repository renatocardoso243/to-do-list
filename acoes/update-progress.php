<?php

require_once('../database/connect.php');

$id = filter_input(INPUT_POST, 'id');
$completo = filter_input(INPUT_POST, 'completo');

if ($id && $completo) {
    $sql = $myPDO->prepare('UPDATE tarefas SET completo = :completo WHERE id = :id');
    $sql->bindValue(':completo', $completo);
    $sql->bindValue(':id', $id);
    $sql->execute();

    echo json_encode(['success -> true']);
    exit;
} else {
    echo json_encode(['success -> false']);
}

