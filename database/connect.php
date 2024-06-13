<?php

    try {

        $myPDO = new PDO("pgsql:host=localhost;dbname=to_do", "postgres","123");

    } catch(PDOException $e) {
        echo $e->getMessage();
    }

?>