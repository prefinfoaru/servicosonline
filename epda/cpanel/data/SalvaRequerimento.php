<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!DOCTYPE html>

<meta charset="utf-8">      
<body>
<?php
//include "../controll/conexao.php" ;
include "../controll/banco.php" ;



//variaveis do requerimento ********************************************************************************************
$solicitante    = utf8_decode($_POST['nome']) ;
$rg             = $_POST['rg'] ;
$cpf            = $_POST['cpf'] ;
$email          = $_POST['email'] ;
$telefone       = $_POST['tel'] ;
$cel            = $_POST['cel'] ;
$cep            = $_POST['cep'] ;
$rua            = $_POST['rua'] ;
$numero         = $_POST['numero'] ;
$bairro         = utf8_decode($_POST['bairro']) ;
$cidade         = utf8_decode($_POST['cidade']) ;
$estado         = $_POST['estado'] ;
$complemento    = utf8_decode($_POST['complemento']) ;
$assunto        = utf8_decode($_POST['assunto'] );
$descricao      = utf8_decode($_POST['descricao'])    ;
$pfs            = utf8_decode($_POST['pfs'] );
$obs            = $_POST['notificacao'] ;
$dt_cadastro    = date("Y-m-d H:i:s"); ;
$protocolo      = $_POST['numeroprotocolo'] ;
    
/** dados para email ****************************************************************************************************/
    $assunto = 'Cadastro de Requerimento EPDA PMA';
    $texto_cor = "Recebemos o seu requerimento de nº $protocolo, o mesmo aguarda análise de nossa mesa jugadora. acompanhe o status via sistema";

///input dos dados  *****************************************************************************************************

    $insert = "INSERT INTO `bd_epda`.`tb_requerimento` (`solicitante`, `rg`, `cpf`, `email`, `tel_fixo`, `tel_cel`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `complemento`, `assunto`, `descricacao`, `fins`, `obs`, `dt_cadastro`, `protocolo`, `status`) VALUES ('$solicitante', '$rg', '$cpf', '$email', '$telefone', '$cel', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$complemento', '$assunto', '$descricao', '$pfs', '$obs', '$dt_cadastro', '$protocolo', 'Enviado')";
	
     $resultado_insert = mysqli_query($conn, $insert);
    
/*********************************/
    
    require '../../PHPMailer/PHPMailerAutoload.php';
	
			$mail = new PHPMailer();
			
			$mail->IsSMTP(); // Será utilizado o SMTP  
			$mail->SetLanguage("br");
			$mail->set("Content-type","text/html");
			$mail->CharSet 	  = "iso-8859-1";
			$mail->Host       = "10.1.1.20:25"; //ssl://smtp.gmail.com:465";
		    $mail->IsHTML(true);   
			//Configuração de HOST do SMTP   
        	$mail->Username   = "nfe@prefeituradearuja.sp.gov.br"; //Usuário para autenticação do SMTP
            $mail->Password   = "123";
            $mail->Subject    = "$assunto";
            $mail->From       = "nfe@prefeituradearuja.sp.gov.br";
	        $mail->FromName   = "Prefeitura do Município de Arujá";	
			
			//Corpo da Mensagem
			$mensagem = "Senhor(ª) Contribuinte, <br><br>";
			$mensagem .= "<b>".$solicitante."</b><br><br>";
			$mensagem .= "".$texto_cor."<br><br>";
			
	        $mensagem .= "Atenciosamente.<br>";
			$mensagem .= "Departamento Financeiro <br>";
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
			echo '<script language="javascript">';
        echo 'swal ({
  title: "Cadastro Efetuado com Sucesso!",
  text: "Acompanhe sua solicitação atráves do Dashboard disponível na primeira pagina do Sistema Epda",
  icon: "success",
 buttons:"ok",
  }).then(function(result) {
    if (result) {
     window.location="http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpanel/index.php"
    } 
    
});';
  
echo '</script>';	
			
			}
	

    
    

  
    
    
    
  
    
?>

