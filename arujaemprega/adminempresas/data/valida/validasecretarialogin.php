<?php       
session_start();
include ("../conexao.php");
include ("../banco.php");

$cnpj = $_SESSION['prefeitura'];
$sec  = $_POST['sec'];


if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 3){ 

	$consulta2 = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where cnpjcpf = '$cnpj'";
	$resultado_consulta2 = mysqli_query($conn, $consulta2);
	$row_dados2 = mysqli_fetch_assoc($resultado_consulta2);

	$consulta = "SELECT * FROM bd_emprega_aruja.tb_secretarias where secretarias = '$sec'";
	foreach($pdo->query($consulta) as $row){
		$senhabanco = $row['senha'];
		$sigla = $row['sigla'];
	}

	
	$_SESSION['usuario'] = $row_dados2['nome_fantasia'];
	$_SESSION['iduser'] = $row_dados2['id_cadastroempresa'];
	$_SESSION['sigla'] = $sigla;
	header("location: ../../");

}else{


$senha 		 = filter_input (INPUT_POST, 'senha'	, FILTER_SANITIZE_STRING); 


    if(!empty($sec) || !empty($senha)){
		
	 	$consulta = "SELECT * FROM bd_emprega_aruja.tb_secretarias where secretarias = '$sec'";

		foreach($pdo->query($consulta) as $row){
			$senhabanco = $row['senha'];
			$sigla = $row['sigla'];
		}
		
			 if(password_verify($senha, $senhabanco)){

				$consulta2 = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where cnpjcpf = '$cnpj'";
				$resultado_consulta2 = mysqli_query($conn, $consulta2);
				
				if($resultado_consulta2){

					$row_dados2 = mysqli_fetch_assoc($resultado_consulta2);

					 $_SESSION['usuario'] = $row_dados2['nome_fantasia'];
					 $_SESSION['iduser'] = $row_dados2['id_cadastroempresa'];
					 $_SESSION['sigla'] = $sigla;
		 			header("location: ../../");

				
				}else{
					
					$_SESSION['msg'] = "<br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
					header("location: ../../pages/secretaria.php");
				}




			}else{
					
		 		$_SESSION['msg'] = "<br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
		 			header("location: ../../pages/secretaria.php");
		 	}
		
		
		 
	}else{
		
		$_SESSION['msg'] = "<br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
		header("location: ../../pages/secretaria.php");
   }

}


?>