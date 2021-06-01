<?php
require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/utils.php";
require "../../model/Endereco.php";

$PAGE_SIZE = 20;
$pdo = dbConnection();

$endereco = new endereco(
    post_or_error('cep', 'CEP inválido'),
    post_or_error('endereco', 'Rua inválida'),
    post_or_error('cidade', 'Cidade inválida'),
    post_or_error('estado', 'Estado inválido'));

try {

    $sql = <<<SQL
        INSERT INTO base_endereco(cep, logradouro, cidade, estado) VALUES (:cep, :logradouro, :cidade, :estado);
    SQL;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($endereco->insertValues());
    http_response_code(200);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(array('erro' => $e->getMessage()));
}
