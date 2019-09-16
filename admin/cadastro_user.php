<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="sistema" content="Cadastro de usuarios">
    <meta name="autor" content="Flávio">
    <link rel="icon" href="img/icone.ico">

    <title>Página de Cadastro de Usuários</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <?php
        include 'header.php';
    ?>

    <main role="main" class="container" style="margin-top:100px;">
        <form name="cadastro_user" action="#" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" required id="nome" placeholder="Seu nome">
            </div>
            <div class="form-group">
                <label for="nome">Usuário</label>
                <input type="text" class="form-control" name="usuario" required id="usuario" placeholder="Usuário">
            </div>
            <div class="form-group">
                <label for="sanha">Senha</label>
                <input type="password" class="form-control" name="senha" required id="senha" placeholder="Senha">
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="reset" name="limpar" id="limpar">Limpar</button>
                <button class="btn btn-primary" type="submit" name="cadastrar_user" id="cadastrar_user">Cadastrar</button>
            </div>
        </form>
    
    <?php
        if (isset($_POST['cadastrar_user'])){// pega os dados de nome, usuario, senha
            include '../conexao/conecta.php';
            $nome = $_POST['nome'];
            $usuario = $_POST['usuario'];
            $senha1 = $_POST['senha'];
            
            $senha = password_hash($senha1, PASSWORD_DEFAULT); //transforma a senha informada em uma senha padrao

            $insere = "INSERT INTO usuarios ( nome, usuario, senha) VALUES ('$nome','$usuario','$senha')";// insere os dados no bd

            $result = mysqli_query($conn, $insere);

            if($result){
                echo '
                    <div class="alert alert-success" role="alert">
                        <strong>Usuário cadastrado com sucesso!</strong>
                    </div>';
            }else{
                echo '
                    <div class="alert alert-danger" role="alert">
                        <strong>Erro ao cadastrar o usuário, tente novamente!</strong>
                    </div>';
                exit();
            }
            mysqli_close($conn);
        }
    ?>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
