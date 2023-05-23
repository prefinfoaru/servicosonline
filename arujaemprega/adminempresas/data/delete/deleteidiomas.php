<?php

include "../conexao.php";


$id = $_POST['idvaga'];
$vaga = $_POST['id'];





			$del_idiomas= "DELETE FROM `bd_emprega_aruja`.`tb_cadastro_vaga_idiomas` WHERE `id_vaga_idioma`='$vaga'";
			// var_dump($del_idiomas);
			$resultado = mysqli_query($conn, $del_idiomas);
			//Atulizar banco com os dados inseridos
            
            if($resultado){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=editarIdiomasVaga&delidiomas=1&id='.$id);
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=editarIdiomasVaga&delidiomas=0&id='.$id);
				
			}
		
		




?>