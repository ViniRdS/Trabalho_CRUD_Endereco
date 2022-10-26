// TODAS AS QUERYS DE SELEÇÃO DE CAMPO HTML
const atualiza = document.querySelector("#btnatualiza");
const salvar = document.querySelector("#btnsalvar");

const alerta = document.querySelector("#alerta");
const titulo = document.querySelector("#titulo");
const carregando = document.querySelector("#carregando");
const cadastro = document.querySelector("#btncadastro");

//LABELS DO CADASTRAR
const labelNome_Fantasia = document.querySelector("#labelNome_Fantasia")
const labelSobrenome_Razao = document.querySelector("#labelSobrenome_Razao")
const labelCpf_Cnpj = document.querySelector("#labelCpf_Cnpj")
const labelRg_Ie = document.querySelector("#labelRg_Ie")
const labelDtNascimento_Abertura = document.querySelector("#labelDtNascimento_Abertura")

//LABELS DO EXIBIR
const exibirLabelNome_Fantasia = document.querySelector("#exibirLabelNome_Fantasia")
const exibirLabelSobrenome_Razao = document.querySelector("#exibirLabelSobrenome_Razao")
const exibirLabelCpf_Cnpj = document.querySelector("#exibirLabelCpf_Cnpj")
const exibirLabelRg_Ie = document.querySelector("#exibirLabelRg_Ie")
const exibirLabelDtNascimento_Abertura = document.querySelector("#exibirLabelDtNascimento_Abertura")

//RADIOS CADASTRAR
const pf = document.querySelector('#pessoaFisica');
const pj = document.querySelector('#pessoaJuridica');

//RADIOS EXIBIR
const exibirPf = document.querySelector('#exibirPessoaFisica')
const exibirPj = document.querySelector('#exibirPessoaJuridica')


//DIV ONDE FICA OS INPUTS NO CADASTRAR
const inputs = document.querySelector('#inputs');

//DIV ONDE FICA OS INPUTS NO EXIBIR
const exibirInputs = document.querySelector('#exibirInputs');

//BOTÕES E DIV DE BOTÃO
const adcEndereco = document.querySelector("#adicionarEndereco");
const divBtnEndereco = document.querySelector('#divBtnEndereco')
const adcExibirEndereco = document.querySelector('#ExibirCadastroEndereco')
const fechar = document.querySelector('#fechar');
const voltarX = document.querySelector("#voltarX");
const fecharX = document.querySelector("#fecharX");

//INPUT TIPO
const tipo = document.querySelector('#tipo');

//INPUT CADASTRO
const cpf_cnpj = document.querySelector('#cpf_cnpj');
const nome_fantasia = document.querySelector('#nome_fantasia');
const dtnascimento_abertura = document.querySelector('#dtnascimento_abertura');
const sobrenome_razao = document.querySelector('#sobrenome_razao');
const rg_ie = document.querySelector('#rg_ie');



//CONFIGURAÇÕES DOS PARAMENTRO DE VALIDAÇÃO DO FORMULÁRIO
 $('#frmcliente').validate({
    //adiconamos regras de validação ao formulário
    rules: {
        //bloqueamos uma quantidade minima de caracteres
        //para o campo nome e sobre nome.
       
        
       
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
    const nome_fantasia = cliente.nome_fantasia;
    const sobrenome_razao = cliente.sobrenome_razao;
    const cpf_cnpj = cliente.cpf_cnpj;
    const rg_ie = cliente.rg_ie;
    const dtnascimento_abertura = cliente.dtnascimento_abertura;
    const tipo = cliente.tipo;

    $("#acao").val('update');
    $("#id").val(id);
    $("#nome_fantasia").val(nome_fantasia);
    $("#sobrenome_razao").val(sobrenome_razao);
    $("#cpf_cnpj").val(cpf_cnpj);
    $("#rg_ie").val(rg_ie);
    $("#dtnascimento_abertura").val(dtnascimento_abertura);
    document.querySelector("#tipo").value = tipo;

    if (document.querySelector("#tipo").value == 'Pessoa Física') {
        pf.checked = true
        pf.click()
    } else if (document.querySelector("#tipo").value == 'Pessoa Jurídica') {
        pj.checked = true
        pj.click()
    } else {
        pj.checked = false
        pf.checked = false
    }
    

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
        $("#nome_fantasia").val('');
        $("#sobrenome_razao").val('');
        $("#cpf_cnpj").val('');
        $("#rg_ie").val('');
        $("#dtnascimento_abertura").val('');
        $("#tipo").val('');
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

                cpf_cnpj.classList.remove('is-valid')
                nome_fantasia.classList.remove('is-valid')
                dtnascimento_abertura.classList.remove('is-valid')
                rg_ie.classList.remove('is-valid')
                sobrenome_razao.classList.remove('is-valid')

                carregando.classList.add('d-none');
                titulo.classList.remove('d-none')

                pf.checked = false;
                inputs.classList.add('esconder')
                
                pj.checked = false;
            }, 500);
        } else if (document.getElementById('acao').value == 'insert') {
            titulo.className = 'd-none';
            carregando.className = 'mb-0';
            setTimeout(() => {
                inserir();
                pf.checked = false
                pj.checked = false
                inputs.classList.add('esconder')
                

                cpf_cnpj.classList.remove('is-valid')
                nome_fantasia.classList.remove('is-valid')
                dtnascimento_abertura.classList.remove('is-valid')
                rg_ie.classList.remove('is-valid')
                sobrenome_razao.classList.remove('is-valid')

                carregando.classList.add('d-none');
                titulo.classList.remove('d-none')

                pf.checked = false;
                inputs.classList.add('esconder')
                pj.checked = false;
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


// EVENTO CLICK DO RADIO PF DO CADASTRAR
pf.addEventListener('click', () => {
    //MUDA OS CAMPOS PARA PESSOA FÍSICA
    //MUDA AS LABELS
    labelCpf_Cnpj.innerHTML = 'CPF <span class="text-danger"> * </span>'
    labelNome_Fantasia.innerHTML = 'Nome <span class="text-danger"> * </span>'
    labelSobrenome_Razao.innerHTML = 'Sobrenome <span class="text-danger"> * </span>'
    labelRg_Ie.innerHTML = 'RG <span class="text-danger"> * </span>'
    labelDtNascimento_Abertura.innerHTML = 'Data de Nascimento <span class="text-danger"> * </span>'
    inputs.classList.remove('esconder')
    
    //EXIBI AS MÁSCARAS
    
    $("#cpf_cnpj").inputmask({
        mask: '999.999.999-99'
    });
    
    cpf_cnpj.classList.remove('is-valid')
    cpf_cnpj.classList.remove('is-invalid')

    tipo.value = 'Pessoa Física'
    
     $('#frmcliente').each(function () {
        $('#cpf_cnpj').rules("add", { cpfBR: true,cnpjBR: false})
     })
    
    
    
})

// EVENTO CLICK DO RADIO PJ DO CADASTRAR
pj.addEventListener('click', () => {
    //MUDA OS CAMPOS PARA PESSOA JURÍDICA
    //MUDA AS LABELS
    labelCpf_Cnpj.innerHTML = 'CNPJ <span class="text-danger"> * </span>'
    labelNome_Fantasia.innerHTML = 'Nome Fantasia <span class="text-danger"> * </span>'
    labelSobrenome_Razao.innerHTML = 'Razão social <span class="text-danger"> * </span>'
    labelRg_Ie.innerHTML = 'IE <span class="text-danger"> * </span>'
    labelDtNascimento_Abertura.innerHTML = 'Data de Abertura <span class="text-danger"> * </span>'
    inputs.classList.remove('esconder')
    
    //EXIBI AS MÁSCARAS
    
    $("#cpf_cnpj").inputmask({
        mask: "99.999.999/9999-99"
    });

    cpf_cnpj.classList.remove('is-valid')
    cpf_cnpj.classList.remove('is-invalid')


    tipo.value = 'Pessoa Jurídica'

    $('#frmcliente').each(function () {
        $('#cpf_cnpj').rules("add", { cpfBR: false,cnpjBR: true})
     })
})


//----COLOCANDO A API DE CNPJ EM AÇÃO----

//ACEITAR APENAS NÚMEROS NO INPUT
cpf_cnpj.addEventListener("keypress",(e)=>{
    const apenasNum=/[0-9]/;
    const tecla=String.fromCharCode(e.keyCode);
    
    if(!apenasNum.test(tecla)){
        e.preventDefault();
        return;
    }
    });
    //Conseguir o CNPJ APÓS DIGITA-LO
    cpf_cnpj.addEventListener("keyup",(e)=>{
    const valorCNPJ=e.target.value;

    //CONFERIR O TAMANHO CORRETO
    if(valorCNPJ.length===18){
        GETCNPJ(valorCNPJ);
    }
});
    //DECLARANDO VARIAVEL DADOS COM VALOR ALEATÓRIO
    let dados=Infinity;
    const GETCNPJ= async()=>{
    //TRANSFORMAR O VALOR DO INPUT EM STRING E DEPOIS REMOVER A MASCARA DESSA STRING
    const cnpjstring = String(cpf_cnpj.value);
    const cnpjsmask = cnpjstring.replace(/[^0-9,]*/g, '');
    //PEGAR OS DADOS DA API APENAS SE O CNPJ SEM A MASCARA TIVER 14 CARACTERES
    if(cnpjsmask.length===14){
    //ENVIANDO O CNPJ SEM MASCARA
    const UrlAPI=`https://brasilapi.com.br/api/cnpj/v1/${cnpjsmask}`;
    const respostaAPI=await fetch(UrlAPI);
    dados = await respostaAPI.json();
    } 
    //INSERIR DADOS DA API NOS INPUTS
    if((cnpjsmask.length===14)&&(dados.type!=="bad_request")){
        console.log('colocar dados');
        nome_fantasia.value=dados.nome_fantasia;
        sobrenome_razao.value=dados.razao_social;
        dtnascimento_abertura.value=dados.data_inicio_atividade;
    }
    //CASO CNPJ INVÁLIDO
    if ((dados.type==="bad_request")&&(cnpjsmask.length===14)) {
        nome_fantasia.value="";
        sobrenome_razao.value="";
        dtnascimento_abertura.value="";
        console.log('Erro no cnpj');
        return;
        }
};
//---------------------------------------

// QUANDO CLICAR NO BOTÃO FECHAR PARA FECHAR O FORMULÁRION IRÁ VAI LIMPAR O FORMULÁRIO
fechar.addEventListener('click', () => {

    pf.checked = false;

    pj.checked = false;

    inputs.classList.add('esconder')
    adcEndereco.classList.add('esconder')

    cpf_cnpj.classList.remove('is-valid')
    nome_fantasia.classList.remove('is-valid')
    dtnascimento_abertura.classList.remove('is-valid')
    rg_ie.classList.remove('is-valid')
    sobrenome_razao.classList.remove('is-valid')

    carregando.classList.add('d-none');
    titulo.classList.remove('d-none')
})

// QUANDO CLICAR PARA NO BOTÃO X PRARA FECHAR O FORMULÁRIO IRÁ VAI LIMPAR O FORMULÁRIO
fecharX.addEventListener('click', () => {

    pf.checked = false;

    pj.checked = false;

    inputs.classList.add('esconder')
    adcEndereco.classList.add('esconder')

    cpf_cnpj.classList.remove('is-valid')
    nome_fantasia.classList.remove('is-valid')
    dtnascimento_abertura.classList.remove('is-valid')
    rg_ie.classList.remove('is-valid')
    sobrenome_razao.classList.remove('is-valid')

    carregando.classList.add('d-none');
    titulo.classList.remove('d-none')

})


$("#cep").inputmask({
    mask: "99999-999"
});


function mostrar(cliente) {
    

    const id = cliente.id;
    const nome_fantasia = cliente.nome_fantasia;
    const sobrenome_razao = cliente.sobrenome_razao;
    const cpf_cnpj = cliente.cpf_cnpj;
    const rg_ie = cliente.rg_ie;
    const dtnascimento_abertura = cliente.dtnascimento_abertura;
    const tipo = cliente.tipo;

    document.querySelector("#idEndereco").value = id;
    
    $("#exibirNome_fantasia").val(nome_fantasia);
    $("#exibirSobrenome_razao").val(sobrenome_razao);
    $("#exibirCpf_cnpj").val(cpf_cnpj);
    $("#exibirRg_ie").val(rg_ie);
    $("#exibirDtNascimento_Abertura").val(dtnascimento_abertura);
    document.querySelector("#exibirTipo").value = tipo;
    

    

    if (document.querySelector("#exibirTipo").value == 'Pessoa Física') {
        exibirPf.checked = true
        exibirPf.click()
        exibirInputs.classList.remove('esconder')

        exibirLabelCpf_Cnpj.innerHTML = 'CPF'
        exibirLabelNome_Fantasia.innerHTML = 'Nome '
        exibirLabelSobrenome_Razao.innerHTML = 'Sobrenome'
        exibirLabelRg_Ie.innerHTML = 'RG'
        exibirLabelDtNascimento_Abertura.innerHTML = 'Data de Nascimento'

        //EXIBI AS MÁSCARAS
        
        $("#cpf_cnpj").inputmask({
            mask: "999.999.999-99"
        });
    } else if (document.querySelector("#exibirTipo").value == 'Pessoa Jurídica') {
        exibirPj.checked = true
        exibirPj.click()

        exibirInputs.classList.remove('esconder')

        exibirLabelCpf_Cnpj.innerHTML = 'CNPJ'
        exibirLabelNome_Fantasia.innerHTML = 'Nome Fantasia'
        exibirLabelSobrenome_Razao.innerHTML = 'Razão social'
        exibirLabelRg_Ie.innerHTML = 'IE'
        exibirLabelDtNascimento_Abertura.innerHTML = 'Data de Abertura'


        //EXIBI AS MÁSCARAS
        
        $("#cpf_cnpj").inputmask({
            mask: "99.999.999/9999-99"
        });

    } else {
        exibirPj.checked = false
        exibirPf.checked = false
        exibirInputs.classList.add('esconder')
    }
    //ELE IRÁ VERIFICAR SE O RADIO DO EXIBIR É VERDADEIRO PARA EXIBIR OS CAMPOS
    
    //$('#dadosEnderecos').load("listaenderecos.php", {"id": idE});

    /* $.ajax({
        type: "post",
        url: "listaenderecos.php",
        data: {idEndere: id}, success: function (idEndere){
            $('#dadosEnderecos').html(idEndere)  
        }
       }) */
       
       lista_endereco()
       
   
}
