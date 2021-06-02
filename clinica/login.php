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
    <script src="scripts/login.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Clinica X - Login</title>

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
    <form method="POST" class="row g-3 mini-center-horizontal">
        <h4 class="p-1 mb-0">Login - Funcionarios</h4>
        <fieldset class="p-3 m-0">
            <!-- E-mail e senha -->
            <div class="col-sm-12">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="col-sm-12">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha">
            </div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary login-button">Entrar</button>
            </div>
        </fieldset>
    </form>
</main>

<!-- Opcional: Bootstrap Bundle com JavaScript e Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
        crossorigin="anonymous"></script>

<?php
include "footer.html";
?>

</body>

</html>