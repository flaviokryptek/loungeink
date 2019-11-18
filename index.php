<!doctype html>
<html>

<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <title>Tattooaria Lounge Ink - Inicio</title>
  <link href="img/logo.jpg" rel="icon">
  <link href="css/styles.css" rel="stylesheet">
  
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  
  <?php include 'header.php'?>

  <ul class="whatsapp">
    <li><p>Fale conosco!</p></li>
    <li><a href="https://api.whatsapp.com/send?phone=5565999781134&text=Olá"><img src="img/rede-social/whatsapp.png"></a></li>
  </ul>

  <div class="main">

    <div class="slideshow"> <!-- carrosel -->
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

            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $slide; ?>"></li>

          <?php $slide++; }}?>
          
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
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Proxima</span>
        </a>
      </div>
    </div> <!-- fim carrosel -->
    
      <div class="section">
        <div class="full-section">
          <h3>BEM-VINDO Á TATTOOARIA LOUNGE INK</h3>
        </div>
      </div>

    <?php include 'conexao/conecta.php';
     
      $feed_query = "SELECT * FROM feed ORDER BY id ASC";
      $resultado = mysqli_query($conn, $feed_query);
      $count_feed = 1;

      while($row = mysqli_fetch_assoc($resultado)){ 
        if($count_feed % 2){?>
      
      <section class="post-section">
        
        <div class="post-imagem">
          <img src="uploads/feed/<?php echo $row['imagem'];?>">
        </div>
      
        <div class="post-text">
          <ul>
            <li> <h3><?php echo $row['titulo'];?></h3> </li>
            <li> <p><?php echo $row['texto'];?></p> </li>
          </ul>
        </div>
            
      </section>

      <?php }else{ ?>

      <section class="post-section">
        
        <div class="post-text">
          <ul>
            <li> <h3><?php echo $row['titulo'];?></h3> </li>
            <li> <p><?php echo $row['texto'];?></p> </li>
          </ul>
        </div>
      
        <div class="post-imagem">
          <img src="uploads/feed/<?php echo $row['imagem'];?>">
        </div>
          
      </section>
  
    <?php }/* $count_feed ++; */} ?>

    <div class="section">
      <div class="full-section">
        <h3>NOSSOS ARTISTAS</h3>
      </div>
    </div>

    <section class="post-section">
        
      <div class="post-imagem">
        <img src="img/noimage.png">
      </div>
    
      <div class="post-text">
        <ul>
          <li> <h3>Nome Sobrenome</h3> </li>
          <li> <p>BIOGRAFIA</p> </li>
          <li> <a href="https://www.facebook.com/tattooarialoungeink/" target="_blank"><img src="img/rede-social/facebook2.png">Facebook</a></li>
          <li> <a href="https://www.instagram.com/tattooarialoungeink/" target="_blank"><img src="img/rede-social/instagram2.png">Instagram</a></li>
        </ul>
      </div>
          
    </section>

    <section class="post-section">
        
      <div class="post-imagem">
        <img src="img/noimage.png">
      </div>
    
      <div class="post-text">
        <ul>
          <li> <h3>Nome Sobrenome</h3> </li>
          <li> <p>BIOGRAFIA</p> </li>
          <li> <a href="https://www.facebook.com/tattooarialoungeink/" target="_blank"><img src="img/rede-social/facebook2.png">Facebook</a></li>
          <li> <a href="https://www.instagram.com/tattooarialoungeink/" target="_blank"><img src="img/rede-social/instagram2.png">Instagram</a></li>
        </ul>
      </div>
          
    </section>

    <div class="section">
      <div class="full-section">
        <h3>PATROCINADORES</h3>
      </div>
    </div>

    <section class="post-section">
      <div class="patrocinadores">
        <a href="#"><img src="img/noimage.png"></a>
        <a href="#"><img src="img/noimage.png"></a>
        <a href="#"><img src="img/noimage.png"></a>
        <a href="#"><img src="img/noimage.png"></a>
        <a href="#"><img src="img/noimage.png"></a>
        <a href="#"><img src="img/noimage.png"></a>
        <a href="#"><img src="img/noimage.png"></a>
        <a href="#"><img src="img/noimage.png"></a>
        <a href="#"><img src="img/noimage.png"></a>
      </div>
    </section>

  </div>
  <?php include 'footer.php'?>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
