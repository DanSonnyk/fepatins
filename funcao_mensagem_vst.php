<?php
	
	$para		= "administrador@brasilrollingseries.com";
	$assunto	= "Mensagem Visitante BRS";
	$nome 	    = $_POST['vst_nome'];
	$remt_email = $_POST['vst_email'];
	$msg	    = $_POST['vst_mensagem'];
	
	$corpo		="<strong>Mensagem do Visitante</strong><br><br>";
	$corpo     .="<strong>Nome: </strong> $nome";
	$corpo     .="<br><strong>Email: </strong> $remt_email<br><br>";
	$corpo     .="<br>$msg";
	
	$header    ="Content-Type: text/html; charset=utf-8\n";
	$header   .="From: $remt_email\n";
	

	@mail($para, $assunto, $corpo, $header);
	
	$para_alert		   = "danielsimi@hotmail.com";
	$assunto_alert	= "Nova mensagem do BRS!";
	$msg_alert	      = "Você tem uma nova mensagem de um visitante do site BRS.<br> Vejá agora http://webmail1.hostinger.com.br/squirrelmail/src/webmail.php<br><br> Não responder esta mensagem<br>BRS-BrasilRollingSeries<br>http://www.brasilrollingseries.com/<br>";

	$corpo_alert     ="<br>$msg_alert";
	
	$header_alert    ="Content-Type: text/html; charset=utf-8\n";
	$header_alert   .="From: BRS-BrasilRollingSeries\n";
	
	@mail($para_alert, $assunto_alert, $corpo_alert, $header_alert);
	
	if(mail){
					echo "<meta http-equiv=refresh content='0; URL=BRS-SOBRE.php';><script type=\"text/javascript\">
					alert(\"Mensagem enviada com sucesso!! Responderemos em breve!\");</script>";
					}else{
								echo "<meta http-equiv=refresh content='0; URL=BRS-SOBRE.php';><script type=\"text/javascript\">
								alert(\"Mensagem NÃO foi enviada!! Por vafor, tente novamente!\");</script>";
								}
?>
