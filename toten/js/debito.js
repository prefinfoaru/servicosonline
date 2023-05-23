
function pagamento(tipo){
    var div1 = document.getElementById('cont1');
    div1.style.cssText += 'display:none';
    var div2 = document.getElementById('cont2');
    div2.style.cssText += 'display:block';

    
if(tipo == 'iptu'){
    $('#tipo').append('Consulta de IPTU')
    $('#form').append($('<label>Digite a Inscrição do Imóvel:</label>').addClass('palavra'));
    $('#form').append($('<input>').attr('type', 'text') .attr('name', 'IPTU').addClass('form-control').addClass('keyboard').addClass('default'));
}else{
    $('#tipo').append('Consulta de Taxas')
    $('#form').append($('<label>Digite o CPF ou CNPJ:</label>').addClass('palavra'));
    $('#form').append($('<input>').attr('type', 'text') .attr('name', 'TAXAS').addClass('form-control').addClass('keyboard').addClass('telephone'));
}

$('.telephone').keyboard();
$('.default').keyboard();

}

function pegar(){
  

    var input = document.getElementsByClassName('keyboard');
    var valor = input[0].value;
    var tipo = input[0].name;
  
    buscaValor(tipo , valor);

}