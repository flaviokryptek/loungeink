<?php
    $query_artistas_list = 'SELECT * FROM artistas';
    $result_artistas_list = mysqli_query($conn, $query_artistas_list);

    if($result_artistas_list){
        while($row_artistas_list = mysqli_fetch_assoc($result_artistas_list)){?> 
        <tr>
            <td><img src="../uploads/artistas/<?php echo $row_artistas_list['foto'];?>"></td>
            <td class="title"><p><?php echo $row_artistas_list['nome'];?></p></td>
            <td class="title"><p><?php echo $row_artistas_list['biografia'];?></p></td>
            <!--<td><p><?php echo $row_artistas_list['facebook'];?></p></td>
            <td><p><?php echo $row_artistas_list['instagram'];?></p></td>-->
            <td><a class="editar" href="artistas.php?id=<?php echo $row_artistas_list['id']?>#edit_artistas">Editar</a></td>
            <td><a class="excluir" href="artistas.php?id=<?php echo $row_artistas_list['id'];?>#del_artistas">Excluir</a></td>
        </tr>
       
<?php } } ?>