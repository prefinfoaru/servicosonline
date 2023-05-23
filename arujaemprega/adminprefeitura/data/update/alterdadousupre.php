<?php  





include	"./data/conexao.php";



$id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_STRING); 


if(isset($_POST['button'])){

$nivel = $_POST['nivel'];
$tel = $_POST['tele'];
$email = $_POST['email'];
$func = $_POST['func'];



			$Atualiza = "UPDATE `bd_emprega_aruja`.`tb_cadastrousuario_restrito` SET `funcao`='$func', `tel`='$tel', `email`='$email', `nivel`= '$nivel' WHERE `id_cadastrorestrito`='$id';";
			 
			$resultado_atualiza = mysqli_query($conn, $Atualiza);
			 
 			if($resultado_atualiza){
				
   					echo 	"<script>window.location.href ='?p=alterdadosusup&res=1'</script>"; 
 					exit();
 		 	}else{
					$_SESSION['msg'] = '2'; 
					 
 					echo 	"<script>window.location.href ='?p=alterdadosusup&res=2'</script>"; 
				 	exit();
 				}


			}		
?>