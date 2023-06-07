<?php
	include "conexao/conexaodb.php";
	$config = conexao();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		    <meta name="Description" content="B.R.S. Brasil Rolling Series : Unindo o Patins Brasileiro" />
			<meta http-equiv="content-type"/>
			<meta name="keywords" content="HTML5"/>
			<link rel="icon" href="http://www.brasilrollingseries.com/CSS/img/brslogosmall.gif" type="image/x-icon">
			<link rel="stylesheet" type="txt/css" href="http://www.brasilrollingseries.com/CSS/estilo1.css"/>
		</script>
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
									<td><label for="cEmail"/>email:</label></td><td><input type="email" name="adm_email" id="cEmail"required/></td>
								</tr>	
								<tr>
									<td><label for="cPass">senha:</label></td><td><input type="password" name="adm_senha" id="cPass"required/></td>
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
					<div class="caption"><b>Destaques Feminino!</b></div>
					<div class="box">
						<table style="background:#;border:1px solid;border-color:#F8F8FF; font-size:14px; width:200px; margin-left:20px">
						<?php
							$sql_select1 = ("SELECT * FROM atletas WHERE atl_destaque = 'S' and atl_sexo = 'F' order by atl_points DESC");
							$resultado1 = mysql_query($sql_select1);
							$limite=0;
							while($registro1 = mysql_fetch_array($resultado1) and $limite < 8)
							
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
					<div class="caption"><b>Destaques Masculino!</b></div>
					<div class="box">
						<table style="background:#;border:1px solid;border-color:#F8F8FF; font-size:14px; width:200px; margin-left:20px">
						<?php
							$sql_select1 = ("SELECT * FROM atletas WHERE atl_destaque = 'S' and atl_sexo = 'M' order by atl_points DESC");
							$resultado1 = mysql_query($sql_select1);
							$limite=0;
							while($registro1 = mysql_fetch_array($resultado1) and $limite < 8)
							
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
									</b></b>
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
				<!--box do centro -->
				<div id="bodycAtl">
					<div class="caption"><b>Perfil Patinadores</b></div>
					<div class="box">
						<form action="">
							<table>
								<tr>
								<td>&nbsp;&nbsp;<input type="submit" class="botao" name="atl_pesq" id="bt_pesquisar "value="Pesquisar"/></td>
								<td><input type="text" name="filtrar" id="filtrar" size="20"/></td>
								</tr>
							</table>
						</form>
						<br>
						<table style="padding:1px;">
							<tr style=" font-size:14px">
								<td colspan="2" style="border: 1px solid;border-color:#F8F8FF; width:250px; text-align:center;"><h3>Atleta</h3></td>
								<td style="border: 1px solid;border-color:#F8F8FF; width:30%; "><h3>Estado<h3></td>
							</tr>
							<?php
								if(empty($_REQUEST['filtrar'])){
								$sql_select = ("SELECT * FROM atletas order by atl_nome");
								$resultado = mysql_query($sql_select);
								}else{
								$filtrar = $_REQUEST['filtrar'];
								$sql_select = ("SELECT * FROM atletas where atl_nome LIKE '".$filtrar."%' OR atl_apelido LIKE  '".$filtrar."%' OR atl_estado LIKE  '".$filtrar."%' order by atl_nome");
								$resultado = mysql_query($sql_select);
								}
								
								while($registro = mysql_fetch_array($resultado))
								{			
							?>
								
								<tr style="border: 1px solid;">		
									<td>
									<div><a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registro['atl_cod'];?>">
											<img src="img/atl_fotos/<?php echo $registro['atl_foto']?>" width="30" height="30" align="right"/>
										</a></div>
									</td>
									<td class="botao_link" style="border: 1px solid; border-color:#F8F8FF; padding:5px;"><a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registro['atl_cod'];?>">
															<b><?php echo $registro['atl_nome'];?>&nbsp;<?php $nick=$registro['atl_apelido'];  if (!empty($nick)) { echo '('; echo $nick; echo ')'; }  ?></b>
														   </a>
									</td>
									<td style="border: 1px solid;padding:5px;border-color:#F8F8FF;"><?php echo $registro['atl_estado'];?></td>
								</tr>
								
							<?php
								}
							?>
							
						</table>
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
					<li class="facebook"><a href="https://www.facebook.com/brasilrollingseries" title=" BRS on Facebbok" target="blank">Faça parte tambem no Facebook! </a></li>
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