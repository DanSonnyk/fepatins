<?php

include "conexao/conexaodb.php";
	$config = conexao();
	
	
	$hoje = date('Y-m-d');

?>

<?php
								$query ="Select * from eventos WHERE evt_data >= (CURRENT_DATE) ORDER BY evt_data ASC";

								$sql_select = ($query);
								$resultado = mysql_query($sql_select);
							
								while($registro = mysql_fetch_array($resultado))
				
								{			
								?>
									<div class="box">
										<?php echo $registro['evt_data'];?>
										
										
										<h></h>
									</div>
								<?php
									}
								?>