<script type="text/javascript">
	
			function optionGenero() {
		
				var optionGenero = document.getElementById("sexo").value;
				
//***********************************************************************************************************************//
					
					if(optionGenero == "Homem Transgênero") { 
		   
						document.getElementById("Homem_transgenero").disabled = false;
						document.getElementById('Homem_transgenero_div').style.display = 'block';
				
					}
					else {
						document.getElementById("Homem_transgenero").disabled = true;
						document.getElementById('Homem_transgenero_div').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionGenero == "Mulher Transgênero") { 
		   
						document.getElementById("Mulher_transgenero").disabled = false;
						document.getElementById('Mulher_transgenero_div').style.display = 'block';
				
					}
					else {
						document.getElementById("Mulher_transgenero").disabled = true;
						document.getElementById('Mulher_transgenero_div').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionGenero == "Homem Transexual") { 
		   
						document.getElementById("Homem_transexual").disabled = false;
						document.getElementById('Homem_transexual_div').style.display = 'block';
				
					}
					else {
						document.getElementById("Homem_transexual").disabled = true;
						document.getElementById('Homem_transexual_div').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionGenero == "Mulher Transexual") { 
		   
						document.getElementById("Mulher_transexual").disabled = false;
						document.getElementById('Mulher_transexual_div').style.display = 'block';
				
					}
					else {
						document.getElementById("Mulher_transexual").disabled = true;
						document.getElementById('Mulher_transexual_div').style.display = 'none';
					}
				
			}
</script>

