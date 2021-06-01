window.onload = () => {
    console.log('ola')
    const funcionarioForm = document.querySelector('form');
    const enderecoForm = document.querySelector('form');
    const inputCep = document.getElementById('cep')

    inputCep.onkeyup = () => buscaEndereco(inputCep.value);
    funcionarioForm.addEventListener('submit', submit);
}


function submit(e) {
    e.preventDefault()
    const meuForm = document.querySelector("form")
    const formData = new FormData(meuForm)
    const options = {method: "POST", body: formData}
    console.log(options)
    fetch('/clinica/backend/api/cadastro/cadastro_funcionario.php', options)
        .then(response => {
            const resultCard = document.getElementById('resultCard')
            if (response.ok) {
                showCard(true, resultCard, `Novo(a) funcionario(a) ${formData.get('nome')} adicionado(a) com sucesso!`)
                meuForm.reset()
            } else {
                response.json().then(error => {
                    showCard(false, resultCard, error.erro)
                })
            }
        })
}

function buscaEndereco(cep) {

    if (cep.length !== 8) return;
    let form = document.querySelector("form");

    fetch("/clinica/backend/api/endereco/busca-endereco.php?cep=" + cep)
        .then(response => {
            if (!response.ok) {
                throw new Error(response.status);
            }
            return response.json();
        })
        .then(endereco => {
            form.rua.value = endereco.logradouro;
            form.estado.value = endereco.estado;
            form.cidade.value = endereco.cidade;
        })
        .catch(error => {

            console.error('Falha inesperada: ' + error);
        });
}

function showCard(isSuccess, parent, text) {
    parent.classList.add('shown')
    const card = document.createElement('div')
    card.classList.add('card-body')
    if (isSuccess)
        card.classList.add('alert-success')
    else
        card.classList.add('alert-danger')

    card.textContent = text
    parent.innerHTML = ''
    parent.appendChild(card)
}