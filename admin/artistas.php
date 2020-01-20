<?php 
    include "back-end/login_force.php";
    include "../conexao/conecta.php";
    include "back-end/artistas_start.php";
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <title>Inicio - Painel de controle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina inicial - Painel de controle">
    <link href="../img/logo.jpg" rel="icon">
    <meta name="author" content="Flávio Lourenço">
    <link href="css/desktop.css" media="only screen and (min-width:600px)" rel="stylesheet">
    <link href="css/mobile.css" media="only screen and (max-width:600px)" rel="stylesheet">

</head>

<body>

    <?php include 'header.php'?>
    <main class="content">
    <div class="menu">
        <nav>
            <a class="btn" href="#submit_artistas">+ Artistas</a>
        </nav>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th><h3>Imagem</h3></th>
                <th><h3>Nome</h3></th>
                <th><h3>Biografia</h3></th>
                <!--<th><h3>Facebook</h3></th>
                <th><h3>Instagram</h3></th>-->
                <th colspan="2"><h3>Ações</h3></th>
            </tr>
        </thead>
        <tbody>
            <?php include 'back-end/artistas_list.php'?>
        </tbody>
    </table>

    </main>
    <?php include 'footer.php'?>

    <!-- Modal -->

    <div class="modal" id="submit_artistas">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="artistas.php">✖</a>
            </span>
            <ul>
                <li>
                    <h3>Nome</h3>
                    <input type="text" name="nome" required placeholder="Nome do artista">
                </li>

                <li>
                    <h3>Biografia</h3>
                    <textarea name="biografia" required placeholder="Biografia do artista"></textarea>
                </li>

                <li>
                    <h3>Facebook</h3>
                    <input type="text" name="facebook" required placeholder="Link para o facebook">
                </li>

                <li>
                    <h3>Instagram</h3>
                    <input type="text" name="instagram" required placeholder="Link para o instagram">
                </li>

                <li>
                    <h3>Foto</h3>
                    <input type="file" required name="foto[]">
                </li>
                
                <li>
                    <button class="reset_btn" type="reset"><a href="artistas.php">Cancelar</a></button>
                    <button class="submit_btn" type="submit" name="submit_artistas">Enviar</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>


    <div class="modal" id="edit_artistas">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="artistas.php">✖</a>
            </span>
            <ul>
                <input type="hidden" name="id" required value="<?php echo $artistas_row['id']; ?>">
                <li>
                    <h3>Nome</h3>
                    <input type="text" name="nome" value="<?php echo $artistas_row['nome'];?>">
                </li>

                <li>
                    <h3>Biografia</h3>
                    <textarea name="biografia"><?php echo $artistas_row['biografia'];?></textarea>
                </li>

                <li>
                    <h3>Facebook</h3>
                    <input type="text" name="facebook" value="<?php echo $artistas_row['facebook'];?>">
                </li>

                <li>
                    <h3>Instagram</h3>
                    <input type="text" name="instagram" value="<?php echo $artistas_row['instagram'];?>">
                </li>

                <li>   
                    <h3>Foto</h3>
                    <img src="../uploads/artistas/<?php echo $artistas_row['foto']?>">
                </li>
                <li>
                    <input type="file" name="foto[]">
                </li>
                
                <li>
                    <button class="reset_btn" type="reset"><a href="artistas.php">Cancelar</a></button>
                    <button class="submit_btn" type="submit" name="edit_artistas">Editar</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>


    <div class="modal" id="del_artistas">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="artistas.php">✖</a>
            </span>

            <input type="hidden" name="id" required value="<?php echo $artistas_row['id']; ?>">
            <input type="hidden" name="foto" required value="<?php echo $artistas_row['foto']; ?>">
            
            <ul>
                <li>
                    <h3>Nome</h3>
                    <p><?php echo $artistas_row['nome'];?></p>
                </li>

                <li>
                    <h3>Biografia</h3>
                    <p><?php echo $artistas_row['biografia'];?></p>
                </li>

                <li>
                    <h3>Facebook</h3>
                    <p><?php echo $artistas_row['facebook'];?></p>
                </li>

                <li>
                    <h3>Instagram</h3>
                    <p><?php echo $artistas_row['instagram'];?></p>
                </li>

                <li>
                    <h3>Foto</h3>
                    <img src="../uploads/artistas/<?php echo $artistas_row['foto']?>">
                </li>
                <li>
                    <h4>Esse artista será excluido permanentemente! Deseja Continuar?</h4>
                </li>
                <li>
                    <button class="reset_btn" type="reset"><a href="artistas.php">Cancelar</a></button>
                    <button class="del_btn" type="submit" name="del_artistas">Excluir</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>

</body>

</html>