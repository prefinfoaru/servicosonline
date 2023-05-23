<?php
$campo = $_GET['campo'];
$valor3 = $_GET['valor'];
	
$valor2 = str_replace("." ,"", $valor3);
$valor1 = str_replace("-" ,"", $valor2);
$valor4 = str_replace("/" ,"", $valor1);	
$valor5 = str_replace("," ,"", $valor4);
$valor = $valor5;


	if($valor > 149999  )
		
		
		echo "<font color=\"#387752\";> ok </font>"."<img src='../../imagens/check.png' width='12px' height='12px'>" ;
		
	    elseif ($valor == "" || $valor < 150000 )
		
		echo $cnpj_original."<img src='../../imagens/notcheck.png' width='10px' height='10	px'>"." "."<font color=\"#990000\";> Valor do depósito inválido, inferior a R$ 1.500,00</font> ";

// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>