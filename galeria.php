<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Tattooaria Lounge Ink - Galeria</title>
  <link rel="icon" href="img/logo.jpg">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/reset.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  
  <?php include 'header.php'?>

  <div class="main">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/foto01.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/fachada.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/postfoto01.png" class="d-block w-100" alt="...">
        </div>
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
          <p>FILTRO</p>
        </div>
      </div>
    </div>

    <div class="album">
        <?php
          include 'conexao/conecta.php';
          $query ='SELECT * from galeria ORDER BY id DESC';
          $result = mysqli_query($conn,$query);
          if($result){
            while($row = mysqli_fetch_assoc($result)){
              $id = $row['id'];
              $foto = $row['foto'];
         
        ?>

        <div class="col-album" >
          <div class="col-foto">
            <?php echo "<img src='uploads/".$foto."'>"?>
          </div>
        </div>

        <?php
            }
          }
        mysqli_close($conn);
        ?>
      
    </div>
  </div>
  
  <?php include 'footer.php'?>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
