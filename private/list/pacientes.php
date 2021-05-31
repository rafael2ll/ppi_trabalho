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
    <link rel="stylesheet" href="../../css/style.css">
    <title>Listagem de Funcionarios</title>

    <script src="./scripts/pacientes.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

</head>

<body>
<?php
include "../../navbar.php";
?>
<main class="container p-3">
    <h4 class="p-1 mb-0">Pacientes</h4>
    <div class="table-scrollbar table-wrapper-scroll-y mb-4">
        <table id="table" class="table table-striped table-hover mb-0">
            <thead>
            <tr id="headers">
                <th scope="col">Nome</th>
                <th scope="col">Sexo</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">CEP</th>
                <th scope="col">Logradouro</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Peso</th>
                <th scope="col">Altura</th>
                <th scope="col">Tipo Sanguineo</th>
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


<?php
//
//session_start();
//if (!isset($_SESSION['id'])) {
//    header('Location: /public/login.php');
//    exit();
//}
//
//require "conexaoMysql.php";
//$pdo = mysqlConnect();
//
//try {
//
//    $sql = <<<SQL
//  SELECT pessoa.codigo, paciente.altura, paciente.peso, paciente.tipo_sanguineo, pessoa.nome, pessoa.sexo, pessoa.email, pessoa.telefone, pessoa.cep, pessoa.endereco, pessoa.cidade, pessoa.estado
//  FROM pessoa
//  INNER JOIN paciente ON pessoa.codigo = paciente.codigo
//  SQL;
//
//    $stmt = $pdo->query($sql);
//} catch (Exception $e) {
//    exit('Ocorreu uma falha: ' . $e->getMessage());
//}
//?>
<!--<!doctype html>-->
<!--<html lang="pt-BR">-->
<!---->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <title>Tabelas</title>-->
<!---->
<!--    <!-- Bootstrap CSS -->-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"-->
<!--          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">-->
<!---->
<!--    <style>-->
<!--        body {-->
<!--            padding-top: 2rem;-->
<!--        }-->
<!---->
<!--        img {-->
<!--            width: 15px;-->
<!--            height: 15px;-->
<!--        }-->
<!---->
<!--    </style>-->
<!--</head>-->
<!---->
<!--<body>-->
<!---->
<?php
//include "../../navbar.php";
//?>
<!---->
<!--<div class="container">-->
<!--    <h3>Pacientes Cadastrados</h3>-->
<!--    <table class="table table-striped table-hover">-->
<!--        <tr>-->
<!--            <th></th>-->
<!--            <th>Codigo</th>-->
<!--            <th>Nome</th>-->
<!--            <th>Sexo</th>-->
<!--            <th>Email</th>-->
<!--            <th>Telefone</th>-->
<!--            <th>CEP</th>-->
<!--            <th>Logradouro</th>-->
<!--            <th>Cidade</th>-->
<!--            <th>Estado</th>-->
<!--            <th>Peso</th>-->
<!--            <th>Altura</th>-->
<!--            <th>Tipo Sanguineo</th>-->
<!--        </tr>-->
<!---->
<!--        --><?php
//        while ($row = $stmt->fetch()) {
//            $codigo = htmlspecialchars($row['codigo']);
//            $nome = htmlspecialchars($row['nome']);
//            $sexo = htmlspecialchars($row['sexo']);
//            $email = htmlspecialchars($row['email']);
//            $telefone = htmlspecialchars($row['telefone']);
//            $cep = htmlspecialchars($row['cep']);
//            $endereco = htmlspecialchars($row['endereco']);
//            $cidade = htmlspecialchars($row['cidade']);
//            $estado = htmlspecialchars($row['estado']);
//
//            $peso = htmlspecialchars($row['peso']);
//            $altura = htmlspecialchars($row['altura']);
//            $tipoSanguineo = htmlspecialchars($row['tipoSanguineo']);
//
//            echo <<<HTML
//          <tr>
//            <td><a href="Ex01-exclui-cliente.php?id_pessoa=$id_pessoa">
//              <img src="../../images/delete.png"></a>
//            </td>
//            <td>$codigo</td>
//            <td>$nome</td>
//            <td>$sexo</td>
//            <td>$email</td>
//            <td>$telefone</td>
//            <td>$cep</td>
//            <td>$endereco</td>
//            <td>$cidade</td>
//            <td>$estado</td>
//            <td>$peso</td>
//            <td>$altura</td>
//            <td>$tipoSanguineo</td>
//          </tr>
//        HTML;
//        }
//        ?>
<!--</div>-->
<!---->
<?php
//include "../../footer.html";
//?>
<!---->
<!--</body>-->
<!---->
<!--</html>-->