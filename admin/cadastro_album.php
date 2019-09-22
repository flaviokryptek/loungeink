<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Tattooaria Lounge Ink</title>
  <link href="../img/logo.jpg" rel="icon">
  
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <?php include 'header.php' ?>

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
        <form name="cadastro_user" action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" required id="nome" placeholder="Nome do album">
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="reset" name="limpar" id="limpar">Limpar</button>
                <button class="btn btn-primary" type="submit" name="cadastrar_user" id="cadastrar_user">Cadastrar</button>
            </div>
        </form>
    
    <?php
        
        if (isset($_POST['cadastrar_user'])){// pega os dados de nome, usuario, senha
            include '../conexao/conecta.php';
            $nome = $_POST['nome'];

            $insere = "INSERT INTO album ( nome) VALUES ('$nome')";// insere os dados no bd

            $result = mysqli_query($conn, $insere);

            // header('Refresh:0;url=cadastro_album.php'); atualiza a pagina

            if($result){
                echo '
                    <div class="alert alert-success" role="alert">
                        <strong>Album adicionado com sucesso!</strong>
                    </div>';
            }else{
                echo '
                    <div class="alert alert-danger" role="alert">
                        <strong>Erro ao adicionar album, tente novamente!</strong>
                    </div>';
                exit();
            }
            mysqli_close($conn);
        }
    ?>
    </div>
  </main>

  <?php include 'footer.php'?>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>