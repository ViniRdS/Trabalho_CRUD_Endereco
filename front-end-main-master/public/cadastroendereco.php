<?php
include "Conection.php";
try {
    $idCliente                   = $_POST["idEndereco"];
    $titulo                      = $_POST["titulo"];
    $cep                         = $_POST["cep"];
    $logradouro                  = $_POST["logradouro"];
    $bairro                      = $_POST["bairro"];
    $cidade                      = $_POST["cidade"];
    $uf                          = $_POST["uf"];
    $ibge                        = $_POST['ibge'];




    $sql = "INSERT INTO endereco(titulo, cep,logradouro, bairro,cidade,uf,ibge,idCliente) " .
        " VALUES ('{$titulo}','{$cep}','{$logradouro}','{$bairro}','{$cidade}','{$uf}','{$ibge}','{$idCliente}');";
    $pdo->prepare($sql)->execute();



    echo "true";
} catch (PDOException $e) {
    echo $e->getMessage();
}
