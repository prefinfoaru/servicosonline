
<script type="text/javascript">
	
			function optionProfissional() {
				
				if(document.getElementById('atual').checked == true){
				   document.getElementById('conclusao_mes').disabled = true;
				   document.getElementById('conclusao_ano').disabled = true;
				   document.getElementById('mes_div').style.display = 'none';		
				   document.getElementById('ano_div').style.display = 'none';		
				}

				if(document.getElementById('atual').checked == false){
				   document.getElementById('conclusao_mes').disabled = false;
				   document.getElementById('conclusao_ano').disabled = false;
				   document.getElementById('mes_div').style.display = 'block';		
				   document.getElementById('ano_div').style.display = 'block';		
				}
				
			}
	
</script>

