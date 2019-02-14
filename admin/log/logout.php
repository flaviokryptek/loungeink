<?php //destroi a sessao iniciada e redireciona para a pagina de login
	session_start();
	session_destroy();
	header("location: login.php");
	exit();
?>