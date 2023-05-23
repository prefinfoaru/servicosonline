function definirSelectPadrao(seletor,valor){
	$(seletor + " option").each(function(idx,el){
		if($(el).attr("value")==valor){
			$(el).attr("selected","selected");
		}
	});	
}

$(document).ready(function(){
	$(".item").show();
	if(dadosBusca){ 
		$.post('control/consultar.php',dadosBusca,function(res){
			$("#resultados").html(res);
		});
		definirSelectPadrao("#secretaria",dadosBusca["siglaSecretaria"]);
		definirSelectPadrao("#status",dadosBusca["status"]);
		definirSelectPadrao("#tipoLicitacao",dadosBusca["tipoLicitacao"]);
	}
	else{
		definirSelectPadrao("#secretaria","TODAS");
		definirSelectPadrao("#status","em andamento");
		definirSelectPadrao("#tipoLicitacao","PP");
	}

	$("#formulario-consulta #consultar").click(function(){
		dadosBusca=0;
		var siglaSecretaria = $("#secretaria").val();
		var status = $("#status").val();
		var tipoLicitacao = $("#tipoLicitacao").val();

		var obj = {
			'siglaSecretaria':siglaSecretaria,
			'status':status,
			'tipoLicitacao':tipoLicitacao
		};
		
		$.post('control/consultar.php',obj,function(res){
			if(res!=""){
				$("#titulo").show();
				$("#formulario-consulta").show();
				$("#formulario-consulta #resultados").html(res);
				$("#formulario-consulta #informacoes").hide();
				$("#cadastrofornecedor").hide();
			}
		});
	});
	
});