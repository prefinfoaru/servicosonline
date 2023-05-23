function valor(i) {
  var v = i.value.replace(/\D/g, '');
  v = (v / 100).toFixed(2) + '';
  v = v.replace('.', ',');
  v = v.replace(/(\d)(\d{3})(\d{3}),/g, '$1.$2.$3,');
  v = v.replace(/(\d)(\d{3}),/g, '$1.$2,');
  i.value = v;
}

function limpa_formulário_cep() {
  
  //Limpa valores do formulário de cep.
  document.getElementById('rua').value = '';
  document.getElementById('bairro').value = '';
  document.getElementById('cidade').value = '';
  document.getElementById('estado').value = '';
  
}


function meu_callback(conteudo) {

  if (!('erro' in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('rua').value = conteudo.logradouro;
    document.getElementById('bairro').value = conteudo.bairro;
    document.getElementById('cidade').value = conteudo.localidade;
    document.getElementById('estado').value = conteudo.uf;
    document.getElementById('rua').readOnly = true;
    document.getElementById('bairro').readOnly = true;
    document.getElementById('cidade').readOnly = true;
    document.getElementById('estado').readOnly = true;
    console.log(conteudo);

    // if (conteudo.bairro == '') {
    //   document.getElementById('bairro').readOnly = false;
    // }
    // if(conteudo.logradouro == ''){
    //   document.getElementById('rua').readOnly = false;
    // }
  } //end if.
  else {

      //CEP não Encontrado.
      limpa_formulário_cep();
      alert('CEP não encontrado.');
      document.getElementById('cep').value = '';
      document.getElementById('rua').readOnly = true;
      document.getElementById('bairro').readOnly = true;
      document.getElementById('cidade').readOnly = true;
      document.getElementById('estado').readOnly = true;
    
  }
}

function pesquisacep() {

  var cepOld = document.getElementById('cep').value;

console.log(cepOld);

  //Nova variável "cep" somente com dígitos.
  var cep = cepOld.replace(/\D/g, '');

  // Valida CEP geral de Arujá
  if(cep == '07400000'){

      //Limpa os campos antes de digitar as informações
      limpa_formulário_cep();
  
      // Habilita os campos obrigatórios
      document.getElementById('cep').required = true;
      document.getElementById('rua').required = true;
      document.getElementById('numero').required = true;
      document.getElementById('bairro').required = true;
  
      //Trava e Destrava os campos necessários para digitar
      document.getElementById('rua').readOnly = false;
      document.getElementById('numero').readOnly = false;
      document.getElementById('bairro').readOnly = false;
      document.getElementById('cidade').readOnly = true;
      document.getElementById('estado').readOnly = true;
      document.getElementById('cidade').value = 'Arujá';
      document.getElementById('estado').value = 'SP';
  
  }
  // Valida CEP geral de Santa Isabel
  else if(cep == '07500000'){
  
      //Limpa os campos antes de digitar as informações
      limpa_formulário_cep();
  
      // Habilita os campos obrigatórios
      document.getElementById('cep').required = true;
      document.getElementById('rua').required = true;
      document.getElementById('numero').required = true;
      document.getElementById('bairro').required = true;
  
      //Trava e Destrava os campos necessários para digitar
      document.getElementById('rua').readOnly = false;
      document.getElementById('numero').readOnly = false;
      document.getElementById('bairro').readOnly = false;
      document.getElementById('cidade').readOnly = true;
      document.getElementById('estado').readOnly = true;
      document.getElementById('cidade').value = 'Santa-Isabel';
      document.getElementById('estado').value = 'SP';

  }else{

    //Verifica se campo cep possui valor informado.
    if (cep != '') {

      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;

      //Valida o formato do CEP.
      if (validacep.test(cep)) {
        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value = '...';
        document.getElementById('bairro').value = '...';
        document.getElementById('cidade').value = '...';
        document.getElementById('estado').value = '...';

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src =
          'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);
      } //end if.
      else {
        //cep é inválido.
        limpa_formulário_cep();
        alert('Formato de CEP inválido.');
        document.getElementById('cep').value = '';
        document.getElementById('cep').required = true;
        document.getElementById('rua').readOnly = true;
        document.getElementById('bairro').readOnly = true;
        document.getElementById('cidade').readOnly = true;
        document.getElementById('estado').readOnly = true;
      }
    } //end if.
    else {
      
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
    }

  }
}

function formatar(mascara, documento) {
  var i = documento.value.length;
  var saida = mascara.substring(0, 1);
  var texto = mascara.substring(i);

  if (texto.substring(0, 1) != saida) {
    documento.value += texto.substring(0, 1);
  }
}

function idade() {
  var data = document.getElementById('dtnasc').value;
  var dia = data.substr(0, 2);
  var mes = data.substr(3, 2);
  var ano = data.substr(6, 4);
  var d = new Date();
  var ano_atual = d.getFullYear(),
    mes_atual = d.getMonth() + 1,
    dia_atual = d.getDate();

  (ano = +ano), (mes = +mes), (dia = +dia);

  var idade = ano_atual - ano;

  if (mes_atual < mes || (mes_atual == mes_aniversario && dia_atual < dia)) {
    idade--;
  }
  return idade;
}

function exibe(i) {
  document.getElementById(i).readOnly = true;
}

function desabilita(i) {
  document.getElementById(i).disabled = true;
}
function habilita(i) {
  document.getElementById(i).disabled = false;
}

function showhide() {
  var div = document.getElementById('newpost');

  if (idade() >= 18) {
    div.style.display = 'none';
  } else if (idade() < 18) {
    div.style.display = 'inline';
  }
}
