<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Clínica X - Galeria</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

</head>
<body>
<?php
include "navbar.php";
?>

<main class="center-horizontal">
    <div class="align-text-description">
        <div>
            <div class="table-responsive">
                <table class=" table-striped table-hover">
                    <tr>
                        <td><img class="images_galeria" src="/clinica/images/imagem-clinica1.jpeg"></td>
                        <td><img class="images_galeria" src="/clinica/images/imagem-clinica2.jpeg"></td>
                        <td><img class="images_galeria" src="/clinica/images/imagem-clinica3.jpeg"></td>
                    </tr>
                    <br>
                    <tr>
                        <td><img class="images_galeria" src="/clinica/images/imagem-clinica4.jpeg"></td>
                        <td><img class="images_galeria" src="/clinica/images/imagem-clinica5.jpeg"></td>
                        <td><img class="images_galeria" src="/clinica/images/imagem-clinica6.jpeg"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>
<?php
include "footer.html";
?>
</body>
</html>