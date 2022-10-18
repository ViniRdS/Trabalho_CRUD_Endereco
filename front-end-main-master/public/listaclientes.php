<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Lista de clientes</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aula unesc</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">
                            <i class="fa-solid fa-house"> </i> Início
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cliente.php">
                            <i class="fa-solid fa-user"> </i> Clientes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="cadastrocliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" name="frmcliente" id="frmcliente">
                    <input type="text" id="id" name="id">
                    <input type="text" id="acao" name="acao">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Dados do cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- AQUI TEMOS UMA LINHA -->
                        <div class="row">
                            <!-- AQUI TEMOS UMA COLUNA OCUPANDO 100% DO TAMANHO DA LINHA -->
                            <div class="col-12">
                                <!-- AQUI TEMOS O COMPONENTE ALERT -->
                                <div id="alerta" class="alert alert-warning" role="alert">
                                    <!-- AQUI TEMOS O TITULO DO ALERT DO BOOTSTRAP -->
                                    <div id="titulo" class="mb-0">
                                        <h6 class="alert-heading">Atenção!</h6>
                                        Todos os campos com <span class="text-danger"> * </span> são obrigatórios para o
                                        cadastro!
                                    </div>
                                    <!-- AQUI TEMOS SPINNER PARA MENSAGEM DE SALVANDO -->
                                    <div id="carregando" class="mb-0 d-none">
                                        <div class="spinner-border text-primary spinner-border-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <span>Salvando...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 form-check div-radio">
                                    <input type="radio" class="form-check-input" name="pessoa" id="pessoaFisica" value="pessoaFisica">
                                    <label class="form-check-label" for="pessoaFisica">Pessoa Física</label>
                                </div>
                                <div class="mb-3 form-check div-radio">
                                    <input type="radio" class="form-check-input" name="pessoa" id="pessoaJuridica" value="pessoaJuridica">
                                    <label class="form-check-label" for="pessoaJuridica">Pessoa Jurídica</label>
                                </div>

                                <div class="form-group">
                                    <label for="nome" class="form-label">Nome <span class="text-danger"> * </span>
                                    </label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="sobrenome" class="form-label">Sobrenome <span class="text-danger"> *
                                        </span> </label>
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite seu sobre nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="cpf" class="form-label">Cpf</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF">
                                </div>
                                <div class="form-group">
                                    <label for="cpf" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite seu endereço">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"> </i> Fechar
                        </button>
                        <button id="btnsalvar" type="button" class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk"></i> Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Exibir -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable exibir-dialog">
            <div class="modal-content exibir">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Exibir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 form-check div-radio">
                                <input type="radio" class="form-check-input" name="pessoa" id="pessoaFisica" value="pessoaFisica" disabled>
                                <label class="form-check-label" for="pessoaFisica">Pessoa Física</label>
                            </div>
                            <div class="mb-3 form-check div-radio">
                                <input type="radio" class="form-check-input" name="pessoa" id="pessoaJuridica" value="pessoaJuridica" disabled>
                                <label class="form-check-label" for="pessoaJuridica">Pessoa Jurídica</label>
                            </div>

                            <div class="form-group">
                                <label for="nome" class="form-label">Nome
                                </label>
                                <input type="text" class="form-control" id="nome" name="nome" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nomeFantasia" class="form-label">Nome Fantasia
                                </label>
                                <input type="text" class="form-control" id="nomeFantasia" name="nomeFantasia" disabled>
                            </div>
                            <div class="form-group">
                                <label for="sobrenome" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" disabled>
                            </div>
                            <div class="form-group">
                                <label for="razaoSocial" class="form-label">Razão Social</label>
                                <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" disabled>
                            </div>
                            <div class="form-group">
                                <label for="rg" class="form-label">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" disabled>
                            </div>
                            <div class="form-group">
                                <label for="ie" class="form-label">IE</label>
                                <input type="text" class="form-control" id="ie" name="ie" disabled>
                            </div>
                            <div class="form-group">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" disabled>
                            </div>
                            <div class="form-group">
                                <label for="cnpj" class="form-label">CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" disabled>
                            </div>
                            <div class="form-group">
                                <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" disabled>
                            </div>
                            <div class="form-group">
                                <label for="dataAbertura" class="form-label">Data de Abertura</label>
                                <input type="date" class="form-control" id="dataAbertura" name="dataAbertura" disabled>
                            </div>
                            <button type="button" class="btn btn-success mt-2"><i class="bi bi-plus-circle"></i></button>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">CEP</th>
                                        <th scope="col">Logradouro</th>
                                        <th scope="col">Bairro</th>
                                        <th scope="col">Cidade</th>
                                        <th scope="col">UF</th>
                                        <th scope="col">IBGE</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="dadosEnderecos">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form id="clientes" name="clientes">
            <input type="text" name="idcliente" id="idcliente">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button id="btncadastro" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadastrocliente">
                                <i class="fa-solid fa-plus"> </i> Cadastrar
                            </button>
                            <button id="btnatualiza" type="button" class="btn btn-primary">
                                <i class="fa-solid fa-rotate-right"> </i> Atualizar
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="O que você procura?">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>Código</td>
                                        <td>Nome</td>
                                        <td>Sobrenome</td>
                                        <td>Cpf</td>
                                        <td>Ação</td>
                                    </tr>
                                </thead>
                                <tbody id="dados">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- TEMOS OS RECURSSOS DA BIBLIOTECA JQUERY -->
    <script src="js/jquery.min.js"></script>
    <!-- TEMOS OS RECURSSOS DA BIBLIOTECA BOOTSTRAP -->
    <script src="js/bootstrap.min.js"></script>
    <!-- TEMOS OS RECURSSOS DA BIBLIOTECA DE MASCARAS -->
    <script src="js/inputmask.min.js"></script>
    <script src="js/inputmask.extensions.min.js"></script>
    <script src="js/inputmask.numeric.extensions.min.js"></script>
    <script src="js/jquery.inputmask.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/localization/messages_pt_BR.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/localization/methods_pt.min.js"></script>

    <script src="js/request.js"></script>
    <script src="js/cliente.js"></script>
</body>

</html>