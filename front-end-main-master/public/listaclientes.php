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
                        <a class="nav-link" href="listaclientes.php">
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
                    <input type="text" id="tipo" name="tipo" class="esconder">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Dados do cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="fecharX"></button>
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
                                    <input type="radio" class="form-check-input" name="pessoa" id="pessoaFisica" value="Pessoa Fìsica">
                                    <label class="form-check-label" for="pessoaFisica">Pessoa Física</label>
                                </div>
                                <div class="mb-3 form-check div-radio">
                                    <input type="radio" class="form-check-input" name="pessoa" id="pessoaJuridica" value="Pessoa Jurídica">
                                    <label class="form-check-label" for="pessoaJuridica">Pessoa Jurídica</label>
                                </div>
                                <div id="inputs" class="esconder">
                                    <div class="form-group">
                                        <label for="cpf_cnpj" class="form-label" id="labelCpf_Cnpj"></label>
                                        <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" required minlength="11" >
                                    </div>
                                    <div class="form-group">
                                        <label for="nome_fantasia" class="form-label" id="labelNome_Fantasia"></label>
                                        <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" required minlength="3">
                                    </div>
                                    <div class="form-group">
                                        <label for="sobrenome_razao" class="form-label" id="labelSobrenome_Razao"></label>
                                        <input type="text" class="form-control" id="sobrenome_razao" name="sobrenome_razao" required minlength="3">
                                    </div>

                                    <div class="form-group">
                                        <label for="rg_ie" class="form-label" id="labelRg_Ie"></label>
                                        <input type="text" class="form-control" id="rg_ie" name="rg_ie" required minlength="6">
                                    </div>

                                    <div class="form-group">
                                        <label for="dtnascimento_abertura" class="form-label" id="labelDtNascimento_Abertura">Data de Nascimento</label>
                                        <input type="date" class="form-control" id="dtnascimento_abertura" name="dtnascimento_abertura" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="fechar">
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
    <div class="modal fade" id="exibirModal" tabindex="-1" aria-labelledby="exibirModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable exibir-dialog">
            <div class="modal-content exibir">
                <form id="frmenderecoexibir" name="frmenderecoexibir" method="post">
                    <input type="text" id="idEnderecoExibir" name="idEnderecoExibir" class="esconder">
                    <input type="text" id="idEnd" name="idEnd" class="esconder">
                </form>
                <input type="text" id="exibirTipo" name="exibirTipo" class="esconder">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exibirModalLabel">Exibir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Cliente</button>
                            <button class="nav-link" id="nav-endereco-tab" name="nav-endereco-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Endereço</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="col-12 div-radio-exibir">
                                <div class="mb-3 form-check div-radio" id="exibir-div-radio-pf">
                                    <input type="radio" class="form-check-input" name="exibirPessoa" id="exibirPessoaFisica" value="Pessoa Fìsica" disabled>
                                    <label class="form-check-label" for="pessoaFisica">Pessoa Física</label>
                                </div>
                                <div class="mb-3 form-check div-radio" id="exibir-div-radio-pj">
                                    <input type="radio" class="form-check-input" name="exibirPessoa" id="exibirPessoaJuridica" value="Pessoa Jurídica" disabled>
                                    <label class="form-check-label" for="pessoaJuridica">Pessoa Jurídica</label>
                                </div>

                                <div id="exibirInputs" class="esconder">
                                    <div class="form-group">
                                        <label for="exibirCpf_cnpj" class="form-label" id="exibirLabelCpf_Cnpj"></label>
                                        <input type="text" class="form-control" id="exibirCpf_cnpj" name="exibirCpf_cnpj" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exibirNome_fantasia" class="form-label" id="exibirLabelNome_Fantasia"></label>
                                        <input type="text" class="form-control" id="exibirNome_fantasia" name="exibirNome_fantasia" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exibirSobrenome_razao" class="form-label" id="exibirLabelSobrenome_Razao"></label>
                                        <input type="text" class="form-control" id="exibirSobrenome_razao" name="exibirSobrenome_razao" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="exibirRg_ie" class="form-label" id="exibirLabelRg_Ie"></label>
                                        <input type="text" class="form-control" id="exibirRg_ie" name="exibirRg_ie" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="exibirDtNascimento_Abertura" class="form-label" id="exibirLabelDtNascimento_Abertura">Data de Nascimento</label>
                                        <input type="date" class="form-control" id="exibirDtNascimento_Abertura" name="exibirDtNascimento_Abertura" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                            <button type="button" id="ExibirCadastroEndereco" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#cadasdroEnderecoModal"><i class="bi bi-plus-circle"></i>Cadastrar Endereço</button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- Modal cadastrar endereço -->
    <div class="modal fade" id="cadasdroEnderecoModal" tabindex="-1" aria-labelledby="cadasdroEnderecoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" name="frmendereco" id="frmendereco">
                    <input type="text" id="idEndereco" name="idEndereco" class="esconder">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cadasdroEnderecoModalLabel">Cadastrar Endereço</h1>
                        <button type="button" class="btn-close" data-bs-target="#exibirModal" data-bs-toggle="modal" aria-label="Close" id="voltarX"></button>
                    </div>
                    <div class="modal-body">
                        <div id="alertaEndereco" class="alert alert-warning" role="alert">
                            <div id="tituloEndereco" class="mb-0">
                                <h6 class="alert-heading">Atenção!</h6>
                                Todos os campos com <span class="text-danger"> * </span> são obrigatórios para o
                                cadastro!
                            </div>
                            <div id="carregandoEndereco" class="mb-0 d-none">
                                <div class="spinner-border text-primary spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <span>Salvando...</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cep" class="form-label">CEP<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" id="cep" name="cep" required>
                        </div>
                        <div class="form-group">
                            <label for="logradouro" class="form-label">Logradouro<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro" required>
                        </div>
                        <div class="form-group">
                            <label for="bairro" class="form-label">Bairro<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" id="bairro" name="bairro" required>
                        </div>
                        <div class="form-group">
                            <label for="cidade" class="form-label">Cidade<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" id="cidade" name="cidade" required>
                        </div>
                        <div class="form-group">
                            <label for="uf" class="form-label">UF<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" id="uf" name="uf" maxlength="2" required>
                        </div>
                        <div class="form-group">
                            <label for="ibge" class="form-label">IBGE<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" id="ibge" name="ibge" required>
                        </div>
                        <div class="form-group">
                            <label for="titulo" class="form-label">Titulo<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="voltarBtn" class="btn btn-secondary" data-bs-target="#exibirModal" data-bs-toggle="modal">Voltar</button>
                        <button type="button" class="btn btn-success" id="salvarEnderecoBtn">Salvar</button
                    </div>
            </div>
            </form>
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
                                        <input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="O que você procura?">
                                        <span class="input-group-text" id="btnPesquisar">
                                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome/Nome Fantasia</th>
                                        <th>Sobrenome/Razão Social</th>
                                        <th>CPF/CNPJ</th>
                                        <th>RG/IE</th>
                                        <th>Tipo</th>
                                        <th>Data de Nascimento/Abertura</th>
                                        <th></th>
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
    <script src="js/pesquisa.js"></script>
    <script src="js/endereco.js"></script>
</body>

</html>