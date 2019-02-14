<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Galeria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../img/logo.jpg" rel="icon">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <?php include 'header.php'?>
    
    <main>
        <section class="jumbotron text-center">
            <div class="container">
            <h1 class="jumbotron-heading">Galeria de fotos</h1>
         
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Album</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="Album 01">Album 01</a>
                    <a class="dropdown-item" href="Album 02">Album 02</a>
                    <a class="dropdown-item" href="Album 03">Album 03</a>
                </div>
                <a href="#" class="btn btn-primary my-2">Enviar fotos</a>
            </div>
      
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
            <div class="row">

                <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="../img/fotopost01.jpg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Excluir</button>
                            </div>
                            <small class="text-muted">Album</small>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
            </div>
        </div>

    </main>
    
    <?php include 'footer.php'?>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>