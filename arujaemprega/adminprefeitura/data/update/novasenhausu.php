<?php  

 //session_start();



include "./data/conexao.php";



$id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_STRING);


if(isset($_POST['button'])){

$senha 		 = filter_input (INPUT_POST, 'senha'	, FILTER_SANITIZE_STRING); 


 $options = [
	'cost' => 12,
	];
	$hash = password_hash("$senha",  PASSWORD_BCRYPT, $options);


 			 $Atualiza = "UPDATE `bd_emprega_aruja`.`tb_cadastro_solicitante` SET `senha_acesso`='$hash' WHERE `id_solicitante`='$id';;";
 			 $resultado_atualiza = mysqli_query($conn, $Atualiza);
 			 if($resultado_atualiza){

 			 	
   					echo 	"<script>window.location.href ='?p=altersenhausu&res=1'</script>"; 
 					exit();
 		 	}else{
 					
 					echo 	"<script>window.location.href ='?p=altersenhausu&res=2'</script>"; 
				 	exit();
 				}

 }


		
?>