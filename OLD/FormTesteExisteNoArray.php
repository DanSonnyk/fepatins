<form id="loginform" method="post" action="testeExisteNoArray.php " name="cadastrar" enctype="multipart/form-data">
						<div class="box">
							<span><label for="atl_estadoc">Estado :</label></span>
							<input type="text"  class="campo" name="atl_estado" id="atl_estadoc" size="60" placeholder="estado do NOVO Atleta" onkeyup="up(this)" autofocus required />
						</div>
						<div class="box">
							<input type="submit" class="botao" name="cadastrar" value="SALVAR" onclick="return confirm('Confirma o envio do formulario ?')" />
						</div>
</form>