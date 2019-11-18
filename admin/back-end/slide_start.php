<?php

    $alert=false;
    $id=false;

    if (isset($_POST['submit_slide'])){ //submit slide start
        
        $foto = $_FILES['foto'];
        $nome = $_POST['nome'];
        
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
                $caminho_imagem = "../uploads/slides/" . $nome_imagem;
                //Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);
                $insere = "INSERT INTO carousel (nome, imagem) values ('$nome','$nome_imagem')";
                $result = mysqli_query($conn, $insere);
                
                if($result){
                    $alert = 'Slide adcionado com sucesso!';
                
                }else{
                    $alert = 'Erro ao adcionar slide! Por favor, tente novamente.';
                }
                }
                //Se houver mensagens de erro, exibe-as
                if(count($error)!=0){
                    foreach($error as $erro){
                    $alert =$erro;
                }
            }
        }
        }
    }//submit slide end
        
    if(isset($_GET["id"])){ // fetch slide id start
        $id = $_GET["id"];
        
        $query = "SELECT * FROM carousel WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $query);
        if($result){
            $slide_row = mysqli_fetch_assoc($result);
            $slide_foto = $slide_row['imagem'];
        }else{
            $alert = 'Slide não encontrado, tente novamente!';
        }
    } // fetch slide id end

    if (isset($_POST['edit_slide'])){ //edit slide start

        $foto = $_FILES['foto'];
        $nome = $_POST['nome'];
        $id = $_POST['id'];
    
        for ($k = 0; $k < count($foto['name']); $k++){
    
        if($foto["name"][$k] == true){
    
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
                    //apaga foto antiga
                    unlink("../uploads/slides/$slide_foto");
                    //pega a extensão da imagem
                    preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i', $foto['name'][$k], $ext);
                    //gera um nome único para a imagem
                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                    //caminho onde ficara a imagem
                    $caminho_imagem = "../uploads/slides/" . $nome_imagem;
                    
                    //Faz o upload da imagem para seu respectivo caminho
                    move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);
                    $insere = "UPDATE carousel SET nome = '$nome', imagem = '$nome_imagem' WHERE id = '$id'";
                    $result = mysqli_query($conn, $insere);
                    
                }else{
                    foreach($error as $erro){
                        $alert = $erro;
                    }
                }
            }
            
        }else{
            $insere = "UPDATE carousel SET nome='$nome' WHERE id = '$id'";
            $result = mysqli_query($conn, $insere);
        }
        
        }
        if($result){
            $alert ='Slide editado com sucesso!';
        }else{
            $alert ='Erro ao editar slide! Por favor, tente novamente.';
        }
    } // edit slide end

    
    if(isset($_POST["del_slide"])){ // del lide start

        $foto = $_FILES['imagem'];
        $id = $_POST['id'];

        unlink("../uploads/slides/$foto");

        $query = "DELETE FROM carousel WHERE id = $id";
        $result = mysqli_query($conn, $query);
        
        if($result){
            $alert = 'Slide apagado!';
        }else{
            $alert = 'Slide não encontrado, tente novamente!';
        }
    }// del lide end
?>