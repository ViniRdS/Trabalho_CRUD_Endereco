<?php
include "Conection.php";
$enderecos = $pdo->query('select * from endereco;')->fetchAll();
$dadosEndereco = "";
foreach ($clientes as $key => $value) {
    $dados = $dados . "<tr id='tr" . $value['id'] . "'>" .
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
        "<button onclick='deleta(" . $value['id'] . ");' type='button' class='btn btn-danger'>" .
        "<i class='fa-solid fa-trash'> </i> Excluir" .
        "</button>" .
        "</div>" .
        "</td>" .
        "</td>" .
        "</tr>";
}
echo $dadosEndereco;
