<?php 
session_start();
if($resultado_cadastro === TRUE)  {


	$_SESSION['msg2'] = " * Cadastro efetuado com Sucesso";
	header("Location: ../../index.php?p=solicitar");
	exit() ;	

	}
	else{

	$_SESSION['msg'] = " * Problema, no cadastro entrar em contato com a Adiministração.";
	header("Location: ../../index.php?p=solicitar");}
exit() ;	
?>