<?php

$protocoloind = $_GET['protocolo'];
$protocolo = $protocoloind;



//mkdir(dirname(__FILE__)."anexos/$protocolo/", 0777, true);

$diretorio = "../consultaanexos/$protocolo";
$diretorioBanco = "../consultaanexos/";


if(!is_dir($diretorio)){ 
	if(!file_exists("anexos/$protocolo/")){
    
   mkdir(dirname(__FILE__)."anexos/$protocolo/", 0777, true) ;


}
}else{
	$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
	for ($controle = 0; $controle < count($arquivo['name']); $controle++){
		
		$destino = $diretorio."/".$arquivo['name'][$controle];
		if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
            
            $inserirDados = "INSERT INTO `bd_epda`.`tb_anexo` (`protocolo`, `endereco`, `numerodoArq`) VALUES ('$protocolo', '$diretorioBanco' , '$controle')";
            $resultadoInserir = mysqli_query($conn, $inserirDados);
            
            
            
		
            echo "<img src='../img/check-tick-icon-22.png' width='10px' height='10px' >"."Upload realizado com sucesso<br>"; 
		}else{
			echo "<img src='../img/x-png-23.png' width='10px' height='10px' >"."Erro ao realizar upload";
		}
		
	}
}
?>

