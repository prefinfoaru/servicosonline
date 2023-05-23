<?php 

session_start();
include "../../data/conexao.php";
include "../../data/banco.php";	

	$id 	 = $_GET['del']	;
	$id_soli = $_GET['id']	;


	$delete_formacaoAcademica = "DELETE FROM `bd_emprega_aruja`.`tb_formacao_academica` WHERE `id_formacao`='$id' ";
	
	 //verifica se conectou com banco
		if(mysqli_query($conn, $delete_formacaoAcademica)){//sucesso
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=formacaoacademica&id='.$id_soli.'&?res=3');
			
			
		}
		
		else {//deu erro
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=editar_cv&idcpfcon='.$id_soli.'&res=4');
		}
	

?>