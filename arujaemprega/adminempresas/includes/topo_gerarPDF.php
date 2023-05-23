<?php 

$cpf	=	$_POST['cpf'];

include "./data/banco.php";
$pdo = Banco::conectar();

$select_cad_soli		=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where cpf = '$cpf' ";

//************** FOR VISUALIZAR CURRÍCULO (tb_cadastro_solicitante) *********************//

	foreach($pdo->query($select_cad_soli)as $cad_soli){
		
		$nome 						= 		$cad_soli ['nome']						;
		$dtnascimento				= 		$cad_soli ['dtnasc']					;
		$email 						= 		$cad_soli ['email']						;
		$sexo 						= 		$cad_soli ['sexo']						;
		$nome_usual					= 		$cad_soli ['nome_usual']				;
		$celular 					= 		$cad_soli ['celular']					;
		$telefone 					= 		$cad_soli ['telefone']					;
		$estado_civil 				= 		$cad_soli ['estado_civil']				;
		$cep 						= 		$cad_soli ['cep']						;
		$rua 						= 		$cad_soli ['rua']						;
		$bairro 					= 		$cad_soli ['bairro']					;
		$cidade 					= 		$cad_soli ['cidade']					;
		$estado_dados_sol			= 		$cad_soli ['estado']					;
		$numero 					= 		$cad_soli ['numero']					;
		$habilitado 				= 		$cad_soli ['habilitado']				;
		$tipo_habilitacao 			= 		$cad_soli ['tipo_habilitacao']			;
		$veiculo_proprio 			= 		$cad_soli ['veiculo_proprio']			;
		$disponibilidade_viajar 	= 		$cad_soli ['disponibilidade_viajar']	;
		$disponibilidade_mudar 		= 		$cad_soli ['disponibilidade_mudar']		;
		$id_solicitante				= 		$cad_soli ['id_solicitante']			;
			
	}

	if(($sexo == "Homem Transgênero") || ($sexo == "Mulher Transgênero") || ($sexo == "Homem Transexual") || ($sexo == "Mulher Transexual")) {
		
		$usual	= 	'<label>Nome Usual:  &nbsp;</label><span>' . $nome_usual .' &nbsp;&nbsp;</span><br>';
												
	}else{
		$usual 	=	'';
	}
	
		//*************************** TRARAR DATA **********************************************//

$dtnasc 				 = date('d-m-Y',strtotime($dtnascimento));

$select_dados_extra		 =	"SELECT * FROM bd_emprega_aruja.tb_dados_extras where id_solicitante = '$id_solicitante' 		";
$select_formacao_acadmc	 =	"SELECT * FROM bd_emprega_aruja.tb_formacao_academica where id_solicitante = '$id_solicitante' 	";
$select_idiomas			 =	"SELECT * FROM bd_emprega_aruja.tb_idiomas where id_solicitante = '$id_solicitante' 			";
$select_habilidades		 =	"SELECT * FROM bd_emprega_aruja.tb_habilidade where id_solicitante = '$id_solicitante' 			";
$select_ex_profissionais =	"SELECT * FROM bd_emprega_aruja.tb_dados_profissionais where id_solicitante = '$id_solicitante'	";
$obj_profissionais 		 =	"SELECT * FROM bd_emprega_aruja.tb_objetivo_profissional where id_solicitante = '$id_solicitante'	";
//$select_habilidades		 =	"SELECT * FROM bd_emprega_aruja.tb_habilidade where id_solicitante = '$id_solicitante'			";

$select_informatica		 =	"SELECT * FROM bd_emprega_aruja.tb_dados_informatica where id_solicitante = '$id_solicitante' 			 ";

//********************* DADOS EXTRA *******************************************************************************//

foreach($pdo->query($select_dados_extra)as $dados_extra){
		
		$possui_deficiencia 		= 		$dados_extra ['possui_deficiencia']		;
		$resumo				 		= 		$dados_extra ['resumo']					;
		$end_foto				 	= 		$dados_extra ['end_foto']				;
		$deficiencia				= 		$dados_extra ['deficiencia']			;
		$dados_deficiencia			= 		$dados_extra ['dados_deficiencia']		;
		$facebook					= 		$dados_extra ['facebook']				;
		$linkedin					= 		$dados_extra ['linkedin']				;
		$twitter					= 		$dados_extra ['twitter']				;
		$googleplus					= 		$dados_extra ['googleplus']				;
		$youtube					= 		$dados_extra ['youtube']				;
		$instagram					= 		$dados_extra ['instagram']				;
		$blog						= 		$dados_extra ['blog']					;
			
}

//******************* FORMAÇÃO ACADÊMICA **************************************************************************//

foreach($pdo->query($select_formacao_acadmc)as $formacao_acadmc){
	
		$nome_instituicao 			= 		$formacao_acadmc ['nome_instituicao']	;
		$estado 					= 		$formacao_acadmc ['estado']				;
		$curso 						= 		$formacao_acadmc ['curso']				;
		$nivel 						= 		$formacao_acadmc ['nivel']				;
		$status_curso 				= 		$formacao_acadmc ['status_curso']		;
		$inicio_mes 				= 		$formacao_acadmc ['inicio_mes']			;
		$inicio_ano 				= 		$formacao_acadmc ['inicio_ano']			;
		$conclusao_mes 				= 		$formacao_acadmc ['conclusao_mes']		;
		$conclusao_ano 				= 		$formacao_acadmc ['conclusao_ano']		;
	
		
		$formacao .= '<label>Instituição: &nbsp;&nbsp;</label>';
		$formacao .= '<span>'.$nome_instituicao.'&nbsp;&nbsp;</span><br>';
        $formacao .= '<label>Curso: &nbsp;&nbsp;</label>';
		$formacao .= '<span>'.$curso.'&nbsp;&nbsp;</span><br>';
		$formacao .= '<label>Status do Curso: &nbsp;&nbsp;</label>';
		$formacao .= '<span>'.$status_curso.'&nbsp;&nbsp;</span>';
		$formacao .= '<label>Início: &nbsp;&nbsp;</label>';
		$formacao .= '<span>'.$inicio_mes.' - '.$inicio_ano.'&nbsp;&nbsp;&nbsp;</span>';
		$formacao .= '<label>Conclusão: &nbsp;&nbsp;</label>';
		$formacao .= '<span>'.$conclusao_mes.' - '.$conclusao_ano.'&nbsp;&nbsp;</span><br><br>';
		}

//******************* EXPERIÊNCIAS PROFISSIONAIS **************************************************************************//

$select_dadosProf = "SELECT COUNT(*) as dados_profissionais FROM bd_emprega_aruja.tb_dados_profissionais where id_solicitante = '$id_solicitante'";	
												
foreach($pdo->query($select_dadosProf)as $dados_prof){
			$count_dados	=	$dados_prof['dados_profissionais'];
		}
		
		if($count_dados == '0'){
			
		$ex_profissional .= '<span>Não possui experiências anteriores. &nbsp;&nbsp;</span><br>';
			
		}else{

foreach($pdo->query($select_ex_profissionais)as $ex_profissionais){
	
		$nome_empresa 				= 		$ex_profissionais ['nome_empresa']				;
		$cargo 						= 		$ex_profissionais ['area_de_atuacao']						;
		$descricao_da_atividade		= 		$ex_profissionais ['descricao_da_atividade']	;
		$inicio_mes_prof 			= 		$ex_profissionais ['inicio_mes']				;
		$inicio_ano_prof 			= 		$ex_profissionais ['inicio_ano']				;
		$conclusao_mes_prof 		= 		$ex_profissionais ['conclusao_mes']				;
		$conclusao_ano_prof 		= 		$ex_profissionais ['conclusao_ano']				;
	
		
		$ex_profissional .= '<label>Empresa: &nbsp;&nbsp;</label>';
		$ex_profissional .= '<span>'.$nome_empresa.'&nbsp;&nbsp;</span><br>';
        $ex_profissional .= '<label>Área Atuação: &nbsp;&nbsp;</label>';
		$ex_profissional .= '<span>'.$cargo.'&nbsp;&nbsp;</span><br>';
		$ex_profissional .= '<label>Início: &nbsp;&nbsp;</label>';
		$ex_profissional .= '<span>'.$inicio_mes_prof.' - '.$inicio_ano_prof.'&nbsp;&nbsp;&nbsp;</span>';
		$ex_profissional .= '<label>Conclusão: &nbsp;&nbsp;</label>';
		$ex_profissional .= '<span>'.$conclusao_mes_prof.' - '.$conclusao_ano_prof.'&nbsp;&nbsp;</span><br>';
		}
}

//******************* IDIOMAS **************************************************************************//

foreach($pdo->query($select_idiomas)as $row_idiomas){
	
		$idioma 					= 		$row_idiomas ['idiomas']				;
		$nivel 						= 		$row_idiomas ['nivel']					;
	
		$idiomas .= '<label>Idioma: &nbsp;&nbsp;</label>';
		$idiomas .= '<span>'.$idioma.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>';
		$idiomas .= '<label>Nível: &nbsp;&nbsp;</label>';
		$idiomas .= '<span>'.$nivel.'</span><br>';
	
		}

/******************* HABILIDADES *************************************************************************

foreach($pdo->query($select_habilidades)as $row_habilidades){
	
		$habilidade 				= 		$row_habilidades ['descricao_habilidade']				;
	
		$habilidades .= '<label>Habilidade: &nbsp;&nbsp;</label>';
		$habilidades .= '<span>'.$habilidade.'</span><br>';
		}
*/
/******************* informatica*************************************************************************/
foreach($pdo->query($select_informatica)as $row_informatica){
	
	$area 					= 		$row_informatica ['curso']				;
	$conhecimento 						= 		$row_informatica ['especializacao']					;
	$nivel 						= 		$row_informatica ['nivel']					;

	$informatica .= '<label>Àrea de informática: &nbsp;&nbsp;</label>';
	$informatica .= '<span>'.$area.'&nbsp;&nbsp;&nbsp;</span>';
	$informatica .= '<label>Conhecimento: &nbsp;&nbsp;</label>';
	$informatica .= '<span>'.$conhecimento.'&nbsp;&nbsp;&nbsp;</span>';
	$informatica .= '<label>Nível: &nbsp;&nbsp;</label>';
	$informatica .= '<span>'.$nivel.'&nbsp;&nbsp;&nbsp;</span><br>';

	}
//******************* OBJETIVOS PROFISSIONAIS **************************************************************************//

foreach($pdo->query($obj_profissionais)as $row_objetivos){
	
		$jornada 					= 		$row_objetivos ['jornada']					;
		$tipo_contrato				= 		$row_objetivos ['tipo_contrato']			;
		$nivel_hierarquico_minimo	= 		$row_objetivos ['nivel_hierarquico_minimo']	;
		$nivel_hierarquico_maximo	= 		$row_objetivos ['nivel_hierarquico_maximo']	;
		$pretensao_minima			= 		$row_objetivos ['pretensao_minima']			;
		$pretensao_maxima			= 		$row_objetivos ['pretensao_maxima']			;
	
		$objetivos .= '<label>Jornada: &nbsp;&nbsp;</label>';
		$objetivos .= '<span>'.$jornada.'</span><br>';
		$objetivos .= '<label>Hierarquia Mínima: &nbsp;&nbsp;</label>';
		$objetivos .= '<span>'.$nivel_hierarquico_minimo.'</span><br>';
		$objetivos .= '<label>Hierarquia Máxima: &nbsp;&nbsp;</label>';
		$objetivos .= '<span>'.$nivel_hierarquico_maximo.'</span><br>';
		$objetivos .= '<label>Pretensão Mínima: &nbsp;&nbsp;</label>';
		$objetivos .= '<span>'.$pretensao_minima.'</span><br>';
		$objetivos .= '<label>Pretensão Máxima: &nbsp;&nbsp;</label>';
		$objetivos .= '<span>'.$pretensao_maxima.'</span><br>';
		$objetivos .= '<label>Tipo do Contrato: &nbsp;&nbsp;</label>';
		$objetivos .= '<span>'.$tipo_contrato.'</span><br><br>';
	
		}
if(isset($end_foto)){
	$img = $end_foto;
	$imgtrat = explode('./..', $img, 2);
	$tratado = './../adminusuario'.$imgtrat[1];
}else{
	$tratado = "";
}

?>