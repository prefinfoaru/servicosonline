<?php  

 //session_start();



include "./data/conexao.php";



$idempresa = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_STRING);


if(isset($_POST['button'])){

$senha 		 = filter_input (INPUT_POST, 'senha'	, FILTER_SANITIZE_STRING); 


 $options = [
	'cost' => 12,
	];
	$hash = password_hash("$senha",  PASSWORD_BCRYPT, $options);


 			 $Atualiza = "UPDATE `bd_emprega_aruja`.`tb_cadastro_empresa` SET `senha`='$hash' WHERE `id_cadastroempresa`='$idempresa';;";
 			 $resultado_atualiza = mysqli_query($conn, $Atualiza);
 			 if($resultado_atualiza){

 			 	
   					echo 	"<script>window.location.href ='?p=alterarsenhaempresa&res=1'</script>"; 
 					exit();
 		 	}else{
 					
 					echo 	"<script>window.location.href ='?p=alterarsenhaempresa&res=2'</script>"; 
				 	exit();
 				}

 }


		
?>