<?php
require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/utils.php";
require "../../model/Funcionario.php";
require "../../model/PageResponse.php";

$pdo = dbConnection();
$PAGE_SIZE = 20;
$page = get_or_default("page", 0);
$offset = $PAGE_SIZE * $page;

try {
    $countSql = <<<SQL
        SELECT count(*) as count FROM funcionario;
    SQL;

    $sql = <<<SQL
        SELECT * FROM funcionario 
            natural join  pessoa
            LIMIT ? OFFSET  ?;
    SQL;
    $stmt = $pdo->prepare($sql);
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $PAGE_SIZE);
    $stmt->bindParam(2, $offset);
    $stmt->execute();
    $countStmt = $pdo->query($countSql);
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$funcionarios = array();
$rows = $stmt->fetchAll();
foreach ($rows as $row) {
    $funcionario = Funcionario::fromRow($row);
    array_push($funcionarios, $funcionario);
}

$count = $countStmt->fetch();
$response = new PageResponse($count['count'], $funcionarios, count($funcionarios));
echo json_encode_not_null($response);
