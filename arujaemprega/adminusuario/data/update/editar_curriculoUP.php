 <?php 
if(isset($_POST['button'])){
	$nome_up 		= utf8_decode($_POST['nome'])		;
	$email_up 		= utf8_decode($_POST['email'])		;
	$tel_up 		= utf8_decode($_POST['tel'])		;
	$cel_up 		= utf8_decode($_POST['celular'])	;
	$civil_up 		= utf8_decode($_POST['civil'])		;
	$cep_up 		= utf8_decode($_POST['cep'])		;
	$rua_up 		= utf8_decode($_POST['rua'])		;
	$numero_up 		= utf8_decode($_POST['numero'])		;
	$complemento_up = utf8_decode($_POST['complemento']);
	$bairro_up 		= utf8_decode($_POST['bairro'])		;
	$cidade_up 		= utf8_decode($_POST['cidade'])		;
	$estado_up 		= utf8_decode($_POST['estado'])		;
	$habilitado_up 	= utf8_decode($_POST['habilitado'])	;
	$categoria_up	= utf8_decode($_POST['categoria'])	;
	$veiculo_up 	= utf8_decode($_POST['veiculo'])	;
	$viajar_up 		= utf8_decode($_POST['viajar'])		;
	$mudar_up 		= utf8_decode($_POST['mudar'])		;

//tratando variável
	utf8_decode($categoria_up);
	
	if($categoria_up == ''){
	
	$categoria_up = utf8_decode('não possui');
	}
	
	$sqlupdateedit = "UPDATE `bd_emprega_aruja`.`tb_cadastro_solicitante` SET `nome`='$nome_up', `email`='$email_up', `celular`='$cel_up', `telefone`='$tel_up', `estado_civil`='$civil_up', `cep`='$cep_up', `rua`='$rua_up', `bairro`='$bairro_up', `cidade`='$cidade_up', `estado`='$estado_up', `numero`='$numero_up', `complemento`='$complemento_up', `habilitado`='$habilitado_up', `tipo_habilitacao`='$categoria_up', `veiculo_proprio`='$veiculo_up', `disponibilidade_viajar`='$viajar_up', `disponibilidade_mudar`='$mudar_up' WHERE `id_solicitante`='$id' ";
	
	 //verifica se conectou com banco
		if(mysqli_query($conn , $sqlupdateedit)){//sucesso
			echo 	"<script>window.location.href ='?p=dadoscadusuarioConsulta&res=1'</script>"; 
			exit();
		}
		
		else {//deu erro
			echo 	"<script>window.location.href ='?p=dadoscadusuarioConsulta&res=2'</script>";
			exit();
		}
	
}
?> 