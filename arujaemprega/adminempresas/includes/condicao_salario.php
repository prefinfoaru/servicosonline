
<script type="text/javascript">
	
			function optionSalario() {
				
				if(document.getElementById('salario_check').checked == true){
					
				   document.getElementById('div_salario').style.display = 'block';
				   document.getElementById("salario").disabled = false;
					
				} else{
					
				   document.getElementById('div_salario').style.display = 'none';
				   document.getElementById("salario").disabled = true;
				}
					
			}
</script>