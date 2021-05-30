<?php

require "../../backend/utils/dbConnection.php";
$pdo = dbConnection();

$codigo = $nome = $sexo = $email = $telefone = $cep = $endereco = $cidade = $estado = "";
$datanascimento = $estadocivil = $altura = "";

if (isset($_POST["nome"])) $nome = $_POST["nome"];
if (isset($_POST["sexo"])) $sexo = $_POST["sexo"];
if (isset($_POST["email"])) $email = $_POST["email"];
if (isset($_POST["telefone"])) $telefone = $_POST["telefone"];
if (isset($_POST["cep"])) $cep = $_POST["cep"];
if (isset($_POST["endereco"])) $endereco = $_POST["endereco"];
if (isset($_POST["cidade"])) $cidade = $_POST["cidade"];
if (isset($_POST["estado"])) $estado = $_POST["estado"];

if (isset($_POST["salario"])) $salario = $_POST["salario"];
if (isset($_POST["data_contrato"])) $data_contrato = $_POST["data_contrato"];
if (isset($_POST["senha"])) $senha_hash = $_POST["senha"];

$senha_hash = password_hash($senha_hash, PASSWORD_DEFAULT);

$nome = htmlspecialchars($nome);
$sexo = htmlspecialchars($sexo);
$email = htmlspecialchars($email);
$telefone = htmlspecialchars($telefone);
$cep = htmlspecialchars($cep);
$endereco = htmlspecialchars($endereco);
$cidade = htmlspecialchars($cidade);
$estado = htmlspecialchars($estado);

$peso = htmlspecialchars($peso);
$altura = htmlspecialchars($altura);
$tsangue = htmlspecialchars($tsangue);

try {

    $pdo->beginTransaction();

    $sql1 = <<<SQL
  -- Repare que a coluna Id foi omitida por ser auto_increment
  INSERT INTO pessoa (nome, sexo, email, telefone, cep,
                       endereco, cidade, estado)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

    $stmt = $pdo->prepare($sql1);
    if (!$stmt->execute([
        $nome, $sexo, $email, $telefone,
        $cep, $endereco, $cidade, $estado]))
        throw new Exception("Falha no cadastro de pessoa");


    $idNovaPessoa = $pdo->lastInsertId();

    $sql2 = <<<SQL
  -- Repare que a coluna Id foi omitida por ser auto_increment
  INSERT INTO funcionario (codigo, data_contrato, salario, senha_hash)
  VALUES (?, ?, ?, ?, ?)
  SQL;

    $stmt = $pdo->prepare($sql2);
    if (!$stmt->execute([$idNovaPessoa, $data_contrato, $salario, $senha_hash]))
        throw new Exception("Falha no cadastro do funcionario");

    $pdo->commit();

    header("location: index.php");
    exit();
} catch (Exception $e) {
    $pdo->rollBack();
    //error_log($e->getMessage(), 3, 'log.php');
    if ($e->errorInfo[1] === 1062)
        exit('Dados duplicados: ' . $e->getMessage());
    else
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
