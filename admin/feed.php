<?php
    include "back-end/login_force.php";
    include "../conexao/conecta.php";
    include "back-end/feed_start.php";
 ?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <title>Feed - Painel de controle</title>
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
            <a class="btn" href="#submit_feed">+ Feed</a>
        </nav>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th><h3>Imagem</h3></th>
                <th><h3>Titulo</h3></th>
                <th><h3>Texto</h3></th>
                <th colspan="2"><h3>Ações</h3></th>
            </tr>
        </thead>
        <tbody>
            <?php include 'back-end/feed_list.php'?>
        </tbody>
    </table>

    </main>
    <?php include 'footer.php'?>

    <!-- Modal -->


    <div class="modal" id="submit_feed">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="feed.php">✖</a>
            </span>
            <ul>
                <li>
                    <h3>Titulo</h3>
                    <input type="text" name="titulo" required placeholder="Titulo do post">
                </li>

                <li>
                    <h3>Texto</h3>
                    <textarea name="texto" required placeholder="Digite aqui o texto do post"></textarea>
                </li>

                <li>
                    <h3>Imagem</h3>
                    <input type="file" required name="foto[]">
                </li>
                
                <li>
                    <button class="reset_btn" type="reset"><a href="feed.php">Cancelar</a></button>
                    <button class="submit_btn" type="submit" name="submit_feed">Enviar</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>


    <div class="modal" id="edit_feed">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="feed.php">✖</a>
            </span>
            <ul>
                <input type="hidden" name="id" required value="<?php echo $feed_row['id']; ?>">
                <li>
                    <h3>Titulo</h3>
                    <input type="text" name="titulo" value="<?php echo $feed_row['titulo'];?>">
                </li>

                <li>
                    <h3>Texto</h3>
                    <textarea name="texto" ><?php echo $feed_row['texto'];?></textarea>
                </li>

                <li>   
                    <h3>Imagem</h3>
                    <img src="../uploads/feed/<?php echo $feed_row['imagem']?>">
                </li>
                <li>
                    <input type="file" name="foto[]">
                </li>
                
                <li>
                    <button class="reset_btn" type="reset"><a href="feed.php">Cancelar</a></button>
                    <button class="submit_btn" type="submit" name="edit_feed">Editar</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>


    <div class="modal" id="del_feed">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="feed.php">✖</a>
            </span>

            <input type="hidden" name="id" required value="<?php echo $feed_row['id']; ?>">
            <input type="hidden" name="imagem" required value="<?php echo $feed_row['imagem']; ?>">
            
            <ul>
                <li>
                    <h3>Titulo</h3>
                    <p><?php echo $feed_row['titulo'];?></p>
                </li>

                <li>
                    <h3>Texto</h3>
                    <p><?php echo $feed_row['texto'];?></p>
                </li>

                <li>
                    <h3>Imagem</h3>
                    <img src="../uploads/feed/<?php echo $feed_row['imagem']?>">
                </li>
                <li>
                    <h4>Esse post será apagado permanentemente! Deseja Continuar?</h4>
                </li>
                <li>
                    <button class="reset_btn" type="reset"><a href="feed.php">Cancelar</a></button>
                    <button class="del_btn" type="submit" name="del_feed">Excluir</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>

</body>

</html>