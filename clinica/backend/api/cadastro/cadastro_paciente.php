<?php
if(session_id() == ''){
    session_start();
}
if (!isset($_SESSION['id'])) {
    http_response_code(401);
    exit();
}

require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/utils.php";
require "../../model/Paciente.php";

$PAGE_SIZE = 20;
$pdo = dbConnection();

$pessoa = new Pessoa(
    null,
    post_or_error('nome', 'Nome inválida'),
    post_or_error('sexo', 'Sexo inválido'),
    post_or_error('email', 'Email inválido'),
    post_or_error('telefone', 'telefone inválido'),
    post_or_error('cep', 'CEP inválido'),
    post_or_error('rua', 'Rua inválida'),
    post_or_error('cidade', 'Cidade inválido'),
    post_or_error('estado', 'Estado inválido'));

try {

    $pdo->beginTransaction();

    $sql1 = <<<SQL
  INSERT INTO pessoa (nome, sexo, email, telefone, cep,
                       endereco, cidade, estado)
  VALUES (:nome, :sexo, :email, :telefone, :cep,:endereco, :cidade, :estado)
  SQL;
    $stmt = $pdo->prepare($sql1);
    if (! $stmt->execute($pessoa->insertValues()))
    throw new Exception("Falha no cadastro de pessoa");


    $idNovaPessoa = $pdo->lastInsertId();

    if (isset($_POST["peso"])) $peso = $_POST["peso"];
    if (isset($_POST["altura"])) $altura = $_POST["altura"];
    if (isset($_POST["tsangue"])) $tsangue = $_POST["tsangue"];

    $peso = htmlspecialchars($peso);
    $altura = htmlspecialchars($altura);
    $tsangue = htmlspecialchars($tsangue);



  $sql2 = <<<SQL
  INSERT INTO paciente (codigo, peso, altura, tipo_sanguineo)
  VALUES (?, ?, ?, ?)
  SQL;

  $stmt = $pdo->prepare($sql2);
  if (! $stmt->execute([$idNovaPessoa, $peso, $altura, $tsangue]))
  throw new Exception("Falha no cadastro de funcionario");

  $pdo->commit();

  exit();
}

catch (Exception $e) {
    $pdo->rollBack();
    //error_log($e->getMessage(), 3, 'log.php');
    if ($e->errorInfo[1] === 1062)
        exit('Dados duplicados: ' . $e->getMessage());
    else
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
