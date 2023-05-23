<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
echo $id_soli 			= 	$_GET['soli'];


			//INSERI DADOS DA ETAPA 2 NO BANCO CONTROL CADASTRO
				$up_etapa2 = "UPDATE `bd_emprega_aruja`.`tb_controll_cadastro` SET `etapa2`='1' WHERE `id_solicitante`='$id_soli' ";
				$resultado_up_etapa2 = mysqli_query($conn, $up_etapa2);
			
            
            if($resultado_up_etapa2){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv3.php?soli='.$id_soli.'');
				
			} else { //erro ao cadastrar 
			
				$_SESSION['errocad'] = 2; 
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv2.php?soli='.$id_soli.'');
				
			}
		
		



?>