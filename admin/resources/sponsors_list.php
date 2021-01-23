<?php
    $query_sponsors_list = 'SELECT * FROM sponsors';
    $result_sponsors_list = mysqli_query($conn, $query_sponsors_list);
    
    if($result_sponsors_list){
        while($row_sponsors_list = mysqli_fetch_assoc($result_sponsors_list)){?> 
        <tr>
            <td><img src="../uploads/sponsors/<?php echo $row_sponsors_list['imagem'];?>"></td>
            <td class="title"><p><?php echo $row_sponsors_list['nome'];?></p></td>
            <!--<td class="title"><p><?php echo $row_sponsors_list['link'];?></p></td>-->
            <td><a class="editar" href="sponsors.php?id=<?php echo $row_sponsors_list['id']?>#edit_sponsors">Editar</a></td>
            <td><a class="excluir" href="sponsors.php?id=<?php echo $row_sponsors_list['id'];?>#del_sponsors">Excluir</a></td>
        </tr>
<?php } } ?>