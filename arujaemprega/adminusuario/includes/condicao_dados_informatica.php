<script type="text/javascript">
	////////////////////////////SELECT PRINCIPAL///////////////////////////////////
			function optionInfor(value) {
				
				var optionInfor = value;
//***********************************************************************************************************************//
				
					if(optionInfor == "") { 
		   
						document.getElementById("clique").disabled = true;
						document.getElementById('clique_div').style.display = 'block';
				
					}
					else {
						document.getElementById("clique").disabled = true;
						document.getElementById('clique_div').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionInfor == "Banco de Dados") { 
		   
						document.getElementById("banco").disabled = false;
						document.getElementById('banco_div').style.display = 'block';
				
					}
					else {
						document.getElementById("banco").disabled = true;
						document.getElementById('banco_div').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionInfor == "Programação") { 
		   
						document.getElementById("programacao").disabled = false;
						document.getElementById('programacao_div').style.display = 'block';
				
					}
					else {
						document.getElementById("programacao").disabled = true;
						document.getElementById('programacao_div').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionInfor == "Gráficos/Web") { 
		   
						document.getElementById("graficos").disabled = false;
						document.getElementById('graficos_div').style.display = 'block';
				
					}
					else {
						document.getElementById("graficos").disabled = true;
						document.getElementById('graficos_div').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionInfor == "Aplicações de Escritório") { 
		   
						document.getElementById("escritorio").disabled = false;
						document.getElementById('escritorio_div').style.display = 'block';
				
					}
					else {
						document.getElementById("escritorio").disabled = true;
						document.getElementById('escritorio_div').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionInfor == "Sistemas Operacionais") { 
		   
						document.getElementById("operacionais").disabled = false;
						document.getElementById('operacionais_div').style.display = 'block';
				
					}
					else {
						document.getElementById("operacionais").disabled = true;
						document.getElementById('operacionais_div').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionInfor == "Outros Programas") { 
		   
						document.getElementById("outros").disabled = false;
						document.getElementById('outros_div').style.display = 'block';
				
					}
					else {
						document.getElementById("outros").disabled = true;
						document.getElementById('outros_div').style.display = 'none';
					}
				
				}


/////////////////////////////////////SELECTS ADICIONAIS////////////////////////////

				function optionInfor2(area,parametro) {


				var optionInfor = area;



				if(optionInfor == "Clique Aqui") { 
				
				document.getElementById('clique'+ parametro).disabled = true;
				document.getElementById('clique_div'+ parametro).style.display = 'block';

				}
				else {
				document.getElementById('clique'+ parametro).disabled = true;
				document.getElementById('clique_div'+ parametro).style.display = 'none';
				}

				//***********************************************************************************************************************//

				if(optionInfor == "Banco de Dados") { 

				document.getElementById('banco'+ parametro).disabled = false;
				document.getElementById('banco_div'+ parametro).style.display = 'block';

				}
				else {
				document.getElementById('banco'+ parametro).disabled = true;
				document.getElementById('banco_div'+ parametro).style.display = 'none';
				}


						
				//***********************************************************************************************************************//
							
				if(optionInfor == "Programação") { 
				
				document.getElementById('programacao'+ parametro).disabled = false;
				document.getElementById('programacao_div'+ parametro).style.display = 'block';

				}
				else {
				document.getElementById('programacao'+ parametro).disabled = true;
				document.getElementById('programacao_div'+ parametro).style.display = 'none';
				}

				//***********************************************************************************************************************//

				if(optionInfor == "Gráficos/Web") { 

				document.getElementById('graficos'+ parametro).disabled = false;
				document.getElementById('graficos_div'+ parametro).style.display = 'block';

				}
				else {
				document.getElementById('graficos'+ parametro).disabled = true;
				document.getElementById('graficos_div'+ parametro).style.display = 'none';
				}

				//***********************************************************************************************************************//

				if(optionInfor == "Aplicações de Escritório") { 

				document.getElementById('escritorio'+ parametro).disabled = false;
				document.getElementById('escritorio_div'+ parametro).style.display = 'block';

				}
				else {
				document.getElementById('escritorio'+ parametro).disabled = true;
				document.getElementById('escritorio_div'+ parametro).style.display = 'none';
				}

				//***********************************************************************************************************************//

				if(optionInfor == "Sistemas Operacionais") { 

				document.getElementById('operacionais'+ parametro).disabled = false;
				document.getElementById('operacionais_div'+ parametro).style.display = 'block';

				}
				else {
				document.getElementById('operacionais'+ parametro).disabled = true;
				document.getElementById('operacionais_div'+ parametro).style.display = 'none';
				}

				//***********************************************************************************************************************//

				if(optionInfor == "Outros Programas") { 

				document.getElementById('outros'+ parametro).disabled = false;
				document.getElementById('outros_div'+ parametro).style.display = 'block';

				}
				else {
				document.getElementById('outros'+ parametro).disabled = true;
				document.getElementById('outros_div'+ parametro).style.display = 'none';
				}





				}




			
				
								
			
	</script>