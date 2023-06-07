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
	<section id="interface_popup">
		<section id="body_popup">
				<!-- formulario cadastro atleta -->
			<div class="caption"><b>Gestão de Atletas</b></div>	
				<div class="box">
					<form id="loginform" method="post" action="funcao_editar_atl.php " name="cadastrar" enctype="multipart/form-data">
						<div class="box">
							<span><label for="atl_nomec">Nome :</label></span>
							<input type="text"  class="campo" name="atl_nome" id="atl_nomec" size="60" placeholder="Nome do NOVO Atleta" value="<?php echo $_REQUEST['atl_nome'];?>" align="right" onkeyup="up(this)"/>
						</div>
						<div class="box">
							<span><label for="atl_apelidoc">Apelido :</label></span>
							<input type="text"  class="campo" name="atl_apelido" id="atl_apelidoc" size="30" placeholder="Apelido do NOVO Atleta" value="<?php echo $_REQUEST['atl_apelido'];?>" align="right" onkeyup="up(this)"/>
						</div>
						<div class="box">
							<span><label for="atl_nascc">Nascimento :</label></span>
							<input type="date"  class="campo" name="atl_nasc" id="atl_nascc" size="10 " maxlength="11" placeholder="  /  /  " onkeypress='return SomenteNumero(event)'value="<?php echo $_REQUEST['atl_nasc'];?>"/>
						</div>
						
						<?php
							$foto_cpf = $_REQUEST['atl_cpf'];
							$sql = mysql_query("SELECT * FROM atletas WHERE atl_cpf = '$foto_cpf'");
							$linha = mysql_fetch_array($sql);
							$foto_end = $linha["atl_foto"];
						?>
						
						<div id="foto_edit">
							<img src="img/atl_fotos/<?php echo $foto_end?>" width="200" height="200" />
						</div>
						
						<div class="box">
							<span><label for="atl_cpfc">CPF :</label></span>
							<input type="text"  class="campo" name="atl_cpf" id="atl_cpfc" size="13 " maxlength="11" placeholder="Somente Numeros" value="<?php echo $_REQUEST['atl_cpf'];?>" align="right" readonly="readonly">
						</div>
						<div class="box">
							<span><label for="atl_emailc">E-mail :</label></span>
							<input type="email"  class="campo" name="atl_email" id="atl_emailc" size="30" placeholder="Email do NOVO Atleta" value="<?php echo $_REQUEST['atl_email'];?>" required />
						</div>
						<div class="box">
							<span><label for="atl_telc">Tel :</label></span>
							<input type="tel"  class="campo" name="atl_tel" id="atl_telc" size="11" maxlength="11" onkeypress='return SomenteNumero(event)' value="<?php echo $_REQUEST['atl_tel'];?>" required />
						</div>
							<div class="box">
							<span><label for="atl_cidadec">Cidade :</label></span>
							<input type="text"  class="campo" name="atl_cidade" id="atl_cidadec" size="30" value="<?php echo $_REQUEST['atl_cidade'];?>" align="right" onkeyup="up(this)"/>
						</div>
						<div class="box">
							<span><label for="atl_estadoc">Estado :</label></span>
							<select name="atl_estado" id="atl_estadoc">
								<option selected><?php echo $_REQUEST['atl_estado'];?></option>	
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
						<div class="box">
							<span><label for="atl_regiaoc">Região :</label></span>
							<input type="text"  class="campo" name="atl_regiao" id="atl_regiaoc" size="15" value="<?php echo $_REQUEST['atl_regiao'];?>" align="right" readonly="readonly" />
						</div>
						<div class="box">
							<span>Sexo :</span>
							<input type="radio" class="campo" name="atl_sexo" id="atl_sexoM" value="M"<?php echo ($_REQUEST['atl_sexo']== 'M')?'checked':'';?>><label for="atl_sexoM">Masculino</label></input>
							<input type="radio" class="campo" name="atl_sexo" id="atl_sexoF" value="F"<?php echo ($_REQUEST['atl_sexo']== 'F')?'checked':'';?>><label for="atl_sexoF">Feminino</label></input>
						</div>
						<div class="box">
							<span><label for="atl_categoriac">Categoria :</label></span>
							<select name="atl_categoria" id="atl_categoriac" required>
									<option selected><?php echo $_REQUEST['atl_categoria'];?></option>	
									<option>PRO</option>
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
							<input type="text"  class="campo" name="atl_patrocinio" id="atl_patrocinioc" size="30" value="<?php echo $_REQUEST['atl_patro'];?>" align="right" onkeyup="up(this)" />
						</div>
						<div class="box">
							<span title="Melhor Manobra do Atleta"><label for="atl_trickc">Best Trick :</label></span>
							<input type="text"  class="campo" name="atl_trick" id="atl_trickc" size="30" onkeyup="up(this)" value="<?php echo $_REQUEST['atl_trick'];?>" />
						</div>
							<div class="box">
							<span><label for="atl_pontuacaoc">Pontuação :</label></span>
							<input type="text" class="campo" name="atl_pontuacao" id="atl_pontuacaoc" size="6" maxlength="4" value="<?php echo $_REQUEST['atl_points'];?>" align="right" readonly="readonly">
						</div>
						<div class="box">
							<span title="No YouTube, click com o botão direito sobre o video e selecione a opção *Ver código de imporporação* Cole aqui apenas a URL, sem //. Exemplo: www.youtube.com/embed/6XSmPB-uEU0?list=RDeX7nMCRSqJU"><label for="atl_videoc">Video Profile :</label></span>
							<input type="text"  class="campo" name="atl_video" id="atl_videoc" size="30" placeholder="codigo de Incorporação YouTube" value="<?php echo $_REQUEST['atl_video'];?>" /> <span style="font-size:20px; color:blue;" title="No YouTube, click com o botão direito sobre o video e selecione a opção *Ver código de imporporação* Cole aqui apenas a URL, sem //. Exemplo: www.youtube.com/embed/6XSmPB"> ?</span>
						</div>
							<span><label for="atl_descricaoc">Descrição :</label></span>
							<textarea type="text"  rows="5" cols="50" name="atl_descricao" id="atl_descricaoc"label for="" align="right" ><?php echo $_REQUEST['atl_desc'];?></textarea>
						<div class="box">
							<span title="Tamanho Maximo 4Mb²">Alterar Foto :</span>
							<input type="file"  class="campo" name="atl_foto"/>
						</div>
						<div class="box">
							<input type="submit" class="botao" name="salvar" value="SALVAR" onclick="return confirm('Confirma as Alterações em <?php echo $_REQUEST['atl_nome'];?> ?')">
							<input type="submit" class="botao" name="excluir" value="EXCLUIR" onclick="return confirm('Deseja Realmente EXCLUIR <?php echo $_REQUEST['atl_nome'];?> ?')">
							<a href="BRS-GATLETAS_PESQ.php" onclick="window.open(this.href,'BRS-GATLETAS_EDIT.php','width=600,height=600'); return false;"><input type="button" class="botao" name="pesquisar" value="PESQUISAR Outro"></a>
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