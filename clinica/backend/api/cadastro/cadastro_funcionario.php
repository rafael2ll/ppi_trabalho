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
require "../../model/Medico.php";

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
    post_or_error('estado', 'Estado inválido')
);
try {

    if (isset($_POST["data_contrato"])) $data_contrato = $_POST["data_contrato"];
    if (isset($_POST["salario"])) $salario = $_POST["salario"];
    if (isset($_POST["senha"])) $senha = $_POST["senha"];
    if (isset($_POST["crm"])) $crm = $_POST["crm"];
    if (isset($_POST["esp"])) $esp = $_POST["esp"];

    $senha = htmlspecialchars($senha);
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $salario = htmlspecialchars($salario);
    $data_contrato = htmlspecialchars($data_contrato);
    $crm = htmlspecialchars($crm);
    $esp = htmlspecialchars($esp);

    $pdo->beginTransaction();

    $sql1 = <<<SQL
  INSERT INTO pessoa (nome, sexo, email, telefone, cep,
                       endereco, cidade, estado)
  VALUES (:nome, :sexo, :email, :telefone, :cep,:endereco, :cidade, :estado)
  SQL;

    $stmt = $pdo->prepare($sql1);
    if (!$stmt->execute($pessoa->insertValues()))
    throw new Exception("Falha no cadastro de pessoa");


    $idNovaPessoa = $pdo->lastInsertId();

    $sql2 = <<<SQL
  INSERT INTO funcionario (codigo, data_contrato, salario, senha_hash)
  VALUES (?, ?, ?, ?)
  SQL;

    $stmt = $pdo->prepare($sql2);
    if (!$stmt->execute([$idNovaPessoa, $data_contrato, $salario, $senha]))
        throw new Exception("Falha no cadastro de funcionario");

    if ($esp != "" and $crm != "") {

        $sql3 = <<<SQL
    INSERT INTO medico (codigo, especialidade, crm)
    VALUES (?, ?, ?)
    SQL;

        $stmt = $pdo->prepare($sql3);
        if (!$stmt->execute([$idNovaPessoa, $esp, $crm]))
            throw new Exception("Falha no cadastro de medico");
    }

    $pdo->commit();

    exit();
} catch (Exception $e) {
    $pdo->rollBack();
    //error_log($e->getMessage(), 3, 'log.php');
    if ($e->errorInfo[1] === 1062) {
        http_response_code(409);
        exit('Dados duplicados: ' . $e->getMessage());
    }
    else {
        http_response_code(500);
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
}
