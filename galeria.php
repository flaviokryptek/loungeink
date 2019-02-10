<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Tattooaria Lounge Ink</title>
  <link rel="icon" href="img/logo.jpg">
  <link href="css/styles.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/scripts.js"></script>
</head>

<body class="bg-galeria">
  
  <header>
    <nav>
    <div class="esquerda">
        <div class="esquerda-item">  
          <img src="img/newlogo.png">
        </div>
    </div>
    <div class="centro">
        <div class="centro-item">
            <a class="header-title" href="index.php">TATTOOARIA LOUNGE INK</a>
        </div>
    </div>
    <div class="direita">
        <div class="direita-item">
            <a class="header-link" href="index.php">Inicio</a>&nbsp;
            <a class="header-link" href="galeria.php">Galeria</a>
        </div>
    </div> 
  </nav> 
  </header>

  <div class="divisao">
    <div class="galeria-show">
      <?php include 'upload.php' ?>
    </div>
  </div>

  <div class="main" style="background-color: transparent">
    <div class="album">
        <?php
          include 'conexao/conecta.php';
          $query ='SELECT * from tatuagens ORDER BY id DESC';
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
  

  <footer>
    <div class="footer-center">
      <div class="footer-superior">
        <div class="post-center" style="width: 90%;">
          <div id="container-footer">
            <div id="coluna-01" class="coluna">
              <p class="post-title">Links</p>
              <p><a href="index.html">Inicio</a></p>
              <p><a href="galeria.html">Galeria</a></p>
            </div>
            <div id="coluna-02" class="coluna">
              <p class="post-title">Contato</p>
              <p>(65) 99639-6723</p>
              <p><a href="https://www.facebook.com/tattooarialoungeink/" target="_blank">Facebook</a></p>
              <p><a href="https://www.instagram.com/tattooarialoungeink/" target="_blank">Instagram</a></p>
              <p><a href="tattooarialoungeink@gmail.com" target="_blank">Gmail</a></p>
            </div>
            <div id="coluna-03" class="coluna">
              <p class="post-title">Endereço</p>
              <p>Av. Brasil, 1263 S - Vila Real, Tangará da Serra - MT, 78300-000</p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-inferior">
        <p class="footer-text">Todos os direitos reservados à Tattooaria Lounge Ink.</p>
      </div>
    </div>
  </footer>
</body>
</html>
