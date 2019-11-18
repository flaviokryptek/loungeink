<?php

    while($row = mysqli_fetch_assoc($resultado)){ ?>

    <div>      
        <img src="../uploads/<?php echo $row['foto'];?>">

        <ul>
            <li><a class="excluir" href="back-end/gallery_del_foto.php?id=<?php echo $row['id'];?>&foto=<?php echo $row['foto'];?>">Excluir</a></li>
            
            <li><p><?php echo $row['album'];?></p></li>
        </ul>
    </div>

<?php } ?>