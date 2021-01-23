<?php

    //Verificar a pagina anterior e posterior
    $pagina_anterior = $pagina - 1;
    $pagina_posterior = $pagina + 1;

    // Pagina Anterior 

    if($pagina_anterior != 0){ ?>
    
        <a href="galeria.php?pagina=<?php echo $pagina_anterior; ?>&album=<?php echo $album;?>">Anterior</a>
    
    <?php }else{ ?>

        <a class="disable">Anterior</a>

    <?php }  


    // Numeração

        
    for($i = 1; $i < $num_pagina + 1; $i++){ 
        if($i == $pagina){?>
            
            <a class="disable" href="galeria.php?pagina=<?php echo $i;?>&album=<?php echo $album;?>"><?php echo $i; ?></a>

        <?php }else{ ?>

            <a href="galeria.php?pagina=<?php echo $i;?>&album=<?php echo $album;?>"><?php echo $i; ?></a>
        
        <?php }} 

    // Proxima Pagina

    if($pagina_posterior <= $num_pagina){ ?>

        <a href="galeria.php?pagina=<?php echo $pagina_posterior;?>&album=<?php echo $album;?>">Proxima</a>
    
    <?php }else{ ?>

        <a class="disable" >Proxima</a>

    <?php } ?>
