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
		<link rel="stylesheet" type="txt/css" href="css/estilo_adm.css">
		<script language="JavaScript" src="funcoes_js.js">
		</script>
		<title>BrazilianRollingSeries - Gestão de Organizadores</title>
	</head>

	<body onload= "set_interval()" onmousemove="reset_interval()" onscroll="reset_interval()">
	<section id="interface">
	<header id="header">
		<div id="cabecalho">
				<div id="logo">
				
				</div>
			<!--box de login-->
			<div id="login">
				<div class="caption"><b>Olá <?php echo $nome_log?></b></div>
				<a href="logout.php"><h3 align=center>logout</h3></a>
				<div class="box" >
				<p align=center><a href="BRS-ACESSOADM.php">VOLTAR AO MENU <img src="img/seta_voltar.png" width="30" height="30" /></a></p>
				</div>
			</div>
			<!--box de login-->
			
			<!-- box de menu -->
	
			<!-- box de menu -->
		</div>
	</header>
		
		<section id="body">
				<!-- formulario cadastro atleta -->
			<div class="caption"><b>Gestão de Organizadores</b></div>	
				<div class="box">
					<form id="loginform" method="post" action="funcao_cadastrar_atl.php " name="cadastrar" enctype="multipart/form-data">
						<div class="box">
							<span><label for="org_nomec">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome :</label></span>
							<input type="text"  class="campo" name="org_nome" id="org_nomec" size="60" placeholder="Nome do NOVO Organizador" onkeyup="up(this)" autofocus>
						</div>
						<div class="box">
							<span><label for="org_cpfc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CPF :</label></span>
							<input type="text"  class="campo" name="org_cpf" id="org_cpfc" size="13 " maxlength="11" placeholder="Somente Numeros" onkeypress='return SomenteNumero(event)'/>
						</div>
						<div class="box">
							<span><label for="org_patrocinioc">Email :</label></span>
							<input type="email"  class="campo" name="org_email" id="org_emailc" size="30" onkeyup="up(this)">
						</div>
						<div class="box">
							<span><label for="org_cidadec">&nbsp;&nbsp;&nbsp;&nbsp;Cidade :</label></span>
							<input type="text"  class="campo" name="org_cidade" id="org_cidadec" size="30" onkeyup="up(this)" >
							</div>
						<div class="box">
							<span><label for="org_estadoc">&nbsp;&nbsp;&nbsp;&nbsp;Estado :</label></span>
							<select name="org_estado" id="org_estadoc">
								<optgroup label="Região - Suldeste">
									<option selected>São Paulo</option>
									<option>Minas Gerais</option>
									<option>Rio de Janeiro</option>
									<option>Espirito Santo</option>
								</optgroup>
								<optgroup label="Região - Sul">
									<option>Paraná</option>
									<option>Santa Catarina</option>
									<option>Rio Grande do Sul</option>
								</optgroup>
								<optgroup label="Região - Nordeste">
									<option>Bahia</option>
									<option>Ceará</option>
									<option>Pernanbuco</option>
									<option>Alagoas</option>
									<option>Sergipe</option>
									<option>Paraiba</option>
									<option>Rio Grande do Norte</option>
									<option>Piauí</option>
								</optgroup>
								<optgroup label="Região - Norte">
									<option>Amazonas</option>
									<option>Acre</option>
									<option>Amapá</option>
									<option>Pará</option>
									<option>Rondônia</option>
									<option>Roraima</option>
									<option>Tocantins</option>
								</optgroup>
								<optgroup label="Região - Centro-Oeste">
									<option>Goias</option>
									<option>Distrito Federal</option>
									<option>Mato Grosso</option>
									<option>Mato Grosso do Sul</option>
								</optgroup>
							</select>
						</div>
						
						<div class="box">
							<input type="submit" class="botao" name="cadastrar" value="SALVAR" onclick="return confirm('Confirma o envio do formulario ?')" />
							<input type="reset" class="botao" value="LIMPAR">
							<a href="BRS-GATLETAS_PESQ.php" onclick="window.open(this.href,'BRS-GATLETAS_EDIT.php','width=600,height=600'); return false;"><input type="button" class="botao" name="pesquisar" value="PESQUISAR"></a>
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
					<li>Desenvolvimento Acadênico</li>
				</ul>
			</div>
		<div>
		</footer>
	</body>

</html>