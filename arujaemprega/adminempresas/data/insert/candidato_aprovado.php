<?php
session_start();



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../../PHPMailer/vendor/autoload.php';


include('../banco.php');
$pdo = Banco::conectar();

$id_vaga      =   $_POST['id_vaga'];
$id_soli      =   $_POST['id_soli'];
$data         =   $_POST['data'];
$data_formatada = date('d/m/Y', strtotime($data));
$horario      =   $_POST['horario'];
@$end_empresa   =   $_POST['end_empresa'];
@$pat         =   $_POST['pat'];
@$digitar_end   =   $_POST['digitar_end'];
$entrevistador   =   $_POST['entrevistador'];
$observacoes   =   $_POST['observacoes'];
$dataAprovacao = date('Y-m-d H:i:s');

if ($end_empresa != '') {
   $endereco = $end_empresa;
}
if ($pat       != '') {
   $endereco = $pat;
}
if ($digitar_end != '') {
   $endereco = $digitar_end;
}


$infocand = "SELECT nome,email FROM bd_emprega_aruja.tb_cadastro_solicitante where id_solicitante = '$id_soli'";

foreach ($pdo->query($infocand) as $row) {
   $nome = $row['nome'];
   $email = $row['email'];
}

$infovaga = "SELECT titulo FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga = '$id_vaga' ";

foreach ($pdo->query($infovaga) as $row_vaga) {
   $vaga = $row_vaga['titulo'];
}

$selectCand  =  "SELECT * FROM bd_emprega_aruja.tb_candidato_aprovado where id_solicitante = $id_soli and id_vaga = '$id_vaga'";
$resultSelectCand = $pdo->query($selectCand);
$teste = $resultSelectCand->rowCount();


if ($resultSelectCand->rowCount() > 0) {
   header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosCandidatos&id=' . $id_vaga . '&res=5');
} else {

   $insert_cand =  "INSERT INTO `bd_emprega_aruja`.`tb_candidato_aprovado` (`id_vaga`, `id_solicitante`, `data`, `hora`, `local`, `entrevistador`, `observacoes`, `data_aprovacao`) VALUES ('$id_vaga', '$id_soli', '$data', '$horario', '$endereco', '$entrevistador', '$observacoes', '$dataAprovacao') ";


   $result_insert_cand = $pdo->query($insert_cand);
   if ($result_insert_cand) {

      $status_candidatoUP = "UPDATE `bd_emprega_aruja`.`tb_candidatura_vaga` SET `status_candidatura`='1' WHERE `id_vaga`='$id_vaga' and id_solicitante = '$id_soli';";

      $result_statusUP = $pdo->query($status_candidatoUP);


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


      $mail->Subject    = "Aprovado para Entrevista - $vaga.";
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
          Convocação para entrevista</b><hr>

          </td>
          </tr>
          <tr>
          <td style="padding: 10px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">

          <p style="font-size: 13px">Prezado ';

      $mensagem .= $nome;  // nome do solicitante

      $mensagem .= ' , você foi Aprovado na seguinte vaga:<strong>' . $vaga . '</strong> e deverá comparecer para entrevista no local e horário marcados abaixo.</p><hr>
                                  <p style="font-size: 10px">Data: ' . $data_formatada . ' /  Horário: ' . $horario . '</br>
                                  Endereço: ' . $endereco . '</br>
                                  Entrevistador: ' . $entrevistador . '</br>
                                  Observações: ' . $observacoes . ' </p><hr>';

      $mensagem .=
         '<p style="font-size: 10px"><i>Você poderá visualizar essas informações na sua lista de candidaturas.</i></p>
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

      if ($mail->Send()) {

         header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosCandidatos&id=' . $id_vaga . '&res=1');
      } else {

         header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosCandidatos&id=' . $id_vaga . '&res=2');
      }
   } else {

      header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=dadosCandidatos&id=' . $id_vaga . '&res=2');
   }
}