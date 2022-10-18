const salvar = document.querySelector("#btnsalvar");

async function adicionar() {
    const form = document.querySelector("#frmfornecedor");
    const formdata = new FormData(form);
    var opt = {
        method: 'POST',
        body: formdata,
        mode: 'cors',
        cache: 'default'
    };
    const response = await send('cadastrofornecedor.php', opt);
    const data = await response.json();
    console.log(data);
}
salvar.addEventListener('click', function () {
    adicionar();
});

