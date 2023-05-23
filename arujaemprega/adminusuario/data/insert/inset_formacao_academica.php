<?php

session_start();
include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id_soli 			= 	$_POST['id_soli'];
$instituicao 		= 	utf8_decode($_POST['instituicao']);
$pais	 			= 	utf8_decode($_POST['pais']);
$estado	 			= 	utf8_decode($_POST['estado']);
$nivel	 			= 	utf8_decode($_POST['nivel']);
$curso	 			= 	utf8_decode($_POST['curso']);
// $outros	 			= 	utf8_decode($_POST['outros']);
if(isset($_POST['outros'])){
	$curso			=		$_POST['outros'];
}else{
	$curso = $curso;
}
$status_curso	 	= 	utf8_decode($_POST['tempo_curso']);
$inicio_mes	 		= 	utf8_decode($_POST['inicio_mes']);
$inicio_ano	 		= 	utf8_decode($_POST['inicio_ano']);
@$conclusao_mes	 	= 	utf8_decode($_POST['conclusao_mes']);
@$conclusao_ano	 	= 	utf8_decode($_POST['conclusao_ano']);

// if(!empty($outros)){
// 	$curso = $outros;
// }else{
// 	$curso = $curso;
// }


$instituicao_b = $valor_recebido	= str_replace("'" ,"", $instituicao);



			$insert_formacao = "INSERT INTO `bd_emprega_aruja`.`tb_formacao_academica` (`id_solicitante`, `nome_instituicao`, `pais`, `estado`, `nivel`, `curso`, `status_curso`, `inicio_mes`, `inicio_ano`, `conclusao_mes`, `conclusao_ano`) VALUES ('$id_soli ', '$instituicao_b ', '$pais', '$estado', '$nivel', '$curso', '$status_curso', '$inicio_mes', '$inicio_ano', '$conclusao_mes', '$conclusao_ano') ";
			
			$resultado_insert_formacao = mysqli_query($conn, $insert_formacao);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv2.php?soli='.$id_soli.'');
				
			} else { //erro ao cadastrar 
			
				$_SESSION['errocad'] = 2; 
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_usuario.php?res=2');	
				
			}
		
		




?>