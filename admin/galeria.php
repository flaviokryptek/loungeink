<?php 
    include "back-end/login_force.php";
    include "../conexao/conecta.php";
    include 'back-end/gallery_start.php';
 ?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <title>Galeria - Painel de controle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina inicial - Painel de controle">
    <link href="../img/logo.jpg" rel="icon">
    <meta name="author" content="Flávio Lourenço">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <?php include 'header.php'?>
    <main class="content">
        <div class="menu">
            <nav>
                <a href="#submit_foto">+ Foto</a>
                <a href="#submit_album">+ Album</a>
            </nav>
        </div>
        <div class="album">

            <nav>
                <?php include 'back-end/gallery_list_album.php'?>
            </nav>

        </div>
        <div class="foto">

            <?php include 'back-end/gallery_list_foto.php'?>

        </div>
        <div class="pagination">

            <nav>
                <?php include 'back-end/gallery_pagination.php'?>
            </nav>

        </div>
    </main>
    <?php include 'footer.php'?>

    <!-- Modal -->

    <div class="modal" id="submit_foto">
        <div>
            <form method="post" enctype="multipart/form-data">
                <span class="close_btn">
                    <a href="galeria.php?pagina=1&album=Todas">X</a>
                </span>
                <ul>
                    <li>
                        <h3>Foto</h3>
                        <input type="file" required name="foto[]" multiple="multiple">
                    </li>
                    
                    <li>
                        <h3>Album</h3>
                        <?php include 'back-end/gallery_list_album_input.php'?>
                    </li>
                    <li>
                        <button class="reset_btn" type="reset"><a href="galeria.php?pagina=1&album=Todas">Cancelar</a></button>
                        <button class="submit_btn" type="submit" name="submit_foto">Enviar</button>
                    </li>
                </ul>
                <span class='alert'>
                    <p><?php echo $alert ?></p>
                </span>
            </form>
        </div>
    </div>

    <div class="modal" id="submit_album">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="galeria.php?pagina=1&album=Todas">X</a>
            </span>
            <ul>
                <li>
                    <h3>Album</h3>
                    <input type="text" name="nome" required placeholder="Nome do album">
                </li>
                <li>
                    <button class="reset_btn" type="reset"><a href="galeria.php?pagina=1&album=Todas">Cancelar</a></button>
                    <button class="submit_btn" type="submit" name="submit_album">Enviar</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>

</body>

</html>