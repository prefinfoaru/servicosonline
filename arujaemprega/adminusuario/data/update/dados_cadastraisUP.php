 <?php
 session_start();
 include  "../conexao.php";
 $id = $_SESSION['id'];
if(isset($_POST['button'])){
	$nome_up 		= utf8_decode($_POST['nome'])		;
	$email_up 		= utf8_decode($_POST['email'])		;
	$dt_nasc 		= utf8_decode($_POST['dt_nasc'])	;
	$tel_up 		= utf8_decode($_POST['tel'])		;
	$cel_up 		= utf8_decode($_POST['celular'])	;
	$civil_up 		= utf8_decode($_POST['civil'])		;
	$cep_up 		= utf8_decode($_POST['cep'])		;
	$rua_up 		= utf8_decode($_POST['rua'])		;
	$numero_up 		= utf8_decode($_POST['numero'])		;
	$complemento_up = utf8_decode($_POST['complemento']);
	$bairro_up 		= utf8_decode($_POST['bairro'])		;
	$cidade_up 		= utf8_decode($_POST['cidade'])		;
	$estado_up 		= utf8_decode($_POST['estado'])		;
	$habilitado_up 	= utf8_decode($_POST['habilitado'])	;
	@$categoria_up	= utf8_decode($_POST['categoria'])	;
	$veiculo_up 	= utf8_decode($_POST['veiculo'])	;
	$viajar_up 		= utf8_decode($_POST['viajar'])		;
	$mudar_up 		= utf8_decode($_POST['mudar'])		;
	$resumo 		= utf8_decode($_POST['resumo'])		;
	$possuiDef		= utf8_decode($_POST['possuiDeficiencia']);
	$deficiencia	= utf8_decode($_POST['deficiencia']);
	$dadosDef		= utf8_decode($_POST['dados_def']);
	$outrosCont		= utf8_decode($_POST['outrosCont']);
//tratando variável
	utf8_decode($categoria_up);
	
	if($categoria_up == ''){
	
	$categoria_up = utf8_decode('não possui');
	}

	if(empty($_FILES['imagem']['name'])){
	
		$sqlupdateedit = "	UPDATE bd_emprega_aruja.tb_cadastro_solicitante c inner Join tb_dados_extras d on c.id_solicitante = d.id_solicitante SET `nome`='$nome_up', `dtnasc`='$dt_nasc', `email`='$email_up', `celular`='$cel_up', `telefone`='$tel_up', `estado_civil`='$civil_up', `cep`='$cep_up', `rua`='$rua_up', `bairro`='$bairro_up', `cidade`='$cidade_up', `estado`='$estado_up', `numero`='$numero_up', `complemento`='$complemento_up', `habilitado`='$habilitado_up', `tipo_habilitacao`='$categoria_up', `veiculo_proprio`='$veiculo_up', `disponibilidade_viajar`='$viajar_up', `disponibilidade_mudar`='$mudar_up', `resumo`='$resumo', `possui_deficiencia`='$possuiDef', `deficiencia`='$deficiencia', `dados_deficiencia`='$dadosDef', `outros_contatos`='$outrosCont'  where c.id_solicitante = '$id'; ";
		$sqlupdate = mysqli_query($conn , $sqlupdateedit);

		//verifica se conectou com banco
			if($sqlupdate){//sucesso
				echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=config_usu&res=1'</script>"; 
				exit();
			}else {//deu erro
				echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=config_usu&res=2'</script>";
				exit();
			}

	}else{
		//n°id_imagem
		$protocoloobra =  date("Ymd") . mt_rand();

		//nome da imagem
		$arquivo_temp = $_FILES['imagem']['name'];

		// utiliza os 5 ultimos elentos do nome da imagem
		$tratamento_extesao = substr($arquivo_temp, -5);
		// usa somente o que esta depois do ponto
		$tmp = explode('.',  $tratamento_extesao);
		$trata_arq = strtolower(end($tmp));

	

//verifica se corresponde as extensões suportadas
	if ($trata_arq == "png" || $trata_arq == "jpg" || $trata_arq == "jpeg" ){
			
		$uploaddir = "../../imagens/usuario/foto/$protocoloobra/"; // Diretório que vai receber o arquivo.


		if(!is_dir($uploaddir)){//se ele não existir

			mkdir(dirname(FILE)."./../imagens/usuario/foto/"."$protocoloobra/", 0777, true);//cria a pasta.
			$name = "foto_".$protocoloobra.'.'.$trata_arq;//renomeia o arquivo

			$tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário.

			$uploadfile = $uploaddir.$name; //endereço completo(mover arquivo pasta)
			$uploadfileb =	"../../imagens/usuario/foto/$protocoloobra/".$name;//inserir no banco
		
			if(move_uploaded_file($tmpName, $uploadfile ) ) { // move_uploaded_file irá realizar o envio do arquivo.	

				//Atulizar banco com os dados inseridos

				$update = "	UPDATE bd_emprega_aruja.tb_cadastro_solicitante c inner Join tb_dados_extras d on c.id_solicitante = d.id_solicitante SET `nome`='$nome_up', `dtnasc`='$dt_nasc', `email`='$email_up', `celular`='$cel_up', `telefone`='$tel_up', `estado_civil`='$civil_up', `cep`='$cep_up', `rua`='$rua_up', `bairro`='$bairro_up', `cidade`='$cidade_up', `estado`='$estado_up', `numero`='$numero_up', `complemento`='$complemento_up', `habilitado`='$habilitado_up', `tipo_habilitacao`='$categoria_up', `veiculo_proprio`='$veiculo_up', `disponibilidade_viajar`='$viajar_up', `disponibilidade_mudar`='$mudar_up', `resumo`='$resumo', `possui_deficiencia`='$possuiDef', `deficiencia`='$deficiencia', `dados_deficiencia`='$dadosDef' ,`end_foto`='$uploadfileb', `outros_contatos`='$outrosCont' where c.id_solicitante = '$id'";

			
				$resultado_update = mysqli_query($conn, $update);

				if($resultado_update ){ //sucesso

				
							
						echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=config_usu&res=1'</script>"; 
						exit();
					}else { //erro ao cadastrar 
					
						
						echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=config_usu&res=2'</script>"; 
						exit();
					}
			



			}else{
						
				echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=config_usu&res=2'</script>";
				exit();


			}
		
		
		
		
		
		
		}



	}else{
	
		echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=config_usu&res=3'</script>";
		exit();

	}	


	}
}

?>