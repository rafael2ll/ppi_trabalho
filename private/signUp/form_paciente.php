<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: /public/login.php');
    exit();
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="scripts/busca-endereco.js"></script>
    <script src="scripts/cadastra_paciente.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Cadastrar pacientes</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

</head>

<body>
<?php
include "../../navbar.php";
?>
<div class="container">

    <main class="container p-3">
        <div class="card m-2 hidden" id="resultCard"></div>
        <form method="POST" class="row g-3">
            <h4 class="p-1">Cadastro de Paciente</h4>
            <fieldset class="p-3">
                <div class="col-9">
                    <label for="nome" class="form-label">Nome completo</label>
                    <input type="text" name="nome" class="form-control" id="nome">
                </div>

                <div class="col-sm">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="sexo" class="form-select" id="sexo">
                        <option selected>Selecione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>

                <div class="row g-3">
                    <div class="col-sm-9">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>

                    <div class="col-sm-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control" id="telefone">
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-2">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" name="cep" class="form-control" id="cep">
                    </div>

                    <div class="col-sm-10">
                        <label for="rua" class="form-label">Endereço</label>
                        <input type="text" name="rua" class="form-control" id="rua"
                               placeholder="Avenida João Naves de Ávila">
                    </div>

                    <div class="col-sm-6">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" name="cidade" class="form-control" id="cidade">
                    </div>

                    <div class="col-sm">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" class="form-select" id="estado">
                            <option selected>Selecione</option>
                            <option value="MG">MG</option>
                            <option value="SP">SP</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <!--Paciente-->
            <h4 class="p-1 mt-3 mb-0">Informações Extras</h4>
            <fieldset class="p-3">
                <div class="row gx-2">
                    <div class="col-sm-3">
                        <label for="peso" class="form-label">Peso (kg)</label>
                        <input type="number" name="peso" class="form-control" id="peso" value="75.5">
                    </div>

                    <div class="col-sm-3">
                        <label for="altura" class="form-label">Altura (cm)</label>
                        <input type="number" name="altura" class="form-control" id="altura" value="170">
                    </div>

                    <div class="col-sm">
                        <label for="tsangue" class="form-label">Tipo Sanguineo</label>
                        <select name="tsangue" class="form-select" id="tsangue">
                            <option selected>Selecione</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                            <option value="naoSabe">Não sabe</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </main>
</div>

<!-- Opcional: Bootstrap Bundle com JavaScript e Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
        crossorigin="anonymous"></script>

<?php
include "../../footer.html";
?>

</body>
</html>