<?php

//************** FOR VISUALIZAR CURRÍCULO (tb_cadastro_solicitante) *********************//

	foreach($pdo->query($select_cad_soli)as $cad_soli){
		
		$nome 						= 		$cad_soli ['nome']						;
		$dtnascimento				= 		$cad_soli ['dtnasc']					;
		$email 						= 		$cad_soli ['email']						;
		$sexo 						= 		$cad_soli ['sexo']						;
		$nome_usual					= 		$cad_soli ['nome_usual']						;
		$celular 					= 		$cad_soli ['celular']					;
		$telefone 					= 		$cad_soli ['telefone']					;
		$estado_civil 				= 		$cad_soli ['estado_civil']				;
		$cep 						= 		$cad_soli ['cep']						;
		$cidade 					= 		$cad_soli ['cidade']					;
		$estado 					= 		$cad_soli ['estado']					;
		$rua 						= 		$cad_soli ['rua']						;
		$bairro 					= 		$cad_soli ['bairro']					;
		$numero 					= 		$cad_soli ['numero']					;
		$habilitado 				= 		$cad_soli ['habilitado']				;
		$tipo_habilitacao 			= 		$cad_soli ['tipo_habilitacao']			;
		$veiculo_proprio 			= 		$cad_soli ['veiculo_proprio']			;
		$disponibilidade_viajar 	= 		$cad_soli ['disponibilidade_viajar']	;
		$disponibilidade_mudar 		= 		$cad_soli ['disponibilidade_mudar']		;
		$id_solicitante				= 		$cad_soli ['id_solicitante']			;
		$cpf						= 		$cad_soli ['cpf']						;
			
	}

//*************************** TRARAR DATA **********************************************//

		$dtnasc 			= date('d-m-Y',strtotime($dtnascimento));

?>













