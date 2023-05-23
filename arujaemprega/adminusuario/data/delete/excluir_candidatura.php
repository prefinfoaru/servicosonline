<?php 

session_start();
include "../../data/conexao.php";
include "../../data/banco.php";

	$id_vaga 	 = $_GET['idVaga']	;
	$id_soli = $_GET['idSoli']	;

	$select_id = $pdo->query("SELECT * FROM bd_emprega_aruja.tb_candidatura_vaga where id_vaga = '$id_vaga' and id_solicitante = '$id_soli'");
	$row = $select_id->fetch();
	$idCandidatura = $row['id_candidatura'];

	if(isset($idCandidatura)){//sucesso
		$deletar = $pdo->prepare("DELETE FROM `bd_emprega_aruja`.`tb_candidatura_vaga` WHERE id_candidatura=:idCandidatura");
		$deletar->bindValue(":idCandidatura", $idCandidatura);
		$deletar->execute();
		header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&res=6');
			
	}
		
	else {//deu erro
		header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&res=7');

	}
	

?>