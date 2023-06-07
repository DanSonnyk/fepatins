<?php
	include "conexao/conexaodb.php";
	$config = conexao();
					
	$cod_atl = $_REQUEST['atl_code'];
	$query = "SELECT * FROM atletas WHERE atl_cod = '$cod_atl' ";
	$resultado = mysql_query($query);
	$registro = mysql_fetch_array($resultado);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" lang="pt-br">
	<head>
			<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		    <meta name="Description" content="B.R.S. :Brasil Rolling Series : Unindo o Inline Brasileiro" />
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


	<title>BRS-PATINADORES</title>
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
					<li><a href="BRS-EVENTOS.php" title="Eventos">EVENTOS</a></li>
					<li><a class="active" href="BRS-PATINADORES.php" title="Patinadores">PATINADORES</a></li>
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
				<div id="bodylatl">
				<div class="caption"><b>Destaques Masculino!</b></div>
					<div class="box">
						<table style="background:#;border:1px solid;border-color:#F8F8FF; font-size:14px; width:200px; margin-left:20px">
						<?php
							$sql_select1 = ("SELECT * FROM atletas WHERE atl_destaque = 'S' and atl_sexo = 'M' order by atl_points DESC");
							$resultado1 = mysql_query($sql_select1);
							$limite=0;
							while($registro1 = mysql_fetch_array($resultado1) and $limite < 6)
							
							{			
						?>
						<?php $limite++;?>
							<tr>
							<td style="padding:5px; border: 1px solid;border-color:#F8F8FF;">
								<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registro1['atl_cod'];?>">
									<b><image src="img/starDest.png"/>
										<?php $n = $registro1['atl_nome'];
												$na = explode(" ",$n);
												$nomer = $na[0];
												$sobren = $na[1];
												echo $nomer.' '.$sobren;
										?>
									</b>
								</a>
							</td>
							</tr>
						<?php
							}
						?>
					</table>
					</div>
					<br/>
					<div class="caption"><b>Destaques Feminino!</b></div>
					<div class="box">
						<table style="background:#;border:1px solid;border-color:#F8F8FF; font-size:14px; width:200px; margin-left:20px">
						<?php
							$sql_select1 = ("SELECT * FROM atletas WHERE atl_destaque = 'S' and atl_sexo = 'F' order by atl_points DESC");
							$resultado1 = mysql_query($sql_select1);
							$limite=0;
							while($registro1 = mysql_fetch_array($resultado1) and $limite < 6)
							
							{			
						?>
						<?php $limite++;?>
							<tr>
							<td style="padding:5px; border: 1px solid;border-color:#F8F8FF;">
								<a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registro1['atl_cod'];?>">
									<b><image src="img/starDest.png"/>
										<?php $n = $registro1['atl_nome'];
												$na = explode(" ",$n);
												$nomer = $na[0];
												$sobren = $na[1];
												echo $nomer.' '.$sobren;
										?>
									</b>
								</a>
							</td>
							</tr>
						<?php
							}
						?>
					</table>
					</div>
				</div>
				<!--box da esquerda -->
					<!--box do centro-->
					<div id="bodycEvt" style="float:left;">
						<div class="caption"><b>Perfil</b></div>
							<div class="box">
								<div style="height:30px; width:600; padding:0px 0px 0px 100px;">
									<h4><?php echo $registro['atl_nome'];?>&nbsp; <?php $nick=$registro['atl_apelido'];  if (!empty($nick)) { echo '('; echo $nick; echo ')'; }  ?></h4>
								</div>
								<div class="atl_info">
									<b>Nasc :</b>&nbsp;<?php $data_nasc = explode("-",$registro['atl_nasc']); $data_nasc = $data_nasc[0]; echo $data_nasc;?>
								</div>
								<div class="atl_info">
									<b>Nivel :&nbsp;<?php echo $registro['atl_categoria'];?></b>
								</div>
								<div class="atl_info">
									<b>Patrocinio/Apoio :&nbsp;</b><?php echo $registro['atl_patro'];?>
								</div>
								<div class="atl_info">
									<b>Natural de :</b>&nbsp;<?php echo $registro['atl_cidade'];?>,(<?php echo $registro['atl_estado'];?>)
								</div>
								<div class="atl_info">
									<b>Trick Favorita :&nbsp;</b><?php echo $registro['atl_trick'];?>
								</div>
								<div class="atl_info">
									<b>Descrição:&nbsp;	</b>
									<?php echo $registro['atl_desc'];?>
								</div>
								
								<div id="vlightbox1">
									<a class="vlightbox1" href="img/atl_fotos/<?php echo $registro['atl_foto']?>">
										<img src="img/atl_fotos/<?php echo $registro['atl_foto']?>" width="300" height="350"/>
									</a>
									<script src="index_file/vlb_engine/vlbdata1.js" type="text/javascript"></script>
								</div>
								
								
								
								<div id="boxVideo">
									<b>Video Profile:</b>
								</div>
									<iframe width="100%" height="550" src="//<?php echo $registro['atl_video'] ?>" frameborder="0" allowfullscreen></iframe>
								
							
								
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

</html>: