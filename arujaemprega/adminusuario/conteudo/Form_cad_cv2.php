<?php include "../includes/topo_cad_cv2.php"; ?>

<div class="container">

	<form class="form-horizontal" id="add-curso" method="post" action="../data/insert/inset_formacao_academica.php">

		<!--CABEÇARIO -->
		<div class="panel panel-default">
			<h2><i class='fas fa-address-book' style='font-size:36px'></i>Dados Curricular </h2><i style="color: #E77577">
				<h11>* Campo Obrigatório</h11>
			</i>
			<h5 style='text-align: right; color: #3498db; font-size: 16px;'> 2/5 &nbsp;&nbsp;&nbsp; </h5>
			<hr>
			<div class="col-md-12">
				<h3>Formação Acadêmica </h3><br><br>
			</div>

			<!-- GRUPO **************************************************************************************************************************************************************************-->
			<div class="form-group" align="center">
				<label class="col-md-2 control-label" for="instituicao" style="text-align: right">&nbsp;&nbsp;Nome da
					Instituição</label>
				<div class="col-md-9">
					<input id="instituicao" name="instituicao" placeholder="Informe o nome da instituição" class="form-control input-md" type="text" style="width: 98%" required="">
				</div>
			</div>

			<div class="form-group" align="center">
				<label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;País</label>
				<div class="col-md-3">
					<select name="pais" id="pais" class="form-control" onChange="optionPais()" style="width: 98%" required="">
						<option value='Brasil'>Brasil</option>
						<?php
						$sql_paises = "SELECT * FROM bd_emprega_aruja.tb_pre_paises ";
						foreach ($pdo->query($sql_paises) as $paises) {
							echo    '<option value="'   . $paises['pais'] . '">'    . $paises['pais']   . '</option>';
						}
						?>

					</select>
				</div>

				<label class="col-md-3 control-label" for="instituicao">&nbsp;&nbsp;Estado</label>
				<div class="col-md-3" id="estado_div">
					<select name="estado" id="estado" class="form-control" style="width: 98%" required="">

						<?php
						$sql_estados = "SELECT * FROM bd_emprega_aruja.tb_pre_estados; ";
						foreach ($pdo->query($sql_estados) as $estados) {
							echo    '<option value="'   . $estados['estado'] . '">'    . $estados['estado']   . '</option>';
						}
						?>

					</select>
				</div>
			</div>



			<div class="form-group" align="center">
				<label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Nível</label>
				<div class="col-md-4">
					<select name="nivel" id="escolari" class="form-control" onchange="optionDepto()" style="width: 98%" required="">

						<?php
						$sql_escolaridade = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_escolaridade; ";

						foreach ($pdo->query($sql_escolaridade) as $escolaridade) {
							echo    '<option value="'   . $escolaridade['escolaridade'] . '">'    . $escolaridade['escolaridade'] . '</option>';
						}
						?>

					</select>
				</div>

				<label class="col-md-2 control-label" for="instituicao">&nbsp;&nbsp;Curso</label>
				<div class="col-md-3" id="Ensino_Fundamental">
					<select name="curso" class="form-control" id="fundamental" style="width: 98%" required="">

						<?php
						$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='1' ";
						foreach ($pdo->query($sql_curso) as $curso) {
							echo    '<option value="'   . $curso['curso'] . '">'    . $curso['curso'] . '</option>';
						}
						?>

					</select>
				</div>

				<div class="col-md-3" style="display: none;" id="extra_curricular">
					<select name="curso" class="form-control" id="extra" onChange="OptionOutros()" style="width: 98%" disabled required="">

						<?php
						$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='2' ";
						foreach ($pdo->query($sql_curso) as $curso) {
							echo    '<option value="'   . $curso['curso'] . '">'    . $curso['curso'] . '</option>';
						}
						?>

					</select>
				</div>

				<div class="col-md-3" style="display: none;" id="Ensino_Medio">
					<select name="curso" class="form-control" id="Medio" style="width: 98%" disabled required="">

						<?php
						$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='3' ";
						foreach ($pdo->query($sql_curso) as $curso) {
							echo    '<option value="'   . $curso['curso'] . '">'    . $curso['curso'] . '</option>';
						}
						?>

					</select>
				</div>

				<div class="col-md-3" style="display: none;" id="curso_tecnico">
					<select name="curso" class="form-control" id="tecnico" style="width: 98%" disabled required="">

						<?php
						$sql_curso = "SELECT LOWER(curso) as curso FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='4' ";
						foreach ($pdo->query($sql_curso) as $curso) {
							echo    '<option value="'   . ucwords($curso['curso']) . '">'    . ucwords($curso['curso']) . '</option>';
						}
						?>

					</select>
				</div>

				<div class="col-md-3" style="display: none;" id="Ensino_Superior">
					<select name="curso" class="form-control" id="Superior" style="width: 98%" disabled required="">

						<?php
						$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='5' ";
						foreach ($pdo->query($sql_curso) as $curso) {
							echo    '<option value="'   . $curso['curso'] . '">'    . $curso['curso'] . '</option>';
						}
						?>

					</select>
				</div>

				<div class="col-md-3" style="display: none;" id="esp_MBA">
					<select name="curso" class="form-control" id="MBA" style="width: 98%" disabled required="">

						<?php
						$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='6' ";
						foreach ($pdo->query($sql_curso) as $curso) {
							echo    '<option value="'   . $curso['curso'] . '">'    . $curso['curso'] . '</option>';
						}
						?>

					</select>
				</div>

				<div class="col-md-3" style="display: none;" id="pos_mestrado">
					<select name="curso" class="form-control" id="mestrado" style="width: 98%" disabled required="">

						<?php
						$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='7' ";
						foreach ($pdo->query($sql_curso) as $curso) {
							echo    '<option value="'   . $curso['curso'] . '">'    . $curso['curso'] . '</option>';
						}
						?>

					</select>
				</div>

				<div class="col-md-3" style="display: none;" id="pos_doutorado">
					<select name="curso" class="form-control" id="doutorado" style="width: 98%" disabled required="">

						<?php
						$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='8' ";
						foreach ($pdo->query($sql_curso) as $curso) {
							echo    '<option value="'   . $curso['curso'] . '">'    . $curso['curso'] . '</option>';
						}
						?>

					</select>
				</div>
				<br><br><br>

				<div class="form-group" align="center" id="outrosDiv" style="display: none;">
					<label class="col-md-2 control-label" style="text-align: right">&nbsp;&nbsp;Outros</label>
					<div class="col-md-9">
						<input id="outros" name="outros" placeholder="Informe o nome do curso" class="form-control input-md" type="text" style="width: 98%" required="" disabled>
					</div>
				</div>

				<div class="container col-md-12" align="right">
					<div class="col-md-10">
						<div class="radio-inline col-md-2">
							<label><input type="radio" id="concluido" value="Concluído" name="tempo_curso" onClick="optionCursando()" checked>Concluído</label>
						</div>

						<div class="radio-inline col-md-2">
							<label><input type="radio" id="cursando" value="Cursando" name="tempo_curso" onClick="optionCursando()">Cursando</label>
						</div>

						<div class="radio-inline col-md-2">
							<label><input type="radio" id="trancado" value="Trancado" name="tempo_curso" onClick="optionCursando()">Trancado</label>
						</div>
					</div>
				</div>
				<br>
				<div class="container col-md-12" align="left">
					<div class="form-group" align="center">

						<label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Início</label>
						<div class="col-md-1">
							<input id="inicio_mes" name="inicio_mes" class="form-control input-md" type="number" min="1" max="12" style="width: 98%" placeholder="mm"><br>
						</div>

						<div class="col-md-2">
							<input id="inicio_ano" name="inicio_ano" class="form-control input-md" type="number" min="1" max="<?php echo date('Y') ?>" style="width: 98%" placeholder="aaaa"><br>
						</div>

						<label class="col-md-2 control-label" for="Nome" style="text-align: center">&nbsp;&nbsp;Conclusão</label>
						<div class="col-md-1">
							<input id="conclusao_mes" name="conclusao_mes" class="form-control input-md" type="number" min="1" max="12" style="width: 98%" placeholder="mm"><br>
						</div>

						<div class="col-md-2">
							<input id="conclusao_ano" name="conclusao_ano" class="form-control input-md" type="number" min="1" style="width: 98%" placeholder="aaaa"><br>
						</div>

					</div>
				</div>

			</div>

			<div class="form-group" align="center">
				<span id="msg"></span>
				<button id="btnSave" name="btnSave" class="btn btn-default" type="Submit">Cadastrar</button>
			</div>

			<div id="formulario" class="col-md-12">
				<table class="table table-hover" style="text-align: center;">
					<tr>
						<th style="text-align: center">Instituição:</th>
						<th style="text-align: center">Status do Curso:</th>
						<th style="text-align: center">Início:</th>
						<th style="text-align: center">Conclusão:</th>
					</tr>
					<?php
					$select_formacao = "SELECT * FROM bd_emprega_aruja.tb_formacao_academica where id_solicitante = '$id_soli' ";
					foreach ($pdo->query($select_formacao) as $formacao) {
						echo '<tr style="font-size: 14px;">';
						echo '<td>'	. $formacao['nome_instituicao']											. '</td>';
						echo '<td>'	. $formacao['status_curso']												. '</td>';
						echo '<td>'	. $formacao['inicio_mes']	. " - "		. $formacao['inicio_ano']		. '</td>';
						echo '<td>'	. $formacao['conclusao_mes'] . " - "		. $formacao['conclusao_ano']	. '</td>';
					};

					?>

				</table>
				<hr>
			</div>

			<input id="id_soli" name="id_soli" class="hidden" value="<?php echo $id_soli ?>" type="text">
	</form>


	<div class="form-group">
		<label class="col-md-2 control-label" for="Cadastrar"></label>
		<div class="col-md-8">
			<a href="../data/update/baixa_cadformacademica.php?soli=<?php echo $id_soli ?>">&nbsp;<button type="button" class="btn btn-success"> Avançar </button></a>
			<!-- <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button> -->
		</div>
	</div>
	<?php include "../includes/dados_curricular_curso.php"; ?>
	<?php include "../includes/condicao_cursando.php"; ?>
	<?php include "../includes/condicao_pais_estado_cidade.php"; ?>
</div>

</div>