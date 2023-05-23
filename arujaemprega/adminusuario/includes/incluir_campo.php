
<script>
	
  //*********** ADICIONAR CAMPO IDIOMAS ******************************************//
	
  $("#add-idioma").click(function () {
	var cont2 = 1;  
	cont2++;
  
    $("#idiomas").append('<div class="container" id="campo_idiomas' + cont2 + '"><div class="form-group" align="center"><label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Idioma <h11>*</h11></label><div class="col-md-3"><select name="idioma[]" id="idioma" class="form-control" style="width: 100%" required=""><option value="Português">Português</option><?php foreach($pdo->query($sql_idioma) as $idioma){	echo    '<option value="'   .$idioma['idioma'].'">'    .$idioma['idioma'].'</option>'; } ?></select><br></div><label class="col-md-1 control-label" for="instituicao">&nbsp;&nbsp;Nível <h11>*</h11></label><div class="col-md-2"><select name="nivelidi[]" class="form-control" id="nivel" style="width: 100%" required=""><option>Clique Aqui</option><?php foreach($pdo->query($sql_nivel) as $nivel){ echo    '<option value="'   .$nivel['nivel'].'">'    .$nivel['nivel'].'</option>'; }?></select><br></div><div class="col-md-4"><button type="button" id="' + cont2 + '" class="btn btn-success apagar-idiomas"> - </button></div></div></div>');
  });
	
	$('form').on('click', '.apagar-idiomas', function () {
       var button_id = $(this).attr("id");
       $('#campo_idiomas' + button_id + '').remove();
    });
	
  //*********** ADICIONAR CAMPO HABILIDADES ******************************************//
	
  $("#add-habilidade").click(function () {
    var cont = 1; 
 	cont++;
	  
    $("#habilidade").append('<div class="container" id="campo_habilidades' + cont + '"><div class="form-group" align="center"><label class="col-md-2 control-label" for="habilidades" style="text-align: right">&nbsp;&nbsp;Habilidades <h11>*</h11></label><div class="col-md-6"><input id="habilidades" name="habilidades[]" placeholder="Informe suas habilidades" class="form-control input-md" type="text" style="width: 100%" required=""><br></div><div class="col-md-4"><button type="button" id="' + cont + '" class="btn btn-success apagar-habilidades"> - </button></div></div></div>');});	
	
	
	$('form').on('click', '.apagar-habilidades', function () {
       var button_id = $(this).attr("id");
       $('#campo_habilidades' + button_id + '').remove();
    });

	 //*********** ADICIONAR CAMPO INFORMATICA ******************************************//
   var cont3 = 0; 
    $("#add-informatica").click(function () {
  
     
	  
   $("#informatica").append('<div class="container" id="campo_informatica' + cont3 + '"><div class="form-group" align="center"><label class="col-md-1 control-label" for="informatica" style="text-align: right">&nbsp;&nbsp;Área <h11>*</h11></label><div class="col-md-2"><select name="area[]" class="form-control area" id="' + cont3 + '" style="width: 98%" required="" onChange="optionInfor2(this.value,this.id)" ><option value="Clique Aqui">Clique Aqui</option><?php $sql_area = "SELECT * FROM bd_emprega_aruja.tb_pre_informatica; ";foreach($pdo->query($sql_area) as $row_area){echo    '<option value="'   .$row_area['dados_informatica'].'">'    .$row_area['dados_informatica'].'</option>';}?> </select></div><label class="col-md-2 control-label" for="instituicao" style="text-align: center">&nbsp;Conhecimentos <h11>*</h11></label><div class="col-md-2 " id="clique_div' + cont3 + '" style="display: none"><select name="conhecimento[]" class="form-control " id="clique' + cont3 + '" style="width: 98%" required="" disabled><option value="">Clique Aqui</option></select><br></div><div class="col-md-2 " id="banco_div' + cont3 + '" style="display: block"><select name="dados_infor[]" class="form-control " id="banco' + cont3 + '" style="width: 98%" required="" disabled><option value="">Clique Aqui</option><?php $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '1' ";foreach($pdo->query($sql_infor) as $row_infor){echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';}?></select><br></div><div class="col-md-2 " id="programacao_div' + cont3 + '" style="display: none" ><select name="dados_infor[]" class="form-control " id="programacao' + cont3 + '" style="width: 98%" required="" disabled><option value="">Clique Aqui</option><?php  $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '2' ";foreach($pdo->query($sql_infor) as $row_infor){echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';}?></select><br></div><div class="col-md-2 " id="graficos_div' + cont3 + '" style="display: none" ><select name="dados_infor[]" class="form-control " id="graficos' + cont3 + '" style="width: 98%" required="" disabled><option value="">Clique Aqui</option><?php $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '3' ";foreach($pdo->query($sql_infor) as $row_infor){ echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';}?></select><br></div><div class="col-md-2 " id="escritorio_div' + cont3 + '" style="display: none" ><select name="dados_infor[]" class="form-control " id="escritorio' + cont3 + '" style="width: 98%" required="" disabled><option value="">Clique Aqui</option><?php $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '4' ";foreach($pdo->query($sql_infor) as $row_infor){echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';}?></select><br></div><div class="col-md-2 " id="operacionais_div' + cont3 + '" style="display: none" ><select name="dados_infor[]" class="form-control " id="operacionais' + cont3 + '" style="width: 98%" required="" disabled><option value="">Clique Aqui</option><?php $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '5' ";foreach($pdo->query($sql_infor) as $row_infor){echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';} ?></select><br></div><div class="col-md-2 " id="outros_div' + cont3 + '" style="display: none" ><select name="dados_infor[]" class="form-control " id="outros' + cont3 + '" style="width: 98%" required="" disabled><option value="">Clique Aqui</option><?php $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '6' ";foreach($pdo->query($sql_infor) as $row_infor){echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';}?></select><br></div><label class="col-md-1 control-label" for="nivel" style="text-align: right">&nbsp;&nbsp;Nivel <h11>*</h11></label><div class="col-md-2"><select name="nivel[]" class="form-control" id="nivel" style="width: 98%" required=""><option value="">Clique Aqui</option><option value="Básico">Básico</option><option value="Intermediário">Intermediário</option><option value="Avançado">Avançado</option> </select></div><div class="col-md-2"><button type="button" id="' + cont3 + '" class="btn btn-success apagar-informatica"> - </button></div></div></div>');
   
   cont3++;
    
  
   });	
	
	
	$('form').on('click', '.apagar-informatica', function () {
       var button_id = $(this).attr("id");
       $('#campo_informatica' + button_id + '').remove();
  
       
    });

 

</script>


