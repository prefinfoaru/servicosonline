<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../../PHPMailer/vendor/autoload.php';


include "../conexao.php";
include "../banco.php";
$pdo = Banco::conectar();

//Declaração de variavel
$id_soli 				= 	$_POST['id_soli'];
$jornada 				= 	utf8_decode($_POST['jornada']);
$tipo_contrato	 		= 	utf8_decode($_POST['tipo_contrato']);
$hierarquia_minima	 	= 	utf8_decode($_POST['hierarquia_minima']);
$hierarquia_maxima	 	= 	utf8_decode($_POST['hierarquia_maxima']);
$pretensao_min	 		= 	utf8_decode($_POST['pretensao_min']);
$pretensao_max	 		= 	utf8_decode($_POST['pretensao_max']);
$profissao				=	utf8_decode($_POST['profissao']);

if(empty($pretensao_min)){
	$pretensao_min = utf8_decode("não informado");
} 
if(empty($pretensao_max)){
	$pretensao_max = utf8_decode("não informado");
} 

			$insert_objetivo = "INSERT INTO `bd_emprega_aruja`.`tb_objetivo_profissional` (`id_solicitante`, `jornada`, `tipo_contrato`, `area_desejada`, `nivel_hierarquico_minimo`, `nivel_hierarquico_maximo`, `pretensao_minima`, `pretensao_maxima`) VALUES ('$id_soli', '$jornada', '$tipo_contrato', '$profissao', '$hierarquia_minima', '$hierarquia_maxima', '$pretensao_min', '$pretensao_max') ";
			
			$resultado_objetivo = mysqli_query($conn, $insert_objetivo);
			//Atulizar banco com os dados inseridos
            
            if(mysqli_insert_id($conn)){ //sucesso
				
				//INSERI DADOS DA ETAPA 5 NO BANCO CONTROL CADASTRO
				$up_etapa5 = "UPDATE `bd_emprega_aruja`.`tb_controll_cadastro` SET `etapa5`='1' WHERE `id_solicitante`='$id_soli' ";
				$resultado_up_etapa5 = mysqli_query($conn, $up_etapa5);
				
				$select_usu = "SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where id_solicitante = '$id_soli' ";
				$resultado_consulta = mysqli_query($conn, $select_usu);
				$row_dados = mysqli_fetch_assoc($resultado_consulta);
				
				$_SESSION['usuario'] 	= $row_dados['cpf'];
				$email 					= $row_dados['email'];
				$nome 					= $row_dados['nome'];
				$_SESSION['id'] 		= $id_soli;
				$_SESSION['res'] 		= '1';
			
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
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
<tr><br>
<td align="center" bgcolor="#005690" style="padding: 10px 0 10px 0;">
<img src="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/imagens/logotipo_jobs.png" width="7%" style="display: block;"/><h3 style="color: #ffffff; font-family: Arial, sans-serif; font-size: 16px;">Arujá Emprega</h3>
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

<p style="font-size: 13px">Prezado Sr(a), ';
                                
                            $mensagem .= $nome ;   // nome do solicitante
                                
                                $mensagem .= '<br> Seu cadastro foi realizado com sucesso em nosso sistema Arujá Emprega. <br> Não deixe de completar o seu currículo para poder se candidatar as vagas disponíveis em nosso site. <br> Desejamos uma boa sorte. <br> Att/ <br> Secretaria de Desenvolvimento Econômico.</p><hr>
<p>Clique para efetuar o login: </p>
<a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/login.php">' ;

$mensagem .=
'Efetuar Login</a>
    <p style="font-size: 10px"><i>Ao clicar em efetuar login, você será redirecionado a uma pagina onde poderá efetua-lo</i></p>
</td>
</tr>
<tr>
<td>
<!--    
    
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="260" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td>
<img src="https://www.lucianoreisnoti..." alt="" width="100%" height="140" style="display: block;"/>
</td>
</tr>
<tr>
<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.
</td>
</tr>
</table>
</td>
<td style="font-size: 0; line-height: 0;" width="20">
 
</td>
<td width="260" style="vertical-align:top;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td>
<img src="https://www.lucianoreisnoti..." alt="" width="100%" height="140" style="display: block;"/>
</td>
</tr>
<tr>
<td style="padding: 25px 0 0 0; vertical-align:top; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.
</td>
</tr>
</table> -->
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
				
							if($mail->Send()){


								//$insert = "INSERT INTO `bd_emprega_aruja`.`tb_redefinirsenha_usuario` (`id_solicitante`, `protocolo`, `data_solicitacao`, `status`) VALUES ('$id_solicitante', '$protocolo', '$data', '0');";
				
								//$resultado_consulta = mysqli_query($conn, $insert);
								
								//if($resultado_consulta){
									//$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>E-mail para redefinição foi enviado com sucesso!<br>Por favor verifique sua caixa de mensagem!</div>";
	
									//echo '<script>window.location.href = "../../pages/login.php";</script>';
									
								//}
								
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=dashboard&res=1');

							} else {


								$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível enviar o E-mail!</div>";
	
								echo '<script>window.location.href = "../../pages/login.php";</script>';



							}

				
				
				
			} else { //erro ao cadastrar 
			
				header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv5.php?soli='.$id_soli.'');	
				
			}
		
		




?>