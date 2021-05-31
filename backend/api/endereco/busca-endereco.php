<?php
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/dbConnection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/backend/utils/utils.php";
require "../../model/Endereco.php";

$pdo = dbConnection();


// class Endereco
// {
//   public $rua;
//   public $bairro;
//   public $cidade;
//
//   function __construct($rua, $bairro, $cidade)
//   {
//     $this->rua = $rua;
//     $this->bairro = $bairro;
//     $this->cidade = $cidade;
//   }
// }

$pdo = mysqlConnect();
if (isset($_GET["cep"])) $cep = $_GET['cep'] ?? '';
$cep = htmlspecialchars($cep);

try {

  $sql = <<<SQL
  SELECT rua, bairro, cidade
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

$rua = htmlspecialchars($row['rua']);
$bairro = htmlspecialchars($row['bairro']);
$cidade = htmlspecialchars($row['cidade']);

$endereco1 = new Endereco ($rua, $bairro, $cidade);

$enderecos = array(
  $cep => $endereco1,
);

$endereco = array_key_exists($cep, $enderecos) ?
    $enderecos[$cep] : new Endereco('', '', '');

echo json_encode($endereco);