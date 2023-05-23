<?php
include "../controll/banco.php" ;
$data = date("Y-m-d");;
$resposta = $_POST['resp'];
$protocolo = $_POST['prot'];
$jurado = $_POST['jurado'];


            $inserirDados = "INSERT INTO `bd_epda`.`tb_obsmesa` (`membro`, `data`, `observacao`, `protocolo`) VALUES ('$jurado', '$data', '$resposta', '$protocolo')";
            $resultadoInserir = mysqli_query($conn, $inserirDados);

            $inserirDados2 = "UPDATE `bd_epda`.`tb_requerimento` SET `status`='Em análise' WHERE `protocolo`=$protocolo";
            $resultadoInserir2 = mysqli_query($conn, $inserirDados2);
        
        header("Location: http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpanelmebros/index.php?p=home");
exit;    
	
?>

