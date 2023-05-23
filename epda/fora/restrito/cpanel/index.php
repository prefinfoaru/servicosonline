<!-- Sistema de Gerencimaneto de Documento entre a Educação e o RH ******************************* 
---- Desenvolvido por: Lincoln -------------------------------------------------------------------
---- Gerente do Projeto : Alexandre  - CTI / Priscila  - Secretaria de Educação ------------------
Data: 27/09/2019 - Inicio Projeto-->

<?php session_start (); ?>
<!DOCTYPE html>

<meta charset="utf-8">

<?php 
if(!empty($_SESSION['id_cad_user'])){
include './includes/header.php'; 
include './includes/menu.php' ;
$valor = @$_GET['p'];

include './includes/casemenu.php' ;
include './includes/footer.php'	;	
	
	}else{
	$_SESSION['msg'] = "Área restrita";
	header("../");	
}
?>
