<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";
require "../../model/Endereco.php";

$PAGE_SIZE = 20;
$pdo = dbConnection();

$endereco = new endereco(
    null,
    post_or_error('cep', 'CEP inválido'),
    post_or_error('rua', 'Rua inválida'),
    post_or_error('estado', 'Estado inválido'),
    post_or_error('cidade', 'Cidade inválida'),

try {

    $sql = <<<SQL
        INSERT INTO base_endereco(cep, rua, cidade, estado) VALUES (:cep, :rua, :cidade, :estado);
    SQL;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($endereco->insertValues());
    http_response_code(200);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(array('erro' => $e->getMessage()));
}