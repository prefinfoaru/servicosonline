
<script type="text/javascript">
	
			function optionDef() {
				
				if(document.getElementById('def_check').checked == true){
					
				   document.getElementById('def_div').style.display = 'block';
				   document.getElementById("defselect").disabled = false;
				   document.getElementById("defselect").required = true;
				   document.getElementById('vgtbpcd').style.display = 'none';

				   document.getElementById('def_div2').style.display = 'none';

				   //Desabilitando 
				   document.getElementById("def_check2").checked = false
				   document.getElementById("def2").checked = false
				   document.getElementById("defselect2").disabled = true;
					
					
				   document.getElementById('Audi_div2').style.display = 'none';
				   document.getElementById("Audi2").disabled = true;
					
				   document.getElementById('fisica_div2').style.display = 'none';
				   document.getElementById("fisica2").disabled = true;
					
				   document.getElementById('Visual_div2').style.display = 'none';
				   document.getElementById("Visual2").disabled = true;
					
				   document.getElementById('Intelectual_div2').style.display = 'none';
				   document.getElementById("Intelectual2").disabled = true;
					
				   document.getElementById('Deficiencia_div2').style.display = 'none';
				   document.getElementById("Deficiencia2").disabled = true;
					
				   document.getElementById('Reabilitados_div2').style.display = 'none';
				   document.getElementById("Reabilitados2").disabled = true;
					
				   
				}
				else if(document.getElementById('def_check').checked == false){
					document.getElementById('vgtbpcd').style.display = 'block';
					// document.getElementById("def_check2").checked = false
					// document.getElementById("def2").checked = false
					document.getElementById('def_div').style.display = 'none';
					document.getElementById("defselect").value = "null";
					document.getElementById("defselect").required = false;
					optionDados();	
				 }else{
					
				   document.getElementById('def_div').style.display = 'none';
				   document.getElementById("defselect").disabled = true;
					
				   document.getElementById('Audi_div').style.display = 'none';
				   document.getElementById("Audi").disabled = true;
					
				   document.getElementById('fisica_div').style.display = 'none';
				   document.getElementById("fisica").disabled = true;
					
				   document.getElementById('Visual_div').style.display = 'none';
				   document.getElementById("Visual").disabled = true;
					
				   document.getElementById('Intelectual_div').style.display = 'none';
				   document.getElementById("Intelectual").disabled = true;
					
				   document.getElementById('Deficiencia_div').style.display = 'none';
				   document.getElementById("Deficiencia").disabled = true;
					
				   document.getElementById('Reabilitados_div').style.display = 'none';
				   document.getElementById("Reabilitados").disabled = true;
				}
				
			}
</script>

<script type="text/javascript">
	
			function optionDef2() {
				
				if(document.getElementById('def_check2').checked == true){
					
				   document.getElementById('def_div2').style.display = 'block';
				   document.getElementById("defselect2").disabled = false;
				   document.getElementById("defselect2").required = true;
					
				}else{
					document.getElementById("defselect2").value = "null";
					optionDados2();
				   document.getElementById('def_div2').style.display = 'none';
				   document.getElementById("defselect2").disabled = true;
				   document.getElementById("defselect2").required = false;
					
					
				   document.getElementById('Audi_div2').style.display = 'none';
				   document.getElementById("Audi2").disabled = true;
					
				   document.getElementById('fisica_div2').style.display = 'none';
				   document.getElementById("fisica2").disabled = true;
					
				   document.getElementById('Visual_div2').style.display = 'none';
				   document.getElementById("Visual2").disabled = true;
					
				   document.getElementById('Intelectual_div2').style.display = 'none';
				   document.getElementById("Intelectual2").disabled = true;
					
				   document.getElementById('Deficiencia_div2').style.display = 'none';
				   document.getElementById("Deficiencia2").disabled = true;
					
				   document.getElementById('Reabilitados_div2').style.display = 'none';
				   document.getElementById("Reabilitados2").disabled = true;
					
				}
				
			}
</script>

