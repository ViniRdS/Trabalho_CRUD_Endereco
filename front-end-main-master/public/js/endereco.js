//INPUT ENDEREÇO
const Fcep = document.querySelector('#cep');
const Flogradouro = document.querySelector('#logradouro');
const Fbairro = document.querySelector('#bairro');
const Fcidade = document.querySelector('#cidade');
const Fuf = document.querySelector('#uf');
const Fibge = document.querySelector('#ibge');
const Ftitulo = document.querySelector('#titulo');

//ACEITAR APENAS NÚMEROS NO INPUT
Fcep.addEventListener("keypress",(e)=>{
    const apenasNum=/[0-9]/;
    const tecla=String.fromCharCode(e.keyCode);
    
    if(!apenasNum.test(tecla)){
        e.preventDefault();
        return;
    }
    });

//Conseguir o CEP após digita-lo
Fcep.addEventListener("keyup",(e)=>{
    const valorCEP=e.target.value;
    //CONFERIR O TAMANHO CORRETO
    if(valorCEP.length===9){
        GETCPF(valorCEP);
    }

});
    //PEGAR OS DADOS DA API
    const GETCPF= async(cep)=>{
    const UrlAPI=`https://viacep.com.br/ws/${cep}/json/`
    const respostaAPI=await fetch(UrlAPI);
    const dados = await respostaAPI.json();

    //DADOS DA API NOS INPUTS
    if((Fcep.value!=="")&&(Fcep.length=8)&&(dados.erro !== true)){
        console.log('colocar dados');
        Flogradouro.value=dados.logradouro;
        Fbairro.value=dados.bairro;
        Fcidade.value=dados.localidade;
        Fuf.value=dados.uf;
        Fibge.value=dados.ibge;

    }

    //CASO O CEP SEJA INVÁLIDO
    if (dados.erro === true) {
        Flogradouro.value="";
        Fbairro.value="";
        Fcidade.value="";
        Fuf.value="";
        Fibge.value="";
        console.log('Erro no cep');

        return;
        }

    /* Deixar os campos vazias caso cep esteja vazio?
        if (FormCEP.value===""){
            formulario.reset();
            //formulario.value="";
        }
        */
};

//BOTÃO SALVAR ENDEREÇO
const salvarEndereco = document.querySelector('#salvarEnderecoBtn')
// MODAL EXIBIR
const modalExibir = document.querySelector('#cadasdroEnderecoModal')

//ALERTAS CADASTRAR ENDEREÇO
const alertaEnd = document.querySelector("#alertaEndereco");
const tituloEnd = document.querySelector("#tituloEndereco");
const carregandoEnd = document.querySelector("#carregandoEndereco");

//BOTÃO VOLTAR CADASTRO ENDEREÇO
const voltarbtn = document.querySelector('#voltarBtn')
const voltarbtnX = document.querySelector('#voltarX')


$('#frmendereco').validate({
    rules: {
        cep:{
            postalcodeBR:true
        },
    },
    
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



async function lista_endereco() {
   // $('#dadosEnderecos').load("listaenderecos.php", {"id": id});
    
    /* const opt = {
        method: 'POST',
        mode: 'cors',
        cache: 'default'
    }

    const response = await fetch('listaenderecos.php', opt);



    const html = await response.text();


    document.getElementById('dadosEnderecos').innerHTML = html; */
    const id= document.querySelector("#idEndereco").value

    $.ajax({
        type: "post",
        url: "listaenderecos.php",
        data: {idEndere: id}, success: function (idEndere){
            $('#dadosEnderecos').html(idEndere)  
        }
       })
}

async function inserir_endereco() {
    const form = document.querySelector("#frmendereco");
    const formData = new FormData(form);

    const opt = {
        method: "POST",
        mode: 'cors',
        body: formData,
        cache: 'default'
    }
    const response = await fetch('cadastroendereco.php', opt);
    const dados = await response.text();
    console.log(dados);


    if (dados == 'true') {
        //CASO SEJA TRUE, EXIBIMOS A MENSAGEM DE SALVO COM SUCESSO,
        //E ALTERAMOS A COR DO COMPONENTE ALERT PARA SUCCESS
        alertaEnd.className = 'alert alert-success';
        tituloEnd.className = 'mb-0';
        tituloEnd.innerHTML = `<p>Cadastro realizado com sucesso!`;
        //OCULTA O ICONES CARREGANDO
        carregando.className = 'mb-0 d-none';
        
        lista_endereco()
        //aguardamos 0,5 seg para fechar o modal
        setTimeout(() => {
            //fecha o modal
            
            $("#cadasdroEnderecoModal input").val('');
            $("#alertaEndereco").removeClass('alert alert-success');
            $('#alertaEndereco').addClass('alert alert-warning');
            $("#tituloEndereco").removeClass('d-none');
            $("#tituloEndereco").addClass('mb-0');
            tituloEnd.innerHTML = `
            <h6 class="alert-heading">Atenção!</h6>
            Todos os campos com <span class="text-danger"> * </span> 
            são obrigatórios para o
            cadastro!`;
        }, 1000);
    } else {
        tituloEnd.className = `mb-0`;
        tituloEnd.innerHTML = `<p>${dados}</p>`;
    }

    

}

salvarEndereco.addEventListener('click', function () {
    const valida = $('#frmendereco').valid();
    if (valida == true) {

    setTimeout(() => {
        inserir_endereco();
        $("#cadasdroEnderecoModal").modal('hide');
        $("#cep").val('');
        $("#logradouro").val('');
        $("#bairro").val('');
        $("#uf").val('');
        $("#cidade").val('');
        $("#ibge").val('');
        $("#titulo").val('');
        $("#cadasdroEnderecoModal input").removeClass('is-valid')
        $("#cadasdroEnderecoModal input").removeClass('is-invalid')
        $("#exibirModal").modal('show')
    }, 500);

    }
});

 async function deletaEndereco(id) {
     document.getElementById('idEnderecoExibir').value = id;
     document.querySelector("#idEnd").value = 'delete';
    
    const form = document.querySelector('#frmenderecoexibir');
    dados = new FormData(form);
    const opt = {
        method: 'POST',
        body: dados,
        mode: 'cors',
        cache: 'default'
    };
    const response = await fetch('deleteEndereco.php', opt);
    const data = await response.text();
    if (data == 'true') {
        $('#trEndereco' + id).remove();
    }
    
       
   
} 

/*async function req(){
  const form = document.querySelector('#frmenderecoexibir');
    dados = new FormData(form);
    const opt = {
        method: 'POST',
        body: dados,
        mode: 'cors',
        cache: 'default'
    };
    const response = await fetch('listaenderecos.php', opt);
    const data = await response.text();
    console.log(data); 



}*/
 voltarbtn.addEventListener('click',()=>{
    $("#cadasdroEnderecoModal input").val('');
    $("#cadasdroEnderecoModal input").removeClass('is-valid')
    $("#cadasdroEnderecoModal input").removeClass('is-invalid')
    
 })

 voltarbtnX.addEventListener('click',()=>{
    $("#cadasdroEnderecoModal input").val('');
    $("#cadasdroEnderecoModal input").removeClass('is-valid')
    $("#cadasdroEnderecoModal input").removeClass('is-invalid')
    
 })