<?php
    include '../../conexao/conecta.php';

    $id = $_GET["id"]; //pega o código passado via URL
    
    $query = "DELETE FROM album WHERE id = $id and id != '1'";
    $result = mysqli_query($conn, $query);

    mysqli_close($conn);
    header('Refresh:0;url=../galeria.php?pagina=1&album=Todas');
?>
