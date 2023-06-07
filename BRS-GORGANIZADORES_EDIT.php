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
		<title>BrazilianRollingSeries - EDIÇÃO DE ORGANIZADORES</title>
	</head>

	<body onload= "set_interval()" onmousemove="reset_interval()" onscroll="reset_interval()">
	<section id="interface_popup">
		<section id="body_popup">
				<!-- formulario cadastro atleta -->
			<div class="caption"><b>Gestão de Organizadores</b></div>	
				<div class="box">
					<form id="loginform" method="post" action="funcao_editar_org.php " name="cadastrar" enctype="multipart/form-data">
						<div class="box">
							<span><label for="org_nomec">Nome :</label></span>
							<input type="text"  class="campo" name="org_nome" id="org_nomec" size="60" placeholder="Nome do NOVO Organizador" onkeyup="up(this)" autofocus value="<?php echo $_REQUEST['org_nome'];?>"/>
						</div>
						<div class="box">
							<span><label for="org_cpfc">CPF :</label></span>
							<input type="text"  class="campo" name="org_cpf" id="org_cpfc" size="13 " maxlength="11" placeholder="Somente Numeros" onkeypress='return SomenteNumero(event)'value="<?php echo $_REQUEST['org_cpf'];?>" readonly="readonly"/>
						</div>
						<div class="box">
							<span><label for="org_emailc">Email :</label></span>
							<input type="email"  class="campo" name="org_email" id="org_emailc" size="30" value="<?php echo $_REQUEST['org_email'];?>"/>
						</div>
						<div class="box">
							<span><label for="org_telc">Tel :</label></span>
							<input type="text"  class="campo" name="org_tel" id="org_telc" size="11" maxlength="11" onkeypress='return SomenteNumero(event)' value="<?php echo $_REQUEST['org_tel'];?>"/>
						</div>
						<div class="box">
							<span><label for="org_cidadec">Cidade :</label></span>
							<input type="text"  class="campo" name="org_cidade" id="org_cidadec" size="30" onkeyup="up(this)"  value="<?php echo $_REQUEST['org_cidade'];?>"/>
						</div>
						<div class="box">
							<span><label for="org_estadoc">Estado :</label></span>
							<select name="org_estado" id="org_estadoc">
								<option selected><?php echo $_REQUEST['org_estado'];?></option>	
								<optgroup label="Região - Suldeste">
									<option>São Paulo</option>
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
						</div>
							<div class="box">
							<span><label for="org_regiaoc">Região :</label></span>
							<input type="text"  class="campo" name="org_regiao" id="org_regiaoc" size="15" value="<?php echo $_REQUEST['org_regiao'];?>" align="right" readonly="readonly" />
						</div>
						<div class="box">
							<span><label for="org_entidadec">Entidade :</label></span>
							<input type="text"  class="campo" name="org_entidade" id="org_entidadec" size="50" value="<?php echo $_REQUEST['org_entidade'];?>"/>
						</div>
						<div class="box">
							<span title="Preencha Para Alterar A Senha Atual! Caso contrario deixe em BRANCO"><label for="org_senhac">Alterar Senha :</label></span>
							<input type="text" class="campo" name="org_senha" id="org_senhac" size="6" maxlength="6">
						</div>
						<div class="box">
							<span>ADMINISTRADOR DO SISTEMA:</span>
							<input type="radio" class="campo" name="org_adm" id="org_admS" value="S"<?php echo ($_REQUEST['org_adm']== 'S')?'checked':'';?>><label for="atl_sexoM">SIM</label></input>
							<input type="radio" class="campo" name="org_adm" id="org_admN" value="N"<?php echo ($_REQUEST['org_adm']== 'N')?'checked':'';?>><label for="atl_sexoF">NÃO</label></input>
						</div>
						<div class="box">
							<input type="submit" class="botao" name="salvar" value="SALVAR" onclick="return confirm('Confirma as Alterações em <?php echo $_REQUEST['atl_nome'];?> ?')">
							<input type="submit" class="botao" name="excluir" value="EXCLUIR" onclick="return confirm('Deseja Realmente EXCLUIR <?php echo $_REQUEST['atl_nome'];?> ?')">
							<a href="BRS-GORGANIZADORES_PESQ.php" onclick="window.open(this.href,'BRS-GORGANIZADORES_EDIT.php','width=600,height=600'); return false;"><input type="button" class="botao" name="pesquisar" value="PESQUISAR Outro"></a>
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