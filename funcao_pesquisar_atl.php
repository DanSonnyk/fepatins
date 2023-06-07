<?php
	include "conexao/conexaodb.php";
	$config = conexao();
	
	//DADOS ATLETA
	$nome = $_POST['atl_nome'];
	$cpf = $_POST['atl_cpf'];
	$sexo = $_POST['atl_sexo'];
	$cidade = $_POST['atl_cidade'];
	$estado = $_POST['atl_estado'];
	$patrocinio = $_POST['atl_patrocinio'];
	$pontuacao = $_POST['atl_pontuacao'];
	$descricao = $_POST ['atl_descricao'];
	//FIM DADOS Atleta
	
	function atl_pesquisar(){
	echo "funcionando";
}
	
?>