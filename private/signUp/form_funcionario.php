<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Cadastra funcionarios</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">


</head>
<body>
<?php
include "../../navbar.php";
?>

  <div class="container">

    <main>
      <form action="cadastra_funcionario.php" method="POST" class="row g-3">

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

        <div class="col-sm-9">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" name="email" class="form-control" id="email">
        </div>

        <div class="col-sm-3">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="text" name="telefone" class="form-control" id="telefone">
        </div>

        <div class="col-sm-2">
          <label for="cep" class="form-label">CEP</label>
          <input type="text" name="cep" class="form-control" id="cep">
        </div>

        <div class="col-sm-10">
          <label for="endereco" class="form-label">Endereço</label>
          <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Avenida João Naves de Ávila">
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

        <!--Funcionario-->
        <div class="row g-3">
          <div class="col-sm-3">
            <label for="data_contrato" class="form-label">Data de inicio de contrato</label>
            <input type="date" name="data_contrato" class="form-control" id="data_contrato">
          </div>

          <div class="col-sm-3">
            <label for="salario" class="form-label">Salario</label>
            <input type="number" name="salario" class="form-control" id="salario">
          </div>

          <div class="col-sm-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="text" name="senha" class="form-control" id="senha">
          </div>
        </div>

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