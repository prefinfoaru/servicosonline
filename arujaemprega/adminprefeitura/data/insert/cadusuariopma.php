<?php       

include ("./data/conexao.php");


if(isset($_POST['button'])){


$cpf =$_POST['cpf'];
$usuario = utf8_decode($_POST['usuario']);
$tele = $_POST['tele'];
$funcao = utf8_decode($_POST['funcao']);
$nivel = $_POST['nivel'];
$email = utf8_decode($_POST['email']);
$senha	= $_POST['senha'];



$cpf_s_p = $valor_recebido	= str_replace("." ,"", $cpf);
$cpf_s_t = $valor_recebido	= str_replace("-" ,"", $cpf_s_p);
$cpf_s_b = $valor_recebido	= str_replace("/" ,"", $cpf_s_t);



$options = [
	'cost' => 12,
	];
	$hash = password_hash("$senha",  PASSWORD_BCRYPT, $options);




		$cadastra = "INSERT INTO `bd_emprega_aruja`.`tb_cadastrousuario_restrito` (`nome`, `cpf`, `funcao`, `tel`, `email`, `senha`, `nivel`) VALUES ('$usuario', '$cpf_s_b', '$funcao', '$tele', '$email', '$hash', '$nivel');";
		
		$resultado_cad = mysqli_query($conn, $cadastra);

		if(mysqli_insert_id($conn)){

			echo 	"<script>window.location.href ='?p=criarusupre&res=1'</script>"; 
			 exit();
			
		}
		else{
		
			echo 	"<script>window.location.href ='?p=criarusupre&res=2'</script>"; 
			 exit();
		}
	

		


	}




?>