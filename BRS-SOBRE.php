<?php
	include "conexao/conexaodb.php";
	$config = conexao();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.brasilrollingseries.com/CSS/img/brslogosmall.gif" type="image/x-icon">
		<link rel="stylesheet" type="txt/css" href="http://www.brasilrollingseries.com/CSS/estilo1.css"/>
		<script type="text/javascript">
		</script>
		<title>BRS-SOBRE</title>
<!--Script para google-analytics-->	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-69109533-1', 'auto');
	  ga('send', 'pageview');
	</script>
<!--Script para google-analytics-->
	</head>

	<body>
<section id="com">
	<div id="apoiof">
		<?php include 'imp/apoiof.php'?>
	</div>
	<div id="apoiom">
		<?php include 'imp/apoiom.php'?>
	</div>
	<section id="interface">
	<header id="header">
		<div id="cabecalho">
				<div id="logo">
				
				</div>
						<!--box de login-->
			<div id="login">
				<br><br>
				<div class="caption"><b>Login Organizador</b></div>
				<div class="box">
					<form id="loginform" method="post" action="funcao_login.php" name="login" >
							<table>
								<tr>
									<td><label for="cEmail"/>email:</label></td><td><input type="email" name="adm_email" id="cEmail"required/></td>
								</tr>	
								<tr>
									<td><label for="cPass">senha:</label></td><td><input type="password" name="adm_senha" id="cPass"required/></td>
								</tr>
								<tr>
									<td colspan="2">
										<table>
											<tr>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
												<td><input type="submit" value="" class="btn_login"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
					</form>
				</div>
			</div>
			<!--box de login-->
			
			<!-- box de menu -->
			<div id="menu">
				<nav>
				<ul>
					<li><a href="BRS-HOME.php" title="Home">HOME</a></li>	
					<li><a href="BRS-EVENTOS.php" title="Eventos">EVENTOS</a></li>
					<li><a href="BRS-PATINADORES.php" title="Patinadores">PATINADORES</a></li>
					<li><a href="BRS-RANKING.php" title="Ranking">RANKING</a></li>
					<li><a class="active" href="BRS-SOBRE.php" title="Sobre">SOBRE</a></li>
				</ul>
				</nav>
			</div>
			<!-- box de menu -->
		</div>
	</header>
		
		<section id="body">
				<!-- box da esquerda -->
				<div id="bodylRank">
					<div class="box">
						<div class="caption"><b>Iniciar Cadastro</b></div>
						<form id="vst_mensagem" method="post" action="funcao_mensagem_vst.php " name="enviar_mensagem" enctype="multipart/form-data">
							<div class="box">
								<span title="Digite seru Nome"><label for="vst_nomec">Seu Nome :</label></span>
								<input type="text"  class="campo" name="vst_nome" id="vst_nomec" size="30" onkeyup="up(this)" required/>
							</div>
							<div class="box">
								<span title="Digite seu Email"><label for="vst_emailc">Seu Email :</label></span>
								<input type="email"  class="campo" name="vst_email" id="vst_emailc" size="30" required/>
							</div>
							<div class="box">
								<span title="Digite seu estado"><label for="vst_assuntoc">Seu Estado :</label></span>
								<input type="text"  class="campo" name="vst_assunto" id="vst_assuntoc" size="30" required/>
							</div>
							<div class="box">
								<span title="Duvidas, Sugestões, Reclamações etc."><label for="vst_mensagemc">O que deseja fazer? :</label></span>
								<textarea type="text"  rows="10" cols="30" name="vst_mensagem" id="vst_mensagemc" label onkeyup="upfirst(this)" required /></textarea>
								<input type="submit" class="botao" name="enviar" value="CADASTRAR"/>
							</div>
						</form>
					</div>
				</div>
				<!--box da esquerda -->
				<!--box do centro -->
				<div id="bodycSobre">
					<div class="caption"><b>Sobre BRS</b></div>
					<div class="box">
						<h6>O B.R.S. : Brasil Rolling Series foi desenvolvido para unir, centralizar e integrar 
						informações uteis aos praticantes e admiradores do Patins Inline brasileiro, 
						rumo a conquista de nossa independência.<h6>
					</div>
					<div class="caption"><b>FAQ</b></div>
					<div class="box">
							<h5>Atletas</h5>
							<h6>Para fazer parte do ranking nacional ou atualizar seu perfil, basta o atleta enviar uma mensagem através do formulario à esquerda desta pagina com a mensagem "Solicitação de Cadastro" ou "Atualização Perfil" dependendo do que deseja solicitar.</h6>
							<br>
							<h5>Eventos</h5>
							<h6>Para cadastrar um evento na agenda, basta o organizador entrar em contato através das redes ou preencher o formulario à esquerda com a mensagem "Cadastrar Evento".</h6><br>
							<h5>Pontuação</h5>
							<h6>A pontuação se dará de acordo com a colocação e nivel do evento, obedecendo a seguinte função:<br>
								<center>(100 pontos x nivel) / colocação  = pontuação</center><br>
								Exemplo: <br><br>Em um evento nivel 4 estrelas, <br>todos atletas terão 100 pontos x 4 = 400 pontos divididos pela sua colocação:<br><br>
								1º colocado => 400 / 1 = 400 pontos<br>
								2º colocado => 400 / 2 = 200 pontos<br>
								3º colocado => 400 / 3 = 130 pontos<br>
								10° colocado =>400 / 10 = 40 pontos<br><br>
								
								Haverá arredondamento das frações.<br>
								Ao final de cada ano, teremos a divulgação Ranking final do ano.<br>
								Ao Inicio de cada ano, as pontuações serão reiniciadas.<br>
							</h6>
					</div>
				</div>
				<!--box do centro -->
		</section>
	</section>
</section>
	<footer>
		<div id="footer">
			<div class="left_footer">
				<ul>
					<li class="facebook"><a href="https://www.facebook.com/brasilrollingseries" title=" BRS on Facebbok" target="blank">Faça parte tambem no Facebook!</a></li>
				</ul>
			</div>
			<div id="msgNav">
				<?php include 'imp/navcompativel.php'?>
			</div>
			<div class="right_footer">
				<ul class="foot_list">
					<li><a href="BRS-HOME.php" title="Home">Home</a></li>	
					<li><a href="BRS-EVENTOS.php" title="Eventos">Eventos</a></li>
					<li><a href="BRS-PATINADORES.php" title="Patinadores">Patinadores</a></li>
					<li><a href="BRS-RANKING.php" title="Ranking">Ranking</a></li>
					<li><a href="BRS-SOBRE.php" title="Sobre">Sobre</a></li>
					<li>|</li>
					<li>From Skater to Skater</li>
				</ul>
			</div>
		<div>
		</footer>
	</body>

</html>