window.onload = () => {
    const pacienteForm = document.querySelector('form');

    pacienteForm.addEventListener('submit', submit);
}


function submit(e) {
    e.preventDefault()
    const meuForm = document.querySelector("form")
    const formData = new FormData(meuForm)
    const options = {method: "POST", body: formData}
    console.log(options)
    fetch('/backend/api/cadastro/cadastro_paciente.php', options)
        .then(response => {
            const resultCard = document.getElementById('resultCard')
            if (response.ok) {
                showCard(true, resultCard, `Novo(a) paciente(a) ${formData.get('nome')} adicionado(a) com sucesso!`)
                meuForm.reset()
            } else {
                response.json().then(error => {
                    showCard(false, resultCard, error.erro)
                })
            }
        })
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