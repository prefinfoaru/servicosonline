<?php 

session_start();
include "../../data/conexao.php";
include "../../data/banco.php";


	$id_soli = $_POST['id']	;
	$ip = $_SERVER['REMOTE_ADDR'];


	 $update_delete = "INSERT INTO `bd_emprega_aruja`.`tb_usuario_excluido` (`id_usuario`, `tipo`, `enderecoIP`) VALUES ('$id_soli', 'empresa', '$ip');";
	 $delete = "DELETE FROM `bd_emprega_aruja`.`tb_cadastro_empresa` WHERE `id_cadastroempresa`='$id_soli';";
	$select = "SELECT COUNT(*) as busca FROM bd_emprega_aruja.tb_cadastro_vaga where id_empresa = '$id_soli' and (status = '0' or status = '1');";
	//  //verifica se conectou com banco

	foreach($pdo->query($select)as $select_row){
		$count	=	$select_row['busca'];
		
	}

	if($count == 0){
			
		
			if(mysqli_query($conn, $update_delete)){
				
				if(mysqli_query($conn, $delete)){

					header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/login.php');
					session_destroy();


				}else{

					header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=configuracoes&del=1');

				}

	 		}else{

				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=configuracoes&del=1');



			}
				 
	}else {
			
	 			header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=configuracoes&del=1');
	}
	

?>