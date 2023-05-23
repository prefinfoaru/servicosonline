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

///input dos dados  *****************************************************************************************************

    $insert = "INSERT INTO `bd_epda`.`tb_requerimento` (`solicitante`, `rg`, `cpf`, `email`, `tel_fixo`, `tel_cel`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `complemento`, `assunto`, `descricacao`, `fins`, `obs`, `dt_cadastro`, `protocolo`, `status`) VALUES ('$solicitante', '$rg', '$cpf', '$email', '$telefone', '$cel', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$complemento', '$assunto', '$descricao', '$pfs', '$obs', '$dt_cadastro', '$protocolo', 'Enviado')";
	
     $resultado_insert = mysqli_query($conn, $insert);

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
    
    
    
  
    
?>

