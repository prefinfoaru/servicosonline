		<meta charset="iso-8859-1">
        <script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"> </script> <!-- Biblioteca para mensagem de erro personalizada  -->
        
		<?php 
		session_start();
		include "../includes/variaveissessao.php";
		include 'conexao.php';
        //busca a função. 
		$pdo = Banco::conectar();
		// select para intercorrências com algum tipo de consulta preliminar para liberação.
        $id_usuario = $_SESSION['id_cad_user'];
        
		//1º query para quantidade de abonos solicitados no ano. *//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$select = $pdo->query("select count(*) as quant from ged_educ.bd_solicitacao where id_solicitante = '$id_usuario' and id_cod_inter = '21'");
		$result = $select->fetch(PDO::FETCH_OBJ);
		$resultado = $result->quant;
        //2º query para quantidade de solicitação TRJ 1 ao mês 2 ao Ano.*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $select_tre = $pdo->query("select count(*) as quant_mes from ged_educ.bd_solicitacao where id_solicitante = '$id_usuario' and id_cod_inter = '23' and month (data_solicitacao) = '$data_mes' and year (data_solicitacao) = '$data_ano'");
		$result_tre = $select_tre->fetch(PDO::FETCH_OBJ);
		$resultado_tre = $result_tre->quant_mes;
        $resultado_tre;
        //fim consulta *********************************************************************************************************************************************************************************

         //3º query para quantidade de abonos solicitados no ano. *//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $select_int = $pdo->query("SELECT * FROM ged_educ.bd_intercorrencia;");
		$result_int = $select_int->fetch(PDO::FETCH_OBJ);
		$resultado_int = $result_int->quant_mes;
        $resultado_int;
        //fim consulta *********************************************************************************************************************************************************************************
       
        //condição qunatida de abonos ******************************************************************************************************************************************************************
		if ( $resultado == 6 ) {

		echo "<script> swal('Atenção', 'a solicitações para Abono alcançou a quantidade estipulada em lei, o mesmo não se encontra mais disponível na lista de intercorrências. Qualquer dúvida entrar em contato com sua diretória..', 'error')</script>";
		$consulta_1_int =  "SELECT * FROM ged_educ.bd_intercorrencia where id_inter !='21' order by descricao;";	
		}
         //condição qunatida de TRE *******************************************************************************************************************************************************************
        if ( $resultado_tre == 1 || $resultado_tre == 2 ) {

		echo "<script> swal('Atenção', 'a solicitações para Tribunal Regional Eleitoral  alcançou a quantidade estipulada em 1 ao mê e 2 anual, o mesmo não se encontra mais disponível na lista de intercorrências. Qualquer dúvida entrar em contato com sua diretória..', 'error')</script>";
		$consulta_1_int =  "SELECT * FROM ged_educ.bd_intercorrencia where id_inter !='23' order by descricao;";	
		}
    
		// sai e consulta, trazendo todas as intercorrências ***********************************************************************************************************************************************************************************************
		else {
		$consulta_1_int = 'SELECT * FROM ged_educ.bd_intercorrencia order by descricao' ;
		} 

		/************************************ **********************************************************************************************************************************************************/
		$sql =  'SELECT * FROM ged_educ.bd_escolas order by nome;';

		if(isset($_SESSION['msg'])){
		echo '<div class="alert alert-danger style="color:red;text-align: center">' .$_SESSION['msg']. '</div>';

		unset($_SESSION['msg']);
		}
		if(isset($_SESSION['msg2'])){
		echo '<div class="alert alert-success style="color:"#228B22" ;text-align: center">' .$_SESSION['msg2']. '</div>';

		unset($_SESSION['msg2']);
		}

		if(isset($_SESSION['msg3'])){
		echo '<div class="alert alert-success style="color:"#228B22" ;text-align: center">' .$_SESSION['msg3']. '</div>';

		unset($_SESSION['msg3']);

		}if(isset($_SESSION['msg4'])){
		echo '<div class="alert alert-danger style="color:"#F8F8FF" ;text-align: center">' .$_SESSION['msg4']. '</div>';

		unset($_SESSION['msg4']);
		}
		?>
		<?php 
		// msg caso usuario estore solicitações de abono *********************************************************************************************************************************************
		if ( $resultado == 6) { echo '<div class="alert alert-danger style="color:"#F8F8FF" ;text-align: center">' ."Prezado.(a) ".$_SESSION['nome'].", a solicitações para Abono alcançou a quantidade estipulada em lei, o mesmo não se encontra mais disponível na lista de intercorrências. Qualquer dúvida entrar em contato com sua diretória.". '</div>'; }  ?>
		<br><br>

		<form action="../cpanel/data/funcoes/CalculaData.php" method="post" enctype="multipart/form-data">
		<div class="form-row">
		<div class="col-md-4 mb-3">
		<label for="validationCustom01">Data da Intercorr&ecirc;ncia</label> 
		<input type="date" class="form-control" name="data_int" placeholder="Data" value="" required>
		<div class="invalid-feedback">
		Por Favor, informe uma data valida. 
		</div>
		<div class="valid-feedback">
		Tudo certo!
		</div>
		</div>
		<div class="col-md-4 mb-3">
		<label for="validationCustom02">Tipo de Intercorr&ecirc;ncia</label>
		<select class="custom-select" name="tipo" required>
		<option value="">Selecione um Tipo de Intercorr&ecirc;ncia</option>
		<?php  
		foreach($pdo->query($consulta_1_int)as $row)
		{ ?>

		<option value="<?php  echo utf8_encode($row['id_inter']); ?>" ><?php  echo $row['descricao'];?></option> 


		<?php 	  	  

		}	
		?>
		<br>

		</select>
		<div class="invalid-feedback">
		Por favor, esolha uma Intercorr&ecirc;ncia.
		</div>
		<div class="valid-feedback">
		Tudo certo!
		</div>
		</div>
		<div class="col-md-4 mb-3">
		<label for="validationCustomUsername">Escola</label>
		<select class="custom-select" name="escola" required>
		<option value="">Selecione uma Escola</option>
		<?php 
		foreach($pdo->query($sql)as $row)
		{ ?>

		<option value="<?php  echo utf8_encode($row['id']); ?>" ><?php echo $row['nome'];?></option> 


		<?php 	  	  

		}	
		?>
		</select>

		<div class="invalid-feedback">
		Por favor, escolha uma escola.
		</div>
		<div class="valid-feedback">
		Tudo certo!
		</div>
		</div>
		</div>
		<div class="form-row">
		<div class="col-md-12 mb-3">
		<label for="validationTextarea">Uma Breve Descri&ccedil;&atilde;o da Intercorr&ecirc;ncia</label>
		<textarea class="form-control" name="descricao" placeholder="até 150 caracteres" maxlength="150" required ></textarea>
		<div class="invalid-feedback">
		Por favor, fa&ccedil;a uma breve descri&ccedil;&atilde;o com at&eacute; 150 caracteres.
		</div>
		<div class="valid-feedback">
		Tudo certo!
		</div>
		</div>


		</div> 

		<div class="form-row">
<?php
		
			
		'<div class="form-group">' ;
		 echo  '<label for="exampleFormControlFile1">Selecione um Arquivo (* extensão de arquivo permitidos JPG e PDF) e com tamanho máximo de 2mb.</label>';
		 echo  '<input type="file" name="arquivo" class="form-control-file" id="arquivo" required maxlength="30" >';
		'</div>';
		'<div class="invalid-feedback">';
		
		
		'</div>';
		'<div class="valid-feedback">';
		'Tudo certo!';
		'</div>';
		'</div>';
		
	?>	<br><br>
		
		</div>
		<div class="form-group">
		<div class="form-check">
		<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
		<label class="form-check-label" for="invalidCheck">
		Declaro que todas as informa&ccedil;&otilde;es acima s&atilde;o autenticas, sendo passiva de puni&ccedil;&atilde;o.
		</label>
		<div class="invalid-feedback">
		Voc&ecirc; deve concordar, antes de continuar.
		</div>
		<div class="valid-feedback">
		Tudo certo!
		</div>
		</div>
		</div>

		<div class="form-group">
		<input type="hidden" name="nome" value="<?php echo $_SESSION['nome'];  ?>">
		<input type="hidden" name="matricula" value="<?php echo $_SESSION['matricula'];  ?>">
		<input type="hidden" name="funcao" value="<?php echo $_SESSION['funcao'];  ?>">
		<input type="hidden" name="email" value="<?php echo $_SESSION['email'];  ?>">
		<input type="hidden" name="cargahoraria" value="<?php echo $_SESSION['cargahoraria'];  ?>">
		<input type="hidden" name="regime" value="<?php echo $_SESSION['regime'];  ?>">
		<input type="hidden" name="id_cad" value="<?php echo $_SESSION['id_cad_user'];  ?>">


		<button class="btn btn-primary" type="submit">Enviar</button>
		</div>



		</form>

		<script>
		(function() {
		'use strict';
		window.addEventListener('load', function() {
		// Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
		var forms = document.getElementsByClassName('needs-validation');
		// Faz um loop neles e evita o envio
		var validation = Array.prototype.filter.call(forms, function(form) {
		form.addEventListener('submit', function(event) {
		if (form.checkValidity() === false) {
		event.preventDefault();
		event.stopPropagation();
		}
		form.classList.add('was-validated');
		}, false);
		});
		}, false);
		})();

			
			
		</script>	
