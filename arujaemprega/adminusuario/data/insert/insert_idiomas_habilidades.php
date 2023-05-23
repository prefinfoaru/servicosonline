<?php

include_once '../banco.php';
include "../conexao.php";
$id_soli 		= 	$_POST["id_soli"];
$idiomas 		=   $_POST["idioma"];
$niveis 		= 	$_POST["nivelidi"];
$habilidades	=	$_POST["habilidades"];

$tamanho = count($_POST['area']);
$tipo = $_POST['area'];
$conhecimento = $_POST['dados_infor'];
$nivels = $_POST['nivel'];

$count_idiomas = count($_POST["idioma"]);


$cont_insert = false;
//var_dump($idioma)
//var_dump($nivel)

	
for ($i=0; $i < $count_idiomas;$i++) {
	
    $result_idioma = "INSERT INTO `bd_emprega_aruja`.`tb_idiomas` (`id_solicitante`, `idiomas`, `nivel`) VALUES ('$id_soli', :idioma, :nivel)";

    $insert_idioma = $pdo->prepare($result_idioma);
    $insert_idioma->bindParam(':idioma', $idiomas[$i]);
		
    $insert_idioma->bindParam(':nivel', $niveis[$i]);
    $insert_idioma->execute();

}

foreach ($habilidades as $habilidade) {
    if($habilidade == ""){
        $habilidade = "Não Informado";
    }
	
    $result_habilidade = "INSERT INTO `bd_emprega_aruja`.`tb_habilidade` (`id_solicitante`, `descricao_habilidade`) VALUES ('$id_soli', :habilidades) ";

    $insert_habilidade = $pdo->prepare($result_habilidade);
	
    $insert_habilidade->bindParam(':habilidades', $habilidade);
    $insert_habilidade->execute();

    
}


    for ($i=0; $i < $tamanho;$i++){

        if($tipo[$i] == ""){
            $tipo[$i] = "Não informado";
        }

        $result_informatica = "INSERT INTO `bd_emprega_aruja`.`tb_dados_informatica` (`id_solicitante`, `curso`, `especializacao`, `nivel`) VALUES ('$id_soli', '$tipo[$i]', '$conhecimento[$i]', '$nivels[$i]');";

            $insert_informatica  = $pdo->prepare($result_informatica );
            
        
            $insert_informatica ->execute();
            $cont_insert = true;
    }







if ($cont_insert) {
	
	//INSERI DADOS DA ETAPA 4 NO BANCO CONTROL CADASTRO
	$up_etapa4 = "UPDATE `bd_emprega_aruja`.`tb_controll_cadastro` SET `etapa4`='1' WHERE `id_solicitante`='$id_soli' ";
	$resultado_up_etapa4 = mysqli_query($conn, $up_etapa4);
	
    header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv5.php?soli='.$id_soli.'');
	
} else {

    header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv4.php?soli='.$id_soli.'');

}