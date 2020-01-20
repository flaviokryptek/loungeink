<?php
    include "back-end/login_force.php";
    include "../conexao/conecta.php";
    include "back-end/sponsors_start.php";
 ?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <title>Patrocinadores - Painel de controle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina dos patrocinadores - Painel de controle">
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
            <a class="btn" href="#submit_sponsors">+ Patrocinadores</a>
        </nav>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th><h3>Imagem</h3></th>
                <th><h3>Nome</h3></th>
                <th><h3>Link</h3></th>
                <th colspan="2"><h3>Ações</h3></th>
            </tr>
        </thead>
        <tbody>
            <?php include 'back-end/sponsors_list.php'?>
        </tbody>
    </table>

    </main>
    <?php include 'footer.php'?>

    <!-- Modal -->

    <div class="modal" id="submit_sponsors">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="sponsors.php">✖</a>
            </span>
            <ul>
                <li>
                    <h3>Nome</h3>
                    <input type="text" name="nome" required placeholder="Nome do patroinador">
                </li>

                <li>
                    <h3>Link</h3>
                    <textarea name="link" required placeholder="Link do patrocinador"></textarea>
                </li>

                <li>
                    <h3>Imagem</h3>
                    <input type="file" required name="foto[]">
                </li>
                
                <li>
                    <button class="reset_btn" type="reset"><a href="sponsors.php">Cancelar</a></button>
                    <button class="submit_btn" type="submit" name="submit_sponsors">Enviar</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>


    <div class="modal" id="edit_sponsors">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="sponsors.php">✖</a>
            </span>
            <ul>
                <input type="hidden" name="id" required value="<?php echo $sponsors_row['id']; ?>">
                <li>
                    <h3>Nome</h3>
                    <input type="text" name="nome" value="<?php echo $sponsors_row['nome'];?>">
                </li>

                <li>
                    <h3>Link</h3>
                    <textarea name="link" ><?php echo $sponsors_row['link'];?></textarea>
                </li>

                <li>   
                    <h3>Imagem</h3>
                    <img src="../uploads/sponsors/<?php echo $sponsors_row['imagem']?>">
                </li>
                <li>
                    <input type="file" name="foto[]">
                </li>
                
                <li>
                    <button class="reset_btn" type="reset"><a href="sponsors.php">Cancelar</a></button>
                    <button class="submit_btn" type="submit" name="edit_sponsors">Editar</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>


    <div class="modal" id="del_sponsors">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="sponsors.php">✖</a>
            </span>

            <input type="hidden" name="id" required value="<?php echo $sponsors_row['id']; ?>">
            <input type="hidden" name="foto" required value="<?php echo $sponsors_row['imagem']; ?>">
            
            <ul>
                <li>
                    <h3>Nome</h3>
                    <p><?php echo $sponsors_row['nome'];?></p>
                </li>

                <li>
                    <h3>Link</h3>
                    <p><?php echo $sponsors_row['link'];?></p>
                </li>

                <li>
                    <h3>Imagem</h3>
                    <img src="../uploads/sponsors/<?php echo $sponsors_row['imagem']?>">
                </li>
                <li>
                    <h4>Esse patrocinador será apagado permanentemente! Deseja Continuar?</h4>
                </li>
                <li>
                    <button class="reset_btn" type="reset"><a href="sponsors.php">Cancelar</a></button>
                    <button class="del_btn" type="submit" name="del_sponsors">Excluir</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>

</body>

</html>