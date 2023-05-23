<?php 
session_start();

$nome			=		utf8_decode($_POST['Nome']);
$nome = addslashes($nome);
$cpf			=		$_POST['cpf']						;
$pis			=		$_POST['pis']						;
$dtnasc			=		$_POST['dtnasc']					;
$sexo			=		utf8_decode($_POST['sexo'])			;
$estado_civil	=		utf8_decode($_POST['Estado_Civil'])	;
if(isset($_POST['NomeUsual'])){
	$nome_usual	=		utf8_decode($_POST['NomeUsual'])	;
}else{
	$nome_usual	 			= 	'';
}
$cel			=		$_POST['cel']						;
$tel			=		$_POST['tel']						;
$cep			=		$_POST['cep']						;
$rua			=		utf8_decode($_POST['rua'])			;
$numero			=		$_POST['numero']					;
if(isset($_POST['complemento'])){
	$complemento	=		utf8_decode($_POST['complemento'])	;
}else{
	$complemento	 			= 	'';
}
$bairro			=		utf8_decode($_POST['bairro'])		;
$cidade			=		utf8_decode($_POST['cidade'])		;
$estado			=		utf8_decode($_POST['estado'])		;
$habilitado		=		utf8_decode($_POST['habilitado'])	;
// $categoria		=		$_POST['categoria']					;
if(isset($_POST['categoria'])){
	$categoria	=		utf8_decode($_POST['categoria'])	;
}else{
	$categoria	 			= 	'';
}
$veiculo		=		utf8_decode($_POST['veiculo'])		;
$viagem			=		utf8_decode($_POST['viagem'])		;
$mudar			=		utf8_decode($_POST['mudar'])		;
$email			=		utf8_decode($_POST['email'])		;
$senha			=		$_POST['password'];
$data			=		date("Y-m-d H:i:s");


$rua_b = $valor_recebido	= str_replace("'" ,"", $rua);

$cpf_s_p = $valor_recebido	= str_replace("." ,"", $cpf);
$cpf_s_t = $valor_recebido	= str_replace("-" ,"", $cpf_s_p);
$cpf_s_b = $valor_recebido	= str_replace("/" ,"", $cpf_s_t);

$outrosCont		=		utf8_decode($_POST['outrosCont'])	;

if($categoria == ''){
	
	$categoria = utf8_decode('não possui');
}
if($tel == ''){
	
	$tel = utf8_decode('Usuário não informou');
}

//criptografia da senha em php 5 hash

$options = [
'cost' => 12,
];
$hash = password_hash("$senha", PASSWORD_BCRYPT, $options);

include("../conexao.php");

 $sql = mysqli_query($conn, "SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante WHERE Email = '{$email}'") or print mysql_error();
 
    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($sql)>0){ 
		
        header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_usuario.php?res=3');
    	exit;
		
	}else{
	
	$inserir_dados_cad	=	"INSERT INTO `bd_emprega_aruja`.`tb_cadastro_solicitante` (`nome`, `cpf`, `pis`, `dtnasc`, `email`, `sexo`, `nome_usual`, `celular`, `telefone`, `estado_civil`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `numero`, `complemento`, `habilitado`, `tipo_habilitacao`, `veiculo_proprio`, `disponibilidade_viajar`, `disponibilidade_mudar`, `senha_acesso`, `ativo`, `data_cadastro`, `outros_contatos`)
 	VALUES ('$nome', '$cpf_s_b', '$pis', '$dtnasc', '$email', '$sexo', '$nome_usual', '$cel', '$tel', '$estado_civil', '$cep', '$rua_b', '$bairro', '$cidade', '$estado', '$numero', '$complemento', '$habilitado', '$categoria', '$veiculo', '$viagem', '$mudar', '$hash', '1', '$data', '$outrosCont') ";

	
	$resultado_insert_dados = mysqli_query($conn, $inserir_dados_cad);

	if(mysqli_insert_id($conn)){ //sucesso
	
	header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv.php?cod='.$cpf.'&res=1');
		
	}else{
		
	header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_usuario.php?res=2');
		
	}

}