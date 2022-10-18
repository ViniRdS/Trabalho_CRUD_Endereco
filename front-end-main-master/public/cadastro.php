<?php
include "Conection.php";
try {
    $nome      = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf       = $_POST["cpf"];
    $sql = "INSERT INTO pessoa(nome, sobre_nome, cpf) " .
        " VALUES ('{$nome}','{$sobrenome}','{$cpf}');";
    $pdo->prepare($sql)->execute();
    echo "true";
} catch (PDOException $e) {
    echo $e->getMessage();
}
