<?php include 'back-end/login_start.php'?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de login">
    <meta name="author" content="Flávio Lourenço">
    <link href="css/desktop.css" media="only screen and (min-width:500px)" rel="stylesheet">
    <link href="css/mobile.css" media="only screen and (max-width:500px)" rel="stylesheet">

</head>

<body>
    
    <div class="login"><!-- login -->
        
        <form method="POST" class="form">
            <img src="../img/logo4.png">
            <ul>
                <li><p>Painel de controle</p></li>
                <li><input required placeholder="Usuário" name="usuario" type="text" autofocus></li>
                <li><input required placeholder="Senha" name="password" type="password"></li>
                <li><button type="submit" name="login">Entrar</button></li>
            </ul>
            <span class='alert'>
                <p><?php echo $alert ?></p>
            </span>
        </form>

    </div>
    
</body>

</html>
