<?php
session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

$id_solicitante		=	$_POST['id_solicitante'];
// $NIS				=	$_POST['NIS'];
$id_vaga			=	$_POST['id_vaga'];
$id_empresa			=	$_POST['id_empresa'];
$status				=	$_POST['status'];
$data				=	date("Y-m-d H:i:s");
$idade = $_POST['idade'];

if(isset($_POST['NIS'])){
	$NIS    =   $_POST['NIS'];
	  
  }else{   
	 $NIS = "";
		  
  }

$formacao	=	array();

$count = 0;
$ver_formacao	=	"SELECT * FROM bd_emprega_aruja.tb_formacao_academica where id_solicitante = '$id_solicitante' ";
foreach ($pdo->query($ver_formacao) as $row_formacao) {
	$formacao[$count]	=	$row_formacao['nivel'];
	$count++;
}

$ver_cad_vada	=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga = '$id_vaga' ";
foreach ($pdo->query($ver_cad_vada) as $row_ver_cad_vada) {
	$escolaridade	=	$row_ver_cad_vada['escolaridade'];
}
$ver_idade	=	"SELECT dtnasc FROM bd_emprega_aruja.tb_cadastro_solicitante where id_solicitante = '$id_solicitante' ";
foreach ($pdo->query($ver_idade) as $row_idade) {
	$dataNascimento	=	$row_idade['dtnasc'];
}

$selectCand  =  "SELECT * FROM bd_emprega_aruja.tb_candidatura_vaga where id_solicitante = $id_solicitante and id_vaga = $id_vaga";
$resultSelectCand = $pdo->query($selectCand);

//Verifica se ja tem candidatura com esse cadastro	
if ($resultSelectCand->rowCount() > 0) {
	header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&res=5');
} else {

	$date = new DateTime($dataNascimento);
	$interval = $date->diff(new DateTime(date('Y-m-d')));
	$idadeatual = $interval->format('%Y');

	if (((in_array("Ensino Superior", $formacao)) && (($escolaridade == "Ensino Superior") || ($escolaridade == "Curso Técnico") || ($escolaridade == "Ensino Médio (2º Grau)") || ($escolaridade == "Curso Extra-Curricular / Profissionalizante") || ($escolaridade == "Ensino Fundamental (1º Grau)")))
		||
		((in_array("Pós-Graduação - Especialização/MBA", $formacao)) && (($escolaridade == "Pós-Graduação - Especialização/MBA") || ($escolaridade == "Ensino Superior") || ($escolaridade == "Curso Técnico") || ($escolaridade == "Ensino Médio (2º Grau)") || ($escolaridade == "Curso Extra-Curricular / Profissionalizante") || ($escolaridade == "Ensino Fundamental (1º Grau)")))
		||
		((in_array("Pós-Graduação - Mestrado", $formacao)) && (($escolaridade == "Pós-Graduação - Mestrado") || ($escolaridade == "Pós-Graduação - Especialização/MBA") || ($escolaridade == "Ensino Superior") || ($escolaridade == "Curso Técnico") || ($escolaridade == "Ensino Médio (2º Grau)") || ($escolaridade == "Curso Extra-Curricular / Profissionalizante") || ($escolaridade == "Ensino Fundamental (1º Grau)")))
		||
		((in_array("Pós-Graduação - Doutorado", $formacao)) && (($escolaridade == "Pós-Graduação - Doutorado") || ($escolaridade == "Pós-Graduação - Mestrado") || ($escolaridade == "Pós-Graduação - Especialização/MBA") || ($escolaridade == "Ensino Superior") || ($escolaridade == "Curso Técnico") || ($escolaridade == "Ensino Médio (2º Grau)") || ($escolaridade == "Curso Extra-Curricular / Profissionalizante") || ($escolaridade == "Ensino Fundamental (1º Grau)")))
		||
		((in_array("Curso Técnico", $formacao)) && (($escolaridade == "Curso Técnico") || ($escolaridade == "Ensino Médio (2º Grau)") || ($escolaridade == "Curso Extra-Curricular / Profissionalizante") || ($escolaridade == "Ensino Fundamental (1º Grau)")))
		||
		((in_array("Ensino Médio (2º Grau)", $formacao)) && (($escolaridade == "Ensino Médio (2º Grau)") || ($escolaridade == "Ensino Médio (1º Grau)") || ($escolaridade == "Curso Extra-Curricular / Profissionalizante") || ($escolaridade == "Ensino Fundamental (1º Grau)")))
		||
		((in_array("Ensino Fundamental (1º Grau)", $formacao)) && (($escolaridade == "Curso Extra-Curricular / Profissionalizante") || ($escolaridade == "Ensino Fundamental (1º Grau)")))
		||
		((in_array("Curso Extra-Curricular / Profissionalizante", $formacao)) && ($escolaridade == "Curso Extra-Curricular / Profissionalizante"))
	) {

		if (($idade == "") || ($idadeatual >= $idade)) {

			$insert_candidatura = "INSERT INTO `bd_emprega_aruja`.`tb_candidatura_vaga` (`id_solicitante`, `id_vaga`, `id_empresa`, `data_hora`, `status_candidatura`) VALUES ('$id_solicitante', '$id_vaga', '$id_empresa', '$data', '0') ";

			$resultado_insert_candidatura = mysqli_query($conn, $insert_candidatura);
			//Atulizar banco com os dados inseridos

			if (mysqli_insert_id($conn)) { //sucesso

				if($NIS != ''){
					$insert_nis	=	"INSERT INTO `bd_emprega_aruja`.`tb_nis` (`id_solicitante`, `id_vaga`, `NIS`) VALUES ('$id_solicitante', '$id_vaga', '$NIS') ";
					$resultado_insert_nis = mysqli_query($conn, $insert_nis);
				}

				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&res=1');
			} else { //erro ao cadastrar 

				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&res=2');
			}
		} else {
			header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&id=' . $id_vaga . '&res=4');
		}
	} else {

		header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&id=' . $id_vaga . '&res=3');
	}
}
/*
	if((($formacao == "Curso Técnico") && (($escolaridade == "Curso Técnico") || ($escolaridade == "Ensino Médio (2º Grau)") || ($escolaridade == "Curso Extra-Curricular / Profissionalizante") || ($escolaridade == "Ensino Fundamental (1º Grau)"))) || (($formacao == "Ensino Médio (2º Grau)") && (($escolaridade == "Ensino Médio (2º Grau)") || ($escolaridade == "Curso Extra-Curricular / Profissionalizante") || ($escolaridade == "Ensino Fundamental (1º Grau)") )   ) || (($formacao == "Curso Extra-Curricular / Profissionalizante") && (($escolaridade == "Curso Extra-Curricular / Profissionalizante"))) || (($formacao == "Curso Extra-Curricular / Profissionalizante") && (($escolaridade == "Curso Extra-Curricular / Profissionalizante"))) || (($formacao == "Ensino Fundamental (1º Grau)") && (($escolaridade == "Ensino Fundamental (1º Grau)")) || ($escolaridade == "Curso Extra-Curricular / Profissionalizante")) )
	
	{
		

	$insert_candidatura = "INSERT INTO `bd_emprega_aruja`.`tb_candidatura_vaga` (`id_solicitante`, `id_vaga`, `id_empresa`, `data_hora`, `status_candidatura`) VALUES ('$id_solicitante', '$id_vaga', '$id_empresa', '$data', '0') ";
			
			$resultado_insert_candidatura = mysqli_query($conn, $insert_candidatura);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				$insert_nis	=	"INSERT INTO `bd_emprega_aruja`.`tb_nis` (`id_solicitante`, `id_vaga`, `NIS`) VALUES ('$id_solicitante', '$id_vaga', '$NIS') ";
				$resultado_insert_nis = mysqli_query($conn, $insert_nis);
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&res=1');
				
			} else { //erro ao cadastrar 
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&res=2');	
				
			}
		

	}else{
		
		header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=listar_vagas&res=3');	
		
	}
*/