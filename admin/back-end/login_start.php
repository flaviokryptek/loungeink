<?php 
    
    if(isset($_POST['login'])){ // login

        include '../conexao/conecta.php'; 
        $usuario = $_POST["usuario"];
        $senha = $_POST["password"];

        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' LIMIT 1";
        $executa = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($executa) == 1){ // verify
            $resultado_consulta = mysqli_fetch_assoc($executa);
            $senha_usuario = $resultado_consulta['senha'];
            $compara_senhas = password_verify($senha, $senha_usuario);
            
            if ((mysqli_num_rows($executa) == 1) AND ($compara_senhas == TRUE)) {
                
                session_start();

                $_SESSION["usr"] = $resultado_consulta['usuario'];
                $_SESSION["name"] = $resultado_consulta['nome'];

                mysqli_close($conn);
                header("Location: index.php"); 
                
            }else{
                $alert="Usuario ou senha invalido, por favor tente novamente!";
            }

        }else{
            $alert="Usuario invalido, tente novamente!";
        }

    }// login end
?>