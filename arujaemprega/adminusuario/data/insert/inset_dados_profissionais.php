<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id_soli 			= 	$_POST['id_soli'];
$empresa 			= 	utf8_decode($_POST['empresa']);
$cargo	 			= 	utf8_decode($_POST['cargo']);
$salario	 		= 	utf8_decode($_POST['salario']);
$herarquia	 		= 	utf8_decode($_POST['herarquia']);
$profissao	 		= 	utf8_decode($_POST['profissao']);
$inicio_mes	 		= 	$_POST['inicio_mes'];
$inicio_ano	 		= 	$_POST['inicio_ano'];
$conclusao_mes	 	= 	$_POST['conclusao_mes'];
$conclusao_ano	 	= 	$_POST['conclusao_ano'];
if(isset($_POST['atual'])){
	$atual	= 	utf8_decode($_POST['atual']);
}else{
	$atual	 			= 	'';
}
$atividade	 		= 	utf8_decode($_POST['atividade']);
$pais	 			= 	utf8_decode($_POST['pais']);
$estado	 			= 	utf8_decode($_POST['estado']);
$cidade	 			= 	utf8_decode($_POST['cidade']);
$exp_comprovada		= 	utf8_decode($_POST['exp_comprovada']);

$empresa_b 	= $valor_recebido	= str_replace("'" ,"", $empresa);
$cargo_b 	= $valor_recebido	= str_replace("'" ,"", $cargo);

			$insert_formacao = "INSERT INTO `bd_emprega_aruja`.`tb_dados_profissionais` (`id_solicitante`, `nome_empresa`, `cargo`, `salario`, `nivel_hierarquico`, `area_de_atuacao`, `inicio_mes`, `inicio_ano`, `conclusao_mes`, `conclusao_ano`, `atualiadade`, `descricao_da_atividade`, `pais`, `estado`, `cidade`, `exp_comprovada`) VALUES ('$id_soli ', '$empresa_b', '$cargo_b', '$salario', '$herarquia', '$profissao','$inicio_mes', '$inicio_ano', '$conclusao_mes', '$conclusao_ano', '$atual', '$atividade', '$pais', '$estado', '$cidade', '$exp_comprovada') ";
			
			$resultado_insert_formacao = mysqli_query($conn, $insert_formacao);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				//INSERI DADOS DA ETAPA 3 NO BANCO CONTROL CADASTRO
				$up_etapa3 = "UPDATE `bd_emprega_aruja`.`tb_controll_cadastro` SET `etapa3`='1' WHERE `id_solicitante`='$id_soli' ";
				$resultado_up_etapa3 = mysqli_query($conn, $up_etapa3);
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv3.php?soli='.$id_soli.'');
				
			} else { //erro ao cadastrar 
			echo "erro";
				$_SESSION['errocad'] = 2; 
				
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv3.php?soli='.$id_soli.'');	
				
			}
		
?>