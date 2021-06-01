<?php
if (session_id() == '') {
    session_start();
}

require $_SERVER['DOCUMENT_ROOT'] . "/clinica/backend/utils/dbConnection.php";

function checkLogin($pdo, $email, $senha)
{
    $sql = <<<SQL
    SELECT funcionario.senha_hash as hash_senha, funcionario.codigo as codigo
    FROM pessoa
    INNER JOIN funcionario ON pessoa.codigo = funcionario.codigo
    WHERE email = ?
    SQL;

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        if (!$row)
            return array(false, -1);
        else
            return array(password_verify($senha, $row['hash_senha']), $row['codigo']);
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

    $resultLogin = checkLogin($pdo, $email, $senha);
    if ($resultLogin[0]) {
        header("location: /clinica/index.php");
        if (session_id() == '') {
            session_start();
        }
        $_SESSION['id'] = $resultLogin[1];
        exit();
    } else
        $errorMsg = "Dados incorretos";
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Clinica X - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
</head>

<body>
<?php
include "navbar.php";
?>

<main class="container p-3">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
          class="row g-3 mini-center-horizontal">
        <h4 class="p-1 mb-0">Login - Funcionarios</h4>
        <fieldset class="p-3 m-0">
            <!-- E-mail e senha -->
            <div class="col-sm-12">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="col-sm-12">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha">
            </div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary login-button">Entrar</button>
            </div>
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $errorMsg !== "") {
        echo <<<HTML
        <div class="alert alert-warning alert-dismissible" role="alert">
          <strong>$errorMsg</strong>
          <button type="button" class="btn-close" data-dismiss="alert"></button>
        </div>
        HTML;
    }
    ?>
</main>

<!-- Opcional: Bootstrap Bundle com JavaScript e Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
        crossorigin="anonymous"></script>

<?php
include "footer.html";
?>

</body>

</html>