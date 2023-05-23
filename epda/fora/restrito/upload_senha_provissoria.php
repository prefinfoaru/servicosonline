<?php
session_start();
header("Content-type: text/html; charset=utf-8");

include 'conexao.php';
	
//recebimento de variavel 
$usuario = $_POST['usuario'];
$data = date ("dmHi");	
$data2 = date ("Y-m-d H:i");
$assunto = "Senha Provisória, SGDR";

//verificação se usuario consta na base de dados.
$texto = "Conforme sua solicitação foi gerado uma senha provisória, para acesso ao Sistema de Gerenciamento de Documentos entre a Educação e RH, após o acesso cadastrar uma nova senha.";
$result_usuario = "SELECT id_cad_user,cpf, nome, email, senha, cpf FROM tb_sol_hr.bd_cadastro_de_usuarios WHERE cpf='$usuario' LIMIT 1";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

$row_usuario['cpf'] ;

if($row_usuario['cpf'] != $usuario) {
	
	
	$_SESSION['msg'] = " * CPF não encontrado.";
	header("Location: esqueciminhasenha.php");
 
}

else {


$options = [
    'cost' => 12,
];
$hash = password_hash("$data", PASSWORD_BCRYPT, $options);

//se o usuario for igual ao que consta no banco de dados e encaminhado um email com um senha procisoria 
// envio de email atraves do phpmailer
$email = $row_usuario['email'];	
	
	

	
require 'PHPMailer/PHPMailerAutoload.php';
	
			$mail = new PHPMailer();
			
			$mail->IsSMTP(); // Será utilizado o SMTP  
			$mail->SetLanguage("br");
			$mail->set("Content-type","text/html");
			$mail->CharSet 	  = "utf-8";
			$mail->Host       = "10.1.1.20:25"; //ssl://smtp.gmail.com:465";
		    $mail->IsHTML(true);   
			//Configuração de HOST do SMTP   
        	$mail->Username   = "nfe@prefeituradearuja.sp.gov.br"; //Usuário para autenticação do SMTP
            $mail->Password   = "123";
            $mail->Subject    = "$assunto";
            $mail->From       = "nfe@prefeituradearuja.sp.gov.br";
	        $mail->FromName   = "Prefeitura do Município de Arujá";	
			
			//Corpo da Mensagem
			$mensagem = "Senhor(ª) Usuário, <br><br>";
			$mensagem .= "<b>".$row_usuario['nome']."</b><br><br>";
			$mensagem .= "".$texto."<br><br>";
	        $mensagem .= "login: ".$usuario."<br>";
			$mensagem .= "Senha provisória: ".$data."<br><hr>";
	        $mensagem .= "Atenciosamente.<br>";
			$mensagem .= "Centro de Desenvolvimento de Sistemas - CDS <br>";
			$mensagem .= "Prefeitura do Município de Arujá";
			
			$mail->Body = $mensagem;
			//Corpo da mensagem em texto
			$mail->AltBody = 'conteudo do E-mail em texto';
			//Destinatario 
			$mail->AddAddress($email);
			//copia oculta
			//$mail->AddBcc($emailco);
			//$mail->AddBcc($emailco2);
			if($mail->Send()){
				echo "E-mail enviado com sucesso";
			}else{
				echo "Erro no envio do e-mail: " . $mail->ErrorInfo;
			}
			//Fim Enviar e-mail
			if(mysqli_affected_rows($conn) != 0){
			
			$update_cad = $update_cad = "UPDATE `bd_sol_hr`.`tb_cadastro_de_usuarios` SET `senha`='$hash', `data_cadastro`='$data2' WHERE `cpf`='$row_usuario[cpf]';";
 			$update_cadastro = mysqli_query($conn, $update_cad);	
				
			echo 
				$_SESSION['msg'] = "Caro(a),"." "."$row_usuario[nome]".", foi enviado um email para "."$row_usuario[email]"." com uma senha provissória.";
	header("Location: esqueciminhasenha.php");
			
			}else{
			
			echo $_SESSION['msg'] = " * email de não enviado.";
				header("Location: esqueciminhasenha.php");
			}
	}

?>