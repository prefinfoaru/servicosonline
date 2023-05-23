<?php 
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];

		switch($msg){
			case 1:
			?>
				<div class="message">
					<div class="alert alert-danger">
						<a href="index.php" class="close" data-dismiss="alert">&times</a>
						Email ou Senha Incorretos.
					</div>
				</div>
			<?php
			break;
			case 2:
			?>
				<div class="message">
					<div class="alert alert-danger">
						<a href="index.php" class="close" data-dismiss="alert">&times</a>
						Você não tem permissão para acessar esta página.
					</div>
				</div>
			<?php
			break;
			case 3:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="index.php" class="close" data-dismiss="alert">&times</a>
						Você saiu do sistema.
					</div>
				</div>
			<?php
			break;
		}
	}
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=300, initial-scale=1">
	<title>Login - Consulta de agendamento</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<div class="jumbotron" > 
          <img src="../logo.png" class="logo">
    	   <h1>Gerenciar Agendamentos</h1><br> 
    </div><br>
	<div class="container">
	
		<form action="autenticar.php" method="post" class="form-login">
		
			<h2 class="form-login-heading">Digite os dados</h2>
			<label for="inputEmail" class="sr-only">E-mail</label>
			<input type="text" id="login" name="login" class="form-control" placeholder="Email" required autofocus>
			<label for="inputPassword" class="sr-only">Senha</label>
			<input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
			<button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
		</form>
	</div>
	<footer class="footer navbar-fixed-bottom">
      <h3>Prefeitura Municipal de Arujá</h3>
    </footer>
  <!-- /#wrapper -->
</body>
</html>
