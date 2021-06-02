<?php
if (session_id() == '') {
    session_start();
}
$isLogged = isset($_SESSION['id']);
$isMedico = isset($_SESSION['is_medico']);
if ($isLogged)
    $nome = $_SESSION['nome'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/clinica/index.php">Clinica X</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <?php
                $publicNav = <<<HTML
                    <li class="nav-item"><a class="nav-link" href="/clinica/galeria.php">Galeria</a></li>
                    <li class="nav-item"><a class="nav-link" href="/clinica/agendamento.php">Agendamento</a></li>
                    <li class="nav-item"><a class="nav-link" href="/clinica/cadastro_endereco.php">Cadastro de Endereço</a></li>
                    <li class="nav-item"></li>
                HTML;
                $privNav = <<<HTML
                    <li class="nav-item"><a class="nav-link" href="/clinica/private/signUp/form_funcionario.php">Novo Funcionário</a></li>
                    <li class="nav-item"><a class="nav-link" href="/clinica/private/signUp/form_paciente.php">Novo Paciente</a></li>
                    <li class="nav-item"><a class="nav-link" href="/clinica/private/list/funcionarios.php">Ver Funcionários</a></li>
                    <li class="nav-item"><a class="nav-link" href="/clinica/private/list/pacientes.php">Ver Pacientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/clinica/private/list/enderecos.php">Ver Endereços</a></li>
                    <li class="nav-item"><a class="nav-link" href="/clinica/private/list/agendamentos.php">Ver Todos Agendamentos</a></li>
                HTML;
                if ($isMedico) {
                    $privNav .= '
                    <li class="nav-item"><a class="nav-link" href="/clinica/private/list/meus_agendamentos.php">Ver Meus Agendamentos</a></li>
                    ';
                }
                if ($isLogged)
                    echo $privNav;
                else
                    echo $publicNav;
                ?>
            </ul>
        </div>

        <?php
        if ($isLogged)
            echo <<<HTML
                <span class="navbar-text"><b>$nome</b></span>
                <a class="nav-link navbar-text" title="Sair" href="/clinica/logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" fill="currentColor" class="bi bi-box-arrow-right"  viewBox="0 0 24 24">
                    <path fill="currentColor" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" />
                </svg>
                </a>
                HTML;
        else
            echo <<<HTML
                <a class="nav-link navbar-text" href="/clinica/login.php"> Entrar </a>
            HTML;
        ?>
    </div>
</nav>