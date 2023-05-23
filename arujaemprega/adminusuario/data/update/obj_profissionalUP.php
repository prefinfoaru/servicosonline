<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id_soli 			= 	$_POST['id_soli'];
$jornada 			= 	utf8_decode($_POST['jornada']);
$tipo_contrato	 	= 	utf8_decode($_POST['tipo_contrato']);
$hierarquia_minima	= 	utf8_decode($_POST['hierarquia_minima']);
$hierarquia_maxima	= 	utf8_decode($_POST['hierarquia_maxima']);
$pretensao_min	 	= 	utf8_decode($_POST['pretensao_min']);
$pretensao_max	 	= 	utf8_decode($_POST['pretensao_max']);
$profissao 			=	utf8_decode($_POST['profissao']);



			$insert_objprofissional = "INSERT INTO `bd_emprega_aruja`.`tb_objetivo_profissional` (`id_solicitante`, `jornada`, `tipo_contrato`, `area_desejada`, `nivel_hierarquico_minimo`, `nivel_hierarquico_maximo`, `pretensao_minima`, `pretensao_maxima`) VALUES ('$id_soli', '$jornada', '$tipo_contrato', '$profissao', '$hierarquia_minima', '$hierarquia_maxima', '$pretensao_min', '$pretensao_max') ";
			
			$resultado_objprofissional = mysqli_query($conn, $insert_objprofissional);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=objetivosprofissionais&id='.$id_soli.'&res=1');
				
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=objetivosprofissionais&id='.$id_soli.'&res=2');	
				
			}
		
		




?>