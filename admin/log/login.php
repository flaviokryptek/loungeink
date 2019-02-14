<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de login feita com bootstrap">
    <meta name="author" content="Flávio">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center">Informe seu usuário e senha</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="#" name="login" id="login" method="POST" enctype="multipart/form-data" id="login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Usuário" name="usuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Senha" name="password" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button name="login" id="login" class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
      include "../../conexao/conecta.php";
      
      //Pega os dados de usuario e senha que o cliente informou no formulario acima
      if(isset($_POST['login'])){
        session_start();
        $usuario = $_POST["usuario"];
        $senha = $_POST["password"];
        
        //pega a senha correta do usuario no bd
        $query1 = "SELECT senha FROM usuarios WHERE usuario = '$usuario' LIMIT 1";
        $executa = mysqli_query($conn, $query1);
        
        //caso exista um cadastro, compara se a senha que o cliente informou está igual a senha no bd
        if(mysqli_num_rows($executa) == 1){
            $resultado_consulta = mysqli_fetch_assoc($executa);
            $senha_usuario = $resultado_consulta['senha'];
            $compara_senhas = password_verify($senha, $senha_usuario);
            //se a senha for verdadeira a variavel $compara_senhas recebe TRUE
        
        }else{//caso não exista um cadastro, informa mensagem de erro
            echo 
                '<div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" align="center"><strong>Erro!</strong> Usuário inválido. Por favor, tente novamente!</div>
                    </div>
                </div>';
            exit();
        }

        //busca o usuario que o cliente informou
        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' LIMIT 1";
        $result = mysqli_query($conn, $query);
        
        //se o usuario existe e a senha for invalida, informa erro
        if ((mysqli_num_rows($result) == 1) AND ($compara_senhas == FALSE)) {
          echo 
          '<div class="row">
              <div class="col-md-12">
                <div class="alert alert-danger" align="center"><strong>Erro!</strong> Usuário e/ou senha inválidos. Por favor, tente novamente!</div>
              </div>
          </div>';
        
        }else{//inicia sessao
          $resultado = mysqli_fetch_assoc($result);
          if(!isset($_SESSION)){
            session_start();
          }
          //armazena o usuario e o nome na sessao, pode ser usado em qualquer pagina
          $_SESSION[usuario] = $resultado['usuario']; 
          $_SESSION[nome] = $resultado['nome'];
          mysqli_close($conn);
          header("Location: ../index.php"); //redireciona o cliente para a pagina index
        }
      }
    ?>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
