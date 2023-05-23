<?php 
include "./data/banco.php";
$pdo = Banco::conectar();

$cpf	=	$_SESSION['usuario'];

$select_cad_soli		 =	"SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where cpf = '$cpf' ";

include "./data/for/for_cadSolicitanteCV.php";

$select_dados_extra		 =	"SELECT * FROM bd_emprega_aruja.tb_dados_extras where id_solicitante = '$id_solicitante' 		 ";
$select_formacao_acadmc	 =	"SELECT * FROM bd_emprega_aruja.tb_formacao_academica where id_solicitante = '$id_solicitante' 	 ";
$select_ex_profissionais =	"SELECT * FROM bd_emprega_aruja.tb_dados_profissionais where id_solicitante = '$id_solicitante'	 ";
$select_idiomas			 =	"SELECT * FROM bd_emprega_aruja.tb_idiomas where id_solicitante = '$id_solicitante' 			 ";
$select_habilidades		 =	"SELECT * FROM bd_emprega_aruja.tb_habilidade where id_solicitante = '$id_solicitante' 			 ";
$select_informatica		 =	"SELECT * FROM bd_emprega_aruja.tb_dados_informatica where id_solicitante = '$id_solicitante' 			 ";

$select_objprofissional	 =	"SELECT * FROM bd_emprega_aruja.tb_objetivo_profissional where id_solicitante = '$id_solicitante'";

include "./data/for/for_dadosCV.php";

?>