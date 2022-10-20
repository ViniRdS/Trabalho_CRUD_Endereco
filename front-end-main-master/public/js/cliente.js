const atualiza = document.querySelector("#btnatualiza");
const salvar = document.querySelector("#btnsalvar");

const alerta = document.querySelector("#alerta");
const titulo = document.querySelector("#titulo");
const carregando = document.querySelector("#carregando");
const cadastro = document.querySelector("#btncadastro");


//CONFIGURAÇÕES DOS PARAMENTRO DE VALIDAÇÃO DO FORMULÁRIO
$('#frmcliente').validate({
    //adiconamos regras de validação ao formulário
    rules: {
        //bloqueamos uma quantidade minima de caracteres
        //para o campo nome e sobre nome.
        nome: {
            minlength: 3
        },
        sobrenome: {
            minlength: 3
        },
    },
    //definimos que as mensagem de formulário serão adicionadas a uma tag
    // <span>Mensagem</span>
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
    }
});
async function deleta(id) {
    document.getElementById('idcliente').value = id;
    const form = document.querySelector('#clientes');
    dados = new FormData(form);
    const opt = {
        method: 'POST',
        body: dados,
        mode: 'cors',
        cache: 'default'
    };
    const response = await fetch('delete.php', opt);
    const data = await response.text();
    if (data == 'true') {
        $('#tr' + id).remove();
    }
}
function alterar(cliente) {
    const id = cliente.id;
    const nome = cliente.nome;
    const sobreNome = cliente.sobre_nome;
    const cpf = cliente.cpf;
    const endereco = cliente.endereco;

    $("#acao").val('update');
    $("#id").val(id);
    $("#nome").val(nome);
    $("#sobrenome").val(sobreNome);
    $("#cpf").val(cpf);
    $("#endereco").val(endereco);

    //exibimos o modal
    $("#cadastrocliente").modal('show');
}

async function update() {
    /*alerta.className = 'alert alert-success';
    titulo.className = 'mb-0';
    titulo.innerHTML = `<p>Alteração realizada com sucesso!`;**/
    const form = document.querySelector("#frmcliente")
    const dados = new FormData(form);

    const opt = {
        method: "POST",
        mode: 'cors',
        body: dados,
        cache: 'default'

    };
    const response = await fetch('cadastro.php', opt);
    const data = await response.text();
    if (data == 'true') {
        $("#acao").val('update');
        $("#id").val('');
        $("#nome").val('');
        $("#sobrenome").val('');
        $("#cpf").val('');
        $("#endereco").val('');
        lista_cliente();
        //ocultamos o modal
        $("#cadastrocliente").modal('hide');

    }
}

async function lista_cliente() {
    //monstamos a configuração da requição
    //ao servidor http
    const opt = {
        method: 'POST',
        mode: 'cors',
        cache: 'default'
    }
    //A VARIAVEL response RECEBERÁ UMA PROMISSE
    //DE UMA TENTATIVA DE REQUISIÇÃO.
    const response = await fetch('listacliente.php', opt);
    //CONVERTEMOS O A RESPOSTA  PARA TEXTO
    //QUE TERÁ UMA ESTRUTURA HTML
    const html = await response.text();
    //PRINTAMOS NO CONSOLE O RESULTADO

    document.getElementById('dados').innerHTML = html;
}

async function inserir() {
    const form = document.querySelector("#frmcliente");
    const formData = new FormData(form);

    const opt = {
        method: "POST",
        mode: 'cors',
        body: formData,
        cache: 'default'
    }
    const response = await fetch('cadastro.php', opt);
    const dados = await response.text();
    console.log(dados);
    console.log(dados);
    //VARIFICAMOS SE A RESPOSTA DO PHP OU SERVER É TRUE
    if (dados == 'true') {
        //CASO SEJA TRUE, EXIBIMOS A MENSAGEM DE SALVO COM SUCESSO,
        //E ALTERAMOS A COR DO COMPONENTE ALERT PARA SUCCESS
        alerta.className = 'alert alert-success';
        titulo.className = 'mb-0';
        titulo.innerHTML = `<p>Cadastro realizado com sucesso!`;
        //OCULTA O ICONES CARREGANDO
        carregando.className = 'mb-0 d-none';
        lista_cliente();
        //aguardamos 0,5 seg para fechar o modal
        setTimeout(() => {
            //fecha o modal
            $("#cadastrocliente").modal('hide');
            $("#frmcliente input").val('');
            $("#alerta").removeClass('alert alert-success');
            $('#alerta').addClass('alert alert-warning');
            $("#titulo").removeClass('d-none');
            $("#titulo").addClass('mb-0');
            titulo.innerHTML = `
            <h6 class="alert-heading">Atenção!</h6>
            Todos os campos com <span class="text-danger"> * </span> 
            são obrigatórios para o
            cadastro!`;
        }, 1000);
    } else {
        titulo.className = `mb-0`;
        titulo.innerHTML = `<p>${dados}</p>`;
    }
}
//MAPEAMOS O EVENTO DE CARREGAMENTO DO DOCUMENTO
document.addEventListener("DOMContentLoaded", function () {
    lista_cliente();
});

atualiza.addEventListener('click', async function () {
    lista_cliente();
});

cadastro.addEventListener('click', function () {
    $("#frmcliente input").val('');
    document.getElementById('acao').value = 'insert';
});

salvar.addEventListener('click', function () {
    //RECEBEMOS O RESULTADO DA VALIDAÇÃO DO FORMULARIO
    const valida = $('#frmcliente').valid();
    // let acao = document.getElementById("edtacao");
    if (valida == true) {
        if (document.getElementById('acao').value == 'update') {
            titulo.className = 'd-none';
            carregando.className = 'mb-0';
            setTimeout(() => {
                update();
            }, 500);
        } else if (document.getElementById('acao').value == 'insert') {
            titulo.className = 'd-none';
            carregando.className = 'mb-0';
            setTimeout(() => {
                inserir();
            }, 500);
        }
        /*alerta.className = 'alert alert-primary';
        titulo.className = 'd-none';
        carregando.className = 'mb-0';
        setTimeout(() => {
            inserir();
        }, 500);*/
    }
});

$("#cpf").inputmask({
    mask: '999.999.999-99'
});
$("#cnpj").inputmask({
    mask: '99.999.999/9999-99'
});


//const cpf = document.querySelector("#cpf");
const exibirNome = document.querySelector("#exibirNome")
const exibirSobrenome = document.querySelector("#exibirSobrenome")
const exibirCpf = document.querySelector("#exibirCpf")
const exibirNomeFantasia = document.querySelector("#exibirNomeFantasia")
const exibirRazaoSocial = document.querySelector("#exibirRazaoSocial")
const exibirRg = document.querySelector("#exibirRg")
const exibirIe = document.querySelector("#exibirIe")
const exibirCnpj = document.querySelector("#exibirCnpj")
const exibirDataNascimento = document.querySelector("#exibirDataNascimento")
const exibirDataAbertura = document.querySelector("#exibirDataAbertura")
const pf = document.getElementById('pessoaFisica');
const pj = document.getElementById('pessoaJuridica');
const inputs = document.querySelector('#inputs');
pf.addEventListener('click', () => {
    /*  exibirNomeFantasia.classList.add('esconder')
     exibirRazaoSocial.classList.add('esconder')
     exibirIe.classList.add('esconder')
     exibirCnpj.classList.add('esconder')
     exibirDataAbertura.classList.add('esconder')
     exibirNome.classList.remove('esconder')
     exibirSobrenome.classList.remove('esconder')
     exibirCpf.classList.remove('esconder')
     exibirRg.classList.remove('esconder')
     exibirDataNascimento.classList.remove('esconder') */
    inputs.innerHTML = `<div class="form-group" id="exibirNome">
    <label for="exibirNome" class="form-label">Nome <span class="text-danger"> * </span>
    </label>
    <input type="text" class="form-control" id="exibirNome" name="exibirNome" placeholder="Digite seu nome" required>
</div>
<div class="form-group" id="exibirSobrenome">
    <label for="exibirSobrenome" class="form-label">Sobrenome <span class="text-danger"> *
        </span> </label>
    <input type="text" class="form-control" id="exibirSobrenome" name="exibirSobrenome" placeholder="Digite seu sobre nome" required>
</div>
<div class="form-group" id="exibirCpf">
    <label for="exibirCpf" class="form-label">CPF</label>
    <input type="text" class="form-control" id="exibirCpf" name="exibirCpf" placeholder="Digite seu CPF">
</div>

<div class="form-group" id="exibirRg">
<label for="exibirRg" class="form-label">RG</label>
<input type="text" class="form-control" id="exibirRg" name="exibirRg">
</div>

<div class="form-group" id="exibirDataNascimento">
<label for="exibirDataNascimento" class="form-label">Data de Nascimento</label>
<input type="date" class="form-control" id="exibirDataNascimento" name="exibirDataNascimento" >
</div>
`
})
//exibirPj.classList.add('esconder')
// exibirPf.classList.remove('esconder')
pj.addEventListener('click', () => {
    /* exibirNomeFantasia.classList.remove('esconder')
    exibirRazaoSocial.classList.remove('esconder')
    exibirIe.classList.remove('esconder')
    exibirCnpj.classList.remove('esconder')
    exibirDataAbertura.classList.remove('esconder')
    exibirNome.classList.add('esconder')
    exibirSobrenome.classList.add('esconder')
    exibirCpf.classList.add('esconder')
    exibirRg.classList.add('esconder')
    exibirDataNascimento.classList.add('esconder') */
    inputs.innerHTML = `

<div class="form-group" id="exibirNomeFantasia">
<label for="exibirNomeFantasia" class="form-label">Nome Fantasia
</label>
<input type="text" class="form-control" id="exibirNomeFantasia" name="exibirNomeFantasia" >
</div>
<div class="form-group" id="exibirRazaoSocial">
<label for="exibirRazaoSocial" class="form-label">Razão Social</label>
<input type="text" class="form-control" id="exibirRazaoSocial" name="exibirRazaoSocial">
</div>
<div class="form-group" id="exibirIe">
<label for="exibirIe" class="form-label">IE</label>
<input type="text" class="form-control" id="exibirIe" name="exibirIe" >
</div>

<div class="form-group" id="exibirCnpj">
<label for="exibirCnpj" class="form-label">CNPJ</label>
<input type="text" class="form-control" id="exibirCnpj" name="exibirCnpj">
</div>

<div class="form-group" id="exibirDataAbertura">
<label for="exibirDataAbertura" class="form-label">Data de Abertura</label>
<input type="date" class="form-control" id="exibirDataAbertura" name="exibirDataAbertura" >
</div>`
})
//exibirPf.classList.add('esconder')
// exibirPj.classList.remove('esconder')

// exibirPf.classList.add('esconder')
//exibirPj.classList.add('esconder')



const adcEndereco = document.querySelector("#adicionarEndereco");
const divBtnEndereco = document.querySelector('#divBtnEndereco')
adcEndereco.addEventListener('click', () => {
    //const voltarX = document.querySelector("#voltarX").classList.add('esconder');
    //const voltarBtn = document.querySelector("#voltarBtn").classList.add('esconder');
    divBtnEndereco.innerHTML = ` <button type="button" id="voltarBtn" class="btn btn-secondary" data-bs-target="#cadastrocliente" data-bs-toggle="modal" >Close</button>
        <button type="button" class="btn btn-success">Salvar</button>`
})
const adcExibirEndereco = document.querySelector('#ExibirCadastroEndereco')
adcExibirEndereco.addEventListener('click', function () {
    // const voltarX = document.querySelector("#voltarX").classList.remove('esconder');
    //const voltarBtn = document.querySelector("#voltarBtn").classList.remove('esconder');
    divBtnEndereco.innerHTML = ` <button type="button" id="voltarBtn" class="btn btn-secondary" data-bs-target="#exibirModal" data-bs-toggle="modal" >Close</button>
        <button type="button" class="btn btn-success">Salvar</button>`
})

const fechar = document.querySelector('#fechar');
fechar.addEventListener('click', () => {
    
    const limparPf = document.getElementById("pessoaFisica")
    limparPf.checked = false;
    const limparPj = document.getElementById("pessoaJuridica")
    limparPj.checked = false;

    inputs.innerHTML = ``

})

/*
adcEndereco.addEventListener('click', function() {
    voltarX.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-target="#cadastrocliente" data-bs-toggle="modal" id="voltarBtn">Close</button>`
    voltarBtn.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-target="#cadastrocliente" data-bs-toggle="modal" id="voltarBtn">Close</button>`
})*/

// desmarcar pessoa fisica ou juridica

