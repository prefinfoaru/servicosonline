<?php
session_start();
include('../banco.php');
$pdo = Banco::conectar();

$id_vaga		=	$_POST['idvaga']		;
$idempresa		=	$_POST['idempresa']		;
$nome_empresa	=	$_POST['nome_empresa']	;
$responsavel	=	$_POST['responsavel']	;
$data			=	$_POST['data']			;
$hora_inicio	=	$_POST['hora_inicio']	;
$hora_fim		=	$_POST['hora_fim']		;
$sala			=	$_POST['sala']			;

if($sala == '1'){
	$sala = "Sala 1";
	
}else{
	$sala = "Sala 2";
}

           
            $insert_solicitacao =  "INSERT INTO `bd_emprega_aruja`.`tb_reservasala` (`data_agenda`, `horario_inicio`, `horario_fim`, `id_vaga`, `id_empresa`, `nome_empresa`, `responsavel`, `sala`, `status`) VALUES ('$data', '$hora_inicio', '$hora_fim', '$id_vaga', '$idempresa', '$nome_empresa', '$responsavel', '$sala', '0')  ";
           
            $result_insert_solicitacao = $pdo->query($insert_solicitacao);

            if($result_insert_solicitacao){
				
            	header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosCandidatos&id='.$id_vaga.'&res_soli=1');
            }
            else{
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosCandidatos&id='.$id_vaga.'&res_soli=2');
              
            }
    
		
    
?>