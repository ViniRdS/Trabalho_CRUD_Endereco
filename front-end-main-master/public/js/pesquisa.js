const pesquisar = document.getElementById('pesquisa')

async function lista_pesquisa() {
    
    const opt = {
        method: 'POST',
        mode: 'cors',
        cache: 'default'
    }
   
    const response = await fetch('pesquisa.php', opt);
    

    const html = await response.text();
   
    
    document.getElementById('dados').innerHTML = html;
}

async function inserir_pesquisa() {
    const form = document.querySelector("#pesquisar");
    const formData = new FormData(form);

    const opt = {
        method: "POST",
        mode: 'cors',
        body: formData,
        cache: 'default'
    }
    const response = await fetch('pesquisa.php', opt);
    const dados = await response.text();
    console.log(dados);



        
       lista_pesquisa()
    
}

pesquisar.addEventListener('keyup', function () {

    //inserir_pesquisa();
    
        var pesquisa = $("#pesquisa").val()
        $("#dados").load("pesquisa.php", {"pesquisa": pesquisa});
   
});
