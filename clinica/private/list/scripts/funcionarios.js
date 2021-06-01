let page = 0;
let maxPages = 0;

window.onload = () => {
    loadPage();
}


function loadPage() {
    validateCanNavigate(page, maxPages)
    const url = `/clinica/backend/api/funcionario/get_funcionario.php?page=${page}`
    fetch(url)
        .then(response => {
            if (response.ok)
                return response.json()
            else new Error(response.status.toString())
        })
        .then(funcionarioPage => {
            maxPages = funcionarioPage.maxPages
            validateCanNavigate(page, maxPages)
            showPage(funcionarioPage.results)
        })
}

function showPage(funcionarioList) {
    const content = document.getElementById('content')
    content.innerHTML = ''
    funcionarioList.forEach(funcionarios => {
        const tr = document.createElement('tr');
        appendColumn(tr, funcionarios.nome)
        appendColumn(tr, funcionarios.sexo)
        appendColumn(tr, funcionarios.email)
        appendColumn(tr, funcionarios.telefone)
        appendColumn(tr, funcionarios.cep)
        appendColumn(tr, funcionarios.endereco)
        appendColumn(tr, funcionarios.cidade)
        appendColumn(tr, funcionarios.estado)
        appendColumn(tr, funcionarios.data_contrato)
        appendColumn(tr, funcionarios.salario)
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