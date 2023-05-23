<?php
session_start();
?>
<html lang="pt-br">
<meta charset="utf-8">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body{
 background: url('http://localhost/servicosonline/epda/restrito/img/background4.PNG');
}
</style>
<div class="container">
	<div class="row">
    	<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-info" style="margin-top:50px;">
                <div class="panel-heading ; "text-center""><h4 class="text-center">Acesso Restrito das Secretárias</h4>
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

                        <a href="../index.php"  class="btn btn-default btn-block" role="button">Acesso a Solicitação de Hora Extra</a>
                        <span class="help-block" style="color:#676767; font-size: 10px; text-align: center">Desenvolvido pelo CDS - PMA</span>
                        <span class="help-block" style="color:#676767; font-size: 10px; text-align: center">cds@aruja.sp.gov.br</span>

                    </form>
                </div>
            </div>

        </div>
	</div>
</div>