<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <script src="scripts/cadastro_endereco.js"></script>
    <title>Novo Endereço</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

</head>

<body>
<?php
include "../navbar.php";
?>

<main class="container p-3">
    <form method="POST">
        <h4 class="p-1">Cadastro de endereço</h4>
        <fieldset class="p-3">
            <div class="row g-3">
                <div class="col-sm-2">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" name="cep" class="form-control" id="cep">
                </div>

                <div class="col-sm-10">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder=" ">
                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" class="form-select" id="estado">
                        <option value="MG">Minas Gerais</option>
                        <option value="SP">Sao Paulo</option>
                    </select>
                </div>
                <div class="col-sm-9">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" name="cidade" class="form-control" id="cidade">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary submit-button">Cadastrar</button>
            </div>
        </fieldset>
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
