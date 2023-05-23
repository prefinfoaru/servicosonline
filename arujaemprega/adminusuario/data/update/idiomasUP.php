<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id_soli 		= 	$_POST['id_soli'];
$idioma 		=   utf8_decode($_POST['idioma']);
$nivel	 		= 	utf8_decode($_POST['nivel']);

			$insert_idioma = "INSERT INTO `bd_emprega_aruja`.`tb_idiomas` (`id_solicitante`, `idiomas`, `nivel`) VALUES ('$id_soli', '$idioma', '$nivel') ";
			
			$resultado_insert_idioma = mysqli_query($conn, $insert_idioma);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=1');
				
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=2');	
				
			}
		
		




?>