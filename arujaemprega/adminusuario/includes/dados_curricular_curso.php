
<script type="text/javascript">
	
			function optionDepto() {
		
				var optionDepto = document.getElementById("escolari").value;
        		
				
//***********************************************************************************************************************//
					
					if(optionDepto == "Ensino Fundamental (1º Grau)") { 
		   
						document.getElementById("fundamental").disabled = false;
						document.getElementById('Ensino_Fundamental').style.display = 'block';
				
					}
					else {
						document.getElementById("fundamental").disabled = true;
						document.getElementById('Ensino_Fundamental').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionDepto == "Curso Extra-Curricular / Profissionalizante") { 
		   
						document.getElementById("extra").disabled = false;
						document.getElementById('extra_curricular').style.display = 'block';
						
					}
					else {
						document.getElementById("extra").disabled = true;
						document.getElementById('extra_curricular').style.display = 'none';
						
					}
//***********************************************************************************************************************//
					
					if(optionDepto == "Ensino Médio (2º Grau)") { 
		   
						document.getElementById("Medio").disabled = false;
						document.getElementById('Ensino_Medio').style.display = 'block';
				
					}
					else {
						document.getElementById("Medio").disabled = true;
						document.getElementById('Ensino_Medio').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionDepto == "Curso Técnico") { 
		   
						document.getElementById("tecnico").disabled = false;
						document.getElementById('curso_tecnico').style.display = 'block';
				
					}
					else {
						document.getElementById("tecnico").disabled = true;
						document.getElementById('curso_tecnico').style.display = 'none';
					}				
//***********************************************************************************************************************//
					
					if(optionDepto == "Ensino Superior") { 
		   
						document.getElementById("Superior").disabled = false;
						document.getElementById('Ensino_Superior').style.display = 'block';
				
					}
					else {
						document.getElementById("Superior").disabled = true;
						document.getElementById('Ensino_Superior').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionDepto == "Pós-Graduação - Especialização/MBA") { 
		   
						document.getElementById("MBA").disabled = false;
						document.getElementById('esp_MBA').style.display = 'block';
				
					}
					else {
						document.getElementById("MBA").disabled = true;
						document.getElementById('esp_MBA').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionDepto == "Pós-Graduação - Mestrado") { 
		   
						document.getElementById("mestrado").disabled = false;
						document.getElementById('pos_mestrado').style.display = 'block';
				
					}
					else {
						document.getElementById("mestrado").disabled = true;
						document.getElementById('pos_mestrado').style.display = 'none';
					}
				
//***********************************************************************************************************************//
					
					if(optionDepto == "Pós-Graduação - Doutorado") { 
		   
						document.getElementById("doutorado").disabled = false;
						document.getElementById('pos_doutorado').style.display = 'block';
				
					}
					else {
						document.getElementById("doutorado").disabled = true;
						document.getElementById('pos_doutorado').style.display = 'none';
					}
		
				
				
			};
			
			function OptionOutros(){
				var optionOutros = document.getElementById("extra").value;
				// console.log(optionOutros);

				if(optionOutros == "Outros"){
					document.getElementById("outros").disabled = false;
					document.getElementById('outrosDiv').style.display = 'block';
				}else{
					document.getElementById("outros").disabled = true;
					document.getElementById('outrosDiv').style.display = 'none';
				}
			}
		
		

</script>				
				