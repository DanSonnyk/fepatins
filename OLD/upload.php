<?php

 if(isset($_POST['cadastrar'])){
	$imagem = $_FILES['atl_foto'];
	$nome = $imagem['name'];
	$tmp = $imagem['tmp_name'];
	$size = $imagem['size'];
	$formato = end(explode('.',$nome));
	}
?>