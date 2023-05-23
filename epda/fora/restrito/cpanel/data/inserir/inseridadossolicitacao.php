<meta charset="iso-8859-1">
	<?php
    session_start()  ;
	include '../../banco/banco.php';
	include 'variaveis.php';
    // Tamanho máximo do arquivo (em Bytes) ***********************************************************************************************************************************************************/
	$_UP['tamanho'] = 2085576	; // 2Mb
	$_FILES['arquivo']['size'];
	// Faz a verificação do tamanho do arquivo  *******************************************************************************************************************************************************/
	
	if ($_FILES['arquivo']['size'] > $_UP['tamanho'] || $_FILES['arquivo']['size'] == '0'){
	echo "<script>alert('Tamanho de arquivo acima de 2mb, não suportado')</script>";
	exit;
	}
	//trata e verifica a extensão do arquivo enviado ***************************************************************************************************************************************************/
	if ( $trata_arq != "pdf" && $trata_arq != "jpg" && $trata_arq != "jpeg")  {
	echo "<script>alert('Arquivo com Extensão não suportada. Anexe novamente');window.location='index.php'</script>";	
	}else{
	$uploaddir 			= "../../View/anexo/$protocolo".'_';
	$uploadfile         = $uploaddir.$string; }
    $uplod_insert		= "/View/anexo/$protocolo".'_'.$string;	
    //movimenta o arquivo para a pasta selecionada *//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    move_uploaded_file($_FILES['arquivo'] ['tmp_name'], $uploadfile);
    /****************************************** ****************************************************************************************************************************************************/////
     $query_solicitacao =  "INSERT INTO `ged_educ`.`bd_solicitacao` (`matricula`, `id_solicitante`, `funcao`, `id_escola`, `id_cod_inter`, `data_intercorrencia`, `desccricao`, `anexo1`, `numprotocolo`, `ano`, `situacao`, `formaderetorno`, `data_solicitacao`) VALUES ('$matricula', '$id_cad', '$funcao', '$escola', '$tipo', '$dataint', '$descricao', '$uplod_insert', '$protocolo', '$ano', '1', '1', '$dataatual');";
	 $resultado_cadastro = mysqli_query($conn, $query_solicitacao);


    include ('../mensagens/msg_confirmacao.php');
?>
    
    
  


