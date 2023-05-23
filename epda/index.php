<?php

session_start(); 

session_destroy(); 

session_write_close(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistema EPDA</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- *******************************************************************************MAIN CONTENT**************************************************************************************** -->

	  <div class="container">
	<div class="row">
    	<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-info" style="margin-top:50px;">
                <div class="panel-heading ; "text-center""><h4 class="text-center">Escritório Plano Diretor de Arujá</h4>
                  <?php
	 		   if(isset($_SESSION['msg'])){
				echo utf8_encode('<div style="color:red;text-align: center">' .$_SESSION['msg']. '</div>');
				   
				unset($_SESSION['msg']);
			}
					   if(isset($_SESSION['msg2'])){
				echo utf8_encode('<div style="color:"#228B22" ;text-align: center">' .$_SESSION['msg2']. '</div>');
				   
				unset($_SESSION['msg2']);
			}
		?></div>
                <div class="panel-body">
                 
                        <form method="post" action="valida.php">
                        <div class="form-group">
                            <label for="usuario">CPF</label>
                            <input type="text" class="form-control" id="usuario" name= "usuario" placeholder="Digite sua Matrícula">
                        </div>
                        
                        <div class="form-group">
                            <label for="pass">Senha</label>
                            <input type="password" class="form-control" id="senha" name ="senha" placeholder="Digite sua Senha">
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-block" name="btnLogin" value="Acessar">Acessar</button>
                        
                        <a href="esqueciminhasenha.php"  class="btn btn-warning btn-block" role="button">Esqueci minha Senha</a>
                   <!--     <a href="cadastro_usuario.php"  class="btn btn-info btn-block" role="button">Não Tenho Cadastro</a>-->
                        <a href="cadastro_usuario.php"  class="btn btn-default btn-block" role="button">Cadastrar</a>
                        <span class="help-block" style="color:#676767; font-size: 10px; text-align: center">Desenvolvido pelo CDS - PMA | Versão 1.0</span>
                        <span class="help-block" style="color:#676767; font-size: 10px; text-align: center">cds@aruja.sp.gov.br</span>
                    
                        
                    </form>
                </div>
            </div>
            
        </div>
	</div>
</div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
