<?php  

session_start();



include ("../conexao.php");
include ("../banco.php");


$idlink 		 = filter_input (INPUT_POST, 'idlink'	, FILTER_SANITIZE_STRING); 
$senhanova 		 = filter_input (INPUT_POST, 'password'	, FILTER_SANITIZE_STRING); 


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

if(!$response->success){//captcha errado

    	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Captcha Incorreto.</div>";
        echo "<script>window.location.href ='../../pages/linkredefinirsenha.php?id=$idlink'</script>"; 
		exit();
		
}else{//captcha deu certo

	if($idlink  == "" || $idlink  == "NULL" ){

		echo	"<script>alert('Redefinição de Senha não solicitada')
		window.location.href ='../../pages/redefinirsenha.php'</script>";
		exit();

	}else{
		
	$consulta = "SELECT * FROM bd_emprega_aruja.tb_redefinitsenha_empresa where protocolo = '$idlink';";
		
	$resultado_consulta = mysqli_query($conn, $consulta);
	$row_dados = mysqli_fetch_assoc($resultado_consulta);

	if($row_dados >= '1'){

		$id = $row_dados['id_solicitante'];//id solicitantes
		$data = $row_dados['data_solicitacao'];//data da confirmação
		$status = $row_dados['status'];//data da confirmação
		$datanow =  date("Y-m-d");//dia de hoje

		$date1 = date_create($data);
		$date2 = date_create($datanow);
		$diff = date_diff($date1,$date2);
		$dia =  $diff->format("%a");

		if($dia >= '1' || $status == '1'){

			echo  "<script>alert('Link indisponível!')</script>";
			echo 	"<script>window.location.href ='../pages/login.php'</script>"; 
			exit();

		}else{
			$Atualiza = "UPDATE `bd_emprega_aruja`.`tb_redefinitsenha_empresa` SET `status`='1' WHERE `protocolo`='$idlink'";
			
			$resultado_atualiza = mysqli_query($conn, $Atualiza);


			if($resultado_atualiza){
				$options = [
				'cost' => 12,
				];
				$hash = password_hash("$senhanova", PASSWORD_BCRYPT, $options);



				$insert = "UPDATE `bd_emprega_aruja`.`tb_cadastro_empresa` SET `senha`='$hash' WHERE `id_cadastroempresa`='$id';";
			
				$resultado_insert = mysqli_query($conn, $insert);

				if($resultado_insert){

					echo  "<script>alert('Atualizado com Sucesso')</script>";
  					echo 	"<script>window.location.href ='../../pages/login.php'</script>"; 
					exit();

				}else{

					echo  "<script>alert('Não foi possivel Atualizar!')</script>";
					echo 	"<script>window.location.href ='../../pages/login.php'</script>"; 
				  	exit();

				}

			}else{  

				echo  "<script>alert('Não foi possivel Atualizar!')</script>";
					echo 	"<script>window.location.href ='../../pages/login.php'</script>"; 
				  	exit();


			}


		}

	}else{
		
		echo  "<script>alert('Redefinição de Senha não Solicitada')</script>";
		echo 	"<script>window.location.href ='../../pages/redefinirsenha.php'</script>"; 
		   
		exit();

	}


	}


}


		
?>