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
                    <button type="submit" class="dropdown-item" name="selecao" value="100R$">100R$</button>
                    <button type="submit" class="dropdown-item" name="selecao" value="150R$">150R$</button>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Enviar fotos</button>
            </div>
      
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
            <div class="row">
                
                <?php

                include '../conexao/conecta.php';

                $query ='SELECT * from galeria';
                $result = mysqli_query($conn,$query);

                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $foto = $row['foto'];
                ?>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <?php echo "<img src='../uploads/".$foto."'>"?>
                        
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
               
                <?php
                        }
                    }
                mysqli_close($conn);
                ?>
                
            </div>
            </div>
        </div>

        <!-- Modal com formulario para realizar upload de fotos -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enviar fotos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form name="cadastro" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Escolha as fotos e o album para enviar.</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto[]" multiple="multiple">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="album" id="inlineRadio1" value="100R$" checked>
                                <label class="form-check-label" for="inlineRadio1">100R$</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="album" id="inlineRadio2" value="150R$">
                                <label class="form-check-label" for="inlineRadio2">150R$</label>
                            </div>
                        
                        </div>
                        <div class="modal-footer">

                            <button type="reset" class="btn btn-danger">Limpar</button>
                            <button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>

                        </div>
                    </form>
                    <?php include 'upload.php'?>
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