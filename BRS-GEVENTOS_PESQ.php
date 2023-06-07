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
				<!-- formulario cadastro evento-->
			<div class="caption"><b>Gestão de Eventos</b></div>	
				<div class="box">
				
					<form action="BRS-GEVENTOS_PESQ.php">
					<table>
						<tr>
						<td>&nbsp;&nbsp;<input type="submit" class="botao" name="evt_pesq" size="" id="bt_pesquisar "value="Pesquisar"/></td>
						<td><input type="text" name="filtrar" id="filtrar" size="40" autofocus required /></td>
						</tr>
					</table>
					</form>
					<br>
					<?php
					if(!empty($_REQUEST['filtrar']))
					{?>
						<table id="tab_pesq">
							
							<tr>
							<th>FOTO</th>
							<th>NOME</th>
							<th>LOCAL</th>
							<th>DATA</th>
							<th>AÇÕES</th>
							
							</tr>
						<?php
							echo "Pesquisando por :".$_REQUEST['filtrar'];
							
							if(empty($_REQUEST['filtrar']))
								$filtrar="";
							else
							$filtrar=$_REQUEST['filtrar'];
							
							$sql_select = ("SELECT * FROM eventos WHERE evt_nome LIKE '".$filtrar."%' order by evt_data");
							$resultado = mysql_query($sql_select);
							
							$numero_registros = mysql_num_rows($resultado);
							while($registro = mysql_fetch_array($resultado))
							{			
						?>
							
							<tr>
							<td><img src="img/evt_fotos/<?php echo $registro['evt_foto']?>" width="50" height="50" /></td>
							<td class="botao_link"><?php echo $registro['evt_nome'];?></td>
							<td class="botao_link"><?php echo $registro['evt_local'];?></td>
							<td class="botao_link"><?php echo $registro['evt_data'];?></td>
							<td class="botao_link"><a href="BRS-GEVENTOS_EDIT.php?evt_cod=<?php echo $registro['evt_cod'];?>&
															   evt_nome=<?php echo $registro['evt_nome'];?>&
															   evt_data=<?php echo $registro['evt_data'];?>&
															   evt_local=<?php echo $registro['evt_local'];?>&
															   evt_horario=<?php echo $registro['evt_horario'];?>&
															   evt_estado=<?php echo $registro['evt_estado'];?>&
															   evt_capacid=<?php echo $registro['evt_classe'];?>&
															   evt_desc=<?php echo $registro['evt_desc'];?>&
															   evt_realizacao=<?php echo $registro['evt_realizacao'];?>&
															   evt_web=<?php echo $registro['evt_web'];?>&
															   evt_video=<?php echo $registro['evt_video'];?>&
															   evt_foto=<?php echo $registro['evt_foto'];?>">
								   Editar Evento</a>
							</td>
							
						<?php
							}
						?>
							<tr>
							<td colspan="5"> Registros encontrados:<?php echo $numero_registros ?></td>
							</tr>
							
						</table>
					<?php
					}
					?>
				</div>
		</section>
	</section>
	<footer>
	</footer>
	</body>

</html>