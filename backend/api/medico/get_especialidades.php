<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";

$pdo = dbConnection();

try {
    $sql = <<<SQL
        SELECT DISTINCT especialidade from medico;
    SQL;
    $stmt = $pdo->query($sql);
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$especialidades = array();
while ($row = $stmt->fetch()) {
    array_push($especialidades, ucfirst(htmlspecialchars($row['especialidade'])));
}
echo json_encode_not_null(array_values($especialidades));
