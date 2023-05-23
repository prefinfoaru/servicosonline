<?php 

session_start();
include "../../data/conexao.php";


	$id_soli = $_POST['id']	;
	$ip = $_SERVER['REMOTE_ADDR'];


	$update_delete = "INSERT INTO `bd_emprega_aruja`.`tb_usuario_excluido` (`id_usuario`, `tipo`, `enderecoIP`) VALUES ('$id_soli', 'usuario', '$ip');";
		$delete = "DELETE FROM `bd_emprega_aruja`.`tb_cadastro_solicitante` WHERE `id_solicitante`='$id_soli';";
	 //verifica se conectou com banco
		if(mysqli_query($conn, $update_delete)){//sucesso
			
		
			if(mysqli_query($conn, $delete)){//sucesso
				

					header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/login.php');
					session_destroy();
				
			}else{

				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=config_usu&del=1');



				}
	}
		
		else {//deu erro
			
	 			header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=config_usu&del=1');
		}
	

?>