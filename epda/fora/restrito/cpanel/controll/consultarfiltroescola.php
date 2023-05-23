
				<!DOCTYPE html>
				<!--**************************************************************************************************************************************************************-->
				<!--Autor: Lincoln Lacerda de Carvalho ***************************************************************************************************************************-->
				<!--**************************************************************************************************************************************************************-->
				<html lang="pt-br">
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
				<meta Http-Equiv="Cache-Control" Content="no-cache">    
				<meta Http-Equiv="Pragma" Content="no-cache">    
				<meta Http-Equiv="Expires" Content="0">
				<head>
				<link rel="shortcut icon" type="image/x-icon" href="../../../../../../../PMARUJAWEB/inetpub/wwwroot/favicon/favicon.ico">
				<link href="../../../../../../../PMARUJAWEB/inetpub/wwwroot/cadcestas/restritokit/css/bootstrap.min.css" rel="stylesheet">
				<link href="../../../../../../../PMARUJAWEB/inetpub/wwwroot/cadcestas/restritokit/css/style.css" rel="stylesheet">
				<!-- <script src="js/bootstrap.min.js"></script>-->
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- <script  name="Refresh" src="js/alerta.js" charset="utf-8" ></script> -->

				</head>
				<body>

				<?php
				session_start();
				include_once('../../../../../../../PMARUJAWEB/inetpub/wwwroot/cadcestas/restritokit/conexao.php');	   


				$usuario_login = $_SESSION['nome'];
				//$sql2 = 'SELECT count(*) FROM atualizaiptu.cadastro where email_retorno is null ';
				if ($usuario_login == "") {

				header("Location:../restrito/index.php");	


				} 
				include '../../../../../../../PMARUJAWEB/inetpub/wwwroot/cadcestas/restritokit/banco.php';
				$date_con = date('Y-m-d');
					
                $contador = "SELECT count(*) as quant FROM bd_kiteducacao.tb_cadastro ;";
				$escola = "SELECT distinct escola FROM bd_kiteducacao.tb_dependetes where escola != 'Não Cadastrado' order by escola;";	
					
				$pdo = Banco::conectar();
				?>
				<form action="" method="post">
				<div class="jumbotron">
				<div class="container">
				<div class="row" id ="titulo1" >
				Cadastro Emergencial de Assistência à Alimentação
				</div><br>

			<label class="w3-text-blue"><b>Consultar por Escolas.</b></label>
		<select class="w3-input w3-border" required id="Escola" name="escola" class="form-control">
		<option value="Não Cadastrado">Escolha uma Escola abaixo</option>
		<?php 



 
 
 		
 foreach($pdo->query($escola)as $row_escola)
{ ?>

  	  <option value="<?php  echo $row_escola['escola'];?>"><?php echo utf8_decode($row_escola['escola']);?>
	</option> <?php

  }
	?>

		

		</select></p>
			
			
				<button type="btn" class="btn btn-success">Buscar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="http://prefeituradearuja.sp.gov.br/cadcestas/restritokit/acesso/index.php" button type="btn" class="btn btn-warning">voltar</a></button>
				<a href="../../../../../../../PMARUJAWEB/inetpub/wwwroot/cadcestas/restritokit/sair.php" button type="btn" class="btn btn-danger">Fechar</a></button></form>
				
				
				
				<!--   <a href="relatorio.php" button type="btn" class="btn btn-success">Relat&oacute;rio Baixa</a></button> -->
				<!--  <a href="relatoriogeralidtnconfirmado.php" button type="btn" class="btn btn-default">Relatório IDT não Confirmado</a></button>-->
				<!--  <a href="relatoriogeral.php" button type="btn" class="btn btn-warning">Relatório Geral</a></button> -->

				<!--    <a href="relatoriogeralidtnconfirmado.php" button type="btn" class="btn btn-primary" >Cadastro de Depósito não Indentificados</a></button>  
				<a href="../geracaotxt/gerador_baixa.php" button type="btn" class="btn btn-success" >Gerar Arquivo Baixa</a></button> 
				<a href="conf_user.php" button type="btn" class="btn btn-warning" >Configurações</a></button>    
				<strong id="usuario_st">Usuário :&nbsp; <?php echo $usuario_login; ?>  </strong><br>

				</br>
				<img src='../geracaotxt/img/amarelo.png' width='12px' height='12px'><strong style="font-size: 10px">AGUARDANDO CONCILIAÇÃO</strong>&nbsp;&nbsp;&nbsp;&nbsp;
				<img src='../geracaotxt/img/verde.png' width='12px' height='12px'>  <strong style="font-size: 10px">DISPÓNIVEL PARA GERAÇÃO DO ARQUIVO TXT.</strong>
				<div class="row"> -->


				<!-- <a href="create.php" class="btn btn-success">Adicionar</a> -->
				</p>
                <b style="font-size: 12px;">Quantidade Total de Cadastros: <?php foreach($pdo->query($contador)as $row){  
				echo $valorQuant = $row['quant'];
			} ?> </b>
			 
				<!--Tabela de menu Superior da Página****************************************************************************************************************-->             
				<table class="table table-striped table-bordered"  style="margin-left: -50px" >
				<thead id="menu">
				<tr style="font-size: 13px">
				<!--  <th style="text-align: center;">Id</th> -->
				<th style="text-align: center;">Solicitante</th>
				<th style="text-align: center;">Telefone</th>
				<th style="text-align: center;">Celular</th> 
								
				<th style="text-align: center;">Data Cadastro</th>
							
				<th style="text-align: center;">Dados</th>
				<th style="text-align: center;">Situação</th>
				


				</tr>
				</thead>
				<tbody style="font-size: 12px;"> 

				<!--Final************************************************************************************************************************************--> 

				<!--TSeleção de Dados Banco de Dados*****************************************************************************************************************************-->                                                    
				<?php
				

				$filtro = $_POST['escola'];
			
				
				
							

				
					
              
					$sql = "SELECT distinct id_cadastro, nome_mae, tel, cel, data_cadastro, analise FROM bd_kiteducacao.tb_cadastro AS a INNER JOIN bd_kiteducacao.tb_dependetes AS b ON a.cpf = b.cpf_da_resp 
where a.cpf = b.cpf_da_resp and b.escola ='$filtro' group by b.nome ";
				

				foreach($pdo->query($sql)as $row)
				{   echo '<tr >';
				// echo '<td style="text-align: center;">'					. $row['id'] 			 . '</td>';
				echo utf8_decode('<td td style="text-align: ;">'																. $row['nome_mae'] 			 . '</td>');

				echo '<td style="text-align: center;">'									. $row['tel'] 		 . '</td>';
				echo '<td style="text-align: center;">'									. $row['cel']		 . '</td>';
				
				echo '<td td style="text-align: center;">'																. $row['data_cadastro'] . '</td>';
				 


				echo '<td style="text-align: center;">';
				    echo '<a  href="read2.php?id='											.$row['id_cadastro'].'">Acessar</a>';
				echo '</td>';

                echo '<td style="text-align: center;">'									. $row['analise']   . '</td>';
				echo '<tr>';
				}

				Banco::desconectar();
				?>
				<!--Tabela de menu Superior da Página*****************************************************************************************************************************--> 
				</tbody>
				</table><i id="Texto_baixa">(*Essa Consulta dados cadastrados.)</i>
				<!--Paginação de Pagina*****************************************************************************************************************************-->                                      <!--  <h5 align="center">Devido a Segurança de dados os sistema é fechado automaticamente</h5> -->
				<!--   <BODY onload=startCountdown()> -->
				<FONT face=verdana color=#1e90ff size=4><B>
				<DIV id=numberCountdown align=center></DIV></FONT>
				<table class="table table-striped table-bordered">
				<tbody style="font-size: 10px;">
				</tbody>    
				</table> 
				</div>
				</div>
				</div> 

				<!-- Modal -->


				</body>
				</html>
