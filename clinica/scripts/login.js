window.onload = () => {
    const loginForm = document.querySelector('form');

    loginForm.addEventListener('submit', submit);
}


function submit(e) {
    e.preventDefault()
    const meuForm = document.querySelector("form")
    const formData = new FormData(meuForm)
    const options = {method: "POST", body: formData}
    console.log(options)
    fetch('/clinica/backend/api/login/login.php', options)
        .then(response => {
            const resultCard = document.getElementById('resultCard')
            if (response.ok) {
                window.location.replace("/clinica/index.php");
                showCard(true, resultCard, `Logado com sucesso!`)
            } else {
                response.json().then(error => {
                    showCard(false, resultCard, 'Erro de credenciais')
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