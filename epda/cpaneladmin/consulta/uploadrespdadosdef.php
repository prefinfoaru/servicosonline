<?php
include "../controll/banco.php" ;
$data = date("Y-m-d");;
$resposta = $_POST['optionsRadios'];
$protocolo = $_POST['prot'];
$jurado = $_POST['jurado'];


            $inserirDados = "INSERT INTO `bd_epda`.`tb_respdefmebros` (`membro`, `resp`, `data`) VALUES ('$jurado', '$resposta', '$data');
";
            $resultadoInserir = mysqli_query($conn, $inserirDados);



            $inserirDados2 = "UPDATE `bd_epda`.`tb_requerimento` SET `$jurado`='1' WHERE `protocolo`=$protocolo";
            $resultadoInserir2 = mysqli_query($conn, $inserirDados2);

        
        header("Location: http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpanelmebros/index.php?p=home");
exit;    
	
?>

