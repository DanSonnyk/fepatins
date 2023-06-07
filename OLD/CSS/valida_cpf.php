<?php

	$cpf = $_POST['atl_cpf']; // Corresponde ao conteúdo do campo CPF com o valor retornado pela superglobal.
	
	function verifica_cpf($valor){ // Cria a função com o parâmetro da variável.
	
		$n[1]=substr($valor,0,1); // Armazena no vetor os valores na posição da variável por intermédio da função.
		$n[2]=substr($valor,1,1);
		$n[3]=substr($valor,2,1);
		$n[4]=substr($valor,3,1);
		$n[5]=substr($valor,4,1);
		$n[6]=substr($valor,5,1);
		$n[7]=substr($valor,6,1);
		$n[8]=substr($valor,7,1);
		$n[9]=substr($valor,8,1);
		$n[10]=substr($valor,9,1);
		$n[11]=substr($valor,10,1);
		
	$soma1=($n[1]*10)+($n[2]*9)+($n[3]*8)+($n[4]*7)+($n[5]*6)+($n[6]*5)+($n[7]*4)+($n[8]*3)+($n[9]*2); // Variável de + e * com os nº do CPF.
	
	$dgt1=11-($soma1%11); // Calcula o primeiro digito de controle e o armaneza na variável.
	
	if ($dgt1==10 or $dgt1==11) { // Verifica se o valor da variável é 10 ou 11. Em caso afirmativo esta variável recebe o valor de zero(0).
		$dgt1=0;
		}	
	
	$soma2=($n[1]*11)+($n[2]*10)+($n[3]*9)+($n[4]*8)+($n[5]*7)+($n[6]*6)+($n[7]*5)+($n[8]*4)+($n[9]*3)+($dgt1*2); 
	// Variável que soma e multiplica todos os números do CPF com a soma do valor do primeiro dígito multiplicado por dois(2).

	$dgt2=11-($soma2%11); // Calcula o segundo digito de controle e o armaneza na variável.
	
	if ($dgt2==10 or $dgt2==11) { // Verifica se o valor da variável é 10 ou 11. Em caso afirmativo esta variável recebe o valor de zero(0). 
		$dgt2=0;
		}	
		
	if ($dgt1<>$n[10] OR $dgt2<>$n[11]) { // Verifica os valores dos dígitos de controle com os valores inseridos no formulário.
											// Em caso afirmativo, armazena o valor "true" na variável. Caso contrário, o valor "false".
		$erro=true;
		}
		else{
			$erro=false;
			}
			return $erro; // Encerra a função.
			}
			
			
	if(verifica_cpf($cpf)) { // Usa a função para verificar se o CPF é correto ou inválido.
	
	print "Número de CPF Inválido! <br /><br />";
	print "<a href='javascript:history.go(-1)'>Clique aqui para corrigir o número de CPF!</a>";
	
	exit;
		}
		
	print "O Número de CPF está Correto! <br /><br />";
	print "<a href='javascript:history.go(-1)'>Voltar e Digitar um outro Número de CPF</a>";
	
	exit;

?>