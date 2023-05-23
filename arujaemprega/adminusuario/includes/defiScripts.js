function optionDados(){	
  var optionDados = document.getElementById("deficiencia").value;
  var comparador = document.getElementById("comparadorDeficiencia").value;
    
  if(optionDados == "Auditiva") { 
    document.getElementById("Audi").disabled = false;
    document.getElementById('Audi_div').style.display = 'block';

    document.getElementById('Selected_div').style.display = 'none';
  }
  else {
    document.getElementById("Audi").disabled = true;
    document.getElementById('Audi_div').style.display = 'none';
  }					
  
  if(optionDados == "Física") { 
    document.getElementById("fisica").disabled = false;
    document.getElementById('fisica_div').style.display = 'block';

    document.getElementById('Selected_div').style.display = 'none';
  }
  else {
    document.getElementById("fisica").disabled = true;
    document.getElementById('fisica_div').style.display = 'none';
  }					
  
  if(optionDados == "Visual") { 
    document.getElementById("Visual").disabled = false;
    document.getElementById('Visual_div').style.display = 'block';

    document.getElementById('Selected_div').style.display = 'none';
  }
  else {
    document.getElementById("Visual").disabled = true;
    document.getElementById('Visual_div').style.display = 'none';
  }					
  
  if(optionDados == "Intelectual") { 
    document.getElementById("Intelectual").disabled = false;
    document.getElementById('Intelectual_div').style.display = 'block';

    document.getElementById('Selected_div').style.display = 'none';
  }
  else {
    document.getElementById("Intelectual").disabled = true;
    document.getElementById('Intelectual_div').style.display = 'none';
  }					
  
  if(optionDados == "Deficiência Psicossocial") { 
    document.getElementById("Deficiencia").disabled = false;
    document.getElementById('Deficiencia_div').style.display = 'block';

    document.getElementById('Selected_div').style.display = 'none';
  }
  else {
    document.getElementById("Deficiencia").disabled = true;
    document.getElementById('Deficiencia_div').style.display = 'none';
  }					
  
  if(optionDados == "Reabilitados") { 
    document.getElementById("Reabilitados").disabled = false;
    document.getElementById('Reabilitados_div').style.display = 'block';
    
    document.getElementById('Selected_div').style.display = 'none';
  }
  else {
    document.getElementById("Reabilitados").disabled = true;
    document.getElementById('Reabilitados_div').style.display = 'none';
  }
  
  if (optionDados == comparador) {
    document.getElementById('Selected_div').style.display     = 'block';
    document.getElementById('Reabilitados_div').style.display = 'none';
    document.getElementById('Deficiencia_div').style.display  = 'none';
    document.getElementById('Intelectual_div').style.display  = 'none';
    document.getElementById('Visual_div').style.display       = 'none';
    document.getElementById('Audi_div').style.display         = 'none';
    document.getElementById('fisica_div').style.display       = 'none';

    document.getElementById("Reabilitados").disabled          = true;
    document.getElementById("Deficiencia").disabled           = true;
    document.getElementById("Intelectual").disabled           = true;
    document.getElementById("Visual").disabled                = true;
    document.getElementById("Audi").disabled                  = true;
    document.getElementById("fisica").disabled                = true;
  }
}