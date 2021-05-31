let page = 0;
let maxPages = 0;

window.onload = () => {
    loadPage();
}


function loadPage() {
    validateCanNavigate(page, maxPages)
    const url = `/backend/api/paciente/get_paciente.php?page=${page}`
    fetch(url)
        .then(response => {
            if (response.ok)
                return response.json()
            else new Error(response.status.toString())
        })
        .then(pacientePage => {
            maxPages = pacientePage.maxPages
            validateCanNavigate(page, maxPages)
            showPage(pacientePage.results)
        })
}

function showPage(pacienteList) {
    const content = document.getElementById('content')
    content.innerHTML = ''
    pacienteList.forEach(pacientes => {
        const tr = document.createElement('tr');
        appendColumn(tr, pacientes.nome)
        appendColumn(tr, pacientes.sexo)
        appendColumn(tr, pacientes.email)
        appendColumn(tr, pacientes.telefone)
        appendColumn(tr, pacientes.cep)
        appendColumn(tr, pacientes.logradouro)
        appendColumn(tr, pacientes.cidade)
        appendColumn(tr, pacientes.estado)
        appendColumn(tr, pacientes.peso)
        appendColumn(tr, pacientes.altura)
        appendColumn(tr, pacientes.tipo_sanguineo)
        content.appendChild(tr)
    })
}

function loadNextPage() {
    if (page === maxPages - 1) return
    page++;
    loadPage(page);
}

function loadPreviousPage() {
    if (page === 0) return
    page--;
    loadPage(page);
}

function appendColumn(tr, value) {
    const td = document.createElement('td')
    td.textContent = value;
    tr.appendChild(td);
}

function validateCanNavigate(page, maxPages) {
    const forwardPage = document.getElementById('nextPage')
    const previousPage = document.getElementById('previousPage')
    if (page === 0) {
        previousPage.classList.add('disabled')
    } else {
        previousPage.classList.remove('disabled')
    }
    if (page >= maxPages - 1) {
        forwardPage.classList.add('disabled')
    } else {
        forwardPage.classList.remove('disabled')
    }
}