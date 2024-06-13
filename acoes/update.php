<?php
    //CONEXAO
    require_once("../database/connect.php");

    //UPDATE

    $descricao = filter_input(INPUT_POST, 'descricao'); //filtrar o input
    $id = filter_input(INPUT_POST, 'id');

    if ($descricao && $id) {
        $sql = $myPDO->prepare("UPDATE tarefas SET descricao = :descricao WHERE id= :id");
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':id', $id);
        $sql->execute();

        header('Location: ../index.php');
        exit;
    } else {
        header('Location: ../index.php');
    }



?>