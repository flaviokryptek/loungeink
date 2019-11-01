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

    $quantidade_pg = 24;

    $num_pagina = ceil($total_busca/$quantidade_pg);

    $inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

    if($album != "Todas"){
        $busca ="SELECT * FROM galeria WHERE album = '$album' ORDER BY id DESC LIMIT $inicio, $quantidade_pg ";
    }else{
        $busca ="SELECT * FROM galeria ORDER BY id DESC LIMIT $inicio, $quantidade_pg  ";
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

  <ul class="whatsapp">
    <li><p>Fale conosco!</p></li>
    <li><a href="https://api.whatsapp.com/send?phone=5565999781134&text=Olá"><img src="img/rede-social/whatsapp.png"></a></li>
  </ul>
    <div class="slideshow">
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
    </div>

    <div class="section">
      <div class="full-section">

      <h3>GALERIA DE FOTOS</h3>
      <p>Categorias</p>
       
      <div class="filtro">

      <?php include 'conexao/conecta.php';

        $ativo = $_GET["album"];

        $query = 'SELECT * FROM album ORDER BY id ASC';
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
        if($ativo == $row['nome']){?>
  
          <a class="botao-active" href="galeria.php?pagina=1&album=<?php echo $row['nome']?>">
              <?php echo $row['nome']?>
          </a> 

        <?php }else{ ?>   

          <a class="botao" href="galeria.php?pagina=1&album=<?php echo $row['nome']?>">
              <?php echo $row['nome']?>
          </a>

      <?php  }} ?>
      </div>

      </div>
    </div>

    <div class="albumgaleria">
      <?php while($row = mysqli_fetch_assoc($resultado)){ ?>

        
          <div class="foto">
           <img src='uploads/<?php echo $row['foto'];?>'>
          </div>
        

        <?php } ?>
      
      </div>

    <!--Paginação--> 
    <div class="pagination">
            
      <?php
          //Verificar a pagina anterior e posterior
          $pagina_anterior = $pagina - 1;
          $pagina_posterior = $pagina + 1;
      ?>
      
        <ul >
          <!-- Pagina Anterior -->
          
              <?php if($pagina_anterior != 0){ ?>

                <li class="anterior">
                  <a href="galeria.php?pagina=<?php echo $pagina_anterior; ?>&album=<?php echo $album;?>">Anterior</a>
                </li>

              <?php }else{ ?>

                <li class="desativado">
                    <a>Anterior</a>
                </li>

              <?php }  ?>
          
          <!-- Numeração -->

          <?php 
    
          for($i = 1; $i < $num_pagina + 1; $i++){ 
            if($i == $pagina){?>
                
                <li class="desativado" >
                  <a><?php echo $i; ?></a>
                </li>
            
            <?php }else{ ?>
                
                <li class='numero'>
                  <a href="galeria.php?pagina=<?php echo $i;?>&album=<?php echo $album;?>"><?php echo $i; ?></a>
                </li>
            
            <?php }} ?>

          <!-- Proxima Pagina -->
          
            <?php if($pagina_posterior <= $num_pagina){ ?>

              <li class='proxima'>
                <a href="galeria.php?pagina=<?php echo $pagina_posterior;?>&album=<?php echo $album;?>">Proxima</a>
              </li>

            <?php }else{ ?>

              <li class="desativado">
                  <a>Proxima</a>
              </li>

            <?php }  ?>
          
        </ul>
    </div>
  </div>
  
  <?php include 'footer.php'?>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
