<?php
session_start();

//Incluir a conexão com o BD
include_once("conexao.php");

//Receber os dados do formulário
$cpf = addslashes($_POST['cpf_agendamento']);

 
//Validação dos campos
if(empty(addslashes($_POST['cpf_agendamento']))){
	$_SESSION['msg'] = "<div class='alert alert-warning'>Digite Seu CPF para buscar</div>";
	 
}else{
	//Busca no Banco
	///Verificação Se já possui um agendamento Com esse CPD
	$result_data = "SELECT * FROM agendamentos WHERE cpf = '$cpf' AND status_agenda ='0' ORDER BY data_agenda DESC LIMIT 1";
	$resultado_data = mysqli_query($conn, $result_data);
	if(mysqli_num_rows($resultado_data)>0)
	{
		$vdata=mysqli_fetch_array($resultado_data);
		$status=$vdata['status_agenda'];
		if($status == 0)
		{
			$_SESSION['msg'] = "<div class='alert alert-success'><a href='criarpdf.php?pdf=".$cpf."' target='_blank'> Clique aqui para Imprimir a confirmação do seu Agendamento</a></div>";
			echo '<script type="text/javascript">' . "\n";
			echo 'window.location="consulta.php";';
			echo '</script>';
		}
		else
		{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Você não possui nenhum agendamento</div>";
			echo '<script type="text/javascript">' . "\n";
			echo 'window.location="consulta.php";';
			echo '</script>';
		}
	}
	else
	{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Você não possui nenhum agendamento</div>";
		echo '<script type="text/javascript">' . "\n";
		echo 'window.location="consulta.php";';
		echo '</script>';
	}
	
	

	
}





?>