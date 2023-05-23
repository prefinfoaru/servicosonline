<?php
session_start();
include_once("conexao.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT * FROM bd_epda.tb_cadastro_de_usuarios WHERE cpf='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id_cad_user'] = $row_usuario['id_cad_user'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				$_SESSION['funcao'] = $row_usuario['funcao'];
				$_SESSION['matricula'] = $row_usuario['matricula'];
				$_SESSION['secretaria'] = $row_usuario['secretaria'];
				$_SESSION['nivel'] = $row_usuario['nivel'];
				$_SESSION['membro'] = $row_usuario['membro'];
				$_SESSION['Njurado'] = $row_usuario['Njurado'];
                
                // acesso usuário externo
                if($_SESSION['nivel'] == 1){
				header("Location: cpanel/index.php");
                }
                // acesso usuário membros da mesa jugadora
                if($_SESSION['nivel'] == 2){
				header("Location: cpanelmebros/index.php");
                }
                // acesso usuário administrador
                if($_SESSION['nivel'] == 3){
				header("Location: cpaneladmin/index.php");
                }
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: index.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorretdddo! ";
		header("Location: index.php");
	}
}else{
    
    echo "4";
	$_SESSION['msg'] = "Página não encontrada";
header("Location: index.php");
}
?>

