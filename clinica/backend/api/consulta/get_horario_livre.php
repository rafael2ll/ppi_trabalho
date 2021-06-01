<?php
require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/utils.php";
require "../../model/Agenda.php";

$TODOS_HORARIOS = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];

$pdo = dbConnection();
$medId = get_or_error('med_id', 'med_id não fornecido') / 1;
$data = strtotime(get_or_error('data', 'Data não fornecida'));
$data = date('Y-m-d', $data);
try {
    $sql = <<<SQL
        SELECT horario from agenda
            WHERE cod_med = :medico_id  AND data_agenda = :data;
    SQL;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('medico_id', $medId);
    $stmt->bindParam('data', $data);
    $stmt->execute();
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$horarios_livres = $TODOS_HORARIOS;
while ($row = $stmt->fetch()) {
    $inteiro = explode(":", $row['horario'])[0] - 8;
    unset($horarios_livres[$inteiro]);
}

echo json_encode_not_null(array_values($horarios_livres));
