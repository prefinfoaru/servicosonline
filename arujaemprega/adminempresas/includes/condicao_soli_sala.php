
<script type="text/javascript">
	
			function salaCheck() {
				
				if(document.getElementById('sala_um').checked == true){
					
				   document.getElementById('salaum_pcd_div').style.display = 'block';
				   document.getElementById("inicio_pcd_aces").disabled = false;
				   document.getElementById("fim_pcd_aces").disabled = false;
					
				}else{
					
				   document.getElementById('salaum_pcd_div').style.display = 'none';
				   document.getElementById("inicio_pcd_aces").disabled = true;
				   document.getElementById("fim_pcd_aces").disabled = true;
				}
				
				if(document.getElementById('sala_dois').checked == true){
					
				   document.getElementById('saladois_pcd_div').style.display = 'block';
				   document.getElementById("inicio_aces").disabled = false;
				   document.getElementById("fim_aces").disabled = false;
					
				}else{
					
				   document.getElementById('saladois_pcd_div').style.display = 'none';
				   document.getElementById("inicio_aces").disabled = true;
				   document.getElementById("fim_aces").disabled = true;
				}
				
			}
</script>