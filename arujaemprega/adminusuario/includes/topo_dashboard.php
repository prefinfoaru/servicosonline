<!-- ******************* SWEETALERT ******************************************** -->

<script src="./assets/js/sweetalert.js" type="text/javascript"></script>
<link href="./assets/css/sweetalert.css" rel="stylesheet">

<?php


$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('res=', $URL_ATUAL, 2);
$res = isset($numprot[1]);

if ($res == 1  ){ ?>

<script>
swal.fire({
    title: 'Currículo cadastrado com sucesso!<br>',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/" class="">OK</a></button>',
    //    antes tinha ?p=dash

    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  } 
include_once './data/banco.php';

@$cpf					=	$_SESSION['usuario'];

$verifica_solicitante 	= 	"SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where cpf = '$cpf' ";
foreach($pdo->query($verifica_solicitante) as $dados_solicitante){
	
	$id_soli	=	$dados_solicitante['id_solicitante'];
}

$verifica_curriculo 	= 	"SELECT * FROM bd_emprega_aruja.tb_controll_cadastro where id_solicitante = '$id_soli' ";
foreach($pdo->query($verifica_curriculo) as $dados_curriculo){
	$etapa1		=	$dados_curriculo['etapa1'];
	$etapa2		=	$dados_curriculo['etapa2'];
	$etapa3		=	$dados_curriculo['etapa3'];
	$etapa4		=	$dados_curriculo['etapa4'];
	$etapa5		=	$dados_curriculo['etapa5'];
}
if($etapa1 == 0){
	
	header('location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv.php?cod='.$cpf.'&res=6');
	exit;
	
}
if($etapa2 == 0){
	
	header('location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv2.php?soli='.$id_soli.'&res=6');
	exit;
}
if($etapa3 == 0){
	
	header('location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv3.php?soli='.$id_soli.'&res=6');
	exit;
}
if($etapa4 == 0){
	
	header('location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv4.php?soli='.$id_soli.'&res=6');
	exit;
}
if($etapa5 == 0){
	
	header('location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv5.php?soli='.$id_soli.'&res=6');
	exit;
}

?>