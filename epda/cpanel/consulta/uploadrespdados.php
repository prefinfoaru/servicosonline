<?php
include "../controll/banco.php" ;
$data = date("Y-m-d");;
$resposta = $_POST['resp'];
$protocolo = $_POST['prot'];


            $inserirDados = "INSERT INTO `bd_epda`.`tb_respostas` (`protocolo`, `tb_resposta`, `data`) VALUES ('$protocolo', '$resposta', '$data')";
            $resultadoInserir = mysqli_query($conn, $inserirDados);

$uploadrespobs = "UPDATE `bd_epda`.`tb_observacoes` SET `resp`='1' WHERE `protocolo`='$protocolo';" ;
$resultadoInserir = mysqli_query($conn, $uploadrespobs);
        
        
        header("Location: http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpanel/index.php?p=dadosObservacoes&?protocolo=".$protocolo);
exit;    
	
?>

