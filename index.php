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

  <div class="whatsapp">
    <a href="https://api.whatsapp.com/send?phone=5565999781134&text=Olá"><img src="img/rede-social/whatsapp.png"></a>
  </div>

  <div class="main">
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
    </div>
    

    <section class="full-section">
      <div class="welcome-title">
        <p>BEM-VINDO Á TATTOOARIA LOUNGE INK</p>
      </div>
      <div>
        <img src="img/ornamento.png">
      </div>
      <div class="welcome-text">
        <p>Limpo. Ousado. Profissional. Criativo.</p>
      </div>
    </section>

    <?php include 'conexao/conecta.php';
     
      $feed_query = "SELECT * FROM feed ORDER BY id ASC";
      $resultado = mysqli_query($conn, $feed_query);
      $count_feed = 1;

      while($row = mysqli_fetch_assoc($resultado)){ 
        if($count_feed % 2){?>
      
      <section class="post-section">
        <div class="post-center">
          <div class="post-left">
            <div class="post-imagem">
              <img src="uploads/feed/<?php echo $row['imagem'];?>">
            </div>
          </div>

          <div class="post-right">
            <div class="post-text">
              <div class="text-label">
                <h3 class="post-title"><?php echo $row['titulo'];?></h3>
                <p><?php echo $row['texto'];?></p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php }else{ ?>

      <section class="post-section">
        <div class="post-center">
          <div class="post-left">
            <div class="post-text">
              <div class="text-label">
                <h3 class="post-title"><?php echo $row['titulo'];?></h3>
                <p><?php echo $row['texto'];?></p>
              </div>
            </div>
          </div>

          <div class="post-right">
            <div class="post-imagem">
              <img src="uploads/feed/<?php echo $row['imagem'];?>">
            </div>
          </div>
        </div>
      </section>
  
    <?php } /*$count_feed ++;*/ } ?>

    <section class="full-section">
      <div class="box-div1">
        <p class="welcome-title" style="font-size: 30pt;">FAÇA-NOS UMA VISITA</p>
      </div>
      <div class="box-div2">
        <img src="img/ornamento.png">
      </div>
      <div class="box-div3">
        <p class="welcome-text">Como chegar</p>
      </div>
    </section>

    <section class="post-section">
      <div class="post-center" style="width: 100%;">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3756.8321998694328!2d-57.496667557543184!3d-14.627155741891048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2ecdc0f90b16f446!2sTattooaria+Lounge+Ink!5e0!3m2!1spt-BR!2sbr!4v1548725950107" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </section>
  </div>
  <?php include 'footer.php'?>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
