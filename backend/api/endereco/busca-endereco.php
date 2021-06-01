<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";
require "../../model/Endereco.php";

$pdo = dbConnection();


if (isset($_GET["cep"])) $cep = $_GET['cep'] ?? '';
$cep = htmlspecialchars($cep);


try {

  $sql = <<<SQL
  SELECT logradouro, cidade, estado
  FROM base_endereco
  WHERE cep = ?
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(1, $cep);
  $stmt->execute([$cep]);

}
catch (Exception $e) {
  //error_log($e->getMessage(), 3, 'log.php');
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

$row = $stmt->fetch();

$rua = htmlspecialchars($row['logradouro']);
$cidade = htmlspecialchars($row['cidade']);
$estado = htmlspecialchars($row['estado']);

if($rua == ''){
    $rua = ' ';
    $cidade = ' ';
    $estado = ' ';
}

$endereco1 = new Endereco ($cep, $rua, $cidade, $estado);

$enderecos = array(
    $cep => $endereco1,
);

$endereco = array_key_exists($cep, $enderecos) ?
    $enderecos[$cep] : new Endereco('', '', '', '');


echo json_encode($endereco);