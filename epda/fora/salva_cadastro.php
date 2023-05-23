<?php
session_start();
include('conexao.php');
include('variaveis.php');

$sql = mysqli_query ($conn, "SELECT * FROM bd_sol_hr.tb_cadastro_de_usuarios where matricula = '$matricula';");
if(mysqli_num_rows($sql) >0){
			$_SESSION['msg'] = " Matricula já Cadastrada";
	header("Location: cadastro_usuario.php");
			break; 
		} 

$options = [
    'cost' => 12,
];
$hash = password_hash("$senha1", PASSWORD_BCRYPT, $options);

$querycadastro =  "INSERT INTO `bd_spf`.`tb_cadastro_de_usuarios` (`matricula`, `nome`, `funcao`, `regime`, `cargahoraria`, `tel`, `email`, `senha`, `nivel`, `data_cadastro`) VALUES ('$matricula', '$nome', '$funcao', '$regime', '$carga', '$tel', '$email', '$hash', '3', '$data');";
$resultado_cadastro = mysqli_query($conn, $querycadastro);

if($conn->query($querycadastro) === TRUE)  {
	
	
	$_SESSION['msg2'] = " * Cadastro efetuado com Sucesso";
	header("Location: index.php");
 
}
else{
	
$_SESSION['msg2'] = " * Problema, no cadastro entrar em contato com Administração.";
	header("Location: cadastro_usuario.php");}



?>