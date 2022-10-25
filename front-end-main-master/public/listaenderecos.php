<?php
include "Conection.php";
try {
$idEnd = $_POST['idEndere'];
$enderecos = $pdo->query("select * from endereco where idcliente = {$idEnd};")->fetchAll();
$dadosEndereco = "";
foreach ($enderecos as $key => $value) {
    $dadosEndereco = $dadosEndereco . "<tr id='trEndereco" . $value['id'] . "'>" .
        "<td>" . $value['id'] . "</td>" .
        "<td>" . $value['titulo'] . "</td>" .
        "<td>" . $value['cep'] . "</td>" .
        "<td>" . $value['logradouro'] . "</td>" .
        "<td>" . $value['bairro'] . "</td>" .
        "<td>" . $value['cidade'] . "</td>" .
        "<td>" . $value['uf'] . "</td>" .
        "<td>" . $value['ibge'] . "</td>" .
        "<td>" .
        "<td>" .
        "<div class='btn-group' role='group'>" .
        "<button onclick='deletaEndereco(" . $value['id'] . ");' type='button' class='btn btn-danger' id='btnEndeDelete'>" .
        "<i class='fa-solid fa-trash'> </i> Excluir" .
        "</button>" .
        "</div>" .
        "</td>" .
        "</td>" .
        "</tr>";
}

echo $dadosEndereco;
} catch (PDOException $e) {
    var_dump($e->getMessage());
}