<?php
	$host = 'localhost';
	$usuario = 'flavio';
	$senha = 'MySQL@2019';
	$bd = 'lounge_ink';
	$conn = mysqli_connect($host, $usuario, $senha, $bd) or die ('Erro ao conectar com o banco de dados requisitado');
?>