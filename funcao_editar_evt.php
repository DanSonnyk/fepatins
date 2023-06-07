	<?php
	include "conexao/conexaodb.php";
	$config = conexao();
	
	$cod_evt = $_POST['evt_cod'];
	$sql_delet = ("SELECT * FROM eventos WHERE evt_cod ='$cod_evt'");
	$resultado = mysql_query($sql_delet);
	$registro = mysql_fetch_array($resultado);
	$foto_atual = $registro['evt_foto'];
	$nomex = $registro['evt_nome'];
	
	if(isset($_POST['salvar'])){
	
			//DADOS EVENTO
			$nome = addslashes($_POST['evt_nome']);
			$data = $_POST['evt_data'];
			$local = addslashes($_POST['evt_local']);
			$horario = $_POST['evt_horario'];
			$estado = $_POST['evt_estado'];
			$classe = $_POST['evt_capacid'];
			$descricao = addslashes($_POST['evt_descricao']);
			$web = $_POST['evt_web'];
			$video = $_POST['evt_video'];
			$realiz = addslashes($_POST['evt_realizacao']);
			
				if($classe <= 20){
					$classe = 2;
				}elseif($classe > 21 && $classe <= 30){
					$classe = 3;
				}elseif ($classe > 31 && $classe <= 40){
					$classe = 4;
				}elseif ($classe > 41){
					$classe = 5;
				}
			//FIM DADOS EVENTO
			
			//DADOS DA IMAGEM
			$foto = $_FILES['evt_foto'];
			$foto_end = $foto['name'];
			$tmp = $foto['tmp_name'];
			$size = $foto['size'];
			$formato = end(explode('.',$foto_end));
			//FIM DADOS IMAGEM
		 
			//DEFINIÇÕES DA IMAGEM
			$pasta = 'img/evt_fotos';
			$extensoes = array('png','jpg','jpeg');
			$tamanho = 2222222;
			//FIM DEFINIÇÕES DA IMAGEM
					
					//FIM VALIDA IMAGEM
					if (!empty($foto_end)){
						if($size == 0 || $size > $tamanho){
							echo "<meta charset=\"utf-8\";><script>alert(\"A FOTO SELECIONADA é muito grande!, Redimensione a imagem para até 2 Mb \")</script>
							<script>window.close()</script>";
							exit;
						}elseif(!in_array($formato, $extensoes)){
							echo "<meta charset=\"utf-8\";>
							<script>alert(\"Formato não permitido! Utilize JPG, JPEG ou PNG.\")</script>
							<script>window.close()</script>";
							exit;
						}
						unlink("img/evt_fotos/$foto_atual");
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
						$sql = mysql_query("UPDATE `eventos` SET `evt_foto` = '$foto_end' WHERE `evt_code` = '$cod_evt' ");
					}
					//FIM VALIDA IMAGEM
					
						$sql = mysql_query("UPDATE `eventos` SET `evt_nome` = '$nome',`evt_data` = '$data',`evt_estado` = '$estado',`evt_local` = '$local', `evt_horario` = '$horario',`evt_classe` = '$classe',`evt_desc` = '$descricao',`evt_realizacao` = '$realiz',`evt_web` = '$web',`evt_video` = '$video'  WHERE `evt_cod` = '$cod_evt' ;");
						if($sql){
							echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GEVENTOS_PESQ.php';>
							<script type=\"text/javascript\">alert(\"'$nome' EDITADO com sucesso!\");</script>";
						 }else {
							echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GEVENTOS_PESQ.php';>
							<script type=\"text/javascript\">alert(\"Erro ao GRAVAR no banco de dados!\");</script>";
								}
		/*	
			// Verifica se todos campos foram imformados
				if(empty($foto) || empty($nome) || empty($cpf) || empty($local) || empty($patrocinio) || empty($descricao)) {
					echo "<meta http-equiv=refresh content='0; URL=BRS-GEVENTOS.php';>
							  <script type=\"text/javascript\">alert(\"Todos os campos devem ser preechidos!\");</script>";
							  exit;
				}
		*/
	}elseif(isset($_POST['excluir'])){
		$sql = mysql_query("DELETE FROM `eventos` WHERE `evt_cod` = '$cod_evt'");
		unlink("img/evt_fotos/$foto_atual");
		echo "<meta charset=\"utf-8\";><script type=\"text/javascript\">alert(\"'$nomex' EXCLUÍDO com sucesso!\");</script>
				<script>window.close()</script>";
	}
?>