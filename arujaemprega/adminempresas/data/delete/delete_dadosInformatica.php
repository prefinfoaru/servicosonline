<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id 			= 	$_POST['id'];
$id_vaga 		= 	$_POST['id_vaga'];


			$del_formacao = "DELETE FROM `bd_emprega_aruja`.`tb_cadastro_vaga_informatica` WHERE `id_vaga_informatica`='$id'; ";
			
			$resultado_del_formacao = mysqli_query($conn, $del_formacao);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosInformaticaVaga&id='.$id_vaga.'');
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosInformaticaVaga&id='.$id_vaga.'');
				
			}
		
		




?>