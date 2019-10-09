<!-- Paginação -->

<?php

    include 'conexao/conecta.php';

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
        $busca ="SELECT * FROM galeria WHERE album = '$album' LIMIT $inicio, $quantidade_pg ";
    }else{
        $busca ="SELECT * FROM galeria LIMIT $inicio, $quantidade_pg ";
    }

    $resultado = mysqli_query($conn,$busca);

    $total_busca = mysqli_num_rows($resultado);
    
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Tattooaria Lounge Ink - Galeria</title>
  <link rel="icon" href="img/logo.jpg">
  <link href="css/styles.css" rel="stylesheet">
 
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  
  <?php include 'header.php'?>

  <div class="main">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">

        <?php include 'conexao/conecta.php';

        $ativo = 2;
        $slide = 1;

        $query = "SELECT * FROM carousel ORDER BY id ASC";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
        if($ativo == 2){?>

          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

        <?php $ativo= 1; }else{?>

          <li data-target="#carouselExampleIndicators" data-slide-to="<?php $slide; ?>"></li>

        <?php $slide++;}}?>
        
      </ol>

      <div class="carousel-inner" role="listbox">

        <?php include 'conexao/conecta.php';

        $ativo = 2;

        $query = "SELECT * FROM carousel ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_assoc($result)){
          if($ativo == 2){?>

            <div class="carousel-item active">
              <img src="uploads/slides/<?php echo $row['imagem'];?>" class="d-block w-100" alt="<?php echo $row['foto'];?>">
            </div>

          <?php $ativo= 1; }else{?>

            <div class="carousel-item">
              <img src="uploads/slides/<?php echo $row['imagem'];?>" class="d-block w-100" alt="<?php echo $row['foto'];?>">
            </div>

        <?php }}?>

      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="divisao">
      <div class="pri-divisao">
        <div class="welcome-div1">
          <div class="box-div1">
            <p class="welcome-title" style="font-size: 60px">GALERIA DE FOTOS</p>
          </div>
        </div>
        <div class="welcome-div2">
          <div class="box-div2">
            <img src="img/ornamento.png">
          </div>
        </div>
      </div>

      <div class="seg-divisao">
        <div class="filtro">

        <?php include 'conexao/conecta.php';

          $ativo = $_GET["album"];

          $query = 'SELECT * FROM album ORDER BY id ASC';
          $result = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($result)){
          if($ativo == $row['nome']){?>
          
            <a style="color: white !important; background-color: #343a40 !important; border-color: #343a40 !important; " href='galeria.php?pagina=1&album=<?php echo $row['nome']?>' class="btn btn-secondary active" >
                <?php echo $row['nome']?>
            </a> 

          <?php }else{ ?>   

            <a style="color: white !important;" href='galeria.php?pagina=1&album=<?php echo $row['nome']?>' class="btn btn-secondary" >
                <?php echo $row['nome']?>
            </a>

        <?php  }} ?>

        </div>
      </div>
    </div>

    <div class="albumgaleria">
      <?php while($row = mysqli_fetch_assoc($resultado)){ ?>

        <div class="colalbum" >
          <div class="colfoto">
            <img src='uploads/<?php echo $row['foto'];?>'>
          </div>
        </div>

        <?php } ?>
      
    </div>

    <!--Paginação--> 
    <div class="paginacao">
            
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
              
                  <a style="background-color: black;" class='page-link' href="galeria.php?pagina=<?php echo $pagina_anterior; ?>&album=<?php echo $album;?>">Anterior</a>
              
              <?php }else{ ?>

                  <li class="page-item disabled">
                      <a style="background-color: black;" class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                  </li>

              <?php }  ?>
          </li>
          <!-- Numeração -->
          <?php 
    
          for($i = 1; $i < $num_pagina + 1; $i++){ 
            if($i == $pagina){?>
                
                <li class="page-item active" aria-current="page"><a style="background-color: white; border-color: white; color:black !important;" class="page-link" href="galeria.php?pagina=<?php echo $i;?>&album=<?php echo $album;?>"><?php echo $i; ?><span class="sr-only">(current)</span></a></li>
            
            <?php }else{ ?>
                
                <li class='page-item'><a style="background-color: black;" class='page-link' href="galeria.php?pagina=<?php echo $i;?>&album=<?php echo $album;?>"><?php echo $i; ?></a></li>
            
            <?php }} ?>
          <!-- Proxima Pagina -->
          <li class='page-item'>
            <?php if($pagina_posterior <= $num_pagina){ ?>

            <a style="background-color: black;" class='page-link' href="galeria.php?pagina=<?php echo $pagina_posterior;?>&album=<?php echo $album;?>">Proxima</a>
            
            <?php }else{ ?>

                <li class="page-item disabled">
                    <a  style="background-color: black;" class="page-link" href="#" tabindex="-1" aria-disabled="true">Proxima</a>
                </li>

            <?php }  ?>
          </li>
        </ul>
      </nav>
    </div>

  </div>
  
  <?php include 'footer.php'?>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
