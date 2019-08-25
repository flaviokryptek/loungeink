<?php //força o cliente a estar logado no sistema para acessar qualquer pagina
    include "log/login_force.php";
    $nome = $_SESSION['nome'];
?>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        
    <a class="navbar-brand" href="index.php">Painel de Controle</a>
        
       
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto" style="height: 40px;">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="galeria.php">Galeria</a>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link" href="list_users.php">Usuários</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="log/logout.php">Sair</a>
                </li>
                <li class="nav-item">
                    <p class="nav-link" style="color: #ffff;">Usuário: <?php echo $nome;?> </p>
                </li>
            </ul>
        </div>
    </nav>
</header>