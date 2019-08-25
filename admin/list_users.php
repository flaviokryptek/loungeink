<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="sistema" content="Mostrar usuarios">
    <meta name="autor" content="Flávio">
    <link rel="icon" href="img/icone.ico">

    <title>Listagem de Usuários Cadastrados</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <?php
      include 'header.php';
    ?>

    <main role="main" class="container">
        <table class="table table-hover" style="margin-top: 100px">
            <thead>
                <tr>
                    <th  scope="col">Código</th>
                    <th  scope="col">Nome</th>
                    <th  scope="col">Usuário</th>
                    <th  scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../conexao/conecta.php';

                    $query = 'SELECT * FROM usuarios';
                    $result = mysqli_query($conn, $query);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $nome = $row['nome'];
                            $usuario = $row['usuario'];
                          
                ?>
                    <tr>
                        <th scope="row"><?php echo $id;?></th>
                        <td><?php echo $nome;?></td>
                        <td><?php echo $usuario;?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $id;?>">
                                <button type="button" class ="btn btn-warning btn-sm">Editar</button>
                            </a>
                            <a href="remove_user.php?id=<?php echo $id;?>">
                                <button type="button" class="btn btn-danger btn-sm">Excluir</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    mysqli_close($conn);
                    ?>
            </tbody>
        </table>
    </main><!-- /.container -->
    <?php include 'footer.php'?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
