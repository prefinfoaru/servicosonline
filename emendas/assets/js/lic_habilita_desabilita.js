// JavaScript Document



/**************************************** FUNCTION CADASTRO CNPJ *******************************************************/



	function tipoEmpresa() { 
		  
	    var optionEmpresa = document.getElementById("tipoempresa").value;
        var optionSelect = document.getElementById("tipoatividade").value;
	    var optionSimplesN = document.getElementById("Simplesnacional").value;
		  
		  
		  
/***************************************** FUNÇÃO EIRELE ******************************************************/
		  
		  

	if(optionEmpresa == "EIRELE") { 
		   
		document.getElementById("tipoatividade").disabled = false;
		document.getElementById("Simplesnacional").disabled = true;
			  
		if(optionSelect == "Comércio / Indústria / Prestação de Serviço" || optionSelect == "Comércio / Prestação de Serviço" || optionSelect == "Indústria / Prestação de Serviço" || optionSelect == "Prestação de Serviço"){
				  
			document.getElementById("tiposervico").disabled = false;
			document.getElementById("Simplesnacional").disabled = true;
			document.getElementById("Aliquota").disabled = true;
			
		} else	{
					
			document.getElementById("tiposervico").disabled = true;
			document.getElementById("Simplesnacional").disabled = true;
			document.getElementById("Aliquota").disabled = true;
			
		} 
			  
	}
		  
		 
		  
/***************************************** FUNÇÃO EPP ******************************************************/
		  
		  
		  
	else if(optionEmpresa == "EPP") { 
		   
		document.getElementById("tipoatividade").disabled = false;
		document.getElementById("Simplesnacional").disabled = false;
		   
	    if(optionSimplesN == "1"){
				  
			document.getElementById("Aliquota").disabled = false;
				 
				  
		} else if(optionSimplesN == "0"){
			
			document.getElementById("Aliquota").disabled = true;
			
				  
		}
			  
		if(optionSelect == "Comércio / Indústria / Prestação de Serviço" || optionSelect == "Comércio / Prestação de Serviço" || optionSelect == "Indústria / Prestação de Serviço" || optionSelect == "Prestação de Serviço"){
				  
		document.getElementById("tiposervico").disabled = false; 
			  
		} else  {
				  
			document.getElementById("tiposervico").disabled = true;
			
		}
		   
  	}	
		
		
		
/***************************************** FUNÇÃO LTDA ******************************************************/
		
		
		
	else if(optionEmpresa == "LTDA") { 
		
		document.getElementById("tipoatividade").disabled = false;
		document.getElementById("Simplesnacional").disabled = true;
			  
		if(optionSelect == "Comércio / Indústria / Prestação de Serviço" || optionSelect == "Comércio / Prestação de Serviço" || optionSelect == "Indústria / Prestação de Serviço" || optionSelect == "Prestação de Serviço"){
				  
			document.getElementById("tiposervico").disabled = false;
			document.getElementById("Simplesnacional").disabled = true;
			document.getElementById("Aliquota").disabled = true;
			
		} else	{
					
			document.getElementById("tiposervico").disabled = true; 
			document.getElementById("Simplesnacional").disabled = true;
			document.getElementById("Aliquota").disabled = true;
		} 
			  
	}
		
		  
		  
		  
/***************************************** FUNÇÃO ME ******************************************************/  
		  
		  
		  
	else if(optionEmpresa == "ME") { 
		   
 		document.getElementById("tipoatividade").disabled = false;
		document.getElementById("Simplesnacional").disabled = false;
		   
	    if(optionSimplesN == "1"){
				  
			document.getElementById("Aliquota").disabled = false;
				 
				  
		} else if(optionSimplesN == "0"){
			
			document.getElementById("Aliquota").disabled = true;
				  
		}
			  
		if(optionSelect == "Comércio / Indústria / Prestação de Serviço" || optionSelect == "Comércio / Prestação de Serviço" || optionSelect == "Indústria / Prestação de Serviço" || optionSelect == "Prestação de Serviço"){
				  
		document.getElementById("tiposervico").disabled = false; 
			  
		} else  {
				  
			document.getElementById("tiposervico").disabled = true;
			
		}
		   
  	}
		  
		  
		  
/***************************************** FUNÇÃO S.A. ******************************************************/  
		  
		  
		  
	else if(optionEmpresa == "S.A.") { 
		   
		document.getElementById("tipoatividade").disabled = false;
		document.getElementById("Simplesnacional").disabled = true;
			  
		if(optionSelect == "Comércio / Indústria / Prestação de Serviço" || optionSelect == "Comércio / Prestação de Serviço" || optionSelect == "Indústria / Prestação de Serviço" || optionSelect == "Prestação de Serviço"){
				  
			document.getElementById("tiposervico").disabled = false;
			document.getElementById("Simplesnacional").disabled = true;
			document.getElementById("Aliquota").disabled = true;
				  
		} else	{
					
			document.getElementById("tiposervico").disabled = true; 
			document.getElementById("Simplesnacional").disabled = true;
			document.getElementById("Aliquota").disabled = true;
			
		} 
			  
	}
}
	  
	
	

	










