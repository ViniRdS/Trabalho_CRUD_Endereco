<?php
include "Conection.php";
try {
    $id        = $_POST["id"];
    $acao      = $_POST["acao"];
    $nome      = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf       = $_POST["cpf"];
    switch ($acao) {
        case 'insert':
            $sql = "INSERT INTO pessoa(nome, sobre_nome, cpf) " .
                " VALUES ('{$nome}','{$sobrenome}','{$cpf}');";
            $pdo->prepare($sql)->execute();
            break;
        case 'update':
            $sql = "update pessoa set nome = '{$nome}', " .
                " sobre_nome = '{$sobrenome}', cpf = '{$cpf}' " .
                " where id = '{$id}'";
            $pdo->prepare($sql)->execute();
            break;
    }
    echo "true";
} catch (PDOException $e) {
    echo $e->getMessage();
}
