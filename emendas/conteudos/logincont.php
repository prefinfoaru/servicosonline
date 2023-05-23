
<?php session_start();?>






<script>

setTimeout(function() {
   $('#timemsg').fadeOut('slow');
}, 3000);

</script>


<div id="timemsg">
	<br>
	<?php 

		if(isset($_SESSION['loginOff'])){
			echo $_SESSION['loginOff'];
			unset ($_SESSION['loginOff']);
		}
	?>
</div> 



<br>
		<div class="col-md-12"  style="background:#ffff">
			<div class=" panel panel-info">
				<div class="panel-heading">
					<center class="panel-title"><h3>Login</h3></center>
				</div>
				<div id="timemsg">
					<?php
						if (isset($_SESSION['erro'])){
							echo $_SESSION['erro'];
							unset ($_SESSION['erro']);
						};
					?>

				</div>
				<div class="panel-body">
					<form class="form-group" method="post" action="../data/valida/validacaologin.php">
						<fieldset>
							<span  class="help-block"><strong>Usuário:</strong></span>
							<div class="input-login"> 
								<input  name="usuario" placeholder="Digite o seu usuário." class="form-control" required="" type="text"  style="width:100%;">
							</div>
							<br>
							<span  class="help-block"><strong>Senha:</strong></span>
							<div class="input-login">
								<input  name="senha" placeholder="Digite sua senha" class="form-control" required="" type="password" style="width: 100%;">
							</div>
<br>
							<div class="g-recaptcha"  name="g-recaptcha-response" data-sitekey="6LeQASYaAAAAAEbWxAehNYw_KPvE4d-XY1rGsWSx" required></div>


							<br>
							<div class="panel-body button-login">
								<input type="submit" class="btn btn-default " value="Acessar" ></input>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>


<br><br>
