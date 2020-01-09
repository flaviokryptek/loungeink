<?php 
    include "back-end/login_force.php";
    include '../conexao/conecta.php';
    include "back-end/slide_start.php";
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <title>Slide - Painel de controle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Slide - Painel de controle">
    <link href="../img/logo.jpg" rel="icon">
    <meta name="author" content="Flávio Lourenço">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <?php include 'header.php'?>
    <main class="content">
        <div class="menu">
            <nav>
                <a href="#submit_slide">+ Slide</a>
            </nav>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th><h3>Imagem</h3></th>
                    <th><h3>Nome</h3></th>
                    
                    <th colspan="2"><h3>Ações</h3></th>
                </tr>
            </thead>
            <tbody>
                <?php include 'back-end/slide_list.php';?>
            </tbody>
        </table>

    </main>
    <?php include 'footer.php'?>

    <!-- Modal -->

    <div class="modal" id="submit_slide">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="slide.php">X</a>
            </span>
            <ul>
                <li>
                    <h3>Nome</h3>
                    <input id="nome" type="text" name="nome" size="60" required placeholder="Titulo do Slide">
                </li>

                <li>
                    <h3>Imagem</h3>
                    <input type="file" required name="foto[]">
                </li>
                
                <li>
                    <button class="reset_btn" type="reset"><a href="slide.php">Cancelar</a></button>
                    <button class="submit_btn" type="submit" name="submit_slide">Enviar</button>
                </li>
            </ul>
            <span class="alert">
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>

    <div class="modal" id="edit_slide">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="slide.php">X</a>
            </span>
            <ul>
                <input type="hidden" name="id" required value="<?php echo $slide_row['id']?>">
                <li>
                    <h3>Nome</h3>
                    <input type="text" name="nome" size ="60" value="<?php echo $slide_row['nome']?>">
                </li>

                <li>
                    <h3>Imagem atual</h3>
                    <img src="../uploads/slides/<?php echo $slide_row['imagem']?>">
                </li>
                <li>
                    <input type="file" name="foto[]">
                </li>
                
                <li>
                    <button class="reset_btn" type="reset"><a href="slide.php">Cancelar</a></button>
                    <button class="submit_btn" type="submit" name="edit_slide">Editar</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert; echo $test; ?></p>
            </span>
        </form>
    </div>

    <div class="modal" id="del_slide">
        <form method="post" enctype="multipart/form-data">
            <span class="close_btn">
                <a href="slide.php">X</a>
            </span>

            <input type="hidden" name="id" required value="<?php echo $slide_row['id']; ?>">
            <input type="hidden" name="imagem" required value="<?php echo $slide_row['imagem']; ?>">
            
            <ul>
                <li>
                    <h3>Nome</h3>
                    <p><?php echo $slide_row['nome'];?></p>
                </li>

                <li>
                    <h3>Imagem</h3>
                    <img src="../uploads/slides/<?php echo $slide_row['imagem']?>">
                </li>
                <li>
                    <h4>Esse slide será apagado permanentemente! Deseja Continuar?</h4>
                </li>
                <li>
                    <button class="reset_btn" type="reset"><a href="slide.php">Cancelar</a></button>
                    <button class="del_btn" type="submit" name="del_slide">Excluir</button>
                </li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>
    </div>

</body>

</html>