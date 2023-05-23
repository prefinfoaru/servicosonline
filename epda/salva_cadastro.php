<?php
session_start();
include('conexao.php');
include('variaveis.php');

$sql = mysqli_query ($conn, "SELECT * FROM bd_epda.tb_cadastro_de_usuarios where cpf = '$matricula';");



if(mysqli_num_rows($sql) >0){
			$_SESSION['msg'] = " Matricula já Cadastrada";
	header("Location: cadastro_usuario.php");
			 
		} 

$options = [
    'cost' => 12,
];
$hash = password_hash("$senha1", PASSWORD_BCRYPT, $options);


$querycadastro =  "INSERT INTO `bd_epda`.`tb_cadastro_de_usuarios` (`nome`, `tel`, `email`, `senha`, `nivel`, `data_cadastro`, `cpf`, `vinculo`) VALUES ('$nome', '$tel', '$email', '$senha1', '1', '$data', '$matricula', 'Requerente')";
$resultado_cadastro = mysqli_query($conn, $querycadastro);

/*
if($conn->query($querycadastro) === TRUE)  {
	
	
	$_SESSION['msg2'] = " * Cadastro efetuado com Sucesso";
	header("Location: index.php");
 
}
else{
	
$_SESSION['msg'] = " * Problema, no cadastro entrar em contato com Administração.";
	header("Location: cadastro_usuario.php");}
*/

?>