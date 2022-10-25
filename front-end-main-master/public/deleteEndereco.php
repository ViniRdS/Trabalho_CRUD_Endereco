<?php
include_once 'Conection.php';
try {
    //RECUPERAMOS O CÓDIGO DO REGISTRO A SER EXCLUIR
    $idE = $_POST['idEnderecoExibir'];
    //CRIAMOS A INSTRUÇÃO SQL PARA EXCLUSÃO DO REGISTRO
    $sql = "delete from endereco where id = {$idE}";
    //EXECUTAMOS O INSTRUÇÃO SQL
    $pdo->prepare($sql)->execute();
    
    echo "true";
} catch (PDOException $e) {
    var_dump($e->getMessage());
}
    
