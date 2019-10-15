<?php
    include '../conexao/conecta.php';

    $id = $_GET["id"]; //pega o código passado via URL
    $foto = $_GET["foto"];

    $query = "DELETE FROM feed WHERE id = $id";
    $result = mysqli_query($conn, $query);

    unlink("../uploads/feed/$foto");

    mysqli_close($conn);
    header('Refresh:0;url=list_feed.php');
?>