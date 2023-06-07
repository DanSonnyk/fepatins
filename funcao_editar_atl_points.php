	<?php
	include "conexao/conexaodb.php";
	$config = conexao();
	
			//DADOS ATLETA
			$pontuacao = $_POST['atl_pontuacao'];
			$cpf = $_POST['atl_cpf'];
			$nome = $_POST['atl_nome'];
			$destaque = 'N';
			//Fim DADOS ATLETA
	if (isset($_POST['somar'])){
			if(!empty($pontuacao)) {
				if($pontuacao >= 30){
					$destaque = 'S';
				}
						$sql = mysql_query("UPDATE `atletas` SET `atl_points` = `atl_points`+'$pontuacao' , `atl_destaque` = '$destaque' WHERE `atl_cpf` = '$cpf' ;");
						
						echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GATLETAS_PESQ.php';>
						<script type=\"text/javascript\">alert(\"Pontos para '$nome' SOMADOS com sucesso!\");</script>;";
						
						$sql_select = ("SELECT * FROM atletas WHERE atl_nome = '$cpf%'");
						$resultado = mysql_query($sql_select);
			}else{
				echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GATLETAS_PESQ.php';>
				<script type=\"text/javascript\">alert(\"Informe a Pontuação à Adicionar!\");</script>";
							  exit;
				}
	}elseif (isset($_POST['subtrair'])){
			if(!empty($pontuacao)) {
						$sql = mysql_query("UPDATE `atletas` SET `atl_points` = `atl_points`-'$pontuacao' WHERE `atl_cpf` = '$cpf' ;");
						
						if($sql){
							echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GATLETAS_PESQ.php';>
							 <script type=\"text/javascript\">alert(\"Pontos para '$nome' SUBTRAIDOS com sucesso!\");</script>";
							 }else {
							echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GATLETAS_PESQ.php';>
							 <script type=\"text/javascript\">alert(\"Erro ao GRAVAR no banco de dados!\");</script>";
							 }
			}else{
				echo "	<script type=\"text/javascript\">alert(\"Informe a Pontuação à Adicionar!\");</script>
						<script>window.close()</script>";
							  exit;
				}
	}
?>