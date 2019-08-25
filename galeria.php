<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Tattooaria Lounge Ink</title>
  <link rel="icon" href="img/logo.jpg">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/reset.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/scripts.js"></script>
</head>

<body class="bg-galeria">
  
  <?php include 'header.php'?>

  <div class="divisao">

    <div class="pri-divisao">
      <div class="welcome-div1">
        <div class="box-div1">
          <p class="welcome-title" style="color:black; font-size: 60px">GALERIA DE FOTOS</p>
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
        <p>Filtrar por: Album</p>
      </div>
    </div>

  </div>

  <div class="main" style="background-color: transparent">
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
</body>
</html>
