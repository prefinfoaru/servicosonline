<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id_soli 		= 	$_POST['id_soli']					;
$empresa 		= 	utf8_decode($_POST['empresa'])		;
$cargo	 		= 	"--"; // utf8_decode($_POST['cargo'])		;
$salario	 	= 	utf8_decode($_POST['salario'])		;
$herarquia	 	= 	utf8_decode($_POST['herarquia'])	;
$profissao 		= 	utf8_decode($_POST['profissao'])	;
$atual	 		= 	utf8_decode($_POST['atual'])		;
$inicio_mes	 	= 	utf8_decode($_POST['inicio_mes'])	;
$inicio_ano	 	= 	utf8_decode($_POST['inicio_ano'])	;
if(isset($_POST['conclusao_mes'])){
	$conclusao_mes	= 	utf8_decode($_POST['conclusao_mes']);
}else{
	$conclusao_mes = "";
}
if(isset($_POST['conclusao_ano'])){
	$conclusao_ano	= 	utf8_decode($_POST['conclusao_ano']);
}else{
	$conclusao_ano = "";
}
$atividades	 	= 	utf8_decode($_POST['atividades'])	;
$pais	 		= 	utf8_decode($_POST['pais'])			;
$cidade	 		= 	utf8_decode($_POST['cidade'])		;
$estado	 		= 	utf8_decode($_POST['estado'])		;
$exp_comprovada	= 	utf8_decode($_POST['exp_comprovada']);


			$insert_exProfissional = "INSERT INTO `bd_emprega_aruja`.`tb_dados_profissionais` (`id_solicitante`, `nome_empresa`, `cargo`, `salario`, `nivel_hierarquico`, `area_de_atuacao`, `inicio_mes`, `inicio_ano`, `conclusao_mes`, `conclusao_ano`, `atualiadade`, `descricao_da_atividade`, `pais`, `estado`, `cidade`, `exp_comprovada`) VALUES ('$id_soli', '$empresa', '$cargo', '$salario', '$herarquia', '$profissao', '$inicio_mes', '$inicio_ano', '$conclusao_mes', '$conclusao_ano', '$atual', '$atividades', '$pais', '$estado', '$cidade', '$exp_comprovada') ";
			
			$resultado_insert_formacao = mysqli_query($conn, $insert_exProfissional);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=experienciasprofissionais&id='.$id_soli.'&res=1');
				
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=experienciasprofissionais&id='.$id_soli.'&res=2');	
				
			}
		
		




?>