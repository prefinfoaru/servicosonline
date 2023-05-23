
<script type="text/javascript">
	
			function optionCursando() {
				
				if(document.getElementById('trancado').checked == true){
				   document.getElementById('conclusao_mes').disabled = true;
				   document.getElementById('conclusao_ano').disabled = true;
				}

				if(document.getElementById('trancado').checked == false){
				   document.getElementById('conclusao_mes').disabled = false;
				   document.getElementById('conclusao_ano').disabled = false;
				}
				
			}
</script>

