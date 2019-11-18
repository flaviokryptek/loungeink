<?php

    $alert=false;
    $id=false;
    
    if(isset($_GET["id"])){ // fetch feed by id start
        $id = $_GET["id"];
        
        $query_feed = "SELECT * FROM feed WHERE id = $id LIMIT 1";
        $result_feed_id = mysqli_query($conn, $query_feed);
        if($result_feed_id){ 
            $feed_row = mysqli_fetch_assoc($result_feed_id);
        }else{
            $alert = 'Post não encontrado, tente novamente!';
        }
    }//fetch feed by id end
    

    if (isset($_POST['submit_feed'])){//feed submit start

        $foto = $_FILES['foto'];
        $nome = $_POST['titulo'];
        $descricao = $_POST['texto'];
        
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
                $caminho_imagem = "../uploads/feed/" . $nome_imagem;
                //Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);
                $insere = "INSERT INTO feed (titulo, texto, imagem) values ('$nome','$descricao','$nome_imagem')";
                $result = mysqli_query($conn, $insere);
                
                if($result){
                    $alert = 'Post adcionado com sucesso!';
                
                }else{
                    $alert = 'Erro ao adcionar post! Por favor, tente novamente.';
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
    
    
    
    if (isset($_POST['edit_feed'])){//feed edit start

        $foto = $_FILES['foto'];
        $nome = $_POST['titulo'];
        $descricao = $_POST['texto'];
        $id = $_POST['id'];
    
        for ($k = 0; $k < count($foto['name']); $k++){
    
        if($foto["name"][$k] != false){
    
            unlink("../uploads/feed/$feed_foto");
    
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
                $caminho_imagem = "../uploads/feed/" . $nome_imagem;
                
                //Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);
                $insere = "UPDATE feed SET titulo = '$nome', imagem = '$nome_imagem', texto = '$descricao' WHERE id = '$id'";
                
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
            $insere = "UPDATE feed SET titulo='$nome', texto='$descricao' WHERE id = '$id'";
            $result = mysqli_query($conn, $insere);
    
        }
        if($result){
            
            $alert = 'Post editado com sucesso!';
        
        }else{
            $alert = 'Erro ao editar post! Por favor, tente novamente.';
        }
    
        }
    }//feed edit end

    if(isset($_POST["del_feed"])){//feed del start
        $foto = $_FILES['imagem'];
        $id = $_POST['id'];

        unlink("../uploads/feed/$foto");

        $query = "DELETE FROM feed WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if($result){ 
            $alert = 'Post apagado!';
        }else{
            $alert = 'Erro ao apagar post, tente novamente!';
        }
    }//feed del end
?>