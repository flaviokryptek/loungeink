<?php

    $alert=false;
    $id=false;
    
    if(isset($_GET["id"])){ // fetch artistas by id start
        $id = $_GET["id"];
        
        $query_artistas = "SELECT * FROM artistas WHERE id = $id LIMIT 1";
        $result_artistas_id = mysqli_query($conn, $query_artistas);
        if($result_artistas_id){ 
            $artistas_row = mysqli_fetch_assoc($result_artistas_id);
        }else{
            $alert = 'Artista não encontrado, tente novamente!';
        }
    }//fetch artistas by id end
    

    if (isset($_POST['submit_artistas'])){//artistas submit start

        $foto = $_FILES['foto'];
        $nome = $_POST['nome'];
        $biografia = $_POST['biografia'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        
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
                $caminho_imagem = "../uploads/artistas/" . $nome_imagem;
                //Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);
                $insere = "INSERT INTO artistas (nome, foto, biografia, facebook, instagram) values ('$nome','$nome_imagem','$biografia','$facebook','$instagram')";
                $result = mysqli_query($conn, $insere);
                
                if($result){
                    $alert = 'Artista adicionado com sucesso!';
                
                }else{
                    $alert = 'Erro ao adicionar artista! Por favor, tente novamente.';
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
    }//artistas submit end
    
    
    
    if (isset($_POST['edit_artistas'])){//artistas edit start

        $foto = $_FILES['foto'];
        $nome = $_POST['nome'];
        $biografia = $_POST['biografia'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
    
        for ($k = 0; $k < count($foto['name']); $k++){
    
        if($foto["name"][$k] != false){
    
            unlink("../uploads/artistas/$artistas_foto");
    
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
                $caminho_imagem = "../uploads/artistas/" . $nome_imagem;
                
                //Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);
                $insere = "UPDATE artistas SET nome = '$nome', foto = '$nome_imagem', biografia = '$biografia', facebook='$facebook', instagram='$instagram' WHERE id = '$id'";
                
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
            $insere = "UPDATE artistas SET nome='$nome', biografia='$biografia',facebook='$facebook', instagram='$instagram' WHERE id = '$id'";
            $result = mysqli_query($conn, $insere);
    
        }
        if($result){
            
            $alert = 'Artista editado com sucesso!';
        
        }else{
            $alert = 'Erro ao editar artista! Por favor, tente novamente.';
        }
    
        }
    }//artistas edit end

    if(isset($_POST["del_artistas"])){//artistas del start
        $foto = $_FILES['foto'];
        $id = $_POST['id'];

        unlink("../uploads/artistas/$foto");

        $query = "DELETE FROM artistas WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if($result){ 
            $alert = 'Artista excluido com sucesso!';
        }else{
            $alert = 'Erro ao excluir artista, tente novamente!';
        }
    }//artistas del end
?>