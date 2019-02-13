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
  
  <?php include 'header.php'?>

  <div class="divisao">
    <div class="galeria-show">
      <form name="cadastro" method="post" enctype="multipart/form-data">
        <div>
            <p>Selecione as fotos</p>
            <input type="file" name="foto" multiple="multiple" required>
            <button type="reset" name="limpar" >Limpar</button>
            <button type="submit" name="cadastrar" >Enviar</button>
        </div>
      </form>
      <?php include 'upload.php'?>
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
  
  <?php include 'footer.php'?>
</body>
</html>
