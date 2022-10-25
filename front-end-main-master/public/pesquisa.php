<?php
include "Conection.php";
try{
$pesquisa = $_POST['pesquisa'];

$clientes = $pdo->query("select * from pessoa where (nome_fantasia  like '%{$pesquisa}%') or (sobrenome_razao  like '%{$pesquisa}%')". 
"or (cpf_cnpj  like '%{$pesquisa}%') or (rg_ie  like '%{$pesquisa}%') or (tipo  like '%{$pesquisa}%');")->fetchAll();
$dados = "";
foreach ($clientes as $key => $value) {
    $dados = $dados . "<tr id='tr" . $value['id'] . "'>" .
        "<td>" . $value['id'] . "</td>" .
        "<td>" . $value['nome_fantasia'] . "</td>" .
        "<td>" . $value['sobrenome_razao'] . "</td>" .
        "<td>" . $value['cpf_cnpj'] . "</td>" .
        "<td>" . $value['rg_ie'] . "</td>" .
        "<td>" . $value['tipo'] . "</td>" .
        "<td>" . $value['dtnascimento_abertura'] . "</td>" .
        "<td>" .
        "<td>" .
        "<div class='btn-group' role='group'>" .
        "<button type='button' onclick='mostrar(" . json_encode($value) . ")' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exibirModal'>" .
        "<i class='bi bi-info-circle-fill'></i> Exibir" .
        "</button>".
        "<button type='button' onclick='alterar(" . json_encode($value) . ")' type='button' class='btn btn-warning'>" .
        "<i class='fa-solid fa-pen-to-square'> </i> Editar" .
        "</button>" .
        "<button onclick='deleta(" . $value['id'] . ");' type='button' class='btn btn-danger'>" .
        "<i class='fa-solid fa-trash'> </i> Excluir" .
        "</button>" .
        "</div>" .
        "</td>" .
        "</td>" .
        "</tr>";
}
echo $dados;
}catch (PDOException $e) {
    echo $e->getMessage();
}
