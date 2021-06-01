let page = 0;
let maxPages = 0;
let isMe = false;

window.onload = () => {
    setOnlyMine()
    loadPage();
}

function setOnlyMine() {
    isMe = true;
}

function loadPage() {
    validateCanNavigate(page, maxPages)
    const url = `/clinica/backend/api/agenda/get_meus_agendamentos.php?page=${page}`
    fetch(url)
        .then(response => {
            if (response.ok)
                return response.json()
            else new Error(response.status.toString())
        })
        .then(agendaPage => {
            maxPages = agendaPage.maxPages
            validateCanNavigate(page, maxPages)
            showPage(agendaPage.results)
        })
}

function showPage(agendaList) {
    const content = document.getElementById('content')
    content.innerHTML = ''
    agendaList.forEach(agenda => {
        const tr = document.createElement('tr');
        appendColumn(tr, agenda.data_agenda)
        appendColumn(tr, agenda.horario)
        appendColumn(tr, agenda.nome)
        appendColumn(tr, agenda.sexo)
        appendColumn(tr, agenda.email)
        if (!isMe)
            appendColumn(tr, agenda.medico.nome)
        appendColumn(tr, agenda.medico.especialidade)
        content.appendChild(tr)
    })
}

function loadNextPage() {
    if (page === maxPages - 1) return;
    page++;
    loadPage(page);
}

function loadPreviousPage() {
    if (page === 0) return;
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