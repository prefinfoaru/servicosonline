<?php
	$servidor = "10.2.2.55";
	$usuario = "BDSitio_01";
	$senha = "impre@sh_01";
	$dbname = "agenda";

	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	mysqli_character_set_name($conn,"utf8");
