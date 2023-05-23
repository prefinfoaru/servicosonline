<?php include "../includes/topo_cad_cv5.php"; ?>

<link rel="stylesheet"  type="text/css" href="../assets/css/select2.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../assets/js/select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt-BR.js"></script>

<script src="https://cdn.tiny.cloud/1/d7mf8inz10za7x62gz4c3g9zny7wl7gk3hnswc2nj5r77wun/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>



<div class="container">
	
<form class="form-horizontal" method="post" action="../data/insert/inset_obj_profissionais.php">

 <!--CABEÇARIO -->   
<div class="panel panel-default">
  <h2><i class='fas fa-address-book' style='font-size:36px'></i>Dados Curricular </h2><i style="color: #E77577"><h11>* Campo Obrigatório</h11></i>
<h5 style='text-align: right; color: #3498db; font-size: 16px;'> 5/5 &nbsp;&nbsp;&nbsp; </h5>
   <hr>
<div class="col-md-12">	
  <h3>Objetivos Profissionais </h3><br><br>
</div>

<!-- GRUPO **************************************************************************************************************************************************************************-->
<div class="form-group" align="center">
	<label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Área <h11>*</h11></label>  
  	<div class="col-md-5">
		<select name="profissao" id="profissao" class="selectpicker form-control" style="width: 98%" required="" data-live-search="true">
				
			<?php 
				$sql_profissao = "SELECT * FROM bd_emprega_aruja.tb_pre_profissao; ";
				
				foreach($pdo->query($sql_profissao) as $profissao){
				echo '<option value="'.$profissao['profissao'].'">'.$profissao['profissao'].'</option>';
				}
			?>
													
		</select>
  	</div>
</div>

<div class="form-group" align="center">

  <label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Jornada <h11>*</h11></label>  
  <div class="col-md-3">
	<select name="jornada" id="jornada" class="form-control" style="width: 98%" required="">
			
		<?php 
			$sql_jornada = "SELECT * FROM bd_emprega_aruja.tb_pre_jornada; ";
			
			foreach($pdo->query($sql_jornada) as $jornada){
			echo    '<option value="'   .$jornada['jornada'].'">'    .$jornada['jornada'].'</option>';
			}
		?>
												
	</select>
  </div>
  
  <label class="col-md-3 control-label" for="instituicao">&nbsp;&nbsp;Tipo de Contrato <h11>*</h11></label>  
  <div class="col-md-3">
	<select name="tipo_contrato" class="form-control" id="nivel" style="width: 98%" required="">
		
		<?php 
			$sql_contrato = "SELECT * FROM bd_emprega_aruja.tb_pre_tipo_contrato; ";
			foreach($pdo->query($sql_contrato) as $contrato){
			echo    '<option value="'   .$contrato['tipo_contrato'].'">'    .$contrato['tipo_contrato'].'</option>';
			}
		?>

	</select>
  </div>
	
</div>
	
<div class="form-group" align="center">
  <label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Hierarquia Mínima <h11>*</h11></label>  
  <div class="col-md-3">
	<select name="hierarquia_minima" id="hierarquia_minima" class="form-control" style="width: 98%" required="">
			
		<?php 
			$sql_h_minima = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_profissao ";
			
			foreach($pdo->query($sql_h_minima) as $h_minima){
			echo    '<option value="'   .$h_minima['tb_nivel_hierarquico'].'">'    .$h_minima['tb_nivel_hierarquico'].'</option>';
			}
		?>
												
	</select>
  </div>
  
  <label class="col-md-3 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Hierarquia Máxima <h11>*</h11></label>  
  <div class="col-md-3">
	<select name="hierarquia_maxima" id="hierarquia_maxima" class="form-control" style="width: 98%" required="">
			
		<?php 
			$sql_h_maxima = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_profissao ";
			
			foreach($pdo->query($sql_h_maxima) as $h_maxima){
			echo    '<option value="'   .$h_maxima['tb_nivel_hierarquico'].'">'    .$h_maxima['tb_nivel_hierarquico'].'</option>';
			}
		?>
												
	</select>
  </div>
	
</div>
	
	
<div class="form-group" align="center">	
  <label class="col-md-2 control-label" for="instituicao" style="text-align: right">&nbsp;&nbsp;Pretensão salarial </label>
	
  <div class="col-md-2">
  	<input id="meuDinheiro" data-thousands="." data-decimal="," name="pretensao_min" placeholder="A partir R$" class="form-control input-md" type="text" style="width: 98%" ><br> 
  </div>
	
  <div class="col-md-2">
  	<input id="meuDinheiro2" data-thousands="." data-decimal="," name="pretensao_max" placeholder="Até R$" class="form-control input-md" type="text" style="width: 98%" >
  </div> 	
	
</div>	
	
<br>	
<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
	<input id="id_soli" name="id_soli" class="hidden" value="<?php echo $id_soli ?>" type="text">  
    <button id="btnSave" name="btnSave" class="btn btn-success" type="Submit">Finalizar</button>
  </div>
</div>	
</div>
	
</form>

<script>

$('.selectpicker').select2();
	 
</script>

</script>
<script>$("#meuDinheiro").maskMoney();</script>	
<script>$("#meuDinheiro2").maskMoney();</script>	