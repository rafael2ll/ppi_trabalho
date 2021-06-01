<?php
if(session_id() == ''){
    session_start();
}
if (!isset($_SESSION['id'])) {
    http_response_code(401);
    exit();
}

require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/utils.php";
require "../../model/Agenda.php";
require "../../model/PageResponse.php";

$PAGE_SIZE = 20;
$pdo = dbConnection();
$page = get_or_default("page", 0);
$offset = $PAGE_SIZE * $page;
try {
    $countSql = <<<SQL
        SELECT count(*) as count from agenda;
    SQL;

    $sql = <<<SQL
        SELECT ag.*, 
               med.especialidade, 
               pess.nome as pessoa_nome, 
               pess.codigo as pessoa_codigo 
        from agenda ag
            JOIN medico med ON med.codigo = cod_med
            JOIN pessoa pess ON med.codigo = pess.codigo
        ORDER BY data_agenda DESC, horario DESC
        LIMIT ? OFFSET ?;
    SQL;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $PAGE_SIZE);
    $stmt->bindParam(2, $offset);
    $stmt->execute();
    $countStmt = $pdo->query($countSql);
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$agendas = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $agenda = Agenda::fromRow($row);
    array_push($agendas, $agenda);
}

$count = $countStmt->fetch();
$response = new PageResponse($count['count'], $agendas, count($agendas));

echo json_encode_not_null($response);