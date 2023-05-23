<?php
session_start();



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../../PHPMailer/vendor/autoload.php';


include('../banco.php');
$pdo = Banco::conectar();

$id_vaga		=	$_POST['id'];
$motivo	   =	$_POST['motivo'];
$idempresa	=	$_POST['idempresa'];

           

            $infoempresa = "SELECT razao_social, email FROM bd_emprega_aruja.tb_cadastro_empresa where id_cadastroempresa = '$idempresa'"; 

            foreach($pdo->query($infoempresa) as $row){
               $nome = $row['razao_social'];
               $email = $row['email'];
            }

            $infovaga = "SELECT titulo FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga = '$id_vaga'"; 

            foreach($pdo->query($infovaga) as $row_vaga){
               $vaga = $row_vaga['titulo'];
            }
            



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
                   

            $mail->Subject    = "Vaga excluída pela Prefeitura Municipal de Arujá - $vaga.";
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
                   Vaga Excluída pela Prefeitura Municipal de Arujá</b><hr>
                      
                   </td>
                   </tr>
                   <tr>
                   <td style="padding: 10px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                   
                   <p style="font-size: 13px">Prezado ';
                                           
                                        $mensagem .= $nome ;  // nome do solicitante
                                           
                                           $mensagem .= ' , a vaga:<strong>'.$vaga.'</strong>, foi excluída pelo seguinte motivo: <strong>'.$motivo.'</strong>
                                           
                   
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
   var_dump($mail);
            if($mail->Send()){


               $update=  "UPDATE `bd_emprega_aruja`.`tb_cadastro_vaga` SET `status`='2', `prefexclui`='$motivo' WHERE `id_vaga`='$id_vaga';";
            
            
               $result_update= $pdo->query($update);
               if($result_update){
               
               
               
                  header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=listarvagas&exclui=1');
               }else{
               
               header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=listarvagas&exclui=0');
               
               }
    
            }else{
              
            header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=listarvagas&exclui=0');
            
            }