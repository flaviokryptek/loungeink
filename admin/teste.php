<?php    
    session_start();

    include '../conexao/conecta.php';

    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
                                

    $excluir_foto = "DELETE FROM galeria WHERE id='$id'";
    $mysqli_query = mysqli_query($conn, $excluir_foto);
    
    echo $id;

?>