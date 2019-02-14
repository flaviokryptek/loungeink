<?php //força o cliente a estar logado no sistema para acessar qualquer pagina
    include "log/login_force.php";
    $nome = $_SESSION['nome'];
?>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        
    <a class="navbar-brand" href="#">Painel de Controle</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="galeria.php">Galeria</a>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link" href="log/logout.php">Sair</a>
                </li>
                <li class="nav-item">
                    <p class="lead" align="right">Usuário logado: <?php echo $nome;?> em <?php echo date('d/m/y');?></p>
                </li>
            </ul>
        </div>
    </nav>
</header>