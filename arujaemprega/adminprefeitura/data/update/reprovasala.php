<?php  
include "../conexao.php";


$id = $_POST['id'];
$motivo = utf8_decode($_POST['motivo']);
 			 $Atualiza = "UPDATE `bd_emprega_aruja`.`tb_reservasala` SET `status`='2', `motivo`='$motivo' WHERE `id_reservasala`='$id'; ";
 			 $resultado_atualiza = mysqli_query($conn, $Atualiza);
 			 if($resultado_atualiza){
				  
		
					echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=solicitacaosalaentre&reprova=1'</script>"; 
								
					exit();
 		 	}else{
 					
 					echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=solicitacaosalaentre&reprova=0'</script>"; 
				 	exit();
 				}

 


		
?>