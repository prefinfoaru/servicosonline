<?php  

session_start();
include ("../conexao.php");

@$cpfTratado = $_GET['id'];

if($cpfTratado != ""){

$cpf_s_p = $valor_recebido	= str_replace("." ,"", $cpfTratado);
$cpf_s_t = $valor_recebido	= str_replace("-" ,"", $cpf_s_p);
$cpf_s_b = $valor_recebido	= str_replace("/" ,"", $cpf_s_t);

    if(!empty($cpf_s_b)){
		
	 	$consulta = "SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where cpf = '$cpf_s_b'";
		
		$resultado_consulta = mysqli_query($conn, $consulta);

		if($resultado_consulta){

		$row_dados = mysqli_fetch_assoc($resultado_consulta);
		
			if($row_dados){
				 $_SESSION['usuario'] = $row_dados['cpf'];
				 $_SESSION['id'] = $row_dados['id_solicitante'];
				 $_SESSION['tipo'] = "usuario";
	 			 header("location: ../../");
				
			}
	
		}else{
	 		$_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
	 		header("location: ../../pages/login.php");
		}
		 
	}

}
if(isset($_POST['cpf'])){
	$cpfTratado = $_POST['cpf'];
}else{
	$cpfTratado = "";
}
$cpf_s_p = $valor_recebido	= str_replace("." ,"", $cpfTratado);
$cpf_s_t = $valor_recebido	= str_replace("-" ,"", $cpf_s_p);
$cpf_s_b = $valor_recebido	= str_replace("/" ,"", $cpf_s_t);

$senha 		 = filter_input (INPUT_POST, 'senha'	, FILTER_SANITIZE_STRING); 


$curl = curl_init();
curl_setopt_array($curl,[
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
    CURLOPT_POSTFIELDS => [
            'secret' => '6LeQASYaAAAAAPejpRtUYEgZf5Gz2-I3u92PKFgG',
            'response' => $_POST['g-recaptcha-response'],
            'remoteip' =>   $_SERVER['REMOTE_ADDR']
    ]
]);

$response = json_decode(curl_exec($curl));
curl_close($curl);

if(!$response->success){
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Captcha Incorreto.</div>";
        echo "<script>window.location.href ='../../pages/login.php';</script>"; 
        exit();
}else{

    if(!empty($cpf_s_b) || !empty($senha)){
		
		$consulta = "SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where cpf = '$cpf_s_b';";
		
	 	$resultado_consulta = mysqli_query($conn, $consulta);

	 	if($resultado_consulta){

	 		$row_dados = mysqli_fetch_assoc($resultado_consulta);
	 		if(password_verify($senha, $row_dados['senha_acesso'])){
	 			$_SESSION['usuario'] = $row_dados['cpf'];
	 			$_SESSION['id'] = $row_dados['id_solicitante'];
	 			header("location: ../../");

	 		}else{
	 			$_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Usuário ou Senha Incorreto.</div>";
	 			header("location: ../../pages/login.php");
	 		}
	 	}else{
	 		$_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
	 		header("location: ../../pages/login.php");
	 	}
	}

		

	

}


// $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha Incorreto.</div>";
// 		    echo "<script> window.location.href = '../../pages/login.php'; </script>"; 
//             exit();



		
?>