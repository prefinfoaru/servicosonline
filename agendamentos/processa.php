<?php
session_start();

//Incluir a conexão com o BD
include_once("conexao.php");

//Receber os dados do formulário
$nome = addslashes(utf8_decode($_POST['nome_agendamento']));
$cpf = addslashes($_POST['cpf_agendamento']);
$data = addslashes($_POST['data_agendamento']);
$horario=addslashes($_POST['horario_agendamento']);
$unidade = addslashes(utf8_decode($_POST['unidade_agendamento']));

//Tratando a data
$data=implode('-', array_reverse(explode('/', $data)));



//Validação dos campos
if(empty($nome) || empty($cpf) || empty($data)|| empty($horario)|| empty($unidade)){
	$_SESSION['msg'] = "<div class='alert alert-warning'>Preencha os campos corretamente.</div>";

}else{
	
	/*Verificação Se já possui um agendamento futuro com o CPF - Removido em 12/05/2020 para possibilitar + de uma agendamento por usuario
	$result_data = "SELECT data_agenda,status_agenda FROM agendamentos WHERE cpf = '$cpf' AND unidade_agenda='$unidade' AND status_agenda='0' ORDER BY data_agenda DESC,horario_agenda DESC LIMIT 1";
	
	$resultado_data = mysqli_query($conn, $result_data);
	if(mysqli_num_rows($resultado_data)>0)
	{
		$vdata=mysqli_fetch_array($resultado_data);
		$status=$vdata['status_agenda'];
		if($status == '0')
		{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Você já possui um agendamento para esse tipo de serviço.</div>";
			
		}
		else
		{*/
			///Verifica Se a data e hora Informada realmente está disponivel
			$result_data2 = "SELECT * FROM agendamentos WHERE data_agenda = '$data' AND horario_agenda='$horario' AND unidade_agenda='$unidade' AND status_agenda = '0' ";
			$resultado_data2 = mysqli_query($conn, $result_data2);
			if(mysqli_num_rows($resultado_data2)>0)
			{
				$_SESSION['msg'] = "<div class='alert alert-danger'>Desculpe mas o horario ou data informado já possuí um agendamento.</div>";
			}
			else
			{
				//Salvar no BD
				$insert_data = "INSERT INTO agendamentos(nome, cpf, unidade_agenda,processo_agenda,data_agenda,horario_agenda,status_agenda,compareceu_agenda,comentario_agenda) VALUES ('$nome','$cpf','$unidade','$processo','$data','$horario','0',' ',' ')";
				$resultado_insert = mysqli_query($conn, $insert_data);

				//Verificar se salvou no banco de dados através do "mysqli_insert_id" que verifica se existe o ID do ultimo dado inserido
				if(mysqli_insert_id($conn)){
					$unidade=utf8_encode($unidade);
					$_SESSION['msg'] = $_SESSION['msg'] = "<div class='alert alert-success'><a href='criarpdf.php?pdf=".$cpf."' target='_blank'>Agendamento efetuado com sucesso -- Clique aqui para Imprimir a confirmação(".$data."_".$horario."_".$unidade.")</a></div>";
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao efetuar o agendamento.</div>";
						
				}
			}
		/*Verificação Se já possui um agendamento futuro com o CPF - Removido em 12/05/2020 para possibilitar + de uma agendamento por usuario	
		}
	}
	else
	{
		///Verifica Se a data e hora Informada realmente está disponivel
		$result_data = "SELECT * FROM agendamentos WHERE data_agenda = '$data' AND horario_agenda='$horario'  AND status_agenda = '0'  ";
		$resultado_data = mysqli_query($conn, $result_data);
		if(mysqli_num_rows($resultado_data)>0)
		{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Desculpe mas o horario ou data informado já possuí um agendamento.</div>";
		}
		else
		{
			//Salvar no BD
			$insert_data = "INSERT INTO agendamentos(nome, cpf, unidade_agenda,processo_agenda,data_agenda,horario_agenda) VALUES ('$nome','$cpf','$unidade','$processo','$data','$horario')";
			$resultado_insert = mysqli_query($conn, $insert_data);

			//Verificar se salvou no banco de dados através do "mysqli_insert_id" que verifica se existe o ID do ultimo dado inserido
			if(mysqli_insert_id($conn)){
				$_SESSION['msg'] = $_SESSION['msg'] = "<div class='alert alert-success'><a href='criarpdf.php?pdf=".$cpf."' target='_blank'>Agendamento efetuado com sucesso -- Clique aqui para Imprimir a confirmação(".$data."_".$horario."_".$unidade.")</a></div>";
			}else{
				$_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao efetuar o agendamento.</div>";
					
			}
		}
	}*/
	
	
}




?>