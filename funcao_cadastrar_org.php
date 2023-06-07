	<?php
	include "conexao/conexaodb.php";
	$config = conexao();
//GERAR SENHA
	function gerarsenha($limit){
	$str = "abcdefghijlmnopqrstuvxz1234567890";
	$maximo = strlen($str)-1;
	$ret ='';
	for ($i = 0; $i < $limit; $i++){
					$ret .= $str{mt_rand(0,$maximo)};
	}
				return $ret;
}
 $max_senha=6;
//FIM GERAR SENHA	

	//DADOS ATLETA
	$nome = $_POST['org_nome'];
	$cpf = $_POST['org_cpf'];
	$email = $_POST['org_email'];
	$tel = $_POST['org_tel'];
	$cidade = $_POST['org_cidade'];
	$estado = $_POST['org_estado'];
	$entidade = $_POST['org_entidade'];
	$adm = $_POST['org_adm'];
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

//Verificando qual botão foi pressionado
if(isset($_POST['cadastrar'])){
	
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

		$cpf = $_POST['org_cpf'];
		if(!validaCPF($cpf)){
		echo "<meta http-equiv=refresh content='0; URL=BRS-GATLETAS.php';>
					  <script type=\"text/javascript\">alert(\"CPF Invalido!\");</script>";
		}else{

			$verificaCPF = mysql_query("SELECT*FROM organizador WHERE org_cpf = '$cpf'");
			$validaCPFdb = mysql_num_rows($verificaCPF);

			if ($validaCPFdb == 0){
				$data_atual = date("Y-m-d");
				$senha = base64_encode(gerarsenha($max_senha));
				$sql = mysql_query("INSERT INTO `organizador`(`org_nome`, `org_cidade`,`org_estado`, `org_regiao`, `org_cpf`, `org_entidade`,`org_email`,`org_tel`,`org_data_ini`,`org_pass`,`org_adm`) 
								    VALUES('$nome','$cidade','$estado','$regiao','$cpf','$entidade','$email', '$tel','$data_atual','$senha','$adm')");
				
					if($sql){
					echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GORGANIZADORES.php';>
					 <script type=\"text/javascript\">alert(\"ORGANIZADOR '$nome' CADASTRADO com sucesso!\");</script>";
					 }else {
					echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GORGANIZADORES.php';>
					 <script type=\"text/javascript\">alert(\"Erro ao GRAVAR no banco de dados!\");</script>";
					 }
					 
			}else{
				echo "<meta http-equiv=refresh charset=utf-8 content='0; URL=BRS-GORGANIZADORES.php';>
					  <script type=\"text/javascript\">alert(\"ORGANIZADOR ja cadastrado!\");</script>";
				}
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
?>