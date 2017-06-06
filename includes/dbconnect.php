<?php
	$host = "localhost";
	$database = "loja_jogos";
	$userBanco = "root";
	$senhaBanco = "";

	$conexao = new PDO('mysql:host='.$host.';
						dbname='.$database.';
						charset=utf8',$userBanco,$senhaBanco);
?>