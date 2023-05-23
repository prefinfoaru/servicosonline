<?php 

session_start();
include "../../data/conexao.php";
include "../../data/banco.php";	

	$id 	 = $_GET['del']	;
	$id_soli = $_GET['id']	;


	$delete_exProfissional = "DELETE FROM `bd_emprega_aruja`.`tb_dados_profissionais` WHERE `id_dados`='$id' ";
	
	 //verifica se conectou com banco
		if(mysqli_query($conn, $delete_exProfissional)){//sucesso
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=experienciasprofissionais&id='.$id_soli.'&res=3');
			
		}
		
		else {//deu erro
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=experienciasprofissionais&id='.$id_soli.'&res=4');
		}
	

?>