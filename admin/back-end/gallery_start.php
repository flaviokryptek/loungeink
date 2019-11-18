<?php

    $alert = false;


    //paginação start
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

    $album = $_GET['album'];

    if($album != "Todas"){
        $busca ="SELECT * from galeria where album='$album'";
    }else{
        $busca ="SELECT * from galeria";
    }

    $resultado = mysqli_query($conn,$busca);

    $total_busca = mysqli_num_rows($resultado);

    $quantidade_pg = 20;

    $num_pagina = ceil($total_busca/$quantidade_pg);

    $inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

    if($album != "Todas"){
        $busca ="SELECT * FROM galeria WHERE album = '$album' ORDER BY id DESC LIMIT $inicio, $quantidade_pg ";
    }else{
        $busca ="SELECT * FROM galeria ORDER BY id DESC LIMIT $inicio, $quantidade_pg ";
    }

    $resultado = mysqli_query($conn,$busca);

    $total_busca = mysqli_num_rows($resultado);
    //paginação end


    if (isset($_POST['submit_album'])){// submit album start

        $nome = $_POST['nome'];
        $insere = "INSERT INTO album ( nome) VALUES ('$nome')";// insere os dados no bd

        $result = mysqli_query($conn, $insere);

        // header('Refresh:0;url=cadastro_album.php'); atualiza a pagina

        if($result){
            $alert = 'Album adicionado com sucesso!';
        }else{
            $alert = 'Erro ao adicionar album, tente novamente!';
            exit();
        }
    }// submit album end

    if(isset($_POST['submit_foto'])){// foto submit start
        
        include '../conexao/conecta.php';
    
        //criando variaveis com os dados recebidos via POST
    
        $foto = $_FILES['foto'];
        $album = $_POST['album'];
        
        for ($k = 0; $k < count($foto["name"]); $k++){

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
                $caminho_imagem = "../uploads/". $nome_imagem;
                

                //Faz o upload da imagem para seu respectivo caminho

                move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);

                $insere = "INSERT INTO galeria (foto, album) values ('$nome_imagem','$album')";
                $result = mysqli_query($conn, $insere);
                if($result){
                $alert='Foto Adcionada com sucesso!';
            
                }else{
                $alert='Erro ao adicionar foto! Por favor, tente novamente.';
                }
            }
            //Se houver mensagens de erro, exibe-as
            if(count($error)!=0){
                foreach($error as $erro){
                    $alert = $erro ;
                }
            }
        }
        }
    }// foto submit end
?>