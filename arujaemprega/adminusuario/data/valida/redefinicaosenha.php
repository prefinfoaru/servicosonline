<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../../PHPMailer/vendor/autoload.php';

include("../conexao.php");
include("../banco.php");

$cpfTratado = $_POST['cpf'];
$cpf_s_p = $valor_recebido	= str_replace(".", "", $cpfTratado);
$cpf_s_t = $valor_recebido	= str_replace("-", "", $cpf_s_p);
$cpf_s_b = $valor_recebido	= str_replace("/", "", $cpf_s_t);

$email 		 = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);


$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,
	CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
	CURLOPT_POSTFIELDS => [
		'secret' => '6LeQASYaAAAAAPejpRtUYEgZf5Gz2-I3u92PKFgG',
		'response' => $_POST['g-recaptcha-response'],
		'remoteip' =>   $_SERVER['REMOTE_ADDR']
	]
]);

$response = json_decode(curl_exec($curl));
curl_close($curl);

if (!$response->success) {

	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Captcha Incorreto.</div>";
	echo "<script>window.location.href ='../../pages/redefinirsenha.php';</script>";
	exit();
} else {

	if (!empty($cpf_s_b) || !empty($email)) {

		$consulta = "SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where cpf = '$cpf_s_b';";

		$resultado_consulta = mysqli_query($conn, $consulta);

		if ($resultado_consulta) {

			$row_dados = mysqli_fetch_assoc($resultado_consulta);
			if ($email === $row_dados['email']) {
				$nome =  $row_dados['nome'];
				$id_solicitante =  $row_dados['id_solicitante'];
				$data =  date("Y-m-d");
				$datam = date("m");
				$ale = rand();
				$protocolo =  $id_solicitante . $ale . $datam;
				$con = "SELECT * FROM bd_emprega_aruja.tb_redefinirsenha_usuario where id_solicitante = '$id_solicitante' and data_solicitacao = '$data'; ";
				$resultado_con = mysqli_query($conn, $con);

				if (mysqli_fetch_assoc($resultado_con) >= '1') {

					echo  "<script>alert('Não é possivel solicitar mais de uma vez no dia!')</script>";
					echo 	"<script>window.location.href ='../../pages/login.php'</script>";
					exit();
				} else {
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

					$mail->Subject    = "Recuperação de Senha - Emprega Arujá.";
					$mail->From       = "noreply@aruja.sp.gov.br";
					$mail->FromName   = "Prefeitura do Municipio de Arujá";

					//Corpo da Mensagem

					$mensagem = '<html>
<head>
<meta https-equiv="Content-Type" content="text/html; et=charsUTF-8"/>
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
Sistema de redefinição de senha </b><hr>
    
</td>
</tr>
<tr>
<td style="padding: 10px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">

<p style="font-size: 13px">Prezado ';

					$mensagem .= $nome;  // nome do solicitante

					$mensagem .= ' , segue abaixo link para redefinição de sua senha. informamos que o link so poderá ser usado uma vez e tem prazo para experiar, devido a proteção de seus dados.</p><hr>
<p>Clique aqui para redefinir sua senha: </p>
<a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/linkredefinirsenha.php?id=' . $protocolo . '">';

					$mensagem .=
						'Redefinir sua senha</a>
    <p style="font-size: 10px"><i>Ao clicar em redefnir sua senha você será redirecionado a uma pagina para informar uma nova senha</i></p>
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

					if ($mail->Send()) {


						$insert = "INSERT INTO `bd_emprega_aruja`.`tb_redefinirsenha_usuario` (`id_solicitante`, `protocolo`, `data_solicitacao`, `status`) VALUES ('$id_solicitante', '$protocolo', '$data', '0');";

						$resultado_consulta = mysqli_query($conn, $insert);

						if ($resultado_consulta) {
							$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>E-mail para redefinição foi enviado com sucesso!<br>Por favor verifique sua caixa de mensagem!</div>";

							echo '<script>window.location.href = "../../pages/login.php";</script>';
						}
					} else {


						$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível enviar o E-mail!</div>";

						echo '<script>window.location.href = "../../pages/login.php";</script>';
					}
				}
			} else {

				echo  "<script>alert('E-mail não cadastrado com esse CPF!')</script>";
				echo 	"<script>window.location.href ='../../pages/login.php'</script>";
				exit();
			} // email não cadastrado no banco

		} else { //não cadastrado no bd
			echo  "<script>alert('Cpf não cadastrado!')</script>";
			echo 	"<script>window.location.href ='../../pages/login.php'</script>";
			exit();
		}
	}
}// se ele não fez solitação no dia de hoje