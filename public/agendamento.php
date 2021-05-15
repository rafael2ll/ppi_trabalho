<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <title>Nova Consulta</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

</head>

<body>
<?php
include "navbar.html";
?>
<main class="container p-3">
    <form action="php/agenda_consulta.php" method="POST">
        <h4 class="p-1 mb-0">Cadastro da Consulta</h4>
        <fieldset class="p-3">
            <div class="col-sm-12">
                <label for="medicalSpecialty" class="form-label">Especialidade Médica</label>
                <select name="medicalSpecialty" class="form-select" id="medicalSpecialty">
                    <option selected>Selecione</option>
                </select>
            </div>
            <div class="col-sm-12">
                <label for="doctor" class="form-label">Médico</label>
                <select name="doctor" class="form-select" id="doctor">
                    <option selected>Selecione</option>
                </select>
            </div>
            <div class="row g-3">
                <div class="col-sm-9">
                    <label for="date" class="form-label">Data</label>
                    <input type="date" name="date" class="form-control" id="date">
                </div>
                <div class="col-sm-3">
                    <label for="hour" class="form-label">Horário</label>
                    <select name="hour" class="form-select" id="hour">
                        <option selected>Selecione</option>
                        <option value="Minas Gerais">8h</option>
                        <option value="Sao Paulo">9h</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <h4 class="p-1 mt-3 mb-0">Informações do Paciente</h4>
        <fieldset class="p-3">
            <div class="row gx-2">
                <div class="col-sm-9">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="col-sm-3">
                    <label for="gender" class="form-label">Sexo</label>
                    <select name="gender" class="form-select" id="gender">
                        <option value="M" selected>Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
        </fieldset>
        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-primary submit-button">Agendar Consulta</button>
        </div>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
        crossorigin="anonymous"></script>
<?php
include "../footer.html";
?>
</body>

</html>
