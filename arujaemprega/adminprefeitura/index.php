<?php 
session_start();

if(!empty($_SESSION['usuario'])){
	include "include/header.php";
//	include "include/menu_barra_lateral.php";
	$valor = @$_GET['p'];
	include 'include/casemenu.php' ;
	//include "include/conteudo_interno.php";
	include "include/rodape.php";
	include "include/Core JS Files.php";
	}else{
		$_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Área Restrita.</div>";
		header("location: pages/login.php");
	} 

?>
 

  

