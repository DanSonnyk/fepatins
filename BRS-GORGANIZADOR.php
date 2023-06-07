<?php
	session_start();
	
	if(!isset($_SESSION['emailSession']) AND !isset($_SESSION['senhaSession'])){
	
		header("Location: BRS-HOME.php");
		
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="txt/css" href="css/estilo_adm.css">
		<script language="JavaScript" src="funcoes_js.js">
		</script>
		<title>BrazilianRollingSeries</title>
	</head>

	<body onload= "set_interval()" onmousemove="reset_interval()">
	<section id="interface">
	<header id="header">
		<div id="cabecalho">
				<div id="logo">
				
				</div>
			<!--box de login-->
			<div id="login">
				<div class="caption"><b>Olá XXXXXXXX</b></div>
				<a href="logout.php"><h3 align=center>logout</h3></a> 
			</div>
			<!--box de login-->
			
			<!-- box de menu -->
	
			<!-- box de menu -->
		</div>
	</header>
		
		<section id="body">
				<!-- formulario cadastro atleta -->
			<div class="caption"><b>Atleta</b></div>	
				<div class="box">
					<form id="loginform" method="post" action="funcao_cadastrar_atl.php" name="login" >
						<div class="box">
							<span>Nome :</span>
							<input type="text" class="campo" name="atl_nome" size="60">
						</div>
						<div class="box">
							<span>CPF :</span>
							<input type="text" class="campo" name="atl_cpf" size="15">
						</div>
						<div class="box">
							<span><label for="atl_telc">Tel :</label></span>
							<input type="text"  class="campo" name="atl_tel" id="atl_telc" size="11" maxlength="11" onkeypress='return SomenteNumero(event)' placeholder="XX000000000" required />
						</div>
						<div class="box">
							<span>Cidade :</span>
							<input type="text" class="campo" name="atl_cidade" size="30">
						</div>
						<div class="box">
							<span>Patrocinio :</span>
							<input type="text" class="campo" name="atl_patrocinio" size="30">
						</div>
							<span>Descrição :</span>
							<textarea type="text" rows="5" cols="50" name="atl_descricao"></textarea>
						<div class="box">
							<span>Foto :</span>
							<input type="text" class="campo" name="atl_foto" size="60">
						</div>
						<div class="box">
							<input type="submit" class="botao" name="cadastrar" value="SALVAR">
							<input type="submit" class="botao" value="NOVO Atleta">
							<input type="submit" class="botao" value="EDITAR Atleta">
						</div>
					</form>
				</div>
			</div>	
				<!--formulario cadastro atleta -->
	
		</section>
	</section>
	<footer>
		<div id="footer">
			<div class="left_footer">
				<ul>
					<li class="facebook"><a href="http://www.facebook.com/fikinxok" title=" BRS on Facebbok" target="blank">Faça parte da page BRS </a></li>
				</ul>
			</div>
			
			<div class="right_footer">
				<ul class="foot_list">
					<li><a href="BRS-HOME.php" title="Home">Home</a></li>	
					<li><a href="BRS-EVENTOS.php" title="Eventos">Eventos</a></li>
					<li><a href="BRS-PATINADORES.php" title="Patinadores">Patinadores</a></li>
					<li><a href="BRS-RANKING.php" title="Ranking">Ranking</a></li>
					<li><a href="BRS-SOBRE.php" title="Sobre">Sobre</a></li>
					<li>|</li>
					<li>Desenvolvimento Acadenico</li>
				</ul>
			</div>
		<div>
		</footer>
	</body>

</html>