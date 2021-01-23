<?php
    $query_feed_list = 'SELECT * FROM feed';
    $result_feed_list = mysqli_query($conn, $query_feed_list);

    if($result_feed_list){
        while($row_feed_list = mysqli_fetch_assoc($result_feed_list)){?> 
        <tr>
            <td><img src="../uploads/feed/<?php echo $row_feed_list['imagem'];?>"></td>
            <td><p><?php echo $row_feed_list['titulo'];?></p></td>
            <td><p><?php echo $row_feed_list['texto'];?></p></td>
            <td><a class="editar" href="feed.php?id=<?php echo $row_feed_list['id']?>#edit_feed">Editar</a></td>
            <td><a class="excluir" href="feed.php?id=<?php echo $row_feed_list['id'];?>#del_feed">Excluir</a></td>
        </tr>
       
<?php } } ?>