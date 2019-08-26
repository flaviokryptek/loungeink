<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="sistema" content="Editar usuario">
    <meta name="autor" content="Flávio">
    <link rel="icon" href="img/icone.ico">

    <title>Editar Dados do Usuário</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <?php
      include 'header.php';
    ?>

    <main role="main" class="container" style="margin-top:100px;">
        <form name="atualizar" action="#" method="POST">
            <?php
                $id = $_GET["id"]; //pega o código passado via URL
                include '../conexao/conecta.php';
                $query = "SELECT * FROM usuarios WHERE id = $id LIMIT 1";
                $result = mysqli_query($conn, $query);
                if($result){
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $usuario = $row['usuario'];
            ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" required id="nome" value="<?php echo $nome;?>">
            </div>
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" class="form-control" name="usuario" required id="usuario" value="<?php echo $usuario;?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" required id="senha">
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="reset" name="limpar" id="limpar">Limpar</button>
                <button class="btn btn-primary" type="submit" name="atualizar" id="atualizar">Atualizar</button>
            </div>
            <?php
                }else{
                    echo '
                        <div class="alert alert-danger" role="alert">
                            <strong>Usuário não encontrado, tente novamente!</strong>
                        </div>';
                    exit();
                }
                mysqli_close($conn);
            ?>
        </form>
        <?php
            if(isset($_POST['atualizar'])){
                include '../conexao/conecta.php';
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $usuario = $_POST['usuario'];
                $senha1 = $_POST['senha'];
                $senha = password_hash($senha1, PASSWORD_DEFAULT);
                $atualiza = "UPDATE usuarios SET nome='$nome', usuario = '$usuario', senha = '$senha' WHERE id = '$id'";
                $reult = mysqli_query($conn, $atualiza);
                if($result){
                    echo '
                        <div class="alert alert-success" role="alert">
                            <strong>Dados do usuário alterados com sucesso!</strong>
                        </div>';
                }else{
                    echo '
                        <div class="alert alert-danger" role="alert">
                            <strong>Erro ao editar dados do usuário, tente novamente!</strong>
                        </div>';
                    exit();
                }
                mysqli_close($conn);
            }
        ?>
            
    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>