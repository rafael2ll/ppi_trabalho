<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";
require "../../model/Endereco.php";
$pdo = dbConnection();
$PAGE_SIZE = 20;
$page = get_or_default("page", 0);
$offset = $PAGE_SIZE * $page;

try {

    $sql = <<<SQL
        SELECT * FROM endereco 
            LIMIT ? OFFSET  ?;
    SQL;
    $stmt = $pdo->prepare($sql);
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $PAGE_SIZE);
    $stmt->bindParam(2, $offset);
    $stmt->execute();
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$enderecos = array();
$rows = $stmt->fetchAll();
foreach ($rows as $row) {
    $endereco = Endereco::fromRow($row);
    array_push($enderecos, $endereco);
}

echo json_encode_not_null(array_values($enderecos));
