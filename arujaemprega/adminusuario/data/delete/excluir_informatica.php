<?php 

session_start();
include "../../data/conexao.php";


	$id 	 	= $_GET['del']	;
	$id_soli 	= $_GET['id']	;


	$delete_informatica = "DELETE FROM `bd_emprega_aruja`.`tb_dados_informatica` WHERE `id_dados_info`='$id';";
	
	 //verifica se conectou com banco
		if(mysqli_query($conn, $delete_informatica)){//sucesso
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=3');
			
		}
		
		else {//deu erro
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=4');
		}
	

?>