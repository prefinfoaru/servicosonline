<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id_soli 		= 	$_POST['id_soli'];
$habilidades 	=   utf8_decode($_POST['habilidades']);

			$insert_habilidades = "INSERT INTO `bd_emprega_aruja`.`tb_habilidade` (`id_solicitante`, `descricao_habilidade`) VALUES ('$id_soli', '$habilidades') ";
			
			$resultado_insert_habilidades = mysqli_query($conn, $insert_habilidades);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=1');
				
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=2');	
				
			}
		
		




?>