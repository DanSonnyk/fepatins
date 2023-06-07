<?php
	session_start();
	include "conexao/conexaodb.php";
	$config = conexao();
	
	$email_log = $_SESSION['emailSession'];
	
	$sql_log = ("SELECT * FROM organizador WHERE org_email ='$email_log'");
	$resultado = mysql_query($sql_log);
	$registro = mysql_fetch_array($resultado);
	$nome_log = $registro['org_nome'];
		
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
		<link rel="icon" href="http://www.brasilrollingseries.com/CSS/img/brslogosmall.gif" type="image/x-icon">
		<link rel="stylesheet" type="txt/css" href="http://www.brasilrollingseries.com/CSS/estilo_adm.css"/>
		<script language="JavaScript" src="funcoes_js.js">
		</script>
		<title>BrazilianRollingSeries</title>
	</head>

	<body onload= "set_interval()" onmousemove="reset_interval()" onscroll="reset_interval()">
	<section id="interface">
	<header id="header">
		<div id="cabecalho">
				<div id="logo">
				
				</div>
			<!--box de login-->
			<div id="login">
				<div class="caption"><b>Olá 
										<?php $n = $nome_log;
												$na = explode(" ",$n);
												$nomer = $na[0];
												$sobren = $na[1];
												echo $nomer.' '.$sobren;
										?>
										</b>
				</div>
				<a href="logout.php"><h3 align=center>logout</h3></a>
				<div class="box" >
				<p align=center><a href="BRS-ACESSOADM.php">VOLTAR AO MENU <img src="img/seta_voltar.png" width="30" height="30" /></a></p>
				</div>
			</div>
			<!--box de login-->
		</div>
	</header>
		
		<section id="body">
			<div class="caption"><b>Relatorios</b></div>	
				<div class="box">
					<?php
						$sql_select = ("SELECT * FROM visitas");
						$resultado = mysql_query($sql_select);
						$numero_registros = mysql_num_rows($resultado);
					?>
						<span><label>&nbsp;&nbsp;&nbsp;&nbsp;Acessos : <?php echo $numero_registros;?></label></span>
				</div>
		</section>
	</section>
	<footer>
		<div id="footer">
			<div class="left_footer">
				<ul>
					<li class="facebook"><a href="https://www.facebook.com/brasilrollingseries" title=" BRS on Facebbok" target="blank">Faça parte da page BRS </a></li>
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
					<li>Desenvolvimento Acadênico</li>
				</ul>
			</div>
		<div>
		</footer>
	</body>

</html>