<?php
if(session_id() == ''){
    session_start();
}
if (!isset($_SESSION['id'])) {
    header('Location: /clinica/login.php');
    exit();
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Listagem de Endereços</title>

    <script src="scripts/enderecos.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

</head>

<body>
<?php
include "../../navbar.php";
?>
<main class="container p-3">
    <h4 class="p-1 mb-0">Endereços</h4>
    <div class="table-scrollbar table-wrapper-scroll-y mb-4">
        <table id="table" class="table table-striped table-hover mb-0">
            <thead>
            <tr id="headers">
                <th scope="col">CEP</th>
                <th scope="col">Logradouro</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
            </tr>
            </thead>
            <tbody id="content">
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li id="previousPage" class="page-item">
                <a class="page-link" onclick="loadPreviousPage();">Anterior</a>
            </li>
            <li id="nextPage" class="page-item">
                <a class="page-link" onclick="loadNextPage();">Próxima</a>
            </li>
        </ul>
    </nav>
</main>
<?php
include "../../footer.html";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
