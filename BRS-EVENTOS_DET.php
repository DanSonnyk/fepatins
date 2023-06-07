<?php
	include "conexao/conexaodb.php";
	$config = conexao();
					
	$cod_evt = $_REQUEST['evt_code'];
	$query = "SELECT * FROM eventos WHERE evt_cod = '$cod_evt' ";
	$resultado = mysql_query($query);
	$registro = mysql_fetch_array($resultado);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" lang="pt-br">
	<head>
			<meta charset="UTF-8"/>
		    <meta name="Description" content="B.R.S. Brasil Rolling Series : Unindo o Patins Brasileiro" />
			<meta http-equiv="content-type"/>
			<meta name="keywords" content="HTML5"/>
			<link rel="icon" href="http://www.brasilrollingseries.com/CSS/img/brslogosmall.gif" type="image/x-icon">
			<link rel="stylesheet" type="txt/css" href="http://www.brasilrollingseries.com/CSS/estilo1.css"/>
		
				<!-- Start VisualLightBox.com HEAD section -->
		<link rel="stylesheet" href="index_file/vlb_files1/vlightbox1.css" type="text/css" />
		<link rel="stylesheet" href="index_file/vlb_files1/visuallightbox.css" type="text/css" media="screen" />
		<script src="index_file/vlb_engine/jquery.min.js" type="text/javascript"></script>
		<script src="index_file/vlb_engine/visuallightbox.js" type="text/javascript"></script>
				<!-- End VisualLightBox.com HEAD section -->


	<title>BRS-EVENTOS</title>
	
	<script language="JavaScript">
		function filtroEvt(){	
			var nivel = document.getElementById('nivel_id').value;
			var ano = document.getElementById('ano_id').value;
			var mes = document.getElementById('mes_id').value;
			window.location.href = "BRS-EVENTOS.php?nivel_id="+nivel+"&ano_id="+ano+"&mes_id="+mes;
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
									<td><label for="cEmail"/>email:</label></td><td><input type="email" name="adm_email" id="cEmail" required/></td>
								</tr>	
								<tr>
									<td><label for="cPass">senha:</label></td><td><input type="password" name="adm_senha" id="cPass" required/></td>
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
					<li><a class="active" href="BRS-EVENTOS.php" title="Eventos">EVENTOS</a></li>
					<li><a href="BRS-PATINADORES.php" title="Patinadores">PATINADORES</a></li>
					<li><a href="BRS-RANKING.php" title="Ranking">RANKING</a></li>
					<li><a href="BRS-SOBRE.php" title="Sobre">SOBRE</a></li>
				</ul>
				</nav>
			</div>
			<!-- box de menu -->
		</div>
	</header>
		
		<section id="body">
				<!-- box da esquerda -->
				<div id="bodyl">
					<div class="caption"><b>Filtrar</b></div>
					<div id="box">
						<div class="box">
						<br>
							<center><h3>Eventos no Mesmo Mês:</h3></center>
						
							<br>
							<?php
								$mes_got= explode("-",$registro['evt_data']);
								$mes =$mes_got[1];
								$ano_got= explode("-",$registro['evt_data']);
								$ano =$ano_got[0];
							
								$query1 = "SELECT * FROM eventos WHERE MONTH(evt_data) = '$mes' AND YEAR(evt_data) = '$ano' AND evt_cod <> '$cod_evt' order by evt_data ASC;";
								$sql_select1 = ($query1);
								$resultado1 = mysql_query($sql_select1);
	
								if (mysql_num_rows($resultado1)==0)
								{
								?>
								<center>Nenhum!</center>
								<?php
								}else
								{
									while($registro1 = mysql_fetch_array($resultado1))
									
									{			
									?>
										<div class="box">
											<a href="BRS-EVENTOS_DET.php?evt_code=<?php echo $registro1['evt_cod'];?>">
											<?php echo $registro1['evt_nome'];?>
											
											<br>
											<?php
														for($i=0; $i < $registro1['evt_classe']; $i++ ){
							
														?>
														<image style="float:left; margin:5px;" src="img/star.png">
														<?php
														}
														?>
											</a>
										</div>
										
										<br><br>
										<hr></hr>
									<?php
										}
									?>
								<?php
								}
								?>
								<br>
								<center><a href="BRS-EVENTOS.php"><b>TODOS EVENTOS</b></A></center>
							<br>
						</div>		
					</div>
				</div>
					<!--box da esquerda-->
					<!--box do centro-->
					<div id="bodycEvt">
						<div class="caption"><b>Eventos</b></div>
							<div class="box" style="float:right;">
								<div style="height:30px; width:100%; padding:10; margin:5px;" >
									<h4><?php echo $registro['evt_nome'];?>	
												<div style="float:right;">
													<?php
													for($i=0; $i < $registro['evt_classe']; $i++ ){
						
													?>
													<image style="float:right; margin:5px;;" src="img/star.png">
													<?php
													}
													?>
												</div>
									</h4>
								</div>
								<div class="evt_info">
									<b>Local: </b><?php echo $registro['evt_local'];?>(<?php echo $registro['evt_estado'];?>)	
								</div>
								<div class="evt_info">
									<b>Data: </b><?php setlocale(LC_ALL,'portuguese');
										 $data_print = implode("/",array_reverse(explode("-",$registro['evt_data'])));?>
										 <b style="font: bold 1.2em Arial, Lucia Grande, Tahoma, sans-serif; color:;"><?php echo $data_print;?></b>
										 <b style="text-transform: capitalize;"><?php echo utf8_encode(strftime("%A",strtotime($registro['evt_data'])));?>&nbsp;<?php echo $registro['evt_horario'];?></b>
								</div>
								<div class="evt_info">
									<b>Realização: <?php echo $registro['evt_realizacao'];?></b>
								</div>
								<div class="evt_info">
									<b>Site do evento: <a href="<?php echo $registro['evt_web'];?>" target="blank"><?php echo $registro['evt_web'];?></b></a>
								</div>
								<div class="evt_info">
									<b>Descrição: </b>
									<?php echo $registro['evt_desc'];?>
								</div>
								<div id="vlightbox1">
									<a class="vlightbox1" href="img/evt_fotos/<?php echo $registro['evt_foto']?>">
										<img src="img/evt_fotos/<?php echo $registro['evt_foto']?>" width="335" height="400"/>
									</a>
									<script src="index_file/vlb_engine/vlbdata1.js" type="text/javascript"></script>
								</div>
								
								<div id="boxVideo">
									<b>Video Chamada / Video Evento:</b>
								</div>
								<iframe width="100%" height="550" src="//<?php echo $registro['evt_video'] ?>" frameborder="0" allowfullscreen></iframe>
		
							</div>
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