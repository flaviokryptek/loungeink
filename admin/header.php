<?php //força o cliente a estar logado no sistema para acessar qualquer pagina
    include "log/login_force.php";
    $nome = $_SESSION['nome'];
?>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        
    <a class="navbar-brand" href="index.php">Painel de Controle</a>
        
       
        
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Feed
                </button>
                <div class="dropdown-menu">

                    <a class="dropdown-item" href="list_feed.php" >Todos</a>
                    <a class="dropdown-item" href="cadastrar_feed.php" >Adicionar</a>
                    
                </div>
                
            </div>

            <div class="btn-group" style="margin-left:10px;">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Galeria
                </button>
                <div class="dropdown-menu">

                    <a class="dropdown-item" href="galeria.php?pagina=1&album=Todas" >Fotos</a>
                    <a class="dropdown-item" href="list_albums.php" >Albums</a>
                    <a class="dropdown-item" href="cadastro_album.php" >Adicionar album</a>
                    
                </div>
                
            </div>

            <div class="btn-group" style="margin-left:10px;">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Slide
                </button>
                <div class="dropdown-menu">

                    <a class="dropdown-item" href="list_carousel.php" >Todos</a>
                    <a class="dropdown-item" href="cadastrar_carousel.php" >Adicionar</a>
                   
                    
                </div>
                
            </div>

            <div class="btn-group" style="margin-left:10px;">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuario
                </button>
                <div class="dropdown-menu">

                    <a class="dropdown-item" href="list_users.php" >Todos</a>
                    <a class="dropdown-item" href="cadastro_user.php" >Adicionar</a>
                   
                    
                </div>
                
            </div>

            <ul class="navbar-nav mr-auto" style="height: 40px; padding-inline-start: 400px; !important">
                
                <li class="nav-item">
                    <p class="nav-link" style="color: #ffff;">Usuário: <?php echo $nome;?> </p>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="log/logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
</header>