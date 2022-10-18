const base_url =
    "https://viacep.com.br/ws/:cep/json/";

const pesquisar = document.querySelector("#pesquisa");
const cep = document.querySelector("#cep");
const dados_endereco = document.querySelector("#dados_endereco");
pesquisar.addEventListener('click', function () {
    var url = base_url.replace(':cep', cep.value);
    dados_endereco.innerHTML = 
    "O cep digitado é = "+
    cep.value+
    " o link onde acontecerá a requisição é = "+
    url;
});