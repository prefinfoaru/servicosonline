		<script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"> </script> <!-- Biblioteca para mensagem de erro personalizada  -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php
		session_start();
		include "../includes/variaveissessao.php";
		include 'conexao.php';


		//busca a fun��o. 
		$pdo = Banco::conectar();
		// select para intercorr�ncias com algum tipo de consulta preliminar para libera��o.
		$id_usuario = $_SESSION['id_cad_user'];
		$consulta_1_int = 'SELECT * FROM bd_sol_hr.bd_funcionarios order by nome_func';
		$sql =  'SELECT * FROM bd_sol_hr.bd_departamento order by departamento;';
		$sql_horaextra = 'SELECT * FROM bd_sol_hr.bd_horaextra;';
		$sqlhoraest = "SELECT * FROM bd_sol_hr.tb_hr_estimada where nivel ='1'";
		$sqlhoraest2 = "SELECT * FROM bd_sol_hr.tb_hr_estimada where nivel ='1' or nivel ='2'";



		if (isset($_SESSION['msg'])) {
			echo '<div class="alert alert-danger style="color:red;text-align: center">' . $_SESSION['msg'] . '</div>';

			unset($_SESSION['msg']);
		}
		if (isset($_SESSION['msg2'])) {
			echo '<div class="alert alert-success style="color:"#228B22" ;text-align: center">' . $_SESSION['msg2'] . '</div>';

			unset($_SESSION['msg2']);
		}

		if (isset($_SESSION['msg3'])) {
			echo '<div class="alert alert-success style="color:"#228B22" ;text-align: center">' . $_SESSION['msg3'] . '</div>';

			unset($_SESSION['msg3']);
		}
		if (isset($_SESSION['msg4'])) {
			echo '<div class="alert alert-danger style="color:"#F8F8FF" ;text-align: center">' . $_SESSION['msg4'] . '</div>';

			unset($_SESSION['msg4']);
		}
		?>

		<br><br>
		<?php
		try {

			$Conexao    = Conexao::getConnection();
			$query      = $Conexao->query("SELECT [Nome]
      ,[Matricula]
      ,[SalarioBase]
      ,[Secretaria]
      ,[Departamento]
      ,[CPF]
      ,[CargoReferencia]
      ,[VinculoEmpregaticio]
      FROM [ARUJADB].[dbo].[vwHoraExtra] where  
      CargoReferencia not in ('ADMINISTRADOR REGIONA', 'ASSESSOR JURIDICO', 'ASSESSOR TECNICO','ASSISTENTE TÉCNICO' , 'CONSELHEIRO TUTELAR', 'DIRETOR COMANDANTE DA GUARDA CIVIL  MUNICIPAL', 'DIRETOR DE DEPARTAMENTO', 'DIRETOR DE EDUCAÇÃO BASICA',
	  'DIRETOR DE PLANEJ MEIO AMBIENTE E OBRAS', 'DIRETOR DEPARTAMENTO ADMINISTRATIVO', 'DIRETOR DEPTO INFOR. E PROC. DE DADOS APOSENTADO', 'DIRETOR DO CENTRO MUNICIPAL DE TRIAGEM', 'DIRETOR DO DEPTO DA RECEITA (APOS)', 'DIRETOR DO DEPTO RECURSOS HUMANOS',
	  'DIRETOR DPTO DE CONTABILIDADE', 'DIRETOR GERAL', 'DIRETOR TÉCNICO DE DEPARTAMENTO', 'ESTAGIARIO', 'JOVEM  APRENDIZ', 'PREFEITO', 'SEC.M.DA ASS.SOCIAL (COMISSAO)', 'SEC.M.DE PLANEJAMENTO', 
	  'SEC.MUN.DE SAUDE E HIGIENE   ( COMISSAO )', 'SECRETARIA MUNICIPAL DE FINANÇAS', 'SECRETARIO DA JUNTA DO SERVICO MILITAR', 'SECRETARIO DE MEIO AMBIENTE', 'SECRETARIO DO CARTORIO ELEITORAL',
	  'SECRETARIO MUN OBRAS','SECRETARIO MUNICIPAL ADJUNTO', 'SECRETARIO MUNICIPAL DE ASSUNTOS JURIDICOS', 'SECRETARIO MUNICIPAL DE DESENVOLVIMENTO ECONOMICO', 'SECRETARIO MUNICIPAL DE EDUCACAO',
	  'SECRETARIO MUNICIPAL DE GOVERNO (COMISSÃO)', 'SECRETARIO MUNICIPAL DE SEGURANÇA PÚBLICA E CIDADÃ', 'VICE-PREFEITO')
      order by Nome");
			$produtos   = $query->fetchAll();
		} catch (Exception $e) {

			echo $e->getMessage();
			exit;
		} ?>
		<form action="../cpanel/data/funcoes/Calculahr.php" method="post" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label for="validationCustom02">Funcion&aacute;rio: </label>
					<select class="custom-select" name="matriculafunc" required>
						<option value="">Selecione um funcion&aacute;rio</option>
						<?php

						foreach ($produtos as $user) : ?>

							<option value="<?php echo round($user['Matricula']) ?>"><?php echo $user['Nome'] . " - " . "Matricula " . "(" . round($user['Matricula']) . ")"; ?></option>

						<?php endforeach; ?>
						<br>

					</select>

				</div>




				<div class="col-md-4 mb-3">
					<label for="validationCustom01">Data desejada</label>
					<input type="date" class="form-control" id="no-spin" onkeypress="return false" name="date" min="" required>

				</div>
				<div class="col-md-4 mb-3">
					<label for="validationCustomUsername">Horas <?php echo $_SESSION['secretaria'] ?></label>

					<select class="custom-select" name="hr_estimada" required>
						<option value="">Selecione um valor estimado para horas extras</option>
						
                        
                        
                        <?php if ($_SESSION['secretaria'] == 'Departamento de Transito')

						foreach ($pdo->query($sqlhoraest2) as $row) { ?>

							<option value="<?php echo $row['valorMultiplicador']; ?>"><?php echo $row['valor']; ?></option>


						<?php

						}
						?>
                        
                        <?php if ($_SESSION['secretaria'] != 'Departamento de Transito')

						foreach ($pdo->query($sqlhoraest) as $row) { ?>

							<option value="<?php echo $row['valorMultiplicador']; ?>"><?php echo $row['valor']; ?></option>


						<?php

						}
						?>
                        
					</select></div>




			</div>
			<div class="form-row">
				<div class="col-md-12 mb-3">
					<label for="validationTextarea">Por Favor, descreva o motivo para liberação da hora extra</label>
					<textarea style="background:#FBE9E9" class="form-control" name="descricao" placeholder="até 150 caracteres" maxlength="150" required></textarea>

				</div>


			</div>


			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
					<label class="form-check-label" for="invalidCheck">
						Declaro que todas as informa&ccedil;&otilde;es acima s&atilde;o autenticas, sendo passiva de puni&ccedil;&atilde;o.
					</label>

				</div>
			</div>


			<div class="form-group">

				<!-- solicitante responsavel -->
				<input type="hidden" name="nomeSol" value="<?php echo $_SESSION['nome'];  ?>">
				<input type="hidden" name="matricula" value="<?php echo $_SESSION['matricula'];  ?>">

				<input type="hidden" name="funcao" value="<?php echo $_SESSION['funcao'];  ?>">
				<input type="hidden" name="email" value="<?php echo $_SESSION['email'];  ?>">
				<input type="hidden" name="cargahoraria" value="<?php echo $_SESSION['cargahoraria'];  ?>">
				<input type="hidden" name="regime" value="<?php echo $_SESSION['regime'];  ?>">
				<input type="hidden" name="id_cad" value="<?php echo $_SESSION['id_cad_user'];  ?>">


				<!-- solicitante a trabalhador -->

				<button class="btn btn-info" type="submit">Enviar</button>
			</div>



		</form>

		<script>
			startDate: '17/07/2020',

				(function() {
					'use strict';
					window.addEventListener('load', function() {
						// Pega todos os formul�rios que n�s queremos aplicar estilos de valida��o Bootstrap personalizados.
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
			var today = new Date();
			today.setDate(today.getDate() + 1);
			today = today.toISOString().split('T')[0];

			document.getElementsByName("date")[0].setAttribute('min', today);
		</script>