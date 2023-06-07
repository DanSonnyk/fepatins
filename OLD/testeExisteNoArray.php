<?php
	$estado=$_POST['atl_estado'];
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
	echo $regiao;

?>