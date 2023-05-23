<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!DOCTYPE html>

<meta charset="utf-8">      
<body>
<?php
include "../controll/banco.php" ;

    $data = date("Y-m-d"); // ok
    $hashdate = date('H:i:s');
    $ata = $_POST['ata'];
    $portaria        = $_POST['portaria'];
    $interessado    = $_POST['interessado'];
    $apresentador   = $_POST['apresentador'];
    $tipoProcesso   = $_POST['tp_proc']; // ok
    $assunto        = $_POST['assunto']; // ok
    $parecer        = $_POST['descricao'];
    $user           = $_POST['user'];
    $id             = $_POST['idjurado'];
    
    //script para geração do Token  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    include "../controll/token.php" ;
    
    //Inseri os dados na tabela token membro ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    $inseriToken = "INSERT INTO `bd_epda`.`token_membro` (`membro`, `token`, `protocolo`, `data`) VALUES ('$user', '$hash', '$ata', '$data')";
    $inseriTokenquery = mysqli_query($conn, $inseriToken);
    
    //Inseri os dados na tabela token documento ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    $inseriTokendoc = "INSERT INTO `bd_epda`.`token_documento` (`token`, `protocolo`, `data`) VALUES ('$hashdoc', '$ata', '$data')";
    $inseriTokenquerydoc = mysqli_query($conn, $inseriTokendoc);
   
    //Inseri dados no banco para construção da Ata //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $inserirDados = "INSERT INTO `bd_epda`.`tb_layout_ata` (`num_Ata`, `data`, `numPortaria`, `processo`, `interessado`, `apresentador`, `assunto`, `parecer`) VALUES ('$ata', '$data', '$portaria', '$tipoProcesso', '$interessado', '$apresentador', '$assunto', '$parecer')";
    $resultadoInserir = mysqli_query($conn, $inserirDados); 

     
    //Atualiza dados na tabela requerimento para baixa no dashboard ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    $upAtaRequerimento = "UPDATE `bd_epda`.`tb_requerimento` SET  `status`='Análise Finalizada',`J_7`='1', `ataCriada`='1' WHERE `protocolo`='$ata'";
    $upAtaRequerimentoLac = mysqli_query($conn, $upAtaRequerimento);
    
    //script switAlert com mensagem de inservção //////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     
     echo '<script language="javascript">';
     echo 'swal ({
      title: "ATA finalizada com Sucesso!",
      text: "Você será redirecionado para visualização da Ata.",
      icon: "success",
      buttons:"ok",
      }).then(function(result) {
      if (result) {
      window.location="http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpaneladmin/index.php?p=atafinal&?protocolo='.$ata.'"}});';  
     echo '</script>';
     exit; 
    
?>

