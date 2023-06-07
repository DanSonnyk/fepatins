<?php
	session_start();
	include "conexao/conexaodb.php";
	$config = conexao();
	
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
		<section id="body">
				<!-- formulario cadastro atleta -->
			<div class="caption"><b>Gestão de Atletas</b></div>	
				<div class="box">
					<form id="loginform" method="post" action="funcao_editar_atl_points.php " name="cadastrar" enctype="multipart/form-data">
						<div class="box">
							<span><label for="atl_nomec">Nome :</label></span>
							<input type="text"  class="campo" name="atl_nome" id="atl_nomec" size="60" placeholder="Nome do NOVO Atleta" value="<?php echo $_REQUEST['atl_nome'];?>" align="right" readonly="readonly"/>
						</div>
						<div class="box">
							<span><label for="atl_cpfc">CPF :</label></span>
							<input type="text"  class="campo" name="atl_cpf" id="atl_cpfc" size="13 " maxlength="11" placeholder="Somente Numeros" value="<?php echo $_REQUEST['atl_cpf'];?>" align="right" readonly="readonly"/>
						</div>
						<div id="foto_edit">
								<?php
								$foto_cpf = $_REQUEST['atl_cpf'];
								$sql = mysql_query("SELECT * FROM atletas WHERE atl_cpf = '$foto_cpf'");
								$linha = mysql_fetch_array($sql);
								$foto_end = $linha["atl_foto"];
								?>
							<img src="img/atl_fotos/<?php echo $foto_end?>" width="200" height="200" />
						</div>
						<div class="box">
							<span><label for="atl_cidadec">Cidade :</label></span>
							<input type="text"  class="campo" name="atl_cidade" id="atl_cidadec" size="30" value="<?php echo $_REQUEST['atl_cidade'];?>" align="right" readonly="readonly"/>
						</div>
						<div class="box">
							<span><label for="atl_patrocinioc">Patrocinio :</label></span>
							<input type="text"  class="campo" name="atl_patrocinio" id="atl_patrocinioc" size="30" value="<?php echo $_REQUEST['atl_patro'];?>" align="right" readonly="readonly"/>
						</div>
							<div class="box">
							<span><label for="atl_pontuacaoc">Pontuação Atual:</label></span>
							<input type="text" class="campo" name="atl_pontuacao_atual" id="atl_pontuacaoc" size="6" maxlength="4" value="<?php echo $_REQUEST['atl_points'];?>" align="right" readonly="readonly"/>
						</div>
						<br><br>
							<div class="box">
							<span title="Digite os pontos à SOMAR ou SUBTRAIR"><label for="atl_pontuacaoc">NOVOS Pontos:</label></span>
							<input type="text" class="campo" name="atl_pontuacao" id="atl_pontuacaoc" size="6" maxlength="4" onkeypress='return SomenteNumero(event)' required/>
						</div>
							
						<div class="box">
							<input type="submit" class="botao" name="somar" value="SOMAR" onclick="return confirm('Confirma ADIÇÃO de Pontos para <?php echo $_REQUEST['atl_nome'];?> ?')"/>
							<input type="submit" class="botao" name="subtrair" value="SUBTRAIR" onclick="return confirm('Confirma a SUBTRAÇÃO de Pontos para <?php echo $_REQUEST['atl_nome'];?>?')">
							<a href="BRS-GATLETAS_PESQ.php" onclick="window.open(this.href,'BRS-GATLETAS_EDIT.php','width=400,height=600'); return false;"><input type="button" class="botao" name="pesquisar" value="PESQUISAR Outro"></a>
						</div>
					</form>
				</div>
				<!--formulario cadastro atleta -->
	
		</section>
	</section>
	<footer>
	</footer>
	</body>

</html>