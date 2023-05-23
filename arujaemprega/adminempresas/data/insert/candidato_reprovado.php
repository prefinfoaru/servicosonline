<?php
session_start();
include('../banco.php');
$pdo = Banco::conectar();

$id_vaga		=	$_POST['id_vaga']		;
$id_soli		=	$_POST['id_soli']		;
$data			=	$_POST['data']			;
           
            $insert_cand_reprovado =  "INSERT INTO `bd_emprega_aruja`.`tb_candidato_reprovado` (`id_solicitante`, `id_vaga`, `data_reprovacao`) VALUES ('$id_soli', '$id_vaga', '$data') ";
			
           
            $result_cand_reprovado = $pdo->query($insert_cand_reprovado);

            if($result_cand_reprovado){
				
				$status_candidatoUP = "UPDATE `bd_emprega_aruja`.`tb_candidatura_vaga` SET `status_candidatura`='2' WHERE `id_vaga`='$id_vaga' and id_solicitante = '$id_soli';";
				
				$result_statusUP = $pdo->query($status_candidatoUP);
				
                header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosCandidatos&id='.$id_vaga.'&res=3');
            }
            else{
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosCandidatos&id='.$id_vaga.'&res=4');
              
            }
    
		
    
?>