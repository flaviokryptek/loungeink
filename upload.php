
<?php
    if(isset($_POST['cadastrar'])){

        include 'conexao/conecta.php';
      
        //criando variaveis com os dados recebidos via POST
       
        $foto = $_FILES['foto'];
        

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
                $caminho_imagem = 'uploads/'.$nome_imagem;
                //Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"][$k], $caminho_imagem);
                $insere = "INSERT INTO galeria (foto) values ('$nome_imagem')";
                $result = mysqli_query($conn, $insere);
                if($result){
                echo '<p>Tattooagem enviada com sucesso!</p>';
                
                }else{
                echo '<p>Erro ao cadastrar tattooagem! Por favor, tente novamente.</p>';
                }
            }
            //Se houver mensagens de erro, exibe-as
            if(count($error)!=0){
                foreach($error as $erro){
                    echo '<p>'.$erro . '</p>';
                }
            }
        }
    }
        mysqli_close($conn);
    }
?>