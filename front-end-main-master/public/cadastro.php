<?php
include "Conection.php";
try {
    $id                         = $_POST["id"];
    $acao                       = $_POST["acao"];
    $cpf_cnpj                   = $_POST["cpf_cnpj"];
    $nome_fantasia              = $_POST["nome_fantasia"];
    $sobrenome_razao            = $_POST["sobrenome_razao"];
    $rg_ie                      = $_POST["rg_ie"];
    $DtNascimento_Abertura      = $_POST["dtnascimento_abertura"];
    $pessoa                     = $_POST['tipo'];

    

    switch ($acao) {
        case 'insert':
            $sql = "INSERT INTO pessoa(nome_fantasia, sobrenome_razao,cpf_cnpj, rg_ie,dtnascimento_abertura,tipo) " .
                " VALUES ('{$nome_fantasia}','{$sobrenome_razao}','{$cpf_cnpj}','{$rg_ie}','{$DtNascimento_Abertura}','{$pessoa}');";
            $pdo->prepare($sql)->execute();
            break;
        case 'update':
            $sql = "update pessoa set nome_fantasia = '{$nome_fantasia}', " .
                " sobrenome_razao = '{$sobrenome_razao}', cpf_cnpj = '{$cpf_cnpj}', rg_ie = '{$rg_ie}'".
                ", dtnascimento_abertura = '{$DtNascimento_Abertura}' , tipo = '{$pessoa}'" .
                " where id = '{$id}'";
            $pdo->prepare($sql)->execute();
            break;
    }
    echo "true";
} catch (PDOException $e) {
    echo $e->getMessage();
}
