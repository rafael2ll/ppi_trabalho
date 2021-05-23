<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT pessoa.codigo, funcionario.data_contrato, funcionario.salario, pessoa.nome, pessoa.sexo, pessoa.email, pessoa.telefone, pessoa.cep, pessoa.endereco, pessoa.cidade, pessoa.estado
  FROM pessoa
  INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
  SQL;

  $stmt = $pdo->query($sql);
} catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabelas</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

  <style>
    body {
      padding-top: 2rem;
    }

    img {
      width: 15px;
      height: 15px;
    }

  </style>
</head>

<body>

  <?php
  include "../navbar.html";
  ?>

  <div class="container">
    <h3>Pacientes Cadastrados</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th></th>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>CEP</th>
        <th>Logradouro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Peso</th>
        <th>Altura</th>
        <th>Tipo Sanguineo</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        // Limpa os dados produzidos pelo usuário
        // com possibilidade de ataque XSS
        $codigo = htmlspecialchars($row['codigo']);
        $nome = htmlspecialchars($row['nome']);
        $sexo = htmlspecialchars($row['sexo']);
        $email = htmlspecialchars($row['email']);
        $telefone = htmlspecialchars($row['telefone']);
        $cep = htmlspecialchars($row['cep']);
        $endereco = htmlspecialchars($row['endereco']);
        $cidade = htmlspecialchars($row['cidade']);
        $estado = htmlspecialchars($row['estado']);

        $salario = htmlspecialchars($row['salario']);
        $data_contrato = htmlspecialchars($row['data_contrato']);

        echo <<<HTML
          <tr>
            <td><a href="Ex01-exclui-cliente.php?id_pessoa=$id_pessoa">
              <img src="../../images/delete.png"></a>
            </td>
            <td>$codigo</td>
            <td>$nome</td>
            <td>$sexo</td>
            <td>$email</td>
            <td>$telefone</td>
            <td>$cep</td>
            <td>$endereco</td>
            <td>$cidade</td>
            <td>$estado</td>
            <td>$salario</td>
            <td>$data_contrato</td>
          </tr>
        HTML;
      }
      ?>
  </div>

    <?php
    include "../../footer.html";
    ?>

</body>

</html>