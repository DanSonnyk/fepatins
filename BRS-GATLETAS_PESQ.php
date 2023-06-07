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
			<div class="caption"><b>Pesquisa de Atletas</b></div>	
				<div class="box">
					<form action="BRS-GATLETAS_PESQ.php">
					<table>
						<tr>
						<td>&nbsp;<input type="submit" class="botao" name="atl_pesq" size="" id="bt_pesquisar "value="Pesquisar"/></td>
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
							<th>CIDADE</th>
							<th colspan="2">AÇÕES</th>
							
							</tr>
						<?php
							echo "Pesquisando por :".$_REQUEST['filtrar'];
							/*
							if(empty($_REQUEST['ordem']))
								$ordem = "atl_nome";
							else
							$ordem = $_REQUEST['ordem'];*/
							
							if(empty($_REQUEST['filtrar']))
								$filtrar="";
							else
							$filtrar=$_REQUEST['filtrar'];
							
							$sql_select = ("SELECT * FROM atletas where atl_nome LIKE '%".$filtrar."%' order by atl_nome");
							$resultado = mysql_query($sql_select);
							
							$numero_registros = mysql_num_rows($resultado);
							while($registro = mysql_fetch_array($resultado))
							{			
						?>
							
							<tr>
							<td><img src="img/atl_fotos/<?php echo $registro['atl_foto']?>" width="50" height="50" /></td>
							<td class="botao_link"><?php echo $registro['atl_nome'];?></td>
							<td class="botao_link"><?php echo $registro['atl_cidade'];?></td>
							<td class="botao_link"><a href="BRS-GATLETAS_EDIT.php?atl_nome=<?php echo $registro['atl_nome'];?>&
															   atl_apelido=<?php echo $registro['atl_apelido'];?>&
															   atl_email=<?php echo $registro['atl_email'];?>&
															   atl_tel=<?php echo $registro['atl_tel'];?>&
															   atl_nasc=<?php echo $registro['atl_nasc'];?>&
															   atl_cpf=<?php echo $registro['atl_cpf'];?>&
															   atl_cidade=<?php echo $registro['atl_cidade'];?>&
															   atl_estado=<?php echo $registro['atl_estado'];?>&
															   atl_regiao=<?php echo $registro['atl_regiao'];?>&
															   atl_categoria=<?php echo $registro['atl_categoria'];?>&
															   atl_modalidade=<?php echo $registro['atl_modalidade'];?>&
															   atl_sexo=<?php echo $registro['atl_sexo'];?>&
															   atl_patro=<?php echo $registro['atl_patro'];?>&
															   atl_points=<?php echo $registro['atl_points'];?>&
															   atl_desc=<?php echo $registro['atl_desc'];?>&
															   atl_trick=<?php echo $registro['atl_trick'];?>&
															   atl_video=<?php echo $registro['atl_video'];?>&
															   atl_foto=<?php echo $registro['atl_foto'];?>">
								   Editar Dados</a>
							</td>
							<td class="botao_link"><a href="BRS-GATLETAS_EDIT_POINTS.php?atl_nome=<?php echo $registro['atl_nome'];?>&
															   atl_cpf=<?php echo $registro['atl_cpf'];?>&
															   atl_cidade=<?php echo $registro['atl_cidade'];?>&
															   atl_patro=<?php echo $registro['atl_patro'];?>&
															   atl_points=<?php echo $registro['atl_points'];?>">
								   Editar Pontuação</a></td>
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