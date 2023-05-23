<?php
include "../controll/banco.php" ;
$data = date("Y-m-d");;
$resposta = $_POST['optionsRadios'];
$protocolo = $_POST['prot'];
$jurado = $_POST['jurado'];


 //script para geração do Token  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    include "../controll/token.php" ;
    
    //Inseri os dados na tabela token membro ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    $inseriToken = "INSERT INTO `bd_epda`.`token_membro` (`membro`, `token`, `protocolo`, `data`) VALUES ('$jurado', '$hash', '$protocolo', '$data')";
    $inseriTokenquery = mysqli_query($conn, $inseriToken);

            $inserirDados = "INSERT INTO `bd_epda`.`tb_respdefmebros` (`membro`, `resp`, `data`, `protocolo`) VALUES ('$jurado', '$resposta', '$data', '$protocolo');
";
            $resultadoInserir = mysqli_query($conn, $inserirDados);



            $inserirDados2 = "UPDATE `bd_epda`.`tb_requerimento` SET `status`='Em análise', `$jurado`='1' WHERE `protocolo`=$protocolo";
            $resultadoInserir2 = mysqli_query($conn, $inserirDados2);





        
        header("Location: http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpanelmebros/index.php?p=home");
exit;    
	
?>



