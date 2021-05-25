window.onload = () => {
    loadEspecialidades();
}

function loadEspecialidades() {
    const medicalSpecialtySelect = document.querySelector('[name="medicalSpecialty"]')
    fetch('/backend/api/medico/get_especialidades.php')
        .then(response => {
            if (response.ok)
                return response.json()
            else new Error(response.status.toString())
        }).then(specialtyList =>
        specialtyList.forEach(s => {
            const el = document.createElement("option");
            el.textContent = s;
            el.value = s;
            medicalSpecialtySelect.appendChild(el);
        })
    )
        .catch(error => console.error('Falha inesperada: ' + error))
}