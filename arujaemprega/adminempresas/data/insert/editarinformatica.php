<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$idvaga 			= 	$_POST['idvaga'];
$dados_infor 		= 	utf8_decode($_POST['dados_infor'])	;
$area	 			= 	utf8_decode($_POST['area'])			;
$obrigatorio		= 	utf8_decode($_POST['obrigatorio'])	;


			$insert_formacao = "INSERT INTO `bd_emprega_aruja`.`tb_cadastro_vaga_informatica` (`id_vaga`, `area`, `conhecimento`, `obrigatorio`) VALUES ('$idvaga', '$area', '$dados_infor', '$obrigatorio') ";
			
			$resultado_insert_formacao = mysqli_query($conn, $insert_formacao);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=editarInformaticaVaga&cadinformatica=1&id='.$idvaga);
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=editarInformaticaVaga&cadinformatica=0&id='.$idvaga);
				
			}
		
		




?>