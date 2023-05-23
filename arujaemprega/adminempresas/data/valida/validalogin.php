<?php       
session_start();
include ("../conexao.php");
include ("../banco.php");



@$cpfTratado = $_GET['id'];

if($cpfTratado != ""){

$cpf_s_p = $valor_recebido	= str_replace("." ,"", $cpfTratado);
$cpf_s_t = $valor_recebido	= str_replace("-" ,"", $cpf_s_p);
$cpf_s_b = $valor_recebido	= str_replace("/" ,"", $cpf_s_t);

    if(!empty($usuario)){
		
	 	$consulta = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where cnpjcpf = '$cpf_s_b'";
		
		$resultado_consulta = mysqli_query($conn, $consulta);

		if($resultado_consulta){

		$row_dados = mysqli_fetch_assoc($resultado_consulta);

			if($cpf_s_b == '56901275000150'){
				$_SESSION['prefeitura'] = "56901275000150";
				header("location: ../../pages/secretaria.php");

			}else{

				$_SESSION['usuario'] = $row_dados['nome_fantasia'];
				$_SESSION['iduser'] = $row_dados['id_cadastroempresa'];
				$_SESSION['tipo'] = "empresa";
				$_SESSION['sigla'] = "empresa";
				header("location: ../../");

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

else{



$cpfTratado = $_POST['cnpj'];
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

    if(!empty($usuario) || !empty($senha)){
		
	 	$consulta = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where cnpjcpf = '$cpf_s_b'";
		
		$resultado_consulta = mysqli_query($conn, $consulta);

		if($resultado_consulta){

		$row_dados = mysqli_fetch_assoc($resultado_consulta);
		
		if(password_verify($senha, $row_dados['senha'])){

			if($cpf_s_b == '56901275000150'){
				$_SESSION['prefeitura'] = "56901275000150";
				
				header("location: ../../pages/secretaria.php");

			}else{

				 $_SESSION['usuario'] = $row_dados['nome_fantasia'];
				 $_SESSION['iduser'] = $row_dados['id_cadastroempresa'];
				 $_SESSION['tipo'] = "empresa";
				 $_SESSION['sigla'] = "empresa";
	 			 header("location: ../../");

			}
			}else{
	 			$_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
	 			header("location: ../../pages/login.php");
	 		}
	 	}
 		else{
	 		$_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
	 		header("location: ../../pages/login.php");
		}
		 
	}

}


// $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha Incorreto.</div>";
// 		    echo "<script> window.location.href = '../../pages/login.php'; </script>"; 
//             exit();



		    


}


?>