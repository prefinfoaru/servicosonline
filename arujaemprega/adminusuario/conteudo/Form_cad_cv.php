<?php include "../includes/topo_cad_cv.php"; ?>
<script src="https://cdn.tiny.cloud/1/d7mf8inz10za7x62gz4c3g9zny7wl7gk3hnswc2nj5r77wun/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="container">
	
<form class="form-horizontal" method="post" action="../data/insert/inset_dados_pessoais.php" enctype="multipart/form-data">

 <!--CABEÇARIO -->   
<div class="panel panel-default">
  <h2><i class='fas fa-address-book' style='font-size:36px'></i>Dados Curricular </h2><i style="color: #E77577"><h11>* Campo Obrigatório</h11></i>
  <h5 style='text-align: right; color: #3498db; font-size: 16px;'> 1/5 &nbsp;&nbsp;&nbsp; </h5>	
  <hr>
<div class="col-md-12">	
  <h3>Dados Pessoais </h3><br><br>
</div>  	


<!-- GRUPO **************************************************************************************************************************************************************************-->
<div class="form-group" align="center">
	
  <label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;CPF <h11>*</h11></label>  
  <div class="col-md-4">
  	<input id="cpf" name="cpf" placeholder="<?php echo $cpf ?>" class="form-control input-md" type="text" maxlength="14" style="width: 98%" disabled>
	<input id="cpf" name="cpf" class="hidden" value="<?php echo $cpf ?>" type="text" maxlength="14" style="width: 100%">
  </div>
	
</div>
	
<div class="form-group" align="center">
  
  <label class="col-md-2 control-label" for="instituicao" style="text-align: right">&nbsp;&nbsp;Resumo </label>  
  <div class="col-md-9">
	  <textarea class="form-control requerido" name="resumo" id="basic-example" rows="5" id="comment" style="width: 98%" placeholder="Digite um resumo sobre suas habilidades pessoais...
( Exemplo: proatividade, autoconfiança, boa comunicação, etc)" ></textarea>
  </div>
  
</div>

<div class="form-group col-md-12" align="left">
  <label class="col-md-2 control-label" for="instituicao" style="text-align: right">&nbsp;&nbsp;Possui deficiência?</label>	
  <div class="col-md-9">	
  	<label class="checkbox-inline control-label">
		<input type="radio" value="Sim" name="def" id="def_check" onClick="optionDef()">Sim
	</label> 
	<label class="checkbox-inline control-label">
		<input type="radio" value="" name="def" id="def_check" onClick="optionDef()" checked>Não
	</label> 
  </div>
</div>

<div class="form-group" align="center">
	
  <label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Qual? </label>  
  <div class="col-md-4" id="def_div" style="display: none">
	<select name="defselect" id="defselect" class="form-control" onChange="optionDados()" style="width: 98%" >
		
		<option value="">Selecione Aqui</option>
		<?php 
			$sql_def = "SELECT * FROM bd_emprega_aruja.tb_pre_deficiencias; ";
			foreach($pdo->query($sql_def) as $def){
			echo    '<option value="'   .$def['deficiencia'].'">'    .$def['deficiencia']   .'</option>';
			}
		?>
												
	</select><br>
  </div>
  
  <div class="col-md-4" style="display: none" id="Audi_div">
	<select name="dados_def" id="Audi" class="form-control" style="width: 98%" disabled>
			
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '1' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
			echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
												
	</select>
  </div>
  
  <div class="col-md-4" style="display: none" id="fisica_div">
	<select name="dados_def" id="fisica" class="form-control" style="width: 98%" disabled>
			
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '2' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
			echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
												
	</select>
  </div>
  
  <div class="col-md-4" style="display: none" id="Visual_div">
	<select name="dados_def" id="Visual" class="form-control" style="width: 98%" disabled>
			
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '3' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
			echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
												
	</select>
  </div>
  
  <div class="col-md-4" style="display: none" id="Intelectual_div">
	<select name="dados_def" id="Intelectual" class="form-control" style="width: 98%" disabled>
			
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '4' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
			echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
												
	</select>
  </div>
  
  <div class="col-md-4" style="display: none" id="Deficiencia_div">
	<select name="dados_def" id="Deficiencia" class="form-control" style="width: 98%" disabled>
			
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '5' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
			echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
												
	</select>
  </div>
  
  <div class="col-md-4" style="display: none" id="Reabilitados_div">
	<select name="dados_def" id="Reabilitados" class="form-control" style="width: 98%" disabled>
			
		<?php 
			$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '6' ";
			foreach($pdo->query($sql_dados_def) as $dados_def){
			echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
			}
		?>
												
	</select>
  </div>
	
</div>
	
<div class="form-group" align="center">
  <label class="col-md-2 control-label" for="instituicao" style="text-align: right">&nbsp;&nbsp;Escolha a imagem</label>  
  <div class="col-md-4">          
    <input type="file" class="form-control" name="imagem" id="imgInp" accept=".jpg,.png,.jpeg" style="background-color: #F8D1D2 ; color: #141E4D ; font-size: 11px; width: 98%"><br>
	 <img id="blah" style="width: 94px; height: 120px;"> 
  </div>
</div>	
	
<hr>

<div class="col-md-12">	
  <h3>Redes Sociais </h3><br><br>
</div>	

<div class="form-group" align="center">
	
  <label class="col-md-2 control-label" for="Nome" style="text-align: center">&nbsp;&nbsp;LinkedIn</label>  
  <div class="col-md-9">
  	<input id="LinkedIn" name="LinkedIn" class="form-control input-md" type="text" style="width: 98%" ><br>
  </div>
  
  <label class="col-md-2 control-label" for="Nome" style="text-align: center">&nbsp;&nbsp;Facebook</label>  
  <div class="col-md-9">
  	<input id="Facebook" name="Facebook" class="form-control input-md" type="text" style="width: 98%" ><br>
  </div>
	
  <label class="col-md-2 control-label" for="Nome" style="text-align: center">&nbsp;&nbsp;Twitter</label>  
  <div class="col-md-9">
  	<input id="Twitter" name="Twitter" class="form-control input-md" type="text" style="width: 98%" ><br>
  </div>
	
  <label class="col-md-2 control-label" for="Nome" style="text-align: center">&nbsp;&nbsp;Google+</label>  
  <div class="col-md-9">
  	<input id="Google" name="Google" class="form-control input-md" type="text" style="width: 98%" ><br>
  </div>
	
  <label class="col-md-2 control-label" for="Nome" style="text-align: center">&nbsp;&nbsp;YouTube</label>  
  <div class="col-md-9">
  	<input id="YouTube" name="YouTube" class="form-control input-md" type="text" style="width: 98%" ><br>
  </div>
	
  <label class="col-md-2 control-label" for="Nome" style="text-align: center">&nbsp;&nbsp;Instagram</label>  
  <div class="col-md-9">
  	<input id="Instagram" name="Instagram" class="form-control input-md" type="text" style="width: 98%" ><br>
  </div>
	
  <label class="col-md-2 control-label" for="Nome" style="text-align: center">&nbsp;&nbsp;Blog</label>  
  <div class="col-md-9">
  	<input id="Blog" name="Blog" class="form-control input-md" type="text" style="width: 98%" ><br>
  </div>
  
</div>	
	
<hr>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="btnSave" name="btnSave" class="btn btn-success" type="Submit">Avançar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  </div>
</div>
</form>	
	
<?php include "../includes/imagem_viewer.php"; ?>
<?php include "../includes/condicao_deficiencias.php"; ?>
<?php include "../includes/condicao_dados_deficiencia.php"; ?>

<script>
tinymce.init({
  selector: 'textarea#basic-example',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
  
});
</script>


</div>

</div>

