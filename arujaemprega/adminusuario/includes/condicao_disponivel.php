<script>
	function optionDisponivel() {
		
				var optionDisponivel = document.getElementById("status_curso").value;
        		
				
//***********************************************************************************************************************//
					
					if(optionDisponivel == "Trancado") { 
		   
						document.getElementById("conclusao_mesCURSO").disabled = true;
						document.getElementById("conclusao_anoCURSO").disabled = true;
						document.getElementById('mes_divCURSO').style.display = 'none';
						document.getElementById('ano_divCURSO').style.display = 'none';
				
					}
					else {
						document.getElementById("conclusao_mesCURSO").disabled = false;
						document.getElementById("conclusao_anoCURSO").disabled = false;
						document.getElementById('mes_divCURSO').style.display = 'block';
						document.getElementById('ano_divCURSO').style.display = 'block';
					}
	}
</script>