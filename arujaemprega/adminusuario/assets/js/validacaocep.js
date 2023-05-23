function limpa_formulário_cep() {
  
  //Limpa valores do formulário de cep.
  document.getElementById('rua').value = '';
  document.getElementById('bairro').value = '';
  document.getElementById('cidade').value = '';
  document.getElementById('uf').value = '';
  
}


function meu_callback(conteudo) {

  if (!('erro' in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('rua').value = conteudo.logradouro;
    document.getElementById('bairro').value = conteudo.bairro;
    document.getElementById('cidade').value = conteudo.localidade;
    document.getElementById('uf').value = conteudo.uf;
    document.getElementById('rua').readOnly = true;
    document.getElementById('bairro').readOnly = true;
    document.getElementById('cidade').readOnly = true;
    document.getElementById('uf').readOnly = true;
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
      document.getElementById('uf').readOnly = true;
    
  }
}

function pesquisacep(valor) {

  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, '');

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
      document.getElementById('uf').readOnly = true;
      document.getElementById('cidade').value = 'Arujá';
      document.getElementById('uf').value = 'SP';
  
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
      document.getElementById('uf').readOnly = true;
      document.getElementById('cidade').value = 'Santa-Isabel';
      document.getElementById('uf').value = 'SP';

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
        document.getElementById('uf').value = '...';

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
        document.getElementById('uf').readOnly = true;
      }
    } //end if.
    else {
      
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
    }

  }
}

// function validaCidade(){
//   if(document.getElementById('cidade').value != 'Arujá')
//   {
//     alert('Desculpe mas o seu cadastro deve ser efetuado junto ao seu município.');
//     limpa_formulário_cep();
//   }
// }
