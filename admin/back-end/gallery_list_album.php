
<?php 

    $ativo = $_GET["album"];

    $query = 'SELECT * FROM album ORDER BY id ASC';
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
    if($ativo == $row['nome']){?>
        <span class="active">
            <a href='galeria.php?pagina=1&album=<?php echo $ativo?>'><?php echo $ativo?></a> 
            <a id="del_album" class="del_album" href="back-end/gallery_del_album.php?id=<?php echo $row['id'];?>">✖</a>
        </span>
    <?php }else{ ?>   
        <span>
            <a href='galeria.php?pagina=1&album=<?php echo $row['nome']?>'><?php echo $row['nome']?></a>
            <a id="del_album" class="del_album" href="back-end/gallery_del_album.php?id=<?php echo $row['id']?>">✖</a>
        </span>
    <?php }}

?>