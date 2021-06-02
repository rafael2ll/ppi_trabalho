<?php
require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/dbConnection.php";

function checkLogin($pdo, $email, $senha)
{
$sql = <<<SQL
    SELECT funcionario.senha_hash as hash_senha, funcionario.codigo as codigo, medico.crm as isMedico
    FROM pessoa
    INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
    LEFT JOIN medico ON pessoa.codigo = medico.codigo
    WHERE email = ?
    SQL;

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
    $row = $stmt->fetch();
    if (!$row)
    return array(false, -1);
    else
    return array(password_verify($senha, $row['hash_senha']), $row['codigo'], $row['isMedico']);
    } catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
    }
    }

    $errorMsg = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pdo = dbConnection();

    $email = $senha = "";

    if (isset($_POST["email"]))
        $email = $_POST["email"];
    if (isset($_POST["senha"]))
        $senha = $_POST["senha"];

    $email = htmlspecialchars($email);
    $senha = htmlspecialchars($senha);

    $resultLogin = checkLogin($pdo, $email, $senha);

        if ($resultLogin[0]) {
        header("location: /clinica/index.php");
        if (session_id() == '') {
            session_start();
        }
        $_SESSION['id'] = $resultLogin[1];
        if ($resultLogin[2] != null)
            $_SESSION['is_medico'] = true;

    }

    echo $resultLogin[0];
//    if ($resultLogin[0]) {
//        header("location: /clinica/index.php");
//        if (session_id() == '') {
//            session_start();
//        }
//        $_SESSION['id'] = $resultLogin[1];
//        if ($resultLogin[2] != null)
//            $_SESSION['is_medico'] = true;
//
//        exit();
//    } else
//    $errorMsg = "Dados incorretos";
   }