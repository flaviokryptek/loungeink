<!-- Paginação -->

<?php

    include '../conexao/conecta.php';

    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

    $album = $_GET['album'];

    if($album != "Todas"){
        $busca ="SELECT * from galeria where album='$album'";
    }else{
        $busca ="SELECT * from galeria";
    }

    $resultado = mysqli_query($conn,$busca);

    $total_busca = mysqli_num_rows($resultado);

    $quantidade_pg = 18;

    $num_pagina = ceil($total_busca/$quantidade_pg);

    $inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

    if($album != "Todas"){
        $busca ="SELECT * FROM galeria WHERE album = '$album' ORDER BY id DESC LIMIT $inicio, $quantidade_pg ";
    }else{
        $busca ="SELECT * FROM galeria ORDER BY id DESC LIMIT $inicio, $quantidade_pg ";
    }

    $resultado = mysqli_query($conn,$busca);

    $total_busca = mysqli_num_rows($resultado);
    
?>

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
        <section class="jumbotron text-center" style="margin-bottom:0;">
            <div class="container">
                <h1 class="jumbotron-heading">Galeria de fotos</h1>
            
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Enviar fotos</button>
                
            </div>
            <div class="container" style="margin-top: 40px;">

            <?php include '../conexao/conecta.php';

                $ativo = $_GET["album"];

                $query = 'SELECT * FROM album ORDER BY id ASC';
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result)){
                if($ativo == $row['nome']){?>

                    <a style="margin-right: 10px; color: white !important; background-color: #343a40 !important; border-color: #343a40 !important; " href='galeria.php?pagina=1&album=<?php echo $row['nome']?>' class="btn btn-secondary active" >
                        <?php echo $row['nome']?>
                    </a> 

                <?php }else{ ?>   

                    <a style="margin-right: 10px; color: white !important;" href='galeria.php?pagina=1&album=<?php echo $row['nome']?>' class="btn btn-secondary" >
                        <?php echo $row['nome']?>
                    </a>

            <?php  }} ?>
               
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
            <div class="row">
                
                <?php while($row = mysqli_fetch_assoc($resultado)){ ?>
                 
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img style="height: 200px;" src="../uploads/<?php echo $row['foto'];?>"> 
                                           
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                
                                <a href="excluir_foto.php?id=<?php echo $row['id'];?>&foto=<?php echo $row['foto'];?>">
                                    <button type='button' class='btn btn-sm btn-outline-secondary'>Excluir</button>
                                </a>
                            
                                </div>
                                <small class="text-muted"><?php echo $row['album'];?></small>
                            </div>
                        </div>
                    </div>
                </div>
               
                <?php } ?>

            </div>
            </div>
        </div>
        
        <!--Paginação-->
        
        <div style="height: 100px; background-color: #f8f9fa;">
            
            <?php
                //Verificar a pagina anterior e posterior
                $pagina_anterior = $pagina - 1;
                $pagina_posterior = $pagina + 1;
            ?>
            
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                
                <!-- Pagina Anterior -->
                <li class='page-item'>
                    <?php if($pagina_anterior != 0){ ?>
                    
                        <a class='page-link' href="galeria.php?pagina=<?php echo $pagina_anterior; ?>&album=<?php echo $album;?>">Anterior</a>
                    
                    <?php }else{ ?>

						<li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>

					<?php }  ?>
                </li>

                <!-- Numeração -->
                <?php 
					
					for($i = 1; $i < $num_pagina + 1; $i++){ 
                        if($i == $pagina){?>
                            
                            <li class="page-item active" aria-current="page"><a class="page-link" href="galeria.php?pagina=<?php echo $i;?>&album=<?php echo $album;?>"><?php echo $i; ?><span class="sr-only">(current)</span></a></li>
                        <?php }else{ ?>
                            <li class='page-item'><a class='page-link' href="galeria.php?pagina=<?php echo $i;?>&album=<?php echo $album;?>"><?php echo $i; ?></a></li>
                        <?php }} ?>
  
                <!-- Proxima Pagina -->
                <li class='page-item'>
                    <?php if($pagina_posterior <= $num_pagina){ ?>

                    <a class='page-link' href="galeria.php?pagina=<?php echo $pagina_posterior;?>&album=<?php echo $album;?>">Proxima</a>
                    <?php }else{ ?>

                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Proxima</a>
                        </li>

                    <?php }  ?>
                </li>
                
                </ul>
            </nav>
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
                                <input type="file" class="form-control-file" required id="exampleFormControlFile1" name="foto[]" multiple="multiple">
                            </div>

                            <?php
                            include '../conexao/conecta.php';

                            $query = 'SELECT * FROM album where id != 1';
                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($result)){ ?>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="album" required id="inlineRadio<?php echo $row['nome'];?>" value="<?php echo $row['nome']; ?>">
                                <label class="form-check-label" for="inlineRadio<?php echo $row['nome'];?>"><?php echo $row['nome']; ?></label>
                            </div>

                            <?php } mysqli_close($conn);?>
                        
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