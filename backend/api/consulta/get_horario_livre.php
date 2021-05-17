<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";
require "../../model/Agenda.php";

$TODOS_HORARIOS = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];

$pdo = dbConnection();
$medId = $_GET['medico_id'] / 1;
$data = strtotime($_GET['data']);
$data = date('Y-m-d', $data);
try {
    $sql = <<<SQL
        SELECT horario from agenda
            WHERE cod_med = $medId  AND data = '$data';
    SQL;
    $stmt = $pdo->query($sql);
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$horarios_livres = $TODOS_HORARIOS;
while ($row = $stmt->fetch()) {
    $inteiro = explode(":", $row['horario'])[0] - 8;
    unset($horarios_livres[$inteiro]);
}

echo json_encode_not_null(array_values($horarios_livres));
