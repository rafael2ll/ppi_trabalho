window.onload = () => {
    const agendaForm = document.querySelector('form');
    const medicalSpecialtySelect = document.getElementById('medicalSpecialtySelect')
    const doctorSelect = document.getElementById('doctorSelect')
    const dateSelect = document.getElementById('date')

    agendaForm.addEventListener('submit', submit);
    loadEspecialidades(medicalSpecialtySelect)
    medicalSpecialtySelect.addEventListener('change', () => {
        loadMedicos(medicalSpecialtySelect.value.toString().toLowerCase())
    })
    dateSelect.addEventListener('change', () => {
        loadHorarios(dateSelect.value, doctorSelect.value)
    })
    doctorSelect.addEventListener('change', () => {
        loadHorarios(dateSelect.value, doctorSelect.value)
    })
}

function loadEspecialidades(medicalSpecialtySelect) {
    fetch('/backend/api/medico/get_especialidades.php')
        .then(response => {
            if (response.ok)
                return response.json()
            else new Error(response.status.toString())
        }).then(specialtyList => {
        specialtyList.forEach(s => {
            const el = document.createElement("option")
            el.textContent = s
            el.value = s
            medicalSpecialtySelect.appendChild(el)
        })
        loadMedicos(specialtyList[0])
    })
        .catch(error => console.error('Falha inesperada: ' + error))
}

function loadMedicos(especialidade) {
    const doctorSelect = document.getElementById('doctorSelect')
    const dateSelect = document.getElementById('date')

    doctorSelect.innerHTML = ''
    fetch(`/clinica/backend/api/medico/get_medicos.php?especialidade=${especialidade}`)
        .then(response => {
            if (response.ok)
                return response.json()
            else new Error(response.status.toString())
        })
        .then(medicoList => {
            medicoList.forEach(med => {
                const el = document.createElement("option")
                el.textContent = med.nome
                el.value = med.codigo
                doctorSelect.appendChild(el)
            })
            loadHorarios(dateSelect.value, medicoList[0].codigo)
        })
}

function loadHorarios(data, doctorId) {
    const horarioSelect = document.getElementById('hourSelect')
    horarioSelect.innerHTML = ''
    fetch(`/clinica/backend/api/consulta/get_horario_livre.php?med_id=${doctorId}&data=${data}`)
        .then(response => {
            if (response.ok)
                return response.json()
            else new Error(response.status.toString())
        })
        .then(horarioList => {
            horarioList.forEach(hora => {
                const el = document.createElement("option")
                el.textContent = hora
                el.value = hora
                horarioSelect.appendChild(el)
            })
        })
}

function submit(e) {
    e.preventDefault()
    const meuForm = document.querySelector("form")
    const formData = new FormData(meuForm)
    const options = {method: "POST", body: formData}
    console.log(options)
    fetch('/clinica/backend/api/consulta/criar_consulta.php', options)
        .then(response => {
            const resultCard = document.getElementById('resultCard')
            if (response.ok) {
                showCard(true, resultCard, `Consulta no dia ${formData.get('data')} às ${formData.get('horario')} criada com sucesso!`)
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