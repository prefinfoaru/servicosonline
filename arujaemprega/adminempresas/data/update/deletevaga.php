<?php  

include	"./data/conexao.php";



$id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_STRING); 


if(isset($_POST['button'])){

$cep=	$_POST['cep'];
$end = 	utf8_decode($_POST['endereco']);
$num =	$_POST['numero'];
$comp = 	utf8_decode($_POST['complemento']);
$cidade = 	utf8_decode($_POST['cidade']);
$bairro = 	utf8_decode($_POST['bairro']);
$estado = 	$_POST['estado'];
$email = 	utf8_decode($_POST['email']);
$ramo = 	utf8_decode($_POST['ramo']);
$cel = 	$_POST['cel'];
$tel = 	$_POST['tel'];


			$Atualiza = "UPDATE `bd_emprega_aruja`.`tb_cadastro_empresa` SET `cep`='$cep', `rua`='$end', `numero`='$num', `bairro`='$bairro', `cidade`='$cidade', `estado`='$estado', `complemento`='$comp', `ramo`='$ramo', `celular`='$cel', `telefone`='$tel', `email`='$email' WHERE `id_cadastroempresa`='$id';";
			 
			$resultado_atualiza = mysqli_query($conn, $Atualiza);
			 
 			if($resultado_atualiza){
				
   					echo 	"<script>window.location.href ='?p=alterdados&res=1'</script>"; 
 					exit();
 		 	}else{
					$_SESSION['msg'] = '2'; 
					 
 					echo 	"<script>window.location.href ='?p=alterdados&res=2'</script>"; 
				 	exit();
 				}


			}		
?>