	<?php
	include "conexao/conexaodb.php";
	$config = conexao();
	
	if(isset($_POST['salvar'])){
			//DADOS ATLETA
			$nome = $_POST['org_nome'];
			$cpf = $_POST['org_cpf'];
			$email = $_POST['org_email'];
			$tel = $_POST['org_tel'];
			$cidade = $_POST['org_cidade'];
			$estado = $_POST['org_estado'];
			$entidade = $_POST['org_entidade'];
			$adm = $_POST['org_adm'];
			$senha = base64_encode($_POST['org_senha']);
			$novasenha = $_POST['org_senha'];
			$regiao="";
			
				//SETA REGIAO
				$achou = false;
				
				$sudeste = array("São Paulo", "Rio de Janeiro", "Minas Gerais", "Espirito Santo");
				$nordeste = array("Alagoas", "Bahia", "Ceará", "Maranhão", "Paraíba", "Pernambuco", "Piauí", "Rio Grande do Norte", "Sergipe");
				$norte = array("Amapá", "Amazonas", "Ronônia", "Tocantins", "Pará" , "Acre", "Roraima");
				$sul = array("Paraná", "Santa Catarina", "Rio Grande do Sul");
				$centroOeste = array("Mato Grosso do Sul", "Goiás", "Mato Grosso","Distrito Federal");
				
				for($y=0; $y <= 1 ; $y++){
						for($i=0; $i < count($sudeste) ; $i++){
							if($estado == $sudeste[$i]){
								$regiao = 'Sudeste';
								$achou= true;
							}
						}
					if($achou){
						break;
					}
						for($i=0; $i < count($nordeste) ; $i++){
							if($estado == $nordeste[$i]){
								$regiao = 'Nordeste';
								$achou= true;
							}
						}
					if($achou){
						break;
					}
						for($i=0; $i < count($norte) ; $i++){
							if($estado == $norte[$i]){
								$regiao = 'Norte';
								$achou= true;
							}
						}
					if($achou){
						break;
					}
						for($i=0; $i < count($sul) ; $i++){
							if($estado == $sul[$i]){
								$regiao = 'Sul';
								$achou= true;
							}
						}
					if($achou){
						break;
					}			
						for($i=0; $i < count($centroOeste) ; $i++){
							if($estado == $centroOeste[$i]){
								$regiao = 'Centro-Oeste';
								$achou= true;
							}
						}
					
				}
				//FIM SETA REGIAO
			//FIM DADOS Atleta
						if(!empty($senha)){
							$sql = mysql_query("UPDATE `organizador` SET `org_pass` = '$senha'  WHERE `org_cpf` = '$cpf' ;");
								if($sql){
									echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GORGANIZADORES_PESQ.php';>
									<script type=\"text/javascript\">alert(\" SENHA de '$nome' Alterada para '$novasenha'!\");</script>";
									exit;
								 }else {
									echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GORGANIZADORES_PESQ.php';>
									<script type=\"text/javascript\">alert(\"Erro ao GRAVAR no banco de dados!\");</script>";
									exit;
										}
						}
						$sql = mysql_query("UPDATE `organizador` SET `org_nome` = '$nome',`org_email` = '$email', `org_tel` = '$tel',`org_cidade` = '$cidade',`org_estado` = '$estado', `org_regiao` = '$regiao', `org_cidade` = '$cidade', `org_entidade` = '$entidade', `org_adm` = '$adm'  WHERE `org_cpf` = '$cpf' ;");
						if($sql){
							echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GORGANIZADORES_PESQ.php';>
							<script type=\"text/javascript\">alert(\"'$nome' EDITADO com sucesso!\");</script>";
							exit;
						 }else {
							echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GORGANIZADORES_PESQ.php';>
							<script type=\"text/javascript\">alert(\"Erro ao GRAVAR no banco de dados!\");</script>";
							exit;
								}
				
		/*	
			// Verifica se todos campos foram imformados
				if(empty($foto) || empty($nome) || empty($cpf) || empty($cidade) || empty($patrocinio) || empty($descricao)) {
					echo "<meta http-equiv=refresh content='0; URL=BRS-GATLETAS.php';>
							  <script type=\"text/javascript\">alert(\"Todos os campos devem ser preechidos!\");</script>";
							  exit;
				}
		*/
	}elseif(isset($_POST['excluir'])){
		$nome = $_POST['org_nome'];
		$cpf = $_POST['org_cpf'];
		$adm = $_POST['org_adm'];
		//if($adm == "N"){
			$sql = mysql_query("DELETE FROM `organizador` WHERE `org_cpf` = '$cpf'");
			echo "<meta charset=\"utf-8\"><script type=\"text/javascript\">alert(\"'$nome' EXCLUÍDO com sucesso!\");</script>
									<script>window.close()</script>";
			//}else{
				  
			//	 }
	}
?>