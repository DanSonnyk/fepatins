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
				<div class="caption"><b>
									Olá <?php $n = $nome_log;
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
			
			<!-- box de menu -->
	
			<!-- box de menu -->
		</div>
	</header>
		
		<section id="body">
				<!-- formulario cadastro atleta -->
			<div class="caption"><b>Gestão de Atletas</b></div>	
				<div class="box">
					<form id="loginform" method="post" action="funcao_cadastrar_atl.php " name="cadastrar" enctype="multipart/form-data">
						<div class="box">
							<span><label for="atl_nomec">Nome :</label></span>
							<input type="text"  class="campo" name="atl_nome" id="atl_nomec" size="60" placeholder="Nome do NOVO Atleta" onkeyup="up(this)" autofocus required />
						</div>
						<div class="box">
							<span><label for="atl_apelidoc">Apelido :</label></span>
							<input type="text"  class="campo" name="atl_apelido" id="atl_apelidoc" size="30" placeholder="Apelido do NOVO Atleta" value="" align="right" onkeyup="up(this)"/>
						</div>
						<div class="box">
							<span><label for="atl_nascc">Nascimento :</label></span>
							<input type="date"  class="campo" name="atl_nasc" id="atl_nascc" size="10 " maxlength="11" placeholder="  /  /  " onkeypress='return SomenteNumero(event)' required />
						</div>
						<div class="box">
							<span><label for="atl_cpfc">CPF :</label></span>
							<input type="text"  class="campo" name="atl_cpf" id="atl_cpfc" size="13 " maxlength="11" placeholder="Somente Numeros" onkeypress='return SomenteNumero(event)' required />
						</div>
						<div class="box">
							<span><label for="atl_emailc">E-mail :</label></span>
							<input type="email"  class="campo" name="atl_email" id="atl_emailc" size="40" placeholder="Email do NOVO Atleta" required />
						</div>
						<div class="box">
							<span><label for="atl_telc">Tel :</label></span>
							<input type="tel"  class="campo" name="atl_tel" id="atl_telc" size="11" maxlength="11" placeholder="XX000000000" onkeypress='return SomenteNumero(event)' required />
						</div>
							<div class="box">
							<span><label for="atl_cidadec">Cidade :</label></span>
							<input type="text"  class="campo" name="atl_cidade" id="atl_cidadec" size="30" onkeyup="up(this)" required />
							</div>
						<div class="box">
							<span><label for="atl_estadoc">Estado :</label></span>
							<select name="atl_estado" id="atl_estadoc" required>
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
									<option>Pernambuco</option>
									<option>Alagoas</option>
									<option>Sergipe</option>
									<option>Paraíba</option>
									<option>Rio Grande do Norte</option>
									<option>Piauí</option>
									<option>Maranhão</option>
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
									<option>Goiás</option>
									<option>Distrito Federal</option>
									<option>Mato Grosso</option>
									<option>Mato Grosso do Sul</option>
								</optgroup>
							</select>
						</div>
							<div class="box">
							<span>Sexo :</span>
							<input type="radio" class="campo" name="atl_sexo" id="atl_sexoM" checked value="M" required><label for="atl_sexoM">Masculino</label></input>
							<input type="radio" class="campo" name="atl_sexo" id="atl_sexoF" value="F" required><label for="atl_sexoF">Feminino</label></input>
						</div>
						<div class="box">
							<span><label for="atl_categoriac">Categoria :</label></span>
							<select name="atl_categoria" id="atl_categoriac" required>
									<option selected>PRO</option>
									<option>AM</option>
									<option>INI</option>
									<option>AVA</option>
									<option>LENDA</option>
							</select>
						</div>
						<div class="box">
						<span><label for="atl_modalidadec">Modalidade :</label></span>
							<select name="atl_modalidade" id="atl_modalidadec" required>
									<option selected>Street</option>
									<option>Vertical</option>
									<option>Street/Vertical</option>
							</select>
						</div>
						<div class="box">
							<span><label for="atl_patrocinioc">Patrocinio :</label></span>
							<input type="text"  class="campo" name="atl_patrocinio" id="atl_patrocinioc" size="30" required />
						</div>
						<div class="box">
							<span title="Melhor Manobra do Atleta"><label for="atl_trickc">Best Trick :</label></span>
							<input type="text"  class="campo" name="atl_trick" id="atl_trickc" size="30" onkeyup="up(this)" required/>
						</div>
						<div class="box">
							<span title="No YouTube, click com o botão direito sobre o video e selecione a opção *Ver código de imporporação* Cole aqui apenas a URL, sem //. Exemplo: www.youtube.com/embed/6XSmPB-uEU0?list=RDeX7nMCRSqJU"><label for="atl_videoc">Video Profile :</label></span>
							<input type="text"  class="campo" name="atl_video" id="atl_videoc" size="30" placeholder="codigo de Incorporação YouTube" required/> <span style="font-size:20px; color:blue;" title="No YouTube, click com o botão direito sobre o video e selecione a opção *Ver código de imporporação* Cole aqui apenas a URL, sem //. Exemplo: www.youtube.com/embed/6XSmPB"> ?</span>
						</div>
							<span><label for="atl_descricaoc">&nbsp;&nbsp;Descrição :</label></span>
							<textarea type="text"  rows="5" cols="50" name="atl_descricao" id="atl_descricaoc"label required></textarea>
						<div class="box">
							<span title="Tamanho Maximo 4Mb²">Foto :</span>
							<input type="file"  class="campo" name="atl_foto" value="atl_foto" placeholder="imagem jpg" required />
						</div>
						<div class="box">
							<input type="submit" class="botao" name="cadastrar" value="SALVAR" onclick="return confirm('Confirma o envio do formulario ?')" />
							<input type="reset" class="botao" value="LIMPAR">
							<a href="BRS-GATLETAS_PESQ.php" onclick="window.open(this.href,'BRS-GATLETAS_EDIT.php','width=600,height=700'); return false;"><input type="button" class="botao" name="pesquisar" value="PESQUISAR"></a>
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
					<li>From Skater to Skater</li>
				</ul>
			</div>
		<div>
		</footer>
	</body>

</html>