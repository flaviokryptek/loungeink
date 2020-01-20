<?php include "back-end/login_force.php";?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <title>Inicio - Painel de controle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina inicial - Painel de controle">
    <link href="../img/logo.jpg" rel="icon">
    <meta name="author" content="Flávio Lourenço">
    <link href="css/desktop.css" media="only screen and (min-width:600px)" rel="stylesheet">
    <link href="css/mobile.css" media="only screen and (max-width:600px)" rel="stylesheet">

</head>

<body>

    <?php include 'header.php'?>
    <main class="content">
        <div class="index">
            <ul>
                <li><h1>Pagina Inicial</h1></li>
                <li><p>Bem vindo(a) <?php echo $_SESSION["name"];?>!</p></li>
                <li><p>Use o menu acima para navegar entre as páginas.</p></li>
            </ul>
        </div>
    </main>
    <?php include 'footer.php'?>

</body>

</html>