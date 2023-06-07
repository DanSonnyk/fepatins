	<?php
	include "conexao/conexaodb.php";
	$config = conexao();
	
	//DADOS EVENTO
	$nome = addslashes($_POST['evt_nome']);
	$data = $_POST['evt_data'];
	$local = addslashes($_POST['evt_local']);
	$horario = $_POST['evt_horario'];
	$estado = $_POST['evt_estado'];
	$classe = $_POST['evt_capacid'];
	$descricao = $_POST ['evt_descricao'];
	$realizacao = addslashes($_POST ['evt_realizacao']);
	$web = $_POST ['evt_web'];
	$video = $_POST ['evt_video'];
	
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
	
//Verificando qual botão foi pressionado
if(isset($_POST['cadastrar'])){
 
	//DEFINIÇÕES DA IMAGEM
	$pasta = 'img/evt_fotos';
	$extensoes = array('png','jpg','jpeg','PNG','JPG','JPEG');
	$tamanho = 2222222;
	//FIM DEFINIÇÕES DA IMAGEM
	
//VALIDA IMAGEM	
				if(empty($foto_end)){
					echo "<meta http-equiv=refresh content='0; URL=BRS-GEVENTOS.php';>
						<script>alert(\"Faltou a Foto Man!!\")</script>";
					exit;
					
				}elseif($size == 0 || $size > $tamanho){
					echo "<meta charset=\"utf-8\";><script>alert(\"A FOTO SELECIONADA é muito grande!, Redimensione a imagem para até 2 Mb\")</script>
							<script>window.close()</script>";
							exit;
				}elseif(!in_array($formato, $extensoes)){
					echo "<meta charset=\"utf-8\";>
							<script>alert(\"Formato não permitido! Utilize JPG, JPEG ou PNG.\")</script>
							<script>window.close()</script>";
							exit;
				}
//FIM VALIDA IMAGEM
				//RENOMEAR foto para armazenar
				$foto_end = $nome.'.'.$formato;
				$foto_end = str_replace(" ","_", $foto_end);
				$foto_end = str_replace("ç","c", $foto_end);
				$foto_end = str_replace("Ç","c", $foto_end);
				$foto_end = str_replace("á","a", $foto_end);
				$foto_end = str_replace("Á","a", $foto_end);
				$foto_end = str_replace("ã","a", $foto_end);
				$foto_end = str_replace("Ã","a", $foto_end);
				$foto_end = str_replace("é","e", $foto_end);
				$foto_end = str_replace("É","e", $foto_end);
				$foto_end = str_replace("õ","o", $foto_end);
				$foto_end = str_replace("Õ","o", $foto_end);
				
				$upload = move_uploaded_file($tmp, $pasta.'/'.$foto_end); //faz upload da foto de $tmp para $pasta/$fotoend
				$data_atual = date("Y-m-d");
				$sql = mysql_query ("INSERT INTO `eventos` (`evt_cod`, `evt_foto`, `evt_nome`, `evt_data`, `evt_horario`,`evt_data_create`, `evt_local`, `evt_estado`, `evt_classe`, `evt_desc`, `evt_realizacao`, `evt_web`, `evt_video`) 
															VALUES (NULL, '$foto_end', '$nome', '$data', '$horario', '$data_atual', '$local', '$estado', '$classe', '$descricao', '$realizacao', '$web', '$video');"); 
				
				if($sql){
					echo "<meta http-equiv=refresh content='0; URL=BRS-GEVENTOS.php';>
					 <script type=\"text/javascript\">alert(\"Evento '$nome' CADASTRADO com sucesso!\");</script>";
					 }else {
					echo "<meta http-equiv=refresh content='0; URL=BRS-GEVENTOS.php';>
					 <script type=\"text/javascript\">alert(\"Erro ao GRAVAR no banco de dados!\");</script>";
					 }
}
/*	
	// Verifica se todos campos foram imformados
		if(empty($foto) || empty($nome) || empty($cpf) || empty($local) || empty($patrocinio) || empty($descricao)) {
			echo "<meta http-equiv=refresh content='0; URL=BRS-GEVENTOS.php';>
					  <script type=\"text/javascript\">alert(\"Todos os campos devem ser preechidos!\");</script>";
					  exit;
		}
*/
?>