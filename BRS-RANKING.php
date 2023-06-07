<?php
	include "conexao/conexaodb.php";
	$config = conexao();
	
	if ( isset($_REQUEST['estado_id'])){
	$estado=$_REQUEST['estado_id'];
	}else{
	$estado="nacional";
	}
	
	//Variaveis das paginações	
		$nacional="nacional";
		$quantidade =10;
	//Variaveis das paginações	
	//Arrays
		$regioes = array("Sudeste","Nordeste","Sul","Norte","Centro-Oeste");
		$estados = array("São Paulo","Minas Gerais","Rio de Janeiro","Espirito Santo","Paraná","Santa Catarina","Rio Grande do Sul","Bahia","Ceará","Pernambuco","Alagoas","Distrito Federal","Sergipe","Paraíba","Rio Grande do Norte","Piauí","Maranhão","Amazonas","Acre","Amapá","Pará","Rondônia","Roraima","Tocantins","Goias","Mato Grosso","Mato Grosso do Sul");
		$achou=false;
	//Arrays
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

<html lang="pt-br">
	<head>
			<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		    <meta name="Description" content="B.R.S. Brasil Rolling Series : Unindo o Patins Brasileiro" />
			<meta http-equiv="content-type"/>
			<meta name="keywords" content="HTML5"/>
			<link rel="icon" href="CSS/img/brslogosmall.gif" type="image/x-icon">
			<link rel="stylesheet" type="txt/css" href="CSS/estilo1.css"/>
		<title>BRS-RANKING</title>
<script language="JavaScript">
		function filtroRank(){	
			var estado = document.getElementById('estado_id').value;
			window.location.href = "BRS-RANKING.php?estado_id="+estado+"#RFPRO";
		}
</script>
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
				<P>Vôce é um<a href="BRS-SOBRE.php" title="">&nbsp;organizador?</a></p><br>
				<div class="caption"><b>Login Organizador</b></div>
				<div class="box">
					<form id="loginform" method="post" action="funcao_login.php" name="login" >
							<table>
								<tr>
									<td><label for="cEmail"/>email:</label></td><td><input type="email" name="adm_email" id="cEmail"/></td>
								</tr>	
								<tr>
									<td><label for="cPass">senha:</label></td><td><input type="password" name="adm_senha" id="cPass"/></td>
								</tr>
								<tr>
									<td colspan="2">
										<table>
											<tr>
												<td><a href="BRS-SOBRE.php" title="">Esqueceu a senha?</a></td>
												<td align="center"><input type="submit" value="" class="btn_login"></td>
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
					<li><a class="active" href="BRS-RANKING.php" title="Ranking">RANKING</a></li>
					<li><a href="BRS-SOBRE.php" title="Sobre">SOBRE</a></li>
				</ul>
				</nav>
			</div>
			<!-- box de menu -->
		</div>
	</header>
		
		<section id="body">
				<!-- box da esquerda -->
				<div id="bodylatl">
				<div class="caption"><b>Ranking Estado/Região</b></div>
					<div class="boxDest">
						<div class="box">
							<h3 align="center">Ranking</h3>
							<h4 align="center"><?php if(@$estado == @$nacional){
													echo 'Brasileiro';
												}else echo $estado;?></h4>
						</div>
						<?php
						if($nacional != $estado){
						$sair=false;
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){echo'
															<div class="estadoRank">
																<img src="img/mapsbrs/'.$estado.'.PNG">
															</div>';
															$sair=true;
															}
													}
												if($sair){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){echo'
																<div class="estadoRank">
																<img src="img/mapsbrs/'.$estado.'.PNG">
																</div>
																<div class="estadoRank">
																	<img src="img/maps/'.$estado.'.PNG">
																</div>';
													
														}
													}
												}
						}else{ echo '
							<div class="estadoRank">
								<img src="img/mapsbrs/'.$estado.'.PNG">
							</div>';
						}?>					
						
						<div class="box">
							<span><label for="atl_estadoc"><b>Selecione o Estado/Região :</b></label></span>
										<select name="atl_estado" id="estado_id" onchange="filtroRank()">
											<option <?php if ( empty($estado)) echo 'selected'; ?> value="nacional">Nacional</option>
											<optgroup label="Rankinr por REGIÕES">
												<option <?php if ( @$estado == 'Sudeste') {echo 'selected';} ?> value="Sudeste">SUDESTE</option>
												<option <?php if ( @$estado == 'Nordeste') {echo 'selected';} ?> value="Nordeste">NORDESTE</option>
												<option <?php if ( @$estado == 'Sul') {echo 'selected';} ?> value="Sul">SUL</option>
												<option <?php if ( @$estado == 'Norte') {echo 'selected';} ?> value="Norte">NORTE</option>
												<option <?php if ( @$estado == 'Centro-Oeste') {echo 'selected';} ?> value="Centro-Oeste">CENTRO-OESTE</option>
											</optgroup>
											<optgroup label="Rankinr por ESTADOS">
												<optgroup label="Suldeste">
													<option <?php if ( @$estado == 'São Paulo') {echo 'selected';} ?> value="São Paulo">São Paulo</option>
													<option <?php if ( @$estado == 'Minas Gerais') echo 'selected'; ?> value="Minas Gerais">Minas Gerais</option>
													<option <?php if ( @$estado == 'Rio de Janeiro') echo 'selected'; ?> value="Rio de Janeiro">Rio de Janeiro</option>
													<option <?php if ( @$estado == 'Espirito Santo') echo 'selected'; ?> value="Espirito Santo">Espirito Santo</option>
												</optgroup>
												<optgroup label="Nordeste">
													<option <?php if ( @$estado == 'Bahia') echo 'selected'; ?> value="Bahia">Bahia</option>
													<option <?php if ( @$estado == 'Ceará') echo 'selected'; ?> value="Ceará">Ceará</option>
													<option <?php if ( @$estado == 'Pernambuco') echo 'selected'; ?> value="Pernambuco">Pernambuco</option>
													<option <?php if ( @$estado == 'Alagoas') echo 'selected'; ?> value="Alagoas">Alagoas</option>
													<option <?php if ( @$estado == 'Sergipe') echo 'selected'; ?> value="Sergipe">Sergipe</option>
													<option <?php if ( @$estado == 'Paraíba') echo 'selected'; ?> value="Paraíba">Paraíba</option>
													<option <?php if ( @$estado == 'Rio Grande do Norte') echo 'selected'; ?> value="Rio Grande do Norte">Rio Grande do Norte</option>
													<option <?php if ( @$estado == 'Piauí' ) {echo 'selected';} ?> value="Piauí">Piauí</option>
													<option <?php if ( @$estado == 'Maranhão' ) {echo 'selected';} ?> value="Maranhão">Maranhão</option>
												</optgroup>
												<optgroup label="Região - Sul">
													<option <?php  if ( @$estado == 'Paraná') echo 'selected'; ?> value="Paraná">Paraná</option>
													<option <?php  if ( @$estado == 'Santa Catarina') echo 'selected'; ?> value="Santa Catarina">Santa Catarina</option>
													<option <?php  if ( @$estado == 'Rio Grande do Sul') echo 'selected'; ?> value="Rio Grande do Sul">Rio Grande do Sul</option>
												</optgroup>
												<optgroup label="Norte">
													<option <?php if ( @$estado == 'Amazonas' ) {echo 'selected';} ?> value="Amazonas">Amazonas</option>
													<option <?php if ( @$estado == 'Acre' ) {echo 'selected';} ?> value="Acre">Acre</option>
													<option <?php if ( @$estado == 'Amapá' ) {echo 'selected';} ?> value="Amapá">Amapá</option>
													<option <?php if ( @$estado == 'Pará' ) {echo 'selected';} ?> value="Pará">Pará</option>
													<option <?php if ( @$estado == 'Rondônia' ) {echo 'selected';} ?> value="Rondônia">Rondônia</option>
													<option <?php if ( @$estado == 'Roraima' ) {echo 'selected';} ?> value="Roraima">Roraima</option>
													<option <?php if ( @$estado == 'Tocantins' ) {echo 'selected';} ?> value="Tocantins">Tocantins</option>
												</optgroup>
												<optgroup label="Centro-Oeste">
													<option <?php if ( @$estado == 'Goias' ) {echo 'selected';} ?> value="Goias">Goias</option>
													<option <?php if ( @$estado == 'Mato Grosso' ) {echo 'selected';} ?> value="Mato Grosso">Mato Grosso</option>
													<option <?php if ( @$estado == 'Mato Grosso do Sul' ) {echo 'selected';} ?> value="Mato Grosso do Sul">Mato Grosso do Sul</option>
													<option <?php if ( @$estado == 'Distrito Federal' ) {echo 'selected';} ?> value="Distrito Federal">DF</option>
												</optgroup>
											</optgroup>
										</select>
						</div>
						
					</div>
				</div>
				<!--box da esquerda -->
				
				<!--box do centro -->
					<!--box do Categoria MPRO-->
							<div id="bodycRank">
								<div class="caption" id="RMPRO"><b>Masculino PRO</b></div>
								<div class="boxRank">
									<table>
										<tr style=" font-size:14px">
											<td style="border: 1px solid;border-color:#F8F8FF;"><h3>Rank</h3></td>
											<td colspan="2" style="border: 1px solid;border-color:#F8F8FF; width:250px; padding: 0 0 0 10px;"><h3>Atleta</h3></td>
											<td style="border: 1px solid;border-color:#F8F8FF; "><h3>Pontos<h3></td>
										</tr>
										<?php
											$paginapro     = (isset($_GET['paginapro'])) ? (int) $_GET['paginapro'] : 1 ;
											$iniciopro     = ($quantidade * $paginapro) - $quantidade;
											$sql_selectpro = "SELECT * FROM atletas WHERE atl_sexo = 'M' AND atl_categoria = 'PRO' ";
											
											if($nacional != $estado){
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectpro .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectpro .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}
											
											$sql_selectpro .= "ORDER BY atl_points DESC LIMIT $iniciopro, $quantidade";
											
											$resultadopro = mysql_query($sql_selectpro);
																		
											if(isset($_GET['paginapro']))
												$posicaopro=$iniciopro+1;
											else
												$posicaopro=1;
												
											while($registropro = mysql_fetch_array($resultadopro))
											{			
										?>
											
											<tr style="border: 1px solid;">
												<td style="border: 1px solid; border-color:#F8F8FF;" align="right"><?php echo "#".$posicaopro."º"?></td>
												<td style="border: 1px solid;border-color:#F8F8FF; width:30px;">
													<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registropro['atl_cod'];?>">
														<img src="img/atl_fotos/<?php echo $registropro['atl_foto']?>" width="30" height="30" align="left"/>
													</a>
												</td>
												<td class="botao_link" style="border: 1px solid; border-color:#F8F8FF; padding:5px;">
												<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registropro['atl_cod'];?>">
																		<b><?php echo $registropro['atl_nome'];?></b>
																	   </a>
												</td>
												<td style="border: 1px solid;padding:5px;border-color:#F8F8FF;"><?php echo $registropro['atl_points'];?></td>
											</tr>
											
										<?php
											$posicaopro++;
											}
										?>
										
									</table>
									<?php
											$sql_selectprocont = "SELECT * FROM atletas WHERE atl_sexo = 'M' AND atl_categoria = 'PRO' ";
											
											if($nacional != $estado){
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectprocont .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectprocont .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}
											$qrTotalpro  = mysql_query($sql_selectprocont) or die (mysql_error());
											
											$numTotalpro = mysql_num_rows($qrTotalpro);	
											@$totalPaginapro = ceil($numTotalpro/$quantidade);
							
											echo '<div id="Dpaginacao"><table><td class="paginacao"><a href="?paginapro=1&estado_id='.$estado.'#RMPRO">Inicio</a></td>';
											for ($pro = 1; $pro <=$totalPaginapro; $pro++){
												if($pro == $paginapro)
													echo '<td class="paginacao">'.$pro.'</td>';
												else
													echo '<td class="paginacao"><a href="?paginapro='.$pro.'&estado_id='.$estado.'#RMPRO">'.$pro.'</a></td>';
											} 
											echo '<td class="paginacao"><a href="?paginapro='.$totalPaginapro.'&estado_id='.$estado.'#RMPRO">Ultima</a></td></table></div>';
									?>
								</div>

							</div>
					<!--box do Categoria MPRO-->
					
					<!--box do Categoria FAVA-->
						<div id="bodycRank">
								<div class="caption" id="RFPRO"><b>Feminino AVA</b></div>
								<div class="boxRank">
									<table>
										<tr style=" font-size:14px">
											<td style="border: 1px solid;border-color:#F8F8FF;"><h3>Rank</h3></td>
											<td colspan="2" style="border: 1px solid;border-color:#F8F8FF; width:250px; padding: 0 0 0 10px;"><h3>Atleta</h3></td>
											<td style="border: 1px solid;border-color:#F8F8FF; width:; "><h3>Pontos<h3></td>
										</tr>
										<?php
											$paginaava     = (isset($_GET['paginaava'])) ? (int) $_GET['paginaava'] : 1 ;
											$inicioava     = ($quantidade * $paginaava) - $quantidade;
											$sql_selectava = "SELECT * FROM atletas WHERE atl_sexo = 'F' and atl_categoria = 'AVA' "; 
											
											if($nacional != $estado){
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectava .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectava .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}
											
											$sql_selectava .= "ORDER BY atl_points DESC LIMIT $inicioava, $quantidade";
									
											$resultadoava = mysql_query($sql_selectava);
																		
											if(isset($_GET['paginaava']))
												$posicaoava=$inicioava+1;
											else
												$posicaoava=1;
												
											while($registroava = mysql_fetch_array($resultadoava))
											{			
										?>
											
											<tr style="border: 1px solid;">
												<td style="border: 1px solid; border-color:#F8F8FF;" align="right"><?php echo "#".$posicaoava."º"?></td>
												<td style="border: 1px solid;border-color:#F8F8FF; width:30px;">
													<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registroava['atl_cod'];?>">
														<img src="img/atl_fotos/<?php echo $registroava['atl_foto']?>" width="30" height="30" align="right"/>
													</a>
												</td>
												<td class="botao_link" style="border: 1px solid; border-color:#F8F8FF; padding:5px;">
												<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registroava['atl_cod'];?>">
																		<b><?php echo $registroava['atl_nome'];?></b>
																	   </a>
												</td>
												<td style="border: 1px solid;padding:5px;border-color:#F8F8FF;"><?php echo $registroava['atl_points'];?></td>
											</tr>
											
										<?php
											$posicaoava++;
											}
										?>
										
									</table>
									<?php
											$sql_selectavacont = "SELECT * FROM atletas WHERE atl_sexo = 'F' AND atl_categoria = 'AVA' ";
											
											if($nacional != $estado){
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectavacont .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectavacont .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}
											$qrTotalava  = mysql_query($sql_selectavacont) or die (mysql_error());
											$numTotalava = mysql_num_rows($qrTotalava);
											@$totalPaginaava = ceil($numTotalava/$quantidade);
											
											echo '<div id="Dpaginacao"><table align="center"><td class="paginacao"><a href="?paginaava=1&estado_id='.$estado.'#RFPRO">Inicio</a></td>';
											for ($ava = 1; $ava <=$totalPaginaava; $ava++){
												if($ava == $paginaava)
													echo '<td class="paginacao">'.$ava.'</td>';
												else
													echo '<td class="paginacao"><a href="?paginaava='.$ava.'&estado_id='.$estado.'#RFPRO">'.$ava.'</a></td>';
											} 
											echo '<td class="paginacao"><a href="?paginaava='.$totalPaginaava.'&estado_id='.$estado.'#RMPRO">Ultima</a></td></table></div>';
									?>
								</div>
						</div>
					<!--box do Categoria FAVA-->
					
					<!--box do Categoria MAM-->
							<div id="bodycRank">
								<div class="caption" id="RMAM"><b>Masculino AM</b></div>
								<div class="boxRank">
									<table>
										<tr style=" font-size:14px">
											<td style="border: 1px solid;border-color:#F8F8FF;"><h3>Rank</h3></td>
											<td colspan="2" style="border: 1px solid;border-color:#F8F8FF; width:250px; padding: 0 0 0 10px;"><h3>Atleta</h3></td>
											<td style="border: 1px solid;border-color:#F8F8FF; width:; "><h3>Pontos<h3></td>
										</tr>
										<?php
											$paginaam     = (isset($_GET['paginaam'])) ? (int) $_GET['paginaam'] : 1 ;
											$inicioam     = ($quantidade * $paginaam) - $quantidade;
											$sql_selectam = "SELECT * FROM atletas WHERE atl_sexo = 'M' and atl_categoria = 'AM'";

											if($nacional != $estado){
												$achou=false;
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectam .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectam .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}

											$sql_selectam .= "ORDER BY atl_points DESC LIMIT $inicioam, $quantidade";
											
											$resultadoam = mysql_query($sql_selectam);
																		
											if(isset($_GET['paginaam']))
												$posicaoam=$inicioam+1;
											else
												$posicaoam=1;
												
											while($registroam = mysql_fetch_array($resultadoam))
											{			
										?>
											<tr style="border: 1px solid;">
												<td style="border: 1px solid; border-color:#F8F8FF;" align="right"><?php echo "#".$posicaoam."º"?></td>
												<td style="border: 1px solid;border-color:#F8F8FF; width:30px;">
													<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registroam['atl_cod'];?>">
														<img src="img/atl_fotos/<?php echo $registroam['atl_foto']?>" width="30" height="30" align="right"/>
													</a>
												</td>
												<td class="botao_link" style="border: 1px solid; border-color:#F8F8FF; padding:5px;">
												<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registroam['atl_cod'];?>">
																		<b><?php echo $registroam['atl_nome'];?></b>
																	   </a>
												</td>
												<td style="border: 1px solid;padding:5px;border-color:#F8F8FF;"><?php echo $registroam['atl_points'];?></td>
											</tr>
											
										<?php
											$posicaoam++;
											}
										?>
										
									</table>
									<?php
											$sql_selectamcont = "SELECT * FROM atletas WHERE atl_sexo = 'M' and atl_categoria = 'AM'";

											if($nacional != $estado){
												$achou=false;
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectamcont .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectamcont .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}
											$qrTotalam  = mysql_query($sql_selectamcont) or die (mysql_error());
											$numTotalam = mysql_num_rows($qrTotalam);
											@$totalPaginaam = ceil($numTotalam/$quantidade);
											
											echo '<div id="Dpaginacao"><table align="center"><td class="paginacao"><a href="?paginaam=1&estado_id='.$estado.'#RMAM">Inicio</a></td>';
											for ($am = 1; $am <=$totalPaginaam; $am++){
												if($am == $paginaam)
													echo '<td class="paginacao">'.$am.'</td>';
												else
													echo '<td class="paginacao"><a href="?paginaam='.$am.'&estado_id='.$estado.'#RMAM">'.$am.'</a></td>';
											} 
											echo '<td class="paginacao"><a href="?paginaam='.$totalPaginaam.'&estado_id='.$estado.'#RMAM">Ultima</a></td></table></div>';
									?>
								
								</div>

							</div>
					<!--box do Categoria  MAM-->
					
					<!--box do Categoria FINI-->
						<div id="bodycRank">
								<div class="caption" id="RFINI"><b>Feminino INI</b></div>
								<div class="boxRank">
									<table>
										<tr style=" font-size:14px">
											<td style="border: 1px solid;border-color:#F8F8FF;"><h3>Rank</h3></td>
											<td colspan="2" style="border: 1px solid;border-color:#F8F8FF; width:250px; padding: 0 0 0 10px;"><h3>Atleta</h3></td>
											<td style="border: 1px solid;border-color:#F8F8FF; width:; "><h3>Pontos<h3></td>
										</tr>
										<?php
											$paginaini     = (isset($_GET['paginaini'])) ? (int) $_GET['paginaini'] : 1 ;
											$inicioini     = ($quantidade * $paginaini) - $quantidade;
											$sql_selectini = "SELECT * FROM atletas WHERE atl_sexo like 'F' AND atl_categoria = 'INI'";
											
											if($nacional != $estado){
												$achou=false;
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectini .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectini .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}

											$sql_selectini .= "ORDER BY atl_points DESC LIMIT $inicioini, $quantidade";
											
											$resultadoini = mysql_query($sql_selectini);
																		
											if(isset($_GET['paginaini']))
												$posicaoini=$inicioini+1;
											else
												$posicaoini=1;
												
											while($registroini = mysql_fetch_array($resultadoini))
											{			
										?>
											
											<tr style="border: 1px solid;">
												<td style="border: 1px solid; border-color:#F8F8FF;" align="right"><?php echo "#".$posicaoini."º"?></td>
												<td style="border: 1px solid;border-color:#F8F8FF; width:30px;">
													<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registroini['atl_cod'];?>">
														<img src="img/atl_fotos/<?php echo $registroini['atl_foto']?>" width="30" height="30" align="right"/>
													</a>
												</td>
												<td class="botao_link" style="border: 1px solid; border-color:#F8F8FF; padding:5px;"><a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registroini['atl_cod'];?>">
																		<b><?php echo $registroini['atl_nome'];?></b>
																	   </a>
												</td>
												<td style="border: 1px solid;padding:5px;border-color:#F8F8FF;"><?php echo $registroini['atl_points'];?></td>
											</tr>
											
										<?php
											$posicaoini++;
											}
										?>
										
									</table>
									<?php
											$sql_selectinicont = "SELECT * FROM atletas WHERE atl_sexo like 'F' AND atl_categoria = 'INI'";
											
											if($nacional != $estado){
												$achou=false;
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectinicont .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectinicont .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}
											$qrTotalini  = mysql_query($sql_selectinicont) or die (mysql_error());
											$numTotalini = mysql_num_rows($qrTotalini);
											@$totalPaginaini = ceil($numTotalini/$quantidade);
											
											echo '<div id="Dpaginacao"><table align="center"><td class="paginacao"><a href="?paginaini=1&estado_id='.$estado.'#RFINI">Inicio</a></td>';
											for ($ini = 1; $ini <=$totalPaginaini; $ini++){
												if($ini == $paginaini)
													echo '<td class="paginacao">'.$ini.'</td>';
												else
													echo '<td class="paginacao"><a href="?paginaini='.$ini.'&estado_id='.$estado.'#RFINI">'.$ini.'</a></td>';
											} 
											echo '<td class="paginacao"><a href="?paginaini='.$totalPaginaini.'&estado_id='.$estado.'#RFINI">Ultima</a></td></table></div>';
									?>
								</div>
						</div>
					<!--box do Categoria FINI-->
					<!--box do Categoria MIM-->
							<div id="bodycRank">
								<div class="caption" id="RMMINI"><b>Masculino INI</b></div>
								<div class="boxRank">
									<table>
										<tr style=" font-size:14px">
											<td style="border: 1px solid;border-color:#F8F8FF;"><h3>Rank</h3></td>
											<td colspan="2" style="border: 1px solid;border-color:#F8F8FF; width:250px; padding: 0 0 0 10px;"><h3>Atleta</h3></td>
											<td style="border: 1px solid;border-color:#F8F8FF; width:; "><h3>Pontos<h3></td>
										</tr>
										<?php
											$paginamini     = (isset($_GET['paginamini'])) ? (int) $_GET['paginamini'] : 1 ;
											$iniciomini     = ($quantidade * $paginamini) - $quantidade;
											$sql_selectmini = "SELECT * FROM atletas WHERE atl_sexo = 'M' and atl_categoria = 'INI'";

											if($nacional != $estado){
												$achou=false;
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectmini .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectmini .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}

											$sql_selectmini .= "ORDER BY atl_points DESC LIMIT $iniciomini, $quantidade";
											
											$resultadomini = mysql_query($sql_selectmini);
																		
											if(isset($_GET['paginamini']))
												$posicaomini=$iniciomini+1;
											else
												$posicaomini=1;
												
											while($registromini = mysql_fetch_array($resultadomini))
											{			
										?>
											<tr style="border: 1px solid;">
												<td style="border: 1px solid; border-color:#F8F8FF;" align="right"><?php echo "#".$posicaomini."º"?></td>
												<td style="border: 1px solid;border-color:#F8F8FF; width:30px;">
													<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registromini['atl_cod'];?>">
														<img src="img/atl_fotos/<?php echo $registromini['atl_foto']?>" width="30" height="30" align="right"/>
													</a>
												</td>
												<td class="botao_link" style="border: 1px solid; border-color:#F8F8FF; padding:5px;">
												<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registromini['atl_cod'];?>">
																		<b><?php echo $registromini['atl_nome'];?></b>
																	   </a>
												</td>
												<td style="border: 1px solid;padding:5px;border-color:#F8F8FF;"><?php echo $registromini['atl_points'];?></td>
											</tr>
											
										<?php
											$posicaomini++;
											}
										?>
										
									</table>
									<?php
											$sql_selectminicont = "SELECT * FROM atletas WHERE atl_sexo = 'M' and atl_categoria = 'INI'";

											if($nacional != $estado){
												$achou=false;
												//checa se o filtro setado foi um estado ou uma região consultando os arrays
												for($y=0; $y <= 0 ; $y++){
													for($i=0; $i < count($regioes) ; $i++){
														if($estado === $regioes[$i]){
															$sql_selectminicont .= "AND atl_regiao = '$estado' ";
															$achou=true;
															break;
														}
													}
													if($achou){
														break;
													}
													for($i=0; $i < count($estados) ; $i++){
														if($estado === $estados[$i]){
															$sql_selectminicont .= "AND atl_estado = '$estado' ";
														}
													}
												}
											}
											$qrTotalmini  = mysql_query($sql_selectminicont) or die (mysql_error());
											$numTotalmini = mysql_num_rows($qrTotalmini);
											@$totalPaginamini = ceil($numTotalmini/$quantidade);
											
											echo '<div id="Dpaginacao"><table align="center"><td class="paginacao"><a href="?paginamini=1&estado_id='.$estado.'#RMMINI">Inicio</a></td>';
											for ($mini = 1; $mini <=$totalPaginamini; $mini++){
												if($mini == $paginamini)
													echo '<td class="paginacao">'.$mini.'</td>';
												else
													echo '<td class="paginacao"><a href="?paginamini='.$mini.'&estado_id='.$estado.'#RMMINI">'.$mini.'</a></td>';
											} 
											echo '<td class="paginacao"><a href="?paginamini='.$totalPaginamini.'&estado_id='.$estado.'#RMmini">Ultima</a></td></table></div>';
									?>
								
								</div>

							</div>
					<!--box do Categoria  MINI-->
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