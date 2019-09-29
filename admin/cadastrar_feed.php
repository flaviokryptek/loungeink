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
    <div class="container" style="margin-top: 50px">

        <form name="cadastrar" method="post" enctype="multipart/form-data">
            <div class="form-group">
                
                <div class="form-group">
                    <label for="nome">Titulo</label>
                    <input type="text" class="form-control" name="titulo" required id="nome" placeholder="Titulo do post">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Texto</label>
                    <textarea class="form-control" name="texto" required id="exampleFormControlTextarea1"  placeholder="Digite aqui o texto do post" rows="6"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Escolha a foto.</label>
                    <input type="file" class="form-control-file" required id="exampleFormControlFile1" name="foto[]">
                </div>

            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="reset" name="limpar" id="limpar">Limpar</button>
                <button class="btn btn-primary" type="submit" name="cadastrar" id="cadastrar">Cadastrar</button>
            </div>
        </form>

        <?php include 'upload_feed.php'?>

    </div>
  </main>

  <?php include 'footer.php'?>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>