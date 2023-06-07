<?php
define("HOST","localhost");
define("USER", "root");
define("PASS", "root");

function conexao(){
	$conexao = mysqli_connect(HOST, USER, PASS);
	if(!$conexao){
		die("<p>Erro no Usuario e Senha do Banco de dados!");
	}

	return $conexao;
}
?>
