<?php

include "../conexao.php";


$id = $_POST['idvaga'];
$vaga = $_POST['id'];





			$del_info= "DELETE FROM `bd_emprega_aruja`.`tb_cadastro_vaga_informatica` WHERE `id_vaga_informatica`='$vaga'";
			// var_dump($del_idiomas);
			$resultado = mysqli_query($conn, $del_info);
			//Atulizar banco com os dados inseridos
            
            if($resultado){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=editarInformaticaVaga&delinformatica=1&id='.$id);
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=editarInformaticaVaga&delinformatica=0&id='.$id);
				
			}
		
		




?>