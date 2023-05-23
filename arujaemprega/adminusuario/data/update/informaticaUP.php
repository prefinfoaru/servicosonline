<?php

session_start();
include "../conexao.php";


//Declaração de variavel
$id_soli = $_POST['id_soli'];
$tipo = utf8_decode($_POST['area']);
$conhecimento = utf8_decode($_POST['dados_infor']);
$nivel = utf8_decode($_POST['nivel']);

			$insert_informatica= "INSERT INTO `bd_emprega_aruja`.`tb_dados_informatica` (`id_solicitante`, `curso`, `especializacao`, `nivel`) VALUES ('$id_soli', '$tipo', '$conhecimento', '$nivel');";
			
			$resultado_insert_informatica = mysqli_query($conn, $insert_informatica);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=1');
				
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=habilidadeseidiomas&id='.$id_soli.'&res=2');	
				
			}
		
		




?>