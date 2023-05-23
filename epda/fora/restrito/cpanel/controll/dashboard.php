<?php

include "../includes/variaveissessao.php";


?>

<meta charset="utf-8"><br>
<!-- Resources -->

<strong style="color: #4C4C4C">SOLICITAÇÕES RECEBIDAS PARA MOVIMENTAÇÃO DO MÊS </strong><br>





<table class="table table-striped ; table-bordered" style="margin-left: -50px" id="myList">
	<thead id="menu">
		<tr style="font-size: 13px">
			<!--  <th style="text-align: center;">Id</th> -->
			<th style="text-align: center;">Solicitante</th>
			<th style="text-align: center;">Data Solicitada</th>
			<th style="text-align: center;">Data da Solicitação</th>
			<th style="text-align: center;">Departamento</th>
			<th style="text-align: center;">Status</th>
			<th style="text-align: center;">Ações</th>





		</tr>
	</thead>
	<tbody style="font-size: 12px;">
		<?php

		include 'conexao.php';



		$pdo  = Banco::conectar();
		// $sql  = "SELECT *FROM bd_sol_hr.tb_solicitacao where tb_situacao = '1' and tb_secretaria_funcionario = '$_SESSION[secretaria]'  order by tb_data_solicitacao limit  10";
		$sql  = "SELECT *FROM bd_sol_hr.tb_solicitacao where tb_situacao = '1' order by tb_data_solicitacao";
		$sql2 = "SELECT * FROM bd_sol_hr.tb_situacao_solicitacao";
		$sql3 = "SELECT * FROM bd_sol_hr.tb_departamento";
		$sql4 = "SELECT * FROM bd_sol_hr.tb_cadastro_de_usuarios;";
		$sql5 = "SELECT count(*) as qsolicitacao FROM bd_sol_hr.tb_solicitacao ;	";
		$sql6 = "SELECT sum(cast(replace(tb_hr_solicitada, ',','.') as decimal(8,1))) as soma FROM bd_sol_hr.tb_solicitacao  where tb_secretaria_funcionario = '$_SESSION[secretaria]' and tb_situacao = '2';";
		$sql7 = "SELECT * FROM bd_sol_hr.tb_saldo_sec";
		$sql8 = "SELECT sum(cast(replace(tb_hr_solicitada, ',','.') as decimal(8,1))) as soma FROM bd_sol_hr.tb_solicitacao  where tb_secretaria_funcionario = '$_SESSION[secretaria]' and tb_situacao = '3';";



		foreach ($pdo->query($sql7) as $row7) {

			$valorSaldo = $row7[saldo_utilizador];
		}

		foreach ($pdo->query($sql6) as $row6) {

			$disponivelHR =  $row6['soma'];
		}

		foreach ($pdo->query($sql8) as $row8) {

			$disponivelHRn =  $row8['soma'];
		}

		foreach ($pdo->query($sql) as $row) {
			$departamento = $row['tb_departamento_funcionario'];
			foreach ($pdo->query($sql2) as $row2) {
				if ($row['tb_situacao'] == $row2['id_situacao']) {

					$row['situacao'] = $row2['descricao'];
				}
			}

			foreach ($pdo->query($sql3) as $row3) {
				if ($row['tb_id_cod_dep'] == $row3['tb_iddep']) {
				}
			}

			try {

				$Conexao    = Conexao::getConnection();
				$query      = $Conexao->query("SELECT TOP (1000) [Nome]
      ,[Matricula]
      ,[SalarioBase]
      ,[Secretaria]
      ,[Departamento]
      ,[CPF]
      ,[CargoReferencia]
      ,[VinculoEmpregaticio]
  FROM [ARUJADB].[dbo].[vwHoraExtra] where Matricula = $row[tb_id_funcionario]");
				$produtos   = $query->fetchAll();
			} catch (Exception $e) {

				echo $e->getMessage();
				exit;
			}

			foreach ($produtos as $user) :
				$user['Nome'];


			endforeach;

			foreach ($pdo->query($sql4) as $row4) {
				if ($row['tb_id_funcionario'] == $row4['tb_id_funcionario']) {

					$nome = $row4['nome'];
				}
			}

			$datamanipulada = $row['tb_data_solicitacao'];
			$dadosProtocolo = $row['numprotocolo'];
			$_SESSION[$dadosProtocolo];
			echo '<td style="text-align: left;">'									. $user['Nome'] 					 . '</td>';
			echo '<td style="text-align: center;">'									. date('d/m/Y', strtotime($row['tb_data_status']))						 . '</td>';
			echo '<td style="text-align: center;">'									. date('d/m/Y H:i', strtotime($row['tb_data_solicitacao']))						 . '</td>';

			echo '<td style="text-align: center;">'									. $departamento								 . '</td>';



			echo '<td style="text-align: center;">'									. $row['situacao']								 . '</td>';

			echo "<td align='center'>";

			echo " <a href='?p=dados&?id=$row[tb_numprotocolo]'> " . "
	
	
		 <img src='../img/Open-icon.png'  width=18px' height='18px' title='Abrir'>" . '</a>' .

				//	 "<img src='../img/divisor.png'  width=1px' height='18px'>"."&nbsp;&nbsp;" .
				//"<img src='../img/setamovimenta.png'  width=18px' height='18px'>".

				"</td>";

			echo '<tr>';
		}



		?>

		<!--SEGUNDA TABELA  -->
		<div><br>
</table><br>

<strong style="color: #4C4C4C">CONTROLE DE HORAS DISPONÍVEIS </strong><br><br>

<table class="table table-striped ; table-bordered" style="margin-left: -50px ; width: auto ; position:static; " id="myList">
	<thead id="menu">
		<tr style="font-size: 13px">
			<!--  <th style="text-align: center;">Id</th> -->
			<th style="text-align: center; background:#FBFFDD;">HRS PARA SETOR</th>
			<th style="text-align: center ;background:#FBFFDD; ">HRS DISPONÍVEIS</th>
			<th style="text-align: center; background:#FBFFDD;">HRS LIBERADAS</th>
			<th style="text-align: center;background:#FBFFDD;">HRS NEGADAS</th>




		</tr>
	</thead>

	<tbody style="font-size: 12px;">


		<?php
		//condição carrega zero no valor caso n]ao tenha dados;

		if ($disponivelHR <= 0 || "") {

			$disponivelHR = "Não existem horas Liberadas";
		};

		if ($disponivelHRn <= 0 || "") {

			$disponivelHRn = "Não existem horas Negada";
		};
		?>

		<td align="center"><?php echo  $valorSaldo ?></td>
		<td align="center"><?php echo  $valorSaldo - $row6[soma]  ?></td>
		<td align="center"><?php echo $disponivelHR ?></td>
		<td align="center"><?php echo $disponivelHRn ?></td>

		</<tbody>