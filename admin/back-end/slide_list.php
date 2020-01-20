<?php

    $query_slide_list = 'SELECT * FROM carousel';
    $result_slide_list = mysqli_query($conn, $query_slide_list);

    if($result_slide_list){
        while($row_slide_list = mysqli_fetch_assoc($result_slide_list)){?> 
        <tr>
            <td><img src="../uploads/slides/<?php echo $row_slide_list['imagem'];?>"></td>
            <td class="title"><p><?php echo $row_slide_list['nome'];?></p></td>
            <td><a class="editar" href="slide.php?id=<?php echo $row_slide_list['id'];?>#edit_slide">Editar</a></td>             
            <td><a class="excluir" href="slide.php?id=<?php echo $row_slide_list['id'];?>#del_slide">Excluir</a></td>
        </tr>
<?php } }?>