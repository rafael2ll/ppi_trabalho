<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";
require "../../model/Medico.php";
$pdo = dbConnection();

$especialidade = get_or_default("especialidade", null);
try {

    $sql = <<<SQL
        SELECT * from medico
        natural join funcionario
        natural join  pessoa
        where especialidade = ?;
    SQL;
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$especialidade]);
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$medicos = array();
$rows = $stmt->fetchAll();
foreach ($rows as $row) {
    $medico = Medico::fromRow($row);
    array_push($medicos, $medico);
}

echo json_encode_not_null(array_values($medicos));
