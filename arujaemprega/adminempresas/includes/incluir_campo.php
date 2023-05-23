
<script>
	
  //*********** ADICIONAR CAMPO IDIOMAS ******************************************//
	
  $("#add-idioma").click(function () {
	var cont2 = 1;  
	cont2++;
  
    $("#idiomas").append('<div class="container" id="campo_idiomas' + cont2 + '"><div class="row" ><label class="col-md-1control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Idioma <h11>*</h11></label><div class="col-md-2"><select name="idioma[]" id="idioma" class="form-control"  required="required" style="width: 100%"><option value="Português">Português</option><?php foreach($pdo->query($sql_idioma) as $idioma){	echo    '<option value="'   .$idioma['idioma'].'">'    .$idioma['idioma'].'</option>'; } ?></select><br></div><label class="col-md-1 control-label" for="instituicao">&nbsp;&nbsp;Nível <h11>*</h11></label><div class="col-md-2"><select name="nivel[]" class="form-control" id="nivel" required="required" style="width: 100%" ><option value="">Clique Aqui</option><?php foreach($pdo->query($sql_nivel) as $nivel){ echo    '<option value="'   .$nivel['nivel'].'">'    .$nivel['nivel'].'</option>'; }?></select><br></div> <label class=" control-label" for="obrigatorio">Obrigatório <h11>*</h11></label>  <div class="col-md-2"><select name="obrigatorio[]" class="form-control" id="obrigatorio" style="width: 98%" required=""><option value="">Clique Aqui</option><option value="Sim">Sim</option><option value="Não">Não</option></select><br></div> <div class="col-md-2"><button type="button" id="' + cont2 + '" class="btn btn-success apagar-idiomas"> - </button></div></div></div>');
  });
	
	$('form').on('click', '.apagar-idiomas', function () {
       var button_id = $(this).attr("id");
       $('#campo_idiomas' + button_id + '').remove();
    });
	
  
  
    

	

	

	
</script>

