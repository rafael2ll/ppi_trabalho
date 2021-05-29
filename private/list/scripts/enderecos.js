let page = 0;
let maxPages = 0;

window.onload = () => {
    loadPage();
}


function loadPage() {
    validateCanNavigate(page, maxPages)
    const url = `/backend/api/endereco/get_enderecos.php?page=${page}`
    fetch(url)
        .then(response => {
            if (response.ok)
                return response.json()
            else new Error(response.status.toString())
        })
        .then(enderecoPage => {
            maxPages = enderecoPage.maxPages
            validateCanNavigate(page, maxPages)
            showPage(enderecoPage.results)
        })
}

function showPage(enderecoList) {
    const content = document.getElementById('content')
    content.innerHTML = ''
    enderecoList.forEach(agenda => {
        const tr = document.createElement('tr');
        appendColumn(tr, agenda.cep)
        appendColumn(tr, agenda.logradouro)
        appendColumn(tr, agenda.cidade)
        appendColumn(tr, agenda.estado)
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