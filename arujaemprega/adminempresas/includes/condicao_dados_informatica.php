<script type="text/javascript">
	
			function optionInfor() {
		
				var optionInfor = document.getElementById("area").value;
        		
				
//***********************************************************************************************************************//
					
					if(optionInfor == "Clique Aqui") { 
		   
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
	</script>