<?php

include_once 'Conection.php';
try {
    echo json_encode($_POST);

    $sql = "delete from pessoa where id = $id;";

    $pdo->prepare($sql)->execute();
    echo "true";
} catch (PDOException $e) {
    var_dump($e->getMessage());
}
