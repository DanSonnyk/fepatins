<?php
	include "conexao/conexaodb.php";
	$config = conexao();
	
	if ( isset($_REQUEST['nivel_id'])){
	$nivel=$_REQUEST['nivel_id'];
	}else{
	$nivel_id="";
	}
	
	if ( isset($_REQUEST['ano_id'])){
	$ano=$_REQUEST['ano_id'];
	}else{
	$ano=date('Y');
	}
	
	if ( isset($_REQUEST['mes_id'])){
	$mes=$_REQUEST['mes_id'];
	}else{
	$mes="";
	}

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
								Nivel:
								<br>
								<form id="evt_ftrnivel" method="post" action="#">
								<select class="filtro" name="nivel" id="nivel_id" onchange="filtroEvt()">
									<option <?php if ( empty($nivel)) echo 'selected'; ?> value="">TODOS</option>
									<option <?php if ( @$nivel == '2' ) echo 'selected'; ?> value="2">2 Estrelas</option>
									<option <?php if ( @$nivel == '3' ) echo 'selected'; ?> value="3">3 Estrelas</option>
									<option <?php if ( @$nivel == '4' ) echo 'selected'; ?> value="4">4 Estrelas</option>
									<option <?php if ( @$nivel == '5' ) echo 'selected'; ?> value="5">5 Estrelas</option>
								</select>
								</form>
                                <br>
								Ano:
								<br>
								<form id="evt_ftrmes" method="" action="#">
								<select class="filtro" name="ano" id="ano_id" onchange="filtroEvt()">
									<option <?php if ( empty($ano)) echo 'selected'; ?> value="">TODOS</option>
									<option <?php if ( @$ano == '2015' ) echo 'selected'; ?> value="2015">2015</option>
									<option <?php if ( @$ano == '2016' ) echo 'selected'; ?> value="2016">2016</option>
									<option <?php if ( @$ano == '2017' ) echo 'selected'; ?> value="2017">2017</option>
								</select>
								</form>
								<br>
								Mes:
								<br>
								<form id="evt_ftrmes" method="" action="#">
								<select class="filtro" name="mes" id="mes_id" onchange="filtroEvt()">
									<option <?php if ( empty($mes) ) echo 'selected'; ?> value="">TODOS</option>
									<option <?php if ( @$mes == '01' ) echo 'selected'; ?> value="01">Jan</option>
									<option <?php if ( @$mes == '02' ) echo 'selected'; ?> value="02">Fev</option>
									<option <?php if ( @$mes == '03' ) echo 'selected'; ?> value="03">Mar</option>
									<option <?php if ( @$mes == '04' ) echo 'selected'; ?> value="04">Abr</option>
									<option <?php if ( @$mes == '05' ) echo 'selected'; ?> value="05">Mai</option>
									<option <?php if ( @$mes == '06' ) echo 'selected'; ?> value="06">Jun</option>
									<option <?php if ( @$mes == '07' ) echo 'selected'; ?> value="07">Jul</option>
									<option <?php if ( @$mes == '08' ) echo 'selected'; ?> value="08">Ago</option>
									<option <?php if ( @$mes == '09' ) echo 'selected'; ?> value="09">Set</option>
									<option <?php if ( @$mes == '10' ) echo 'selected'; ?> value="10">Out</option>
									<option <?php if ( @$mes == '11' ) echo 'selected'; ?> value="11">Nov</option>
									<option <?php if ( @$mes == '12' ) echo 'selected'; ?> value="12">Dez</option>
								</select>
								</form>
								</div>
						</div>
					</div>
					<!--box da esquerda-->
					<!--box do centro-->
					<div id="bodycEvt">
						<div class="caption"><b>Eventos</b></div>
						<div class="box">
						<hr></hr>
							<?php
								
								$query = "SELECT * FROM eventos WHERE 1=1 ";

								if(!empty($nivel)){
									$query .= " AND evt_classe = ";
									$query .= $nivel;
								}
								
								if(!empty($ano)){
									$query .= " AND YEAR(evt_data) = ";
									$query .= $ano;
								}
								
								if(!empty($mes)){
									$query .= " AND MONTH(evt_data) = ";
									$query .= $mes;
								}
								
								$query .= " ORDER BY evt_data ASC;";

								$sql_select = ($query);
								$resultado = mysql_query($sql_select);
							
								while($registro = mysql_fetch_array($resultado))
				
								{			
								?>
									<div class="box">
										<a href="BRS-EVENTOS_DET.php?evt_code=<?php echo $registro['evt_cod'];?>">
										<?php echo $registro['evt_nome'];?>
										</a>
										(<?php echo $registro['evt_estado'];?> )
										<?php
											for($i=0; $i < $registro['evt_classe']; $i++ ){
				
											?>
											<image style="float:right;margin:5px;" src="img/star.png">
											<?php
											}
											?>
										<p>Data: <?php setlocale(LC_ALL,'portuguese');
										         $data_print = implode("/",array_reverse(explode("-",$registro['evt_data'])));
												 echo $data_print;?>
												 <b style="font: bold 1.2em Arial, Lucia Grande, Tahoma, sans-serif; color: #666;text-transform: capitalize;"><?php echo utf8_encode(strftime("%A",strtotime($registro['evt_data'])));?>&nbsp;<?php echo $registro['evt_horario'];?>h</b>		   
										</p>
									</div>
									<hr></hr>
								<?php
									}
								?>
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