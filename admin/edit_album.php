<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Tattooaria Lounge Ink</title>
  <link href="../img/logo.jpg" rel="icon">
  
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <?php include 'header.php' ?>

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
        <form name="atualizar" action="" method="POST">
            <?php
                $id = $_GET["id"]; //pega o código passado via URL
                include '../conexao/conecta.php';
                $query = "SELECT * FROM album WHERE id = $id LIMIT 1";
                $result = mysqli_query($conn, $query);
                if($result){
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $nome = $row['nome'];
                    
            ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" required id="nome" value="<?php echo $nome;?>">
            </div>
            
            <div class="form-group">
                <button class="btn btn-danger" type="reset" name="limpar" id="limpar">Limpar</button>
                <button class="btn btn-primary" type="submit" name="atualizar" id="atualizar">Atualizar</button>
            </div>
            <?php
                }else{
                    echo '
                        <div class="alert alert-danger" role="alert">
                            <strong>Usuário não encontrado, tente novamente!</strong>
                        </div>';
                    exit();
                }
                mysqli_close($conn);
            ?>
        </form>
        <?php
            if(isset($_POST['atualizar'])){
                include '../conexao/conecta.php';
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                
                $atualiza = "UPDATE album SET nome='$nome' WHERE id = '$id'";
                $result = mysqli_query($conn, $atualiza);
                if($result){
                    echo '
                        <div class="alert alert-success" role="alert">
                            <strong>Album editado com sucesso!</strong>
                        </div>';
                }else{
                    echo '
                        <div class="alert alert-danger" role="alert">
                            <strong>Erro ao editar album, tente novamente!</strong>
                        </div>';
                    exit();
                }
                mysqli_close($conn);
            }
        ?>
    </div>
  </main>

  <?php include 'footer.php'?>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>