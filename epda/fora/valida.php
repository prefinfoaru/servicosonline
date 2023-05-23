<?php
session_start();
include_once("conexao.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$cpf = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($cpf)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT * FROM bd_spf.tb_cadastro_de_usuarios WHERE cpf='$cpf' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id_cad_user'] = $row_usuario['id_cad_user'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				$_SESSION['funcao'] = $row_usuario['funcao'];
				$_SESSION['vinculo'] = $row_usuario['vinculo'];
				header("Location: cpanel/index.php");
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: index.php");
			}
		}
	}else{
		$_SESSION['msg'] = "CPF ou Senha incorretos! ";
		header("Location: index.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: index.php");
}
