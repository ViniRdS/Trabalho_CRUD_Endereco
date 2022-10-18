<?php
include "Conection.php";
try {
    $nome      = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf       = $_POST["cpf"];
    $telefone     = $_POST["telefone"];
    $endereco     = $_POST["endereco"];
    $sql = "INSERT INTO usuario(nome, sobre_nome, cpf,telefone,endereco) " .
        " VALUES ('{$nome}','{$sobrenome}','{$cpf}','{$telefone}','{$endereco}');";
    $pdo->prepare($sql)->execute();
    echo "true";
} catch (PDOException $e) {
    echo $e->getMessage();
}
