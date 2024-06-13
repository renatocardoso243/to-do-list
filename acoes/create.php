<?php
    //CONEXAO
    require_once("../database/connect.php");

    //CREATE

    $descricao = filter_input(INPUT_POST, 'descricao'); //filtrar o input

    if ($descricao) {
        $sql = $myPDO->prepare("INSERT INTO tarefas (descricao) VALUES (:descricao)");
        $sql->bindValue(':descricao', $descricao);
        $sql->execute();

        header('Location: ../index.php');
        exit;
    } else {
        header('Location: ../index.php');
    }



?>