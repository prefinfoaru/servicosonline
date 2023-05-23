<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer(true);

//Server settings
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
// $mail->IsSMTP();                                   // Será utilizado o SMTP  
// $mail->SetLanguage("br");
// $mail->set("Content-type", "text/html");
// $mail->CharSet 	  = "UTF-8";
// $mail->Host       = "10.1.1.20:25"; //ssl://smtp.gmail.com:465";
// $mail->IsHTML(true);
// //Configuração de HOST do SMTP   
// $mail->Username   = "nfe@prefeituradearuja.sp.gov.br"; //Usuário para autenticação do SMTP
// $mail->Password   = "123";
// $mail->Subject    = "Cadastro de Cestas Básícas";
// $mail->From       = "nfe@prefeituradearuja.sp.gov.br";
// $mail->FromName   = "Prefeitura do Município de Arujá";



//Server settings
// // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
// $mail->IsSMTP();                                   // Será utilizado o SMTP  
// $mail->SetLanguage("br");
// $mail->set("Content-type", "text/html");
// $mail->CharSet       = "UTF-8";
// $mail->Host       = "smtp.office365.com"; //ssl://smtp.gmail.com:465";
// $mail->IsHTML(true);
// $mail->Port       = 587;

// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
// //Configuração de HOST do SMTP   
// $mail->Username   = "dipam@aruja.sp.gov.br"; //Usuário para autenticação do SMTP
// $mail->Password   = "Ipm@Mrx2021";
// $mail->Subject    = "Cadastro de Cestas Básícas";
// $mail->From       = "dipam@aruja.sp.gov.br";
// $mail->FromName   = "Prefeitura do Município de Arujá";

// $mail = new PHPMailer(true);


// //Server settings
// // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
// $mail->isSMTP();                                            // Send using SMTP
// $mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
// $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
// $mail->Username   = 'noreply@aruja.sp.gov.br';                     // SMTP username
// $mail->CharSet = 'utf-8';
// $mail->Password   = 'Cds@2022@';                               // SMTP password
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
// $mail->Port       = 587;


// $mail->Subject    = "Aprovado para Entrevista - $vaga.";
// $mail->From       = "noreply@aruja.sp.gov.br";
// $mail->FromName   = "Prefeitura do Municipio de Arujá";


$mail = new PHPMailer(true);


//Server settings
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
// $mail->isSMTP();                                            // Send using SMTP
// $mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
// $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
// $mail->Username   = 'dipam@aruja.sp.gov.br';                     // SMTP username
// $mail->CharSet = 'utf-8';
// $mail->Password   = 'Ipm@Mrx2021';                               // SMTP password
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
// $mail->Port       = 587;


// $mail->Subject    = "Aprovado para Entrevista - $vaga.";
// $mail->From       = "dipam@aruja.sp.gov.br";
// $mail->FromName   = "Prefeitura do Municipio de Arujá";


$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = 'smtp.sparkpostmail.com';                    // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'SMTP_Injection';                     // SMTP username
$mail->CharSet = 'utf-8';
$mail->Password   = '8e453e858c421d4504c02c2702b4085e3cfee6b4';                               // SMTP password

$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;


$mail->Subject    = "TESTE DE E-MAIL .";
$mail->From       = "noreply@prefeituradearuja.sp.gov.br";
$mail->FromName   = "Prefeitura do Municipio de Arujá";







//Corpo da Mensagem

$mensagem = 'teste';

$mail->Body = $mensagem;
// $email = 'viniciuslimax10@gmail.com';

// //Corpo da mensagem em texto
$mail->AltBody = 'conteudo do E-mail em texto';
$mail->addAddress('viniciuslimax10@gmail.com');     // Add a recipient
// Content
$mail->isHTML(true);

$mail->send();

print_r($mail);
