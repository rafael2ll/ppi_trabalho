<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";
require "../../model/Agenda.php";

$PAGE_SIZE = 20;
$pdo = dbConnection();
$me = get_or_error('med_id', 'med_id não informado');
$page = post_or_default("page", 0);
$offset = $PAGE_SIZE * $page;
try {

    $sql = <<<SQL
        SELECT ag.*, 
               med.especialidade, 
               pess.nome as pessoa_nome, 
               pess.codigo as pessoa_codigo 
        from agenda ag
            JOIN medico med ON med.codigo = cod_med
            JOIN pessoa pess ON med.codigo = pess.codigo
        WHERE med.codigo = ?
        LIMIT ? OFFSET ?;
    SQL;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $me);
    $stmt->bindParam(2, $PAGE_SIZE);
    $stmt->bindParam(3, $offset);
    $stmt->execute();
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$agendas = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $agenda = Agenda::fromRow($row);
    array_push($agendas, $agenda);
}

echo json_encode_not_null($agendas);