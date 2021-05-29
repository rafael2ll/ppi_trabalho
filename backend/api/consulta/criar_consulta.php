<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";
require "../../model/Agenda.php";

$PAGE_SIZE = 20;
$pdo = dbConnection();

$agenda = new Agenda(
    null,
    post_or_error('data', 'Data inválida'),
    post_or_error('horario', 'Horário inválido'),
    post_or_error('nome', 'Nome inválido'),
    post_or_error('sexo', 'Sexo inválido'),
    post_or_error('email', 'Email inválido'),
    Medico::fromCodigo(post_or_error('codigo_medico', 'Código do médico inválido')));


try {

    $sql = <<<SQL
        INSERT INTO agenda(data_agenda, horario, nome, sexo, email, cod_med) VALUES (:data_agenda, :horario, :nome, :sexo, :email, :cod_med);
    SQL;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($agenda->insertValues());
    http_response_code(200);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(array('erro' => $e->getMessage()));
}
