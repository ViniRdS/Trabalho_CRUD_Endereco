<?php
include "Conection.php";
$fornecedor = $pdo->query('select * from fornecedor;')->fetchAll();
$dados = "";
foreach ($fornecedor as $key => $value) {
    $dados = $dados . "<tr>" .
        "<td>" . $value['id'] . "</td>" .
        "<td>" . $value['nome'] . "</td>" .
        "<td>" . $value['cnpj'] . "</td>" .
        "<td>" . $value['telefone'] . "</td>" .
        "<td>" . $value['endereco'] . "</td>" .
        "<td>" .
        "<td>" .
        "<div class='btn-group' role='group'>" .
        "<a href='fornecedor.php?id=" . $value['id'] . "' type='button' class='btn btn-warning'>" .
        "<i class='fa-solid fa-pen-to-square'> </i> Editar" .
        "</a>" .
        "<button onclick='deleta(" . $value['id'] . ");' type='button' class='btn btn-danger'>" .
        "<i class='fa-solid fa-trash'> </i> Excluir" .
        "</button>" .
        "</div>" .
        "</td>" .
        "</td>" .
        "</tr>";
}
echo $dados;
