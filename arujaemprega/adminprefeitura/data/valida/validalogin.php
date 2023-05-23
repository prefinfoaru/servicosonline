<?php       
session_start();
include ("../conexao.php");


$usuario	 = filter_input (INPUT_POST, 'usuario'	, FILTER_SANITIZE_STRING);
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

		$consulta = "SELECT * FROM bd_emprega_aruja.tb_cadastrousuario_restrito where nome = '$usuario';";
		
		$resultado_consulta = mysqli_query($conn, $consulta);

		if($resultado_consulta){

			$row_dados = mysqli_fetch_assoc($resultado_consulta);
			if(password_verify($senha, $row_dados['senha'])){
				$_SESSION['usuario'] = $row_dados['nome'];
				$_SESSION['nivel'] = $row_dados['nivel'];
				
				header("location: ../../");

			}else{
				$_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Usuário ou Senha Incorreto.</div>";
				header("location: ../../pages/login.php");
			}
		}
		else{
			$_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
			header("location: ../../pages/login.php");
		}
	}

		



}





?>