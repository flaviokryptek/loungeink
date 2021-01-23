<?php 
    include '../../conexao/conecta.php';

    $id = $_GET["id"];
    $foto = $_GET["foto"];
    
    $excluir_foto = "DELETE FROM galeria WHERE id='$id'";
    $mysqli_query = mysqli_query($conn, $excluir_foto);
    
    unlink("../../uploads/$foto");
   
    mysqli_close($conn);
    header('Refresh:0;url=../galeria.php?pagina=1&album=Todas');
?> 