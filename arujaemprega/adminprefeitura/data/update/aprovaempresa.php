<?php  

 //session_start();

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 // Load Composer's autoloader
 require '../../../PHPMailer/vendor/autoload.php';

include "../conexao.php";



$id = filter_input (INPUT_POST, 'idempresa', FILTER_SANITIZE_STRING);


if(isset($_POST['cadastrar'])){
			$nome=$_POST['nome'];	
			$email=$_POST['email'];

 			 $Atualiza = "UPDATE `bd_emprega_aruja`.`tb_cadastro_empresa` SET `status`='1' WHERE `id_cadastroempresa`='$id';";
 			 $resultado_atualiza = mysqli_query($conn, $Atualiza);
 			 if($resultado_atualiza){
				  
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
				  

				  $mail->Subject    = "Aprovação de Cadastro.";
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
				  <img src="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/imagens/logotipo_jobs.png" width="7%" style="display: block;"/><h3 style="color: #ffffff; font-family: Arial, sans-serif; font-size: 16px;">Arujá Emprega</h3>
				  </td>
				  </tr>
				  <tr>
				  <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
				  <table border="0" cellpadding="0" cellspacing="0" width="100%">
				  <tr>
				  <td style="color: #153643; font-family: Arial, sans-serif; font-size: 18px;" align="center"><b>
				  Aprovação de Cadastro</b><hr>
					  
				  </td>
				  </tr>
				  <tr>
				  <td style="padding: 10px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
				  
				  <p style="font-size: 13px">Prezado ';
												  
											  $mensagem .= $nome ;  // nome do solicitante
												  
												  $mensagem .= '<br> Seu cadastro foi aprovado no sistema  Arujá Emprega. <br> Agora você já está apto a publicar vagas. <br> Desejamos uma boa sorte. <br> Att/ <br> Secretaria de Desenvolvimento Econômico.</p><hr>
												  <p>Clique para efetuar o login: </p>
												  <a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/login.php">' ;
												  
				  $mensagem .=
				  'Efetuar Login</a>
				  <p style="font-size: 10px"><i>Ao clicar em efetuar login, você será redirecionado a uma pagina onde poderá efetua-lo</i></p>
				  </tr>
				  <tr>
				  <td>
				  </td>
				  </tr>
				  </table>
				  </td>
				  </tr>
				  </table>
				  </td>
				  </tr>
				  <tr>
				  <td bgcolor="#005690" style="padding: 30px 30px 30px 30px;">
				  <table border="0" cellpadding="0" cellspacing="0" width="100%">
				  <tr>
				  <td width="75%" style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" align="center">
					  <img src="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/imagens/logotipo_jobs2.png" width="20%" style="display: block;"/>
				  
				  </td>
				  
				  </tr>
					  </table>
				  </body>
				  </html>';
				//o corpo da menssagem termina aqui
				  $mail->Body = $mensagem;

				 // //Corpo da mensagem em texto
				  $mail->AltBody = 'conteudo do E-mail em texto';
				  $mail->addAddress($email);     // Add a recipient
				  // Content
				  $mail->isHTML(true);                                  // Set email format to HTML
	  
				  $mail->Send();
					echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=aprovarempresa&res=1'</script>"; 
								
					exit();
 		 	}else{
 					
 					echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=aprovarempresa&res=2'</script>"; 
				 	exit();
 				}

 }