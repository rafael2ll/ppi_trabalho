<?php
if (session_id() == '') {
    session_start();
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Nova Consulta</title>
    <script src="scripts/agendamento.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

</head>

<body>
<?php
include "navbar.php";
?>
<main class="container p-3">
    <div class="card m-2 hidden" id="resultCard"></div>
    <form method="post">
        <h4 class="p-1">Cadastro da Consulta</h4>
        <fieldset class="p-3">
            <div class="col-sm-12">
                <label for="medicalSpecialtySelect" class="form-label">Especialidade Médica</label>
                <select class="form-select" id="medicalSpecialtySelect">
                </select>
            </div>
            <div class="col-sm-12">
                <label for="doctorSelect" class="form-label">Médico</label>
                <select name="codigo_medico" class="form-select" id="doctorSelect">
                </select>
            </div>
            <div class="row g-3">
                <div class="col-sm-9">
                    <label for="date" class="form-label">Data</label>
                    <input type="date" value="<?php echo date('Y-m-d'); ?>" name="data" class="form-control" id="date">
                </div>
                <div class="col-sm-3">
                    <label for="hourSelect" class="form-label">Horário</label>
                    <select name="horario" class="form-select" id="hourSelect"></select>
                </div>
            </div>
        </fieldset>
        <h4 class="p-1 mt-3 mb-0">Informações do Paciente</h4>
        <fieldset class="p-3">
            <div class="row gx-2">
                <div class="col-sm-9">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="name">
                </div>
                <div class="col-sm-3">
                    <label for="gender" class="form-label">Sexo</label>
                    <select name="sexo" class="form-select" id="gender">
                        <option value="M" selected>Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary submit-button">Agendar Consulta</button>
            </div>
        </fieldset>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
        crossorigin="anonymous"></script>
<br>
<?php
include "footer.html";
?>
</body>

</html>
