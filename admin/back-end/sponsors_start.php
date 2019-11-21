<?php

    $alert=false;
    $id=false;
    
    if(isset($_GET["id"])){ // fetch sponsor by id start
        $id = $_GET["id"];
        
        $query_sponsors = "SELECT * FROM sponsors WHERE id = $id LIMIT 1";
        $result_sponsors_id = mysqli_query($conn, $query_sponsors);
        if($result_sponsors_id){ 
            $sponsors_row = mysqli_fetch_assoc($result_sponsors_id);
        }else{
            $alert = 'Patrocinador não encontrado, tente novamente!';
        }
    }//fetch sponsor by id end
    

    if (isset($_POST['submit_sponsors'])){//feed submit start

        $foto = $_FILES['foto'];
        $nome = $_POST['nome'];
        $link = $_POST['link'];
        
        for ($k = 0; $k < count($foto['name']); $k++){

        if(!empty($foto["name"][$k])){
            $largura = 4920;
            $altura = 4080;
            $tamanho = 100000000;
            $error = array();
            
            if(!preg_match("/^image\/(pjpeg|jpeg|jpg|png|gif|bmp)$/", $foto["type"][$k])){
                $error[1] = "Isso não é uma imagem.";
            }
            
            $dimensoes = getimagesize($foto["tmp_name"][$k]);
            
            if($dimensoes[0] > $largura){
                $error[2]="A largura da imagem não deve ultrapassar".$largura." pixels";
            }
            if($dimensoes[1] > $altura){
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
            if($foto["size"][$k]>$tamanho){
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }
            
            if(count($error) == 0){
                //pega a extensão da imagem
                preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i', $foto['name'][$k], $ext);
                //gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                //caminho onde ficara a imagem
                $caminho_imagem = "../uploads/sponsors/" . $nome_imagem;
                //Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);
                $insere = "INSERT INTO sponsors (nome, link, imagem) values ('$nome','$link','$nome_imagem')";
                $result = mysqli_query($conn, $insere);
                
                if($result){
                    $alert = 'Patrocinadores adcionado com sucesso!';
                
                }else{
                    $alert = 'Erro ao adcionar patrocinadores! Por favor, tente novamente.';
                }
            }
        }
        }
        //Se houver mensagens de erro, exibe-as
        if(count($error)!=0){
            foreach($error as $erro){
            $alert = $erro;
            }
        }
    }//feed submit end
    
    
    
    if (isset($_POST['edit_sponsors'])){//feed edit start

        $foto = $_FILES['foto'];
        $nome = $_POST['nome'];
        $link = $_POST['link'];
        $id = $_POST['id'];
    
        for ($k = 0; $k < count($foto['name']); $k++){
    
        if($foto["name"][$k] != false){
    
            unlink("../uploads/sponsors/$sponsors_foto");
    
        if(!empty($foto["name"][$k])){
            $largura = 4920;
            $altura = 4080;
            $tamanho = 100000000;
            $error = array();
            
            if(!preg_match("/^image\/(pjpeg|jpeg|jpg|png|gif|bmp)$/", $foto["type"][$k])){
                $error[1] = "Isso não é uma imagem.";
            }
            
            $dimensoes = getimagesize($foto["tmp_name"][$k]);
            
            if($dimensoes[0] > $largura){
                $error[2]="A largura da imagem não deve ultrapassar".$largura." pixels";
            }
            if($dimensoes[1] > $altura){
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
            if($foto["size"][$k]>$tamanho){
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }
            
            if(count($error) == 0){
    
                //pega a extensão da imagem
                preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i', $foto['name'][$k], $ext);
                //gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                //caminho onde ficara a imagem
                $caminho_imagem = "../uploads/sponsors/" . $nome_imagem;
                
                //Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);
                $insere = "UPDATE sponsors SET nome = '$nome', imagem = '$nome_imagem', link = '$link' WHERE id = '$id'";
                
                $result = mysqli_query($conn, $insere);
                
            }
                //Se houver mensagens de erro, exibe-as
                if(count($error)!=0){
                    foreach($error as $erro){
                    $alert = $erro;
                    }
                }
            }
    
        }else{
            $insere = "UPDATE sponsors SET nome='$nome', link='$link' WHERE id = '$id'";
            $result = mysqli_query($conn, $insere);
    
        }
        if($result){
            
            $alert = 'Patrocinador editado com sucesso!';
        
        }else{
            $alert = 'Erro ao editar patrocinador! Por favor, tente novamente.';
        }
    
        }
    }// feed edit end

    if(isset($_POST["del_sponsors"])){// feed del start
        $foto = $_FILES['foto'];
        $id = $_POST['id'];

        unlink("../uploads/sponsors/$foto");

        $query = "DELETE FROM sponsors WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if($result){ 
            $alert = 'Patrocinador apagado!';
        }else{
            $alert = 'Erro ao apagar patrocinador, tente novamente!';
        }
    }//feed del end
?>