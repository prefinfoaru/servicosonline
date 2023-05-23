		<script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"> </script> <!-- Biblioteca para mensagem de erro personalizada  -->
		<?php
		session_start();
		include "../includes/variaveissessao.php";
		require 'conexao.php';

		$servidor = "10.2.2.55";
		$usuario = "BDSitio_01";
		$senha = "impre@sh_01";
		$dbname = "ged_educ";

		//Criar a conexao
		$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

		//Criar a conexao
		$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

		$URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$numprot = explode('id=',$URL_ATUAL,2);
		$protocolo = $numprot[1];
		$data_movimetacao = date("Y-m-d H:i:s"); 

		$pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT *FROM ged_educ.bd_solicitacao where numprotocolo ='$protocolo'";
		$sql2 = "SELECT * FROM ged_educ.bd_situacao_solicitacao";
		$sql3 = "SELECT * FROM ged_educ.bd_intercorrencia";
		$sql4 = "SELECT * FROM ged_educ.bd_cadastro_de_usuarios;";
		$sql5 = "SELECT * FROM ged_educ.bd_escolas";
		$sql6 = "SELECT count(*) as contador FROM ged_educ.bd_solicitacao where data_recebimento is null and id_usuario_recebimento is null and `numprotocolo`='$protocolo' ";
		$sql7 = "SELECT * FROM ged_educ.bd_nivel where id_nivel = '5' or id_nivel = '6' ";
		$sql8 = "SELECT * FROM ged_educ.bd_movimentacao";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Banco::desconectar();





		foreach($pdo->query($sql6)as $row6){

		if( $row6[contador] != 0 ){

		$insertmovimetacao = "UPDATE `ged_educ`.`bd_solicitacao` SET `data_recebimento`='$data_movimetacao', `id_usuario_recebimento`='$_SESSION[id_cad_user]' WHERE `numprotocolo`='$protocolo';";
		$resultado_movimentacao = mysqli_query($conn, $insertmovimetacao);


		}}

		foreach($pdo->query($sql5)as $row5){
		if ($row5['id'] == $row['id_escola']){
		$escola = $row5['nome'];

		}}


		foreach($pdo->query($sql)as $row){

		foreach($pdo->query($sql2)as $row2){
		if ($row['situacao'] == $row2['id_situacao']){

		$row['situacao'] = $row2['descricao'];	
		}
		}

		foreach($pdo->query($sql3)as $row3){
		if ($row['id_cod_inter'] == $row3['id_inter']){

		$row['id_cod_inter'] = $row3['descricao'];	
		}
		}	

		foreach($pdo->query($sql4)as $row4){
		if ($row['id_solicitante'] == $row4['id_cad_user']){

		$nome = $row4['nome'];
		$email = $row4['email'];
		}
		}

		foreach($pdo->query($sql5)as $row5){
		if ($row5['id'] == $row['id_escola']){
		$escola = $row5['nome'];

		}}
		foreach($pdo->query($sql8)as $row8){


		}}


				
		?>

		<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>  
		<?php echo $idurl; ?>
		<script language="JavaScript">
		$(document).ready(function() {
		$("#enviar").click(function( e ){
		e.preventDefault();

		var width = 550;
		var height = 550;

		var left = 99;
		var top = 99;

		window.open(enviar,'janela', 'width='+width+', height='+height+',top='+top+'left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

		});
		}); </script>
		<meta charset="iso-8859-1">

		<br>
		<table class="table table-bordered">
		<b style="color:#0B5E92; background-color:#F3F1F1">Dados do Funcion&aacute;rio :  </b>
		<tbody>
		<tr>

		<td style="background-color:#587CAD; color: #F3F1F1; ">Nome:</td>
		<td align="left" colspan="2" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $nome ?></td>
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; ">Fun&ccedil;&atilde;o:</td>
		<td align="left" style="background-color:#F3F1F1; color:#4F090A; " ><?php echo $data[funcao];?></td>      
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; ">e-mail:</td>
		<td align="left" style="background-color:#F3F1F1; color:#4F090A; " ><?php echo $email;?></td>

		</tr>
		<tr>

		<td style="background-color:#587CAD; color: #F3F1F1; ">Escola :</td>
		<td colspan="4" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $escola ?> </td>

		<td style="background-color:#587CAD; color: #F3F1F1; ">Data da Intercorr&ecirc;ncia:</td>
		<td style="background-color:#F3F1F1; color:#4F090A; "><?php echo $data[data_intercorrencia];?></td>
		</tr>
		<tr>


		</tr>
		</tbody>
		</table>

		<br><?php echo $dadosProtocolo ?>
		<table class="table table-bordered">
		<b style="color:#0B5E92; background-color:#F3F1F1"> Dados da Solicita&ccedil;&atilde;o :</b>
		<tbody>
		<tr>

		<td style="background-color:#587CAD; color: #F3F1F1; ">N&ordm; de Protocolo:</td>
		<td align="left" colspan="2" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $data[numprotocolo];?></td>
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; " >Tipo de Intercorr&ecirc;ncia:</td>
		<td align="left" style="background-color:#F3F1F1; color:#4F090A; "  ><?php echo $row['id_cod_inter']; ?></td>
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; " >Data da solicitacao:</td>      
		<td align="left"  style="background-color:#F3F1F1; color:#4F090A; "><?php echo $row[data_solicitacao]; ?></td>
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; " >Acessar Arquivo Anexo:</td>
		<td style="background-color:#F3F1F1; color:#4F090A; " align="center" title="Abrir Anexo" ><a href="<?php echo "/intranet/cpanel/".$row[anexo1]; ?>" target="_blank" id="enviar" data-text="https://www.google.com.br/?gws_rd=ssl" ><img src="../img/Open-icon.png"  width='18px' height='18px'</a></td>      
		</tr>
		<tr>
		<td colspan="9" style="background-color:#F3F1F1; color:#4F090A; " ><b>Descri&ccedil;&atilde;o: </b><?php echo $row[descricao]; ?> </td>
		</tr>
		<tr>
		</tr>
		</tbody>
		</table>

		<table class="table table-bordered">
		<b style="color:#0B5E92; background-color:#F3F1F1">Movimenta&ccedil;&atilde;o </b>
		<tbody>
		<tr>

		<td style="background-color:#587CAD; color: #F3F1F1; ">Recibido por :</td>
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; ">Data :</td>
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; ">Enviado para :</td>
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; " >Recebido por :</td>
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; " >Enviado para :</td>      
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; " >Recebido por :</td>
		<td align="left" style="background-color:#587CAD; color: #F3F1F1; " >Status:</td>
		</tr>


		<tr>
		<td align="left" style="background-color:#F3F1F1; color:#4F090A; " ><?php echo $nome;?></td>
		<td align="left" style="background-color:#F3F1F1; color:#4F090A; " ><?php echo $data[data_recebimento];?></td>
		<td align="left" style="background-color:#F3F1F1; color:#4F090A; ">Maria Elena</td>
		<td align="left" style="background-color:#F3F1F1; color:#4F090A; ">Maria Isabel</td>
		<td align="left" style="background-color:#F3F1F1; color:#4F090A; ">Maria Antonieta</td>
		<td align="left" style="background-color:#F3F1F1; color:#4F090A; ">Maria Antonella</td>

		<td align="left" style="background-color:#F3F1F1; color:#4F090A; ">Aprovado</td>
		</tr>
		<tr>


		</tr>
		</tbody>
		</table>

		<table class="table table-bordered">
		<b style="color:#0B5E92; background-color:#F3F1F1;">Observa&ccedil;&atilde;o e Anota&ccedil;&otilde;es em Geral : </b>
		<tbody>


		<tr>
		<td colspan="9">MAria Fulando de Tal MAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de Tal MAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de TalMAria Fulando de Tal  </td>

		</tr>
		</tbody>
		</table>



		<button type="button" class="btn btn-info" value="Voltar" onClick="history.go(-1)">Voltar</button>
		<!--  -->
		

	
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Movimentar</button>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModall">Indeferir</button>
	
		<div class="container">

		<!-- Modal - 1 - movimenta��o-->
		<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
		<h6 align="center">MOVIMENTAR SOLICITA&Ccedil;&Atilde;O</h6>





		<button type="button" class="close" data-dismiss="modal">&times;</button>

		</div>
		<div class="modal-body">
		<label for="sel2"><b>Enviar para:</b></label>
		<form action="controll/movimentos.php" method="post">
		<select class="form-control" name='local'  >
		<?php  
		foreach($pdo->query($sql7)as $row7)
		{ ?>
		<option>Selecione o Departamento</option>
		<option value="<?php  echo utf8_encode($row7['id_nivel']); ?>" ><?php  echo $row7['tipo_nivel'];?></option> 


		<?php 	  	  

		}	
		?>
		</select>
		<label for="sel2"><b>Observa&ccedil;&atilde;o:</b></label>
		<textarea class="form-control" rows="5" name="obs"  ></textarea>

		<input type="hidden" value="<?php echo $row['id_solicitacao'] ?>" name="idsolicitacao">
		<input type="hidden" value="<?php echo $row['id_solicitante'] ?>" name="idsolicitante">
		<input type="hidden" value="<?php echo $_SESSION[id_cad_user] ?>" name="usuario">
		<input type="hidden" value="2" name="id_sequencia_movimetacao">



		</div>
		<div class="modal-footer">
		<button type="submit" value="salvar" class="btn btn-success">Salvar</button></form>
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		</div>
		</div>

		</div>
		</div>

		<!-- Modal - 2 - Indeferido-->
		<div class="modal fade" id="myModall" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
		<h6 align="center">Indeferir Movimenta&ccedil;&atilde;o</h6>
		<button type="button" class="close" data-dismiss="modal">&times;</button>

		</div>
		<div class="modal-body">
		<p>Sr.(a) <?php echo $_SESSION[nome] ?> voc&ecirc; est&aacute; indeferindo uma Solicita&ccedil;&atilde;o, por favor detalhar abaixo, o motivo da reprova.</p>
		<textarea class="form-control" rows="5" id="obsmovum"></textarea>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		</div>
		</div>

		</div>
		</div>




