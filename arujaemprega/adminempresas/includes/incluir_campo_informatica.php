<script>
	
//*********** ADICIONAR CAMPO HABILIDADES ******************************************//
	
  $("#add-habilidade").click(function () {
    var cont = 1; 
 	cont++;
	  
    $("#habilidade").append(
		
		'<div class="conatainer" id="campo_habilidades' + cont + '"><div class="row" align="center"><label class="col-md-1 control-	label" for="habilidades" style="text-align: right">&nbsp;&nbsp;Área <h11>*</h11></label><div class="col-md-2"><select name="habilidades[]" class="form-control" id="area" style="width: 98%" required="" onChange="optionInfor()"><option value="">Clique Aqui</option><?php $sql_area = "SELECT * FROM bd_emprega_aruja.tb_pre_informatica "; foreach($pdo->query($sql_area) as $row_area){ echo    '<option value="'   .$row_area['dados_informatica'].'">'    .$row_area['dados_informatica'].'</option>'; } ?> </select><br></div> <label class="col-md-2 control-label" for="instituicao" style="text-align: center">&nbsp;Conhecimentos <h11>*</h11></label> <div class="col-md-2" style="display: none" id="banco_div"><select name="nivel[]" class="form-control" id="banco" style="width: 98%" required="" disabled> <option value="">Clique Aqui</option> <?php  $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '1' "; foreach($pdo->query($sql_infor) as $row_infor){ echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>'; } ?></select><br></div> <div class="col-md-2" style="display: none" id="programacao_div"> <select name="nivel[]" class="form-control" id="programacao" style="width: 98%" required="" disabled> <option value="">Clique Aqui</option> <?php  $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '2' "; foreach($pdo->query($sql_infor) as $row_infor){ echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>'; } ?> </select><br> </div><div class="col-md-2" style="display: none" id="graficos_div"> <select name="nivel[]" class="form-control" id="graficos" style="width: 98%" required="" disabled> <option value="">Clique Aqui</option> <?php $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '3' "; foreach($pdo->query($sql_infor) as $row_infor){ echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>'; } ?> </select><br> </div> <div class="col-md-2" style="display: none" id="escritorio_div"> <select name="nivel[]" class="form-control" id="escritorio" style="width: 98%" required="" disabled><option value="">Clique Aqui</option> <?php $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '4' "; foreach($pdo->query($sql_infor) as $row_infor){ echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>'; } ?> </select><br></div> <div class="col-md-2" style="display: none" id="operacionais_div">  <select name="nivel[]" class="form-control" id="operacionais" style="width: 98%" required="" disabled> <option value="">Clique Aqui</option> <?php $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '5' "; foreach($pdo->query($sql_infor) as $row_infor){ echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>'; } ?></select><br> </div> <div class="col-md-2" style="display: none" id="outros_div"><select name="nivel[]" class="form-control" id="outros" style="width: 98%" required="" disabled><option value="">Clique Aqui</option> <?php $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '6' "; foreach($pdo->query($sql_infor) as $row_infor){ echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>'; } ?> </select><br> </div> <label class="col-md-1 control-label" for="obrigatorio">Obrigatório <h11>*</h11></label>  <div class="col-md-2"><select name="obrigatorio[]" class="form-control" id="obrigatorio" style="width: 98%" required=""><option value="">Clique Aqui</option><option value="Sim">Sim</option><option value="Não">Não</option></select><br></div><div class="col-md-2" style="text-align:left"><button type="button" id="' + cont + '" class="btn btn-success apagar-habilidades"> - </button></div></div></div>'  ); });	
	
	
	
	$('form').on('click', '.apagar-habilidades', function () {
       var button_id = $(this).attr("id");
       $('#campo_habilidades' + button_id + '').remove();
    });
	
	
</script>