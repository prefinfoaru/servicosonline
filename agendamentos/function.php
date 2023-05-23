<?php
include_once("conexao.php");

function retorna($cpf, $conn){
	$result= "SELECT * FROM agendamentos WHERE cpf = '$cpf' LIMIT 1";
	$resultado = mysqli_query($conn, $result);
	if($resultado->num_rows){
		$row_dados = mysqli_fetch_assoc($resultado);
		$valores['nome'] = $row_dados['nome'];
	}else{
	
	}
	return json_encode($valores);
}

if(isset($_GET['cpf'])){
	echo retorna($_GET['cpf'], $conn);
}
?>