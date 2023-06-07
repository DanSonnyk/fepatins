<?php
	include "conexao/conexaodb.php";
	$ip= $_SERVER['REMOTE_ADDR'];
	if (!isset($_COOKIE['counte'])) {
	$ip= $_SERVER['REMOTE_ADDR'];
    mysqli_query($conn, "INSERT INTO visitas VALUES(null, NOW(),'')");
}
setcookie('counte', 1, time()+3700);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" lang="pt-br">
	<head>
			<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		    <meta name="Description" content="B.R.S. Brasil Rolling Series : Unindo o Patins Brasileiro" />
			<meta http-equiv="content-type"/>
			<meta name="keywords" content="HTML5"/>
			<link rel="icon" href="http://www.brasilrollingseries.com/CSS/img/brslogosmall.gif" type="image/x-icon">
			<link rel="stylesheet" type="txt/css" href="http://www.brasilrollingseries.com/CSS/estilo1.css"/>
	<title>BRS-HOME</title>
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
	
<!--Script para Facebook news-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));</script>
<!---Fim Script para Facebook news-->
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
					<div class="caption"><b>Ranking Nacional</b></div>
					<div class="box">
						<center><h3>TOP BRASIL</h3></center>
						<br>
						<table id="tb_rank">
							
							<tr class="tb_rank">
								<th>Posição</th>
								<th>Atleta</th>
								<th>Pontuação</th>
							</tr>
							
							<tr>								
								<th colspan=3><image src="img/m.png"/></th>
							</tr>	
						<?php
							$sql_select = ("SELECT * FROM atletas where atl_sexo LIKE 'M' order by atl_points DESC");
							$resultado = mysqli_query($conn, $sql_select);
							$posicao=0;
							while($registro = mysqli_fetch_array($resultado) and $posicao < 10)
							
							{			
						?>
							<?php $posicao++;?>
							<tr class="tb_rank">
							<td align="center"><?php echo "#".$posicao."º"?></td>
							<td align="left"><a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registro['atl_cod'];?>">
												<?php $n = $registro['atl_nome'];
												$na = explode(" ",$n);
												$nomer = $na[0];
												$sobren = $na[1];
												echo $nomer.' '.$sobren;
												?>
											 </a>
							</td>
							<td align="center"><?php echo $registro['atl_points'];?></td>
							</tr>
						<?php
							}
						?>
						<tr>
								<th colspan=3>&nbsp</th>
						</tr>	
						<tr>
								<th colspan=3><image src="img/f.png"/></th>
						</tr>	
						<?php
							$sql_select = ("SELECT * FROM atletas where atl_sexo LIKE 'F' and atl_categoria LIKE 'AVA' order by atl_points DESC");
							$resultado = mysqli_query($conn, $sql_select);
							$posicao=0;
							while($registro = mysqli_fetch_array($resultado) and $posicao < 10)
							
							{			
						?>
							<?php $posicao++;?>
							<tr class="tb_rank">
							<td align="center"><?php echo "#".$posicao."º"?></td>
							<td align="left"><a href="BRS-PATINADORES_DET.php?atl_code=<?php echo $registro['atl_cod'];?>">
												<?php $n = $registro['atl_nome'];
												$na = explode(" ",$n);
												$nomer = $na[0];
												$sobren = $na[1];
												echo $nomer.' '.$sobren;
												?>
											 </a>
							</td>
							<td align="center"><?php echo $registro['atl_points'];?></td>
							</tr>
						<?php
							}
						?>
					</table>
					<br>
					<center><a href="BRS-RANKING.php"><p style="font-size:16px;">Veja o Ranking Completo!</p></a></center>
				</div><br><br>
				<div style="-moz-border-radius:15px; 
								border-radius: 15px 0px 15px 15px;
								background-color:#eee;
								heigt:auto">

				<a href="BRS-SOBRE.php"><p>* Como fazer parte do Ranking?</p></a>
				<a href="BRS-SOBRE.php"><p>* Como cadastro um evento?</p></a>
				<a href="BRS-SOBRE.php"><p>* Entenda a pontuação!</p></a>
				</div>
				</div>
				
		
				<!--box da esquerda -->
				<!--box do centro -->
				<div id="bodyc">
					<div class="caption"><b>Principais Noticias</b></div>
					<div class="box">
					<div class="fb-like-box" data-href="https://www.facebook.com/brasilrollingseries" data-width="415" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false"></div>
					</div>
				</div>
				<!--box do centro -->
				<!--box da direita -->
				<div id="bodyr">
					<div style="-moz-border-radius:15px; 
								border-radius: 15px 0px 15px 15px;
								background-color:#eee;
								heigt:auto">
					<center>
					<image src="img/star.png"/>
					<image src="img/star.png"/>
					<image src="img/star.png"/>
					<image src="img/star.png"/>
					<image src="img/star.png"/><br>
					<image src="img/5star.png"/><BR>
					<h2>2015</h2>
					<?php
							$sql_select = ("SELECT * FROM eventos WHERE evt_classe = 5 order by evt_data ASC");
							$resultado = mysqli_query($conn, $sql_select);
							$evt_cont=0;
							while($registro = mysqli_fetch_array($resultado) and $evt_cont < 3)
							{			
						?>
							<div>
								<h3><?php echo $registro ['evt_nome']?></h3> <br>
								<a href="BRS-EVENTOS_DET.php?evt_code=<?php echo $registro['evt_cod'];?>"><img src="img/evt_fotos/<?php echo $registro['evt_foto'];?>" width="290" height="200"/></a>
							</div>
						<hr></hr>
		
						<?php
						 $evt_cont++;	
							}
						?>
					
					</center>
					</div>
				</div>
				<!--box da direita -->
	
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