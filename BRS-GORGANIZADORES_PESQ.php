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
		<title>BrazilianRollingSeries  - PESQUISA ORGANIZADOR</title>
	</head>

	<body onload= "set_interval()" onmousemove="reset_interval()" onscroll="reset_interval()">
	<section id="interface_popup">
		<section id="body_popup">
				<!-- formulario cadastro atleta -->
			<div class="caption"><b>Pesquisa de Organizador</b></div>	
				<div class="box">
					<form action="BRS-GORGANIZADORES_PESQ.php">
					<table>
						<tr>
						<td>&nbsp;&nbsp;<input type="submit" class="botao" name="org_pesq" id="bt_pesquisar "value="Pesquisar"/></td>
						<td><input type="text" name="filtrar" id="filtrar" size="50" autofocus required /></td>
						</tr>
					</table>
					</form>
					<br>
					<?php
					if(!empty($_REQUEST['filtrar']))
					{?>
						<table id="tab_pesq">
							
							<tr>
								<th>NOME</th>
								<th>CIDADE</th>
								<th>ENTIDADE</th>
								<th>AÇÃO</th>
							</tr>
						<?php
							echo "Pesquisando por :".$_REQUEST['filtrar'];
							
							if(empty($_REQUEST['filtrar']))
								$filtrar="";
							else
							$filtrar=$_REQUEST['filtrar'];
							
							$sql_select = ("SELECT * FROM organizador where org_nome LIKE '".$filtrar."%' order by org_nome");
							$resultado = mysql_query($sql_select);
				
							while($registro = mysql_fetch_array($resultado))
							{			
						?>
							
							<tr>
							<td class="botao_link"><?php echo $registro['org_nome'];?></td>
							<td class="botao_link"><?php echo $registro['org_cidade'];?></td>
							<td class="botao_link"><?php echo $registro['org_entidade'];?></td>
							<td class="botao_link"><a href="BRS-GORGANIZADORES_EDIT.php?org_nome=<?php echo $registro['org_nome'];?>&
															   org_cpf=<?php echo $registro['org_cpf'];?>&
															   org_cidade=<?php echo $registro['org_cidade'];?>&
															   org_estado=<?php echo $registro['org_estado'];?>&
															   org_regiao=<?php echo $registro['org_regiao'];?>&
															   org_email=<?php echo $registro['org_email'];?>&
															   org_tel=<?php echo $registro['org_tel'];?>&
															   org_entidade=<?php echo $registro['org_entidade'];?>&
															   org_pass=<?php echo $registro['org_pass'];?>&
															   org_adm=<?php echo $registro['org_adm'];?>"
								   onclick="window.open(this.href,'BRS-GORGANIZADORES_EDIT.php','width=600,height=600'); return false;">
								   Editar Dados</a>
			    			</td>
							
						<?php
							}
						?>
							
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