//INPUT ENDEREÇO
const Fcep = document.querySelector('#cep');
const Flogradouro = document.querySelector('#logradouro');
const Fbairro = document.querySelector('#bairro');
const Fcidade = document.querySelector('#cidade');
const Fuf = document.querySelector('#uf');
const Fibge = document.querySelector('#ibge');
const Ftitulo = document.querySelector('#titulo');
const formend = document.querySelector('#frmend')

//Aceitar apenas números no input
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
    //Conferir se o tamanho está correto
    if(valorCEP.length===8){
        GETCPF(valorCEP);
    }

});
    //Pegar os dados da API
    const GETCPF= async(cep)=>{
    const UrlAPI=`https://viacep.com.br/ws/${cep}/json/`
    const respostaAPI=await fetch(UrlAPI);
    const dados = await respostaAPI.json();

    //dados da api nos inputs
    if((Fcep.value!=="")&&(Fcep.length=8)&&(dados.erro !== true)){
        console.log('colocar dados');
        Flogradouro.value=dados.logradouro;
        Fbairro.value=dados.bairro;
        Fcidade.value=dados.localidade;
        Fuf.value=dados.uf;
        Fibge.value=dados.ibge;

    }

    //caso de erros
    if (dados.erro === true) {
        //formulario.reset();
        //Mudar quando tiver um formulario de endereços
        Flogradouro.value="";
        Fbairro.value="";
        Fcidade.value="";
        Fuf.value="";
        Fibge.value="";
        //Depois colocar um aviso de cep inválido
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
