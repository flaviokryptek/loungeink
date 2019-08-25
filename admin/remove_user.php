<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="sistema" content="Remover usuario">
    <meta name="autor" content="Flávio">
    <link rel="icon" href="img/icone.ico">

    <title>Exclusão de Usuário</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <?php
      include 'functions/header.php';
    ?>

    <main role="main" class="container">
        <?php
            $id = $_GET["id"]; //pega o código passado via URL
            include 'conexao/conecta.php';
            $query = "DELETE FROM usuarios WHERE id = $id";
            $result = mysqli_query($conn, $query);

            if($result){
                echo '
                <div class="alert alert-success" role="alert">
                    <strong>Usuário excluído com success!</strong>
                </div>';
            }else{
                echo '
                <div class="alert alert-danger" role="alert">
                    <strong>Erro ao excluir o usuário, tente novamente!</strong>
                </div>';
                exit();
            }
            mysqli_close($conn);
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
