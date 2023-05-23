<?php
	$servidor = "pmaruja14.pma.local";
	$usuario = "desenvolvimento";
	$senha = "prefeitura@banco2019";
	$dbname = "bd_epda";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
/*
if (!$conn) {echo "Não foi possível conectar ao banco MySQL."; exit;}
else {echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.
";}
mysql_close();
**/
