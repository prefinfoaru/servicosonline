<?php
include "../controll/banco.php" ;
$data = date("Y-m-d");;
$resposta = utf8_decode($_POST['resp']);
$protocolo = $_POST['prot'];
$jurado = $_POST['jurado'];
$selec = $_POST['optionsRadios'];
$hr = date('s:u');
$protocoloqust = $protocolo.'-'.$hr ;



//condições de gravação por iten selecionado

if ($selec == 1) {    
    $tipoobs = 'Documento';    
      $inserirDados = "INSERT INTO `bd_epda`.`tb_observacoes` (`tp_observacoes`, `descricao`, `tp_envio`, `statusobs`, `protocolo`, `data_obs`, `anexo`, `resp`, `protocoperg`) VALUES ('$tipoobs', '$resposta', 'Sistema', 'Aberto', '$protocolo', '$data', '0', '1', '$protocoloqust')";
            $resultadoInserir = mysqli_query($conn, $inserirDados);   
   
};   
if ($selec == 2) {    
    $tipoobs = 'Questionamento';    
      $inserirDados = "INSERT INTO `bd_epda`.`tb_observacoes` (`tp_observacoes`, `descricao`, `tp_envio`, `statusobs`, `protocolo`, `data_obs`, `anexo`, `resp`, `protocoperg`) VALUES ('$tipoobs', '$resposta', 'Sistema', 'Aberto', '$protocolo', '$data', '1', '0', '$protocoloqust')";
          $resultadoInserir = mysqli_query($conn, $inserirDados);  
   
};
if ($selec == 3) {    
    $tipoobs = 'Questionamento e Documento';    
      $inserirDados = "INSERT INTO `bd_epda`.`tb_observacoes` (`tp_observacoes`, `descricao`, `tp_envio`, `statusobs`, `protocolo`, `data_obs`, `anexo`, `resp`, `protocoperg`) VALUES ('$tipoobs', '$resposta', 'Sistema', 'Aberto', '$protocolo', '$data', '0', '0', '$protocoloqust')";
          $resultadoInserir = mysqli_query($conn, $inserirDados);   
   
    
};

    $Updateados = "UPDATE `bd_epda`.`tb_requerimento` SET `obsJug`='1' WHERE `protocolo`='$protocolo'";
            $resultado = mysqli_query($conn, $Updateados); 

 header("Location: http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpaneladmin/index.php?p=home");


        
    
exit;    
	
?>

