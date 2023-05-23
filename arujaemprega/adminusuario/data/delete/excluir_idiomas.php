<?php 

session_start();
include "../../data/conexao.php";
include "../../data/banco.php";	

	$id 	 	= $_GET['del']	;
	$id_soli 	= $_GET['id']	;


	$delete_idiomas = "DELETE FROM `bd_emprega_aruja`.`tb_idiomas` WHERE `id_indiomas`='$id' ";
	
	 //verifica se conectou com banco
		if(mysqli_query($conn, $delete_idiomas)){//sucesso
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=3');
			
		}
		
		else {//deu erro
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=4');
		}
	

?>