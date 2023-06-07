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
			<div class="caption"><b>Edição de Eventos</b></div>	
				<div class="box">
					<form id="loginform" method="post" action="funcao_editar_evt.php " name="cadastrar" enctype="multipart/form-data">
						<div class="box">
							<span><label for="evt_capacidc">Cod :</label></span>
							<input type="text"  class="campo" name="evt_cod" id="evt_codc" maxlength="1" size="2" value="<?php echo $_REQUEST['evt_cod'];?>" onkeypress='return SomenteNumero(event)' readonly="readonly">
						</div>
						<div class="box">
							<span><label for="evt_nomec">Nome :</label></span>
							<input type="text"  class="campo" name="evt_nome" id="evt_nomec" size="60" value="<?php echo $_REQUEST['evt_nome'];?>" align="right"/>
						</div>
						
						<?php
						$cod_evt = $_REQUEST['evt_cod'];
						$sql = mysql_query("SELECT * FROM eventos WHERE evt_cod = '$cod_evt'");
						$linha = mysql_fetch_array($sql);
						$foto_end = $linha["evt_foto"];					

						?>
						
						<div id="foto_edit_evt">
							<img src="img/evt_fotos/<?php echo $foto_end?>" width="160" height="160" />
						</div>
						
						<div class="box">
							<span><label for="evt_datac">Data :</label></span>
							<input type="date"  class="campo" name="evt_data" id="evt_datac" size="13 " maxlength="11" value="<?php echo $_REQUEST['evt_data'];?>" placeholder="  /  /  " onkeypress='return SomenteNumero(event)'/>
						</div>
							<div class="box">
							<span><label for="evt_localc">Local :</label></span>
							<input type="text"  class="campo" name="evt_local" id="evt_localc" size="34" value="<?php echo $_REQUEST['evt_local'];?>" onkeyup="up(this)" >
						</div>
						<div class="box">
							<span><label for="evt_horarioc">Horario :</label></span>
							<input type="text"  class="campo" name="evt_horario" id="evt_horarioc" size="5"  value="<?php echo $_REQUEST['evt_horario'];?>"/>
						</div>
						<div class="box">
							<span><label for="evt_realizacao">Realização :</label></span>
							<input type="text"  class="campo" name="evt_realizacao" id="evt_realizacaoc" size="20" value="<?php echo $_REQUEST['evt_realizacao'];?>" >
						</div>
						<div class="box">
							<span><label for="evt_webc">Site do Evento :</label></span>
							<input type="url"  class="campo" name="evt_web" id="evt_webc" size="27" value="<?php echo $_REQUEST['evt_web'];?>" onkeyup="up(this)" >
						</div>
						<div class="box">
							<span title="No YouTube, click com o botão direito sobre o video e selecione a opção *Ver código de imporporação* Cole aqui apenas a URL, sem //. Exemplo: www.youtube.com/embed/6XSmPB-uEU0?list=RDeX7nMCRSqJU">
							<label for="evt_webc">Video Chamada :</label></span>
							<input type="text"  class="campo" name="evt_video" id="evt_videoc" size="40" value="<?php echo $_REQUEST['evt_video'];?>"/>
						</div>
						<div class="box">
							<span><label for="evt_estadoc">Estado :</label></span>
							<select name="evt_estado" id="evt_estadoc">
								<optgroup label="Região - Suldeste">
									<option selected><?php echo $_REQUEST['evt_estado'];?></option>	
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
									<option>Paraiba</option>
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
									<option>Goias</option>
									<option>Distrito Federal</option>
									<option>Mato Grosso</option>
									<option>Mato Grosso do Sul</option>
								</optgroup>
							</select>
						</div>
						<div class="box">
							<span title="O evento suporta até quantos Atletas?"><label for="evt_capacidc">Capacidade :</label></span>
							<input type="text"  class="campo" name="evt_capacid" id="evt_capacidc" maxlength="3" size="3" value="<?php $classe = $_REQUEST['evt_capacid'];
																																		if($classe ==2 ){
																																			$classe = 20;
																																		}elseif($classe ==3){
																																			$classe = 30;
																																		}elseif ($classe ==4){
																																			$classe = 40;
																																		}elseif ($classe ==5){
																																			$classe =  50;
																																		}
																																		echo $classe; ?>"onkeypress='return SomenteNumero(event)'><b>Atletas</b>
						</div>
							<span><label for="evt_descricaoc">&nbsp;&nbsp;Descrição :</label></span>
							<textarea type="text"  rows="5" cols="50" name="evt_descricao" id="evt_descricaoc"label"><?php echo $_REQUEST['evt_desc'];?></textarea>
						<div class="box">
							<span title="Tamanho Maximo 4Mb²">Alterar Foto :</span>
							<input type="file"  class="campo" name="evt_foto"/>
						</div>
						<div class="box">
							<input type="submit" class="botao" name="salvar" value="SALVAR" onclick="return confirm('Confirma as Alterações em <?php echo $_REQUEST['evt_nome'];?> ?')">
							<input type="submit" class="botao" name="excluir" value="EXCLUIR" onclick="return confirm('Deseja Realmente EXCLUIR <?php echo $_REQUEST['evt_nome'];?> ?')">
							<a href="BRS-GEVENTOS_PESQ.php" onclick="window.open(this.href,'BRS-GEVENTOS_EDIT.php','width=600,height=600'); return false;"><input type="button" class="botao" name="pesquisar" value="PESQUISAR Outro"></a>
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