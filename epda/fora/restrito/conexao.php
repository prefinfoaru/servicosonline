<?php $servidor = "pmaruja14.pma.local";
$usuario = "desenvolvimento";
$senha = "prefeitura@banco2019";
$dbname = "bd_sol_hr";

//Criar a conexao
$conn = new mysqli($servidor, $usuario, $senha, $dbname);

if (mysqli_connect_errno()) {
	echo "Falha na conexão: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
}
