<?php

	$servidor = "pmaruja14.pma.local";
	$usuario = "desenvolvimento";
	$senha = "prefeitura@banco2019";
	$dbname = "bd_emprega_aruja";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


	//Credenciais de acesso ao BD
	define('HOST', 'pmaruja14.pma.local');
	define('USER', 'desenvolvimento');
	define('PASS', 'prefeitura@banco2019');
	define('DBNAME', 'bd_emprega_aruja');

	$conn2 = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
