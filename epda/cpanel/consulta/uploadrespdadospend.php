<?php
include "./controll/banco.php" ;
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('protocolo=', $URL_ATUAL, 2);
$ProtocoloRequerimento = $numprot[1];
$protocolo = "epda".$ProtocoloRequerimento;
$data = date("Y-m-d");  



//mkdir(dirname(__FILE__)."anexosped/$protocolo/", 0777, true);

$diretorio = "./consultaanexosped/$protocolo";
$diretorioBanco = "./consultaanexosped/";

if(!is_dir($diretorio)){ 
 
	if(!file_exists("consultaanexosped/$protocolo/")){
    
  mkdir(dirname(__FILE__)."anexosped/$protocolo/", 0777, true) ;


}
}else{
    
    
	$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
	for ($controle = 0; $controle < count($arquivo['name']); $controle++){
		
		$destino = $diretorio."/".$arquivo['name'][$controle];
		if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
            
           $inserirDados = " INSERT INTO `bd_epda`.`tb_anexo_ped` (`protocolo`, `endereco`, `numerodoArq`, `datedeenvio`) VALUES ('$protocolo', '$diretorioBanco', '$controle', '$data');";
           $resultadoInserir = mysqli_query($conn, $inserirDados);
            
           $uploadrespobs = "UPDATE `bd_epda`.`tb_observacoes` SET `anexo`='1' WHERE `protocolo`='$ProtocoloRequerimento'" ;
           $resultadoInserir = mysqli_query($conn, $uploadrespobs);
        

		
            echo "<img src='./img/check-tick-icon-22.png' width='10px' height='10px' >"."Upload realizado com sucesso<br>"; 
		}else{
			echo "<img src='./img/x-png-23.png' width='10px' height='10px' >"."Erro ao realizar upload";
		}
		
	}
}
?>


