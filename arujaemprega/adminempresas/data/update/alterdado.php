<?php  

include	"../conexao.php";



$id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_STRING); 


if(isset($_POST['button'])){

$cep=	$_POST['cep'];
$end = 	utf8_decode($_POST['endereco']);
$num =	$_POST['numero'];
$comp = 	utf8_decode($_POST['complemento']);
$cidade = 	utf8_decode($_POST['cidade']);
$bairro = 	utf8_decode($_POST['bairro']);
$estado = 	$_POST['estado'];
$email = 	utf8_decode($_POST['email']);
$ramo = 	utf8_decode($_POST['ramo']);
$cel = 	$_POST['cel'];
$tel = 	$_POST['tel'];
$responsavel = 	utf8_decode($_POST['responsavel']);


	if(empty($_FILES['imagem']['name'])){

	
		$Atualizar = "UPDATE `bd_emprega_aruja`.`tb_cadastro_empresa` SET `cep`='$cep', `rua`='$end', `numero`='$num', `bairro`='$bairro', `cidade`='$cidade', `estado`='$estado', `complemento`='$comp', `ramo`='$ramo', `celular`='$cel', `telefone`='$tel', `email`='$email',`responsavel`='$responsavel' WHERE `id_cadastroempresa`='$id';";
			 
			$resultado_atualizar = mysqli_query($conn, $Atualizar);
			 
 			 if($resultado_atualizar){
				
   			 		header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=alterdados&res=1');

 	
 		 	 }else{
		
					 
 				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=alterdados&res=2');
	
 			}



	}else{
		$protocoloobra =  date("Ymd") . mt_rand();

		//nome da imagem
		$arquivo_temp = $_FILES['imagem']['name'];

		// utiliza os 5 ultimos elentos do nome da imagem
		$tratamento_extesao = substr($arquivo_temp, -5);
		// usa somente o que esta depois do ponto
		$tmp = explode('.',  $tratamento_extesao);
		$trata_arq = strtolower(end($tmp));

		//verifica se corresponde as extensões suportadas
		if ($trata_arq == "jpg" || $trata_arq == "jpeg" || $trata_arq == "png"){

			$uploaddir = "./../../imagens/empresas/logotipos/$protocoloobra/"; // Diretório que vai receber o arquivo.
			if(!is_dir($uploaddir)){//se ele não existir
				mkdir(dirname(FILE)."./../imagens/empresas/logotipos/"."$protocoloobra/", 0777, true);//cria a pasta.
				$name = "foto_".$protocoloobra.'.'.$trata_arq;//renomeia o arquivo

				$tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário.

				$uploadfile = $uploaddir.$name; //endereço completo(mover arquivo pasta)
				$uploadfileb =	"../../imagens/empresas/logotipos/$protocoloobra/".$name;//inserir no banco
				
			
				if(move_uploaded_file($tmpName, $uploadfile ) ) { // move_uploaded_file irá realizar o envio do arquivo.
					
					$Atualiza = "UPDATE `bd_emprega_aruja`.`tb_cadastro_empresa` SET `cep`='$cep', `rua`='$end', `numero`='$num', `bairro`='$bairro', `cidade`='$cidade', `estado`='$estado', `complemento`='$comp', `ramo`='$ramo', `celular`='$cel', `telefone`='$tel', `email`='$email', `logotipo`='$uploadfileb',`responsavel`='$responsavel' WHERE `id_cadastroempresa`='$id';";
			 
					
					$resultado_atualiza = mysqli_query($conn, $Atualiza);
					

					if($resultado_atualiza){
								
									header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=alterdados&res=1');

					
							}else{
						
									
									header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=alterdados&res=2');
					
								}



				}else{



					header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=alterdados&res=2');

				






				}
			




			}

		}else{

			//Formato de imagem não aceito

			header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=alterdados&res=3');


		}
	}		
}
?>