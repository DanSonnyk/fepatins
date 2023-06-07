	<?php
	include "conexao/conexaodb.php";
	$config = conexao();
	
	$cpf = $_POST['atl_cpf'];
	$sql_delet = ("SELECT * FROM atletas where atl_cpf ='$cpf'");
	$resultado = mysql_query($sql_delet);
	$registro = mysql_fetch_array($resultado);
	$foto_atual = $registro['atl_foto'];
	
	if(isset($_POST['salvar'])){
			//DADOS ATLETA
			$nome = addslashes($_POST['atl_nome']);
			$apelido = $_POST['atl_apelido'];
			$cpf = $_POST['atl_cpf'];
			$sexo = $_POST['atl_sexo'];
			$cidade = $_POST['atl_cidade'];
			$email = $_POST['atl_email'];
			$tel = $_POST['atl_tel'];
			$categoria = $_POST['atl_categoria'];
			$modalidade = $_POST['atl_modalidade'];
			$estado = $_POST['atl_estado'];
			$patrocinio = addslashes($_POST['atl_patrocinio']);
			$pontuacao = $_POST['atl_pontuacao'];
			$descricao = addslashes($_POST['atl_descricao']);
			$nasc = $_POST ['atl_nasc'];
			$trick = addslashes($_POST ['atl_trick']);
			$video = $_POST ['atl_video'];
			$regiao ="";
			//FIM DADOS Atleta
			
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
			
			//DADOS DA IMAGEM
			$foto = $_FILES['atl_foto'];
			$foto_end = $foto['name'];
			$tmp = $foto['tmp_name'];
			$size = $foto['size'];
			$formato = end(explode('.',$foto_end));
			//FIM DADOS IMAGEM

			//DEFINIÇÕES DA IMAGEM
			$pasta = 'img/atl_fotos';
			$extensoes = array('png','jpg','jpeg','PNG','JPG','JPEG');
			$tamanho = 2222222;
			//FIM DEFINIÇÕES DA IMAGEM
			
			//FUNÇÃO PARA VALIDAR O CPF 
				function validaCPF($cpf = null) {

				 
				// Verifica se o numero de digitos informados é igual a 11 
				if (strlen($cpf) != 11) {
					return false;
				}
				// Verifica se nenhuma das sequências invalidas abaixo 
				// foi digitada. Caso afirmativo, retorna falso
				else if ($cpf == '00000000000' || 
					$cpf == '11111111111' || 
					$cpf == '22222222222' || 
					$cpf == '33333333333' || 
					$cpf == '44444444444' || 
					$cpf == '55555555555' || 
					$cpf == '66666666666' || 
					$cpf == '77777777777' || 
					$cpf == '88888888888' || 
					$cpf == '99999999999') {
					return false;
				 // Calcula os digitos verificadores para verificar se o
				 // CPF é válido
				 } else {   
					 
					for ($t = 9; $t < 11; $t++) {
						 
						for ($d = 0, $c = 0; $c < $t; $c++) {
							$d += $cpf{$c} * (($t + 1) - $c);
						}
						$d = ((10 * $d) % 11) % 10;
						if ($cpf{$c} != $d) {
							return false;
						}
					}
			 
					return true;
				}
			}
			//FIM FUNÇÃO PARA VALIDAR O CPF 

				$cpf = $_POST['atl_cpf'];
				if(!validaCPF($cpf)){
				echo "<script type=\"text/javascript\">alert(\"CPF Invalido!\");</script>
						<script>window.close()</script>";
				}else{
									//VALIDA IMAGEM
					if (!empty($foto_end)){
						if($size == 0 || $size > $tamanho){
							echo "<meta charset=\"utf-8\";><script>alert(\"A FOTO SELECIONADA é muito grande!, Redimensione a imagem para até 2 Mb com dimensões 300x350 \")</script>
							<script>window.close()</script>";
							exit;
						}elseif(!in_array($formato, $extensoes)){
							echo "<meta charset=\"utf-8\";>
							<script>alert(\"Formato não permitido! Utilize JPG, JPEG ou PNG.\")</script>
							<script>window.close()</script>";
							exit;
						}
						unlink("img/atl_fotos/$foto_atual");
						
						$foto_end = $nome.'.'.$formato;
						$foto_end = str_replace(" ","_", $foto_end);
						$foto_end = str_replace("ç","c", $foto_end);
						$foto_end = str_replace("Ç","C", $foto_end);
						$foto_end = str_replace("á","a", $foto_end);
						$foto_end = str_replace("Á","a", $foto_end);
						$foto_end = str_replace("ã","a", $foto_end);
						$foto_end = str_replace("Ã","a", $foto_end);
						$foto_end = str_replace("é","e", $foto_end);
						$foto_end = str_replace("É","e", $foto_end);
						$foto_end = str_replace("õ","o", $foto_end);
						$foto_end = str_replace("Õ","o", $foto_end);
						
						$upload = move_uploaded_file($tmp, $pasta.'/'.$foto_end); //faz upload da foto de $tmp para $pasta/$fotoend
						$sql = mysql_query("UPDATE `atletas` SET `atl_foto` = '$foto_end' WHERE `atl_cpf` = '$cpf' ");
					}
			//FIM VALIDA IMAGEM
						$sql = mysql_query("UPDATE `atletas` SET `atl_nome` = '$nome',`atl_sexo` = '$sexo',`atl_email` = '$email',`atl_tel` = '$tel',`atl_apelido` = '$apelido',`atl_categoria` = '$categoria', `atl_modalidade` = '$modalidade',`atl_estado` = '$estado', `atl_regiao` = '$regiao',`atl_patro` = '$patrocinio', `atl_cidade` = '$cidade', `atl_desc` = '$descricao' , `atl_nasc` = '$nasc', `atl_trick` = '$trick', `atl_video` = '$video' WHERE `atl_cpf` = '$cpf' ;");
						if($sql){
							echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GATLETAS_PESQ.php';>
							<script type=\"text/javascript\">alert(\"'$nome' EDITADO com sucesso!\");</script>";
						 }else {
							echo "<meta http-equiv=refresh content='0; URL=BRS-GATLETAS_PESQ.php';>
							<script type=\"text/javascript\">alert(\"Erro ao GRAVAR no banco de dados!\");</script>";
								}
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
		$nome = $_POST['atl_nome'];
		$sql = mysql_query("DELETE FROM `atletas` WHERE `atl_cpf` = '$cpf'");
		unlink("img/atl_fotos/$foto_atual");
		echo "<meta charset=\"utf-8\";><script type=\"text/javascript\">alert(\"'$nome' EXCLUÍDO com sucesso!\");</script>
								<script>window.close()</script>";
	}
?>