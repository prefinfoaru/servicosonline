<?php

session_start();
include "../conexao.php";
include "../banco.php";

//Declaração de variavel
$cpf 			= 	$_POST['cpf']						;
$resumo 		= 	utf8_decode($_POST['resumo'])		;
$def	 		= 	utf8_decode($_POST['def'])			;
$defselect	 	= 	utf8_decode($_POST['defselect'])	;
@$dados_def	 	= 	utf8_decode($_POST['dados_def'])	;
$LinkedIn	 	= 	utf8_decode($_POST['LinkedIn'])		;
$Facebook	 	= 	utf8_decode($_POST['Facebook'])		;
$Twitter	 	= 	utf8_decode($_POST['Twitter'])		;
$Google	 		= 	utf8_decode($_POST['Google'])		;
$YouTube	 	= 	utf8_decode($_POST['YouTube'])		;
$Instagram	 	= 	utf8_decode($_POST['Instagram'])	;
$Blog	 		= 	utf8_decode($_POST['Blog'])			;


$cpf_s_p = $valor_recebido	= str_replace("." ,"", $cpf);
$cpf_s_t = $valor_recebido	= str_replace("-" ,"", $cpf_s_p);
$cpf_s_b = $valor_recebido	= str_replace("/" ,"", $cpf_s_t);

//Buscar ID do Solicitante
$select_solicitante = "SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where cpf = '$cpf_s_b'; ";

foreach ($pdo->query($select_solicitante) as $row_solicitante){
	$id_soli = $row_solicitante ['id_solicitante'];
};

//n°id_imagem
$protocoloobra =  date("Ymd") . mt_rand();

if ($_FILES['imagem']['size'] == 0){

	//Atulizar banco com os dados inseridos
	$cadastrar = "INSERT INTO `bd_emprega_aruja`.`tb_dados_extras` (`id_solicitante`, `resumo`, `possui_deficiencia`, `deficiencia`, `dados_deficiencia`, `facebook`, `linkedin`, `twitter`, `googleplus`, `youtube`, `instagram`, `blog`) VALUES ('$id_soli', '$resumo', '$def', '$defselect', '$dados_def', '$Facebook', '$LinkedIn', '$Twitter', '$Google', '$YouTube', '$Instagram', '$Blog') ";

	$resultado_insert = mysqli_query($conn, $cadastrar);

	if(mysqli_insert_id($conn)){ //sucesso
		
		//INSERI DADOS DA ETAPA 1 NO BANCO CONTROL CADASTRO
		$insert_etapa1 = "INSERT INTO `bd_emprega_aruja`.`tb_controll_cadastro` (`id_solicitante`, `etapa1`) VALUES ('$id_soli', '1') ";

		$resultado_insert_etapa1 = mysqli_query($conn, $insert_etapa1);	
		
		header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv2.php?soli='.$id_soli.'');
		
	} else { //erro ao cadastrar 
	
		$_SESSION['errocad'] = 2; 
		header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_usuario.php?res=2');	
		
	}

} else {	
//nome da imagem
$arquivo_temp = $_FILES['imagem']['name'];

// utiliza os 5 ultimos elentos do nome da imagem
$tratamento_extesao = substr($arquivo_temp, -5);
// usa somente o que esta depois do ponto
$trata_arq = strtolower(end(explode(".", $tratamento_extesao)));

	//verifica se corresponde as extensões suportadas
	if ($trata_arq == "png" || $trata_arq == "jpg" || $trata_arq == "jpeg"){
		
		$uploaddir = "../../imagens/usuario/foto/$protocoloobra/"; // Diretório que vai receber o arquivo.
		
		if(!is_dir($uploaddir)){//se ele não existir

			mkdir(dirname(__FILE__)."./../imagens/usuario/foto/"."$protocoloobra/", 0777, true);//cria a pasta.
			$name = "foto_".$protocoloobra.'.'.$trata_arq;//renomeia o arquivo

			$tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário.

			$uploadfile = $uploaddir.$name; //endereço completo(mover arquivo pasta)
			$uploadfileb =	"../../imagens/usuario/foto/$protocoloobra/".$name;//inserir no banco
			
		
			if(move_uploaded_file($tmpName, $uploadfile ) ) { // move_uploaded_file irá realizar o envio do arquivo.	

				//Atulizar banco com os dados inseridos
				$cadastrar = "INSERT INTO `bd_emprega_aruja`.`tb_dados_extras` (`id_solicitante`, `resumo`, `end_foto`, `possui_deficiencia`, `deficiencia`, `dados_deficiencia`, `facebook`, `linkedin`, `twitter`, `googleplus`, `youtube`, `instagram`, `blog`) VALUES ('$id_soli', '$resumo', '$uploadfileb', '$def', '$defselect', '$dados_def', '$Facebook', '$LinkedIn', '$Twitter', '$Google', '$YouTube', '$Instagram', '$Blog') ";

				$resultado_insert = mysqli_query($conn, $cadastrar);

				if(mysqli_insert_id($conn)){ //sucesso
					
					//INSERI DADOS DA ETAPA 1 NO BANCO CONTROL CADASTRO
					$insert_etapa1 = "INSERT INTO `bd_emprega_aruja`.`tb_controll_cadastro` (`id_solicitante`, `etapa1`) VALUES ('$id_soli', '1') ";

					$resultado_insert_etapa1 = mysqli_query($conn, $insert_etapa1);	
					
					header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv2.php?soli='.$id_soli.'');
					
				} else { //erro ao cadastrar 
				
					$_SESSION['errocad'] = 2; 
					header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_usuario.php?res=2');	
					
				}
			}
		}	
		}else{
		
		
					header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv.php?cod='.$cpf.'&res=2');	
		
		}
}

?>