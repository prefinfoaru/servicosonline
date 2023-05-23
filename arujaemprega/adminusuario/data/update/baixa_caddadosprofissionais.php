<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id_soli 	= 	$_GET['soli'];


			//INSERI DADOS DA ETAPA 3 NO BANCO CONTROL CADASTRO
				$up_etapa3 = "UPDATE `bd_emprega_aruja`.`tb_controll_cadastro` SET `etapa3`='1' WHERE `id_solicitante`='$id_soli' ";
				$resultado_up_etapa3 = mysqli_query($conn, $up_etapa3);
			
            
            if($resultado_up_etapa3){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv4.php?soli='.$id_soli.'');
				
			} else { //erro ao cadastrar 
			
				$_SESSION['errocad'] = 2; 
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv3.php?soli='.$id_soli.'');
				
			}
		
		



?>