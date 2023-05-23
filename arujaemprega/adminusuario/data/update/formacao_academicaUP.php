<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id_soli 			= 	$_POST['id_soli'];
$instituicao 		= 	utf8_decode($_POST['instituicao']);
$pais	 			= 	utf8_decode($_POST['pais']);
$estado	 			= 	utf8_decode($_POST['estado']);
$nivel	 			= 	utf8_decode($_POST['nivel']);
$curso	 			= 	utf8_decode($_POST['curso']);
$outroCurso			=	utf8_decode($_POST['outroCurso']);
$status_curso	 	= 	utf8_decode($_POST['tempo_curso']);
$inicio_mes	 		= 	utf8_decode($_POST['inicio_mesCURSO']);
$inicio_ano	 		= 	utf8_decode($_POST['inicio_anoCURSO']);
$conclusao_mes	 	= 	utf8_decode($_POST['conclusao_mesCURSO']);
$conclusao_ano	 	= 	utf8_decode($_POST['conclusao_anoCURSO']);
$cursoFinal;

if ($outroCurso != '' || $outroCurso != null) {
	$cursoFinal = $outroCurso;
}else {
	$cursoFinal = $curso;
}


			$insert_formacao = "INSERT INTO `bd_emprega_aruja`.`tb_formacao_academica` (`id_solicitante`, `nome_instituicao`, `pais`, `estado`, `nivel`, `curso`, `status_curso`, `inicio_mes`, `inicio_ano`, `conclusao_mes`, `conclusao_ano`) VALUES ('$id_soli ', '$instituicao ', '$pais', '$estado', '$nivel', '$cursoFinal', '$status_curso', '$inicio_mes', '$inicio_ano', '$conclusao_mes', '$conclusao_ano') ";
			
			$resultado_insert_formacao = mysqli_query($conn, $insert_formacao);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=formacaoacademica&id='.$id_soli.'&res=1');
				
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=formacaoacademica&id='.$id_soli.'&res=2');	
				
			}
		
		



?>