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
        <table class="table table-hover" style="margin-top: 100px">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../conexao/conecta.php';

                    $query = 'SELECT * FROM carousel';
                    $result = mysqli_query($conn, $query);

                    if($result){
                        while($row = mysqli_fetch_assoc($result)){?> 
                        <tr>
                            <th scope="row"><?php echo $row['id'];?></th>
                            <td> <img src="../uploads/slides<?php echo $row['imagem'];?>"> </td>
                            <td> <?php echo $row['nome'];?> </td>
                            <td> <?php echo $row['descricao'];?> </td>
                            <td>

                                <a href="edit_carousel.php?id=<?php echo $row['id'];?>"><button type="button" class ="btn btn-warning btn-sm">Editar</button></a>
                                                    
                                <a href="remove_slide.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a>
                            
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    mysqli_close($conn);
                    ?>
            </tbody>
        </table>
    </div>
  </main>

  <?php include 'footer.php'?>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>