<?php
	session_start();
	
	include "conexao/conexaodb.php";
	$config = conexao();
	
	$email = htmlspecialchars(strip_tags($_POST['adm_email']));
	$senha = htmlspecialchars(strip_tags(base64_encode($_POST['adm_senha'])));
	
	$verificaEmail = mysql_query("SELECT*FROM organizador WHERE org_email = '$email' AND org_pass = '$senha'");
	$validaEmail = mysql_num_rows($verificaEmail);
	
	$registro = mysql_fetch_array($verificaEmail);
	
	if ($validaEmail == 1){
		if($registro['org_adm'] == 'S'){
			$_SESSION['emailSession']=$email;
			$_SESSION['senhaSession']=$senha;
			
			echo "<meta http-equiv=refresh content='0; URL=BRS-ACESSOADM.php';>";
		}else{
			$_SESSION['emailSession']=$email;
			$_SESSION['senhaSession']=$senha;
			
			echo "<meta http-equiv=refresh content='0; URL=BRS-ACESSORG.php';>";
		}
	}	else{
			echo "<meta http-equiv=refresh content='0; URL=BRS-HOME.php';>
			  <script type=\"text/javascript\">alert(\"Usuario/Senha nao cadastrado ou invalido!\");</script>";
		}
?>

