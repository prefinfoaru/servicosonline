<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../../PHPMailer/vendor/autoload.php';

session_start();
include("../conexao.php");
include "../banco.php";
$pdo = Banco::conectar();

$cnpj			=		$_POST['cnpj'];

$cel			=		$_POST['cel'];
$tel			=		$_POST['tel'];
$cep			=		$_POST['cep'];
$rua			=	 	addslashes(utf8_decode($_POST['rua']));
$numero			=		$_POST['numero'];
$bairro			=		addslashes(utf8_decode($_POST['bairro']));
$cidade			=		addslashes(utf8_decode($_POST['cidade']));
$estado			=		addslashes(utf8_decode($_POST['estado']));
$email			=		utf8_decode($_POST['email']);
$senha			=		$_POST['password'];
$ramo			=		addslashes(utf8_decode($_POST['ramoatividade']));
$nomefantasia	=		addslashes(utf8_decode($_POST['nomefantasia']));
$razaosocial	=		addslashes(utf8_decode($_POST['razaosocial']));
$complemento	=		addslashes(utf8_decode($_POST['complemento']));
$responsavel	=		addslashes(utf8_decode($_POST['responsavel']));
$data			=		date("Y-m-d H:i:s");   	


$cpfTratado = $_POST['cnpj'];
$cpf_s_p = $valor_recebido	= str_replace("." ,"", $cpfTratado);
$cpf_s_t = $valor_recebido	= str_replace("-" ,"", $cpf_s_p);
$cpf_s_b = $valor_recebido	= str_replace("/" ,"", $cpf_s_t);


$select_cnpj = "SELECT COUNT(cnpjcpf) as cpfcnpjCad FROM bd_emprega_aruja.tb_cadastro_empresa WHERE cnpjcpf = '$cpf_s_b' LIMIT 1";
$result_select_cnpj = mysqli_query($conn, $select_cnpj);
$row_dados = $result_select_cnpj->fetch_assoc();

if ($row_dados['cpfcnpjCad'] != 0){
	header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/cadastroempresa.php?res=2');

}else{
// //criptografia da senha em php 5 hash

$options = [
	'cost' => 12,
	];
	$hash = password_hash("$senha", PASSWORD_BCRYPT, $options);
   
   
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
		if ($trata_arq == "jpg" || $trata_arq == "jpeg" || $trata_arq == "png" ){
			$uploaddir = "../../imagens/empresas/logotipos/$protocoloobra/"; // Diretório que vai receber o arquivo.
			if(!is_dir($uploaddir)){//se ele não existir
				mkdir(dirname(FILE)."./../imagens/empresas/logotipos/"."$protocoloobra/", 0777, true);//cria a pasta.
				$name = "foto_".$protocoloobra.'.'.$trata_arq;//renomeia o arquivo

				$tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário.

				$uploadfile = $uploaddir.$name; //endereço completo(mover arquivo pasta)
				$uploadfileb =	"../../imagens/empresas/logotipos/$protocoloobra/".$name;//inserir no banco
				
			
				if(move_uploaded_file($tmpName, $uploadfile ) ) { // move_uploaded_file irá realizar o envio do arquivo.
					
					
						
					$inserir_cadempresa	=	"INSERT INTO `bd_emprega_aruja`.`tb_cadastro_empresa` (`cnpjcpf`, `nome_fantasia`, `razao_social`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `complemento`, `ramo`, `celular`, `telefone`,`logotipo`, `email`, `senha`, `status`, `data_cadastro`,`responsavel`) VALUES ('$cpf_s_b', '$nomefantasia', '$razaosocial', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$complemento', '$ramo', '$cel', '$tel','$uploadfileb', '$email', '$hash', '0', '$data','$responsavel'); ";
							
					$resultado_insert_dados = mysqli_query($conn,$inserir_cadempresa);
								
					if($resultado_insert_dados){
										

//aqui começao email
						$mail = new PHPMailer(true);
	
					
							//Server settings
							// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
							$mail->isSMTP();                                            // Send using SMTP
							$mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
							$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
							$mail->Username   = 'noreply@aruja.sp.gov.br';                     // SMTP username
                            $mail->CharSet = 'utf-8';
							$mail->Password   = 'Cds#info#2021@';                               // SMTP password
							$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
							$mail->Port       = 587;       
                            $mail->AddEmbeddedImage('../../../imagens/logotipo_jobs.png', 'logotipo_jobs');
							$mail->AddEmbeddedImage('../../../imagens/logotipo_jobs2.png', 'logotipo_jobs2');

							$mail->Subject    = "Cadastrado Efetuado Com Sucesso - Emprega Arujá.";
							$mail->From       = "noreply@aruja.sp.gov.br";
							$mail->FromName   = "Prefeitura do Municipio de Arujá";	

						 //Corpo da Mensagem
						  
                            $mensagem = '<html>
							<head>
							<meta https-equiv="Content-Type" content="text/html; charset=UTF-8"/>
							<title>Demystifying Email Design</title>
							<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
							</head>
							<body style="margin: 0; padding: 0;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
							<tr>
							<td align="center" bgcolor="#005690" style="padding: 10px 0 10px 0;">
							<img src="cid:logotipo_jobs" width="50%" style="display: block;"/><h3 style="color: #ffffff; font-family: Arial, sans-serif; font-size: 16px;">Arujá Emprega</h3>
							</td>
							</tr>
							<tr>
							<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
							<td style="color: #153643; font-family: Arial, sans-serif; font-size: 18px;" align="center"><b>
							Cadastro Efetuado Com Sucesso </b><hr>
								
							</td>
							</tr>
							<tr>
							<td style="padding: 10px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">

							<p style="font-size: 13px"> ';
															
														$mensagem .= $nomefantasia ;   // nome do solicitante
															
															$mensagem .= '<br> Seu cadastro foi realizado com sucesso em nosso sistema Arujá Emprega. <br> Não deixe de cadastrar as vagas de sua empresa. <br> Desejamos uma boa sorte. <br> Att/ <br> Secretaria de Desenvolvimento Econômico.</p><hr>
							<p>Clique para efetuar o login: </p>
							<a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/login.php">' ;

							$mensagem .=
							'Efetuar Login</a>
								<p style="font-size: 10px"><i>Ao clicar em efetuar login, você será redirecionado a uma pagina onde poderá efetua-lo</i></p>
							</td>
							</tr>
							<tr>
							<td>

							</td>
							</tr>
							</table>
							</td>
							</tr>
							<tr>
							<td  align="center" bgcolor="#005690" style="padding: 30px 30px 30px 30px;">
							<img src="cid:logotipo_jobs2" width="35%" style="display: block;"/>
							
							</td>
							</tr>
							</table>
							</td>
							</tr>
							
							</body>
							</html>';
						  //o corpo da menssagem termina aqui
							$mail->Body = $mensagem;

						   // //Corpo da mensagem em texto
							$mail->AltBody = 'conteudo do E-mail em texto';
							$mail->addAddress($email);     // Add a recipient
							// Content
							$mail->isHTML(true);                                  // Set email format to HTML
				
							if($mail->Send()){
								header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/cadastroempresa.php?res=1');
								
							}else{
							 	header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/cadastroempresa.php?res=2');
						
							}
						}
				}
	
				}else{

					header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/cadastroempresa.php?res=2');
				}

			}else{
			
			 header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/cadastroempresa.php?res=3');
			
		}
		


}