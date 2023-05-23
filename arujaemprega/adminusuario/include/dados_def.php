<div class="form-group" id="Selected_div">
    <label>Qual</label>
    <select class="form-control" name="dados_def" id="defi_selected">
        <?php echo '<option value="'.$dadosDeficiencia.'">'.$dadosDeficiencia.'</option>'; ?>
		<option value="Nenhuma">Nenhuma</option>
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '1'";

			foreach ($pdo->query($sql_dados_def) as $dados_def) {
			    echo '<option value="'.$dados_def['dados'].'">'.$dados_def['dados'].'</option>';
			}
		?>
    </select>
</div>

<div class="form-group" id="Audi_div" style="display: none;">
    <label>Qual</label>
    <select class="form-control" name="dados_def" id="Audi" disabled>
        <?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '1'";

			foreach ($pdo->query($sql_dados_def) as $dados_def) {
			    echo '<option value="'.$dados_def['dados'].'">'.$dados_def['dados'].'</option>';
			}
		?>
    </select>
</div> 

<div class="form-group" style="display: none" id="fisica_div">
	<label>Qual</label>
	<select name="dados_def" id="fisica" class="form-control" disabled>	
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '2' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
				echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>											
	</select>
</div>

<div class="form-group" style="display: none" id="Visual_div">
	<label>Qual</label>
	<select name="dados_def" id="Visual" class="form-control" disabled>
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '3' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
				echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
	</select>
</div>

<div class="form-group" style="display: none" id="Intelectual_div">
	<label>Qual</label>
	<select name="dados_def" id="Intelectual" class="form-control" disabled>
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '4' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
				echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
	</select>
</div>

<div class="form-group" style="display: none" id="Deficiencia_div">
	<label>Qual</label>
	<select name="dados_def" id="Deficiencia" class="form-control" style="width: 98%" disabled>
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '5' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
				echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
	</select>
</div>

<div class="form-group" style="display: none" id="Reabilitados_div">
	<label>Qual</label>
	<select name="dados_def" id="Reabilitados" class="form-control" style="width: 98%" disabled>
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '6' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
				echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
	</select>
</div>