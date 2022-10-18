<?php
include "Conection.php";
try {
    $nome      = $_POST["nome"];
    $cnpj       = $_POST["cnpj"];
    $telefone       = $_POST["telefone"];
    $endereco       = $_POST["endereco"];
    $sql = "INSERT INTO fornecedor(nome, cnpj,telefone,endereco) " .
        " VALUES ('{$nome}','{$cnpj}','{$telefone}','{$endereco}');";
    $pdo->prepare($sql)->execute();
    echo "true";
} catch (PDOException $e) {
    echo $e->getMessage();
}
