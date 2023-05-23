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

$id = $_POST['id'];

$select_infoempresa    =    "SELECT * FROM bd_emprega_aruja.tb_reservasala where id_reservasala = '$id'  ";

foreach ($pdo->query($select_infoempresa) as $row) {
    $id_empresa     = $row['id_empresa'];
    $data_agenda     = $row['data_agenda'];
    $horario_inicio = $row['horario_inicio'];
    $horario_fim     = $row['horario_fim'];
    $responsavel     = $row['responsavel'];
}

$data = date('d/m/Y', strtotime($data_agenda));

$select_empresa    =    "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where id_cadastroempresa = '$id_empresa'  ";

foreach ($pdo->query($select_empresa) as $row_empresa) {
    $email = $row_empresa['email'];
}

$Atualiza = "UPDATE `bd_emprega_aruja`.`tb_reservasala` SET `status`='1', `color`='#1C1C1C' WHERE `id_reservasala`='$id'";

$resultado_atualiza = mysqli_query($conn, $Atualiza);

if ($resultado_atualiza) {

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


    $mail->Subject    = "Solicitação da Sala de Entrevista.";
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
 Solicitação da Sala de Entrevista </b><hr>
     
 </td>
 </tr>
 <tr>
 <td style="padding: 10px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
 
 <p style="font-size: 13px"> ';

    $mensagem .= '<br> Sua solicitação da sala de entrevista foi aprovada. <br> Para mais detalhes acesse o portal do Arujá Emprega e verifique em Sala de Entrevista.</p><hr>
 
 <p style="font-size: 10px">
 Data: ' . $data . '</br>
 Horário de Início: ' . $horario_inicio . '</br>
 Horário de Finalização: ' . $horario_fim . '</br>
 Responsável: ' . $responsavel . ' </p><hr>';

    $mensagem .=
        '<a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/login.php">Efetuar Login</a>';

    $mensagem .= '  <p style="font-size: 10px"><i>Ao clicar em efetuar login, você será redirecionado a uma pagina onde poderá efetua-lo</i></p>
 </td>
 </tr>
 <tr>
 
 </tr>
 </table>
 </td>
 </tr>
 </table>
 </td>
 </tr>
 <tr>
 <td align="center" bgcolor="#005690" style="padding: 10px 0 10px 0; background-color:#005690">
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr>
 <td width="75%" style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" align="center">
 <img src="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/imagens/logotipo_jobs2.png" width="20%" style="display: block;"/>
 </td>
 </td>
 </tr>
     </table>
 </body>
 </html>';

    $mail->Body = $mensagem;

    // //Corpo da mensagem em texto
    $mail->AltBody = 'conteudo do E-mail em texto';
    $mail->addAddress($email);     // Add a recipient
    // Content
    $mail->isHTML(true);

    $mail->send();
    // print_r($mail);

    if ($mail->Send()) {

        echo     "<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=solicitacaosalaentre&aprova=1'</script>";

        exit();
    }
} else {

    echo     "<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=solicitacaosalaentre&aprova=0'</script>";
    exit();
}




?>