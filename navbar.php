<?php
session_start();
$isLogged = isset($_SESSION['id']);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="public/index.php">Clinica X</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <?php
                $publicNav = <<<HTML
                    <li class="nav-item"><a class="nav-link" href="/public/galeria.php">Galeria</a></li>
                    <li class="nav-item"><a class="nav-link" href="/public/agendamento.php">Agendamento</a></li>
                    <li class="nav-item"><a class="nav-link" href="/public/cadastro_endereco.php">Cadastro de endereço</a></li>
                    <li class="nav-item"></li>
                HTML;
                $privNav = <<<HTML
                    <li class="nav-item"><a class="nav-link" href="/private/signUp/form_funcionario.php">Novo Funcionário</a></li>
                    <li class="nav-item"><a class="nav-link" href="/private/signUp/form_funcionario.php">Novo Paciente</a></li>
                    <li class="nav-item"><a class="nav-link" href="/private/list/funcionarios.php">Ver Funcionários</a></li>
                    <li class="nav-item"><a class="nav-link" href="/private/list/pacientes.php">Ver Pacientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/private/list/enderecos.php">Ver Endereços</a></li>
                    <li class="nav-item"><a class="nav-link" href="/private/list/agendamentos.php">Ver Todos Agendamentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/private/list/meus_agendamentos.php">Ver Meus Agendamentos</a></li>
                HTML;
                if ($isLogged)
                    echo $privNav;
                else
                    echo $publicNav;
                ?>
            </ul>
        </div>
        <a class="navbar-text nav-link"
           href="<?php if ($isLogged) echo '/public/logout.php'; else echo '/public/login.php'; ?>">
            <?php if ($isLogged) echo 'Logout'; else echo 'Login' ?>
        </a>
    </div>
</nav>