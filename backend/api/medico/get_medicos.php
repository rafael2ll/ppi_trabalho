<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";
require "../../model/Medico.php";
$pdo = dbConnection();

try {
    $sql = <<<SQL
        SELECT * from medico
        natural join funcionario
        natural join  pessoa;
    SQL;
    $stmt = $pdo->query($sql);
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$medicos = array();
while ($row = $stmt->fetch()) {
    $medico = Medico::fromRow($row);
    array_push($medicos, $medico);
}

echo json_encode_not_null(array_values($medicos));
