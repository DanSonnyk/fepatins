<?php
define("HOST","localhost");
define("USER", "root");
define("PASS", "root");
define("DB", "brs");

	$conn = new mysqli(HOST, USER, PASS);
	if(!$conexao){
		die("<p>Erro no Usuario e Senha do Banco de dados!");
	}
?>
