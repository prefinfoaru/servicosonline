var myHeaders = new Headers();
myHeaders.append('Cookie', 'JSESSIONID=6241AD1F31C427A677616FEB2E5A145B');

var requestOptions = {
  method: 'GET',
  headers: myHeaders,
  redirect: 'follow',
};

var opc = 'IPTU';
function alteraInput(valor) {
  if (valor == 'IPTU') {
    document.getElementById('tppesquisa').innerHTML =
      'Digite a Inscrição do Imóvel';
    document.getElementById('titulo').innerHTML =
      ' Informe sua inscrição no campo abaixo para realizar a busca.';
    document.getElementById('inscricao').style.display = 'inline';
    document.getElementById('cpf').style.display = 'none';
    document.getElementById('cpf').required = false;
    document.getElementById('cpf').value = '';
    document.getElementById('inscricao').required = true;
    opc = 'IPTU';
    console.log(opc);
    return valor;
  } else if (valor == 'TAXAS') {
    document.getElementById('tppesquisa').innerHTML = 'Digite seu CPF ou CNPJ';
    document.getElementById('titulo').innerHTML =
      ' Informe seu CPF ou CNPJ no campo abaixo para realizar a busca.';
    document.getElementById('cpf').style.display = 'inline';
    document.getElementById('inscricao').style.display = 'none';
    document.getElementById('cpf').required = true;

    document.getElementById('inscricao').required = false;
    document.getElementById('inscricao').value = '';
    opc = 'TAXAS';
    console.log(opc);

    return valor;
  }
}
var ccm = 0;
var idfisico = 0;
function buscaValor() {
  parcelas = [];
  var cpf = document.querySelector('#cpf').value;
  cpf.replace(/\D+/g, '');
  // var opc = document.getElementsByName('toggle');
  console.log(document.getElementsByName('toggle'));
  console.log(opc);

  document.getElementById('novabusca').style.display = 'none';
  if (opc == 'TAXAS') {
    if (cpf.length == 0) {
      document.querySelector('#conteudo').style.display = 'block';
      document.querySelector('#conteudo').innerHTML =
        'Digite um CPF ou CNPJ Válido';
    } else {
      // document.querySelector('.disabletogle').style.display = 'none';
      // document.getElementById('tppesquisa').innerHTML = 'Busca de Débitos';
      // document.getElementById('cpf').style.display = 'none';
      document.querySelector('#conteudo').style.display = 'block';
      document.querySelector('#conteudo').innerHTML =
        'Por favor aguarde, estamos buscando as informações...';
      fetch(
        'https://servicos.prefeituradearuja.sp.gov.br/tbw/loginWeb.jsp?execobj=Servicos&servico=guias&tipo=debitosNormal&cnpj=' +
          cpf,
        requestOptions
      )
        .then(function (dados) {
          if (!dados.ok) {
            throw new Error('Erro de HTTP, status = ' + dados.status);
          }
          return dados.json();
        })
        .then(function (dados) {
          console.log(dados);

          if (dados.erro) {
            console.log(cpf);
            document.querySelector('#conteudo').style.display = 'block';
            document.querySelector('#conteudo').innerHTML =
              'Não há parcelas do exercício disponível para essa inscrição';
          } else {
            document.querySelector('#conteudo').style.display = 'block';
            document.querySelector(
              '#conteudo'
            ).innerHTML = `<table class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th scope="col">Pagar</th>
                      <th scope="col">Valor</th>
                      <th scope="col">Vencimento</th>
                      <th scope="col">Débito</th>
                      <th scope="col">Exercício</th>
                  </tr>
              </thead>
              <tbody>`;
            var tbody = document.querySelector('tbody');
            document.getElementById('buscar').innerHTML = 'Gerar Boleto';
            document
              .getElementById('buscar')
              .setAttribute('onclick', 'teste(this);');
            ccm = dados.Cadastro.ccm;
            for (var i = 0; i < dados.Debitos.length; i++) {
              var tabelist = document.createElement('tr');
              let data = new Date(dados.Debitos[i].dtVencimento);
              let dataFormatada =
                data.getDate() +
                '/' +
                (data.getMonth() + 1) +
                '/' +
                data.getFullYear();

              var valor = parseFloat(dados.Debitos[i].vlrTotal);
              var debito = valor.toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
              });

              tabelist.innerHTML = '';
              tabelist.innerHTML += `<td><input type="checkbox" id="idparc" name="idparc" value="${dados.Debitos[i].idParcela}" onclick="adicionaIdPar(${dados.Debitos[i].idParcela})"></td>`;
              tabelist.innerHTML += '<td>R$' + debito + '</td>';
              tabelist.innerHTML += '<td>' + dataFormatada + '</td>';
              tabelist.innerHTML +=
                '<td>' + dados.Debitos[i].lancamento + '</td>';
              tabelist.innerHTML +=
                '<td>' + dados.Debitos[i].exercicioLancto + '</td>';

              tbody.appendChild(tabelist);
            }
            document.querySelector('#conteudo').innerHTML += `         
              </tbody>
              </table>`;
            document.getElementById('novabusca').style.display = '';
          }
        })
        .catch(console.error);

      function copiaBoleto() {
        var textInput = document.getElementById('codbol');
        var copyButton = document.getElementById('buscar');
        textInput.select();
        document.execCommand('copy');
      }
    }
  } else if (opc == 'IPTU') {
    document.querySelector('#conteudo').style.display = 'block';
    document.querySelector('#conteudo').innerHTML =
      'Por favor aguarde, estamos buscando as informações...';
    var inscricao = document.querySelector('#inscricao').value;
    if (inscricao.length == 0) {
      document.querySelector('#conteudo').style.display = 'block';
      document.querySelector('#conteudo').innerHTML =
        'Digite uma Inscrição Válida';
    } else {
      fetch(
        'https://servicos.prefeituradearuja.sp.gov.br/tbw/loginWeb.jsp?execobj=Servicos&servico=segunda_via&tipo=iptu&inscricao_fisico=' +
          requestOptions
      )
        .then(function (dados) {
          if (!dados.ok) {
            throw new Error('Erro de HTTP, status = ' + dados.status);
          }
          return dados.json();
        })
        .then(function (dados) {
          console.log(dados);

          if (dados.erro) {
            if (dados.erro == 'Fisico não encontrado.') {
              document.querySelector('#conteudo').style.display = 'block';
              document.querySelector('#conteudo').innerHTML =
                'Não foi localizado nenhum cadastro com essa inscrição';
            } else {
              document.querySelector('#conteudo').style.display = 'block';
              document.querySelector('#conteudo').innerHTML =
                'Não há parcelas do exerício dispoível para esse imóvel';
            }
          } else {
            idfisico = dados.Cadastro.idFisico;
            fetch(
              'https://servicos.prefeituradearuja.sp.gov.br/tbw/loginWeb.jsp?execobj=Servicos&servico=guias&tipo=debitos&idfisico=' +
                idfisico,
              requestOptions
            )
              .then(function (dados) {
                if (!dados.ok) {
                  throw new Error('Erro de HTTP, status = ' + dados.status);
                }
                return dados.json();
              })
              .then(function (dados) {
                console.log(dados);

                if (dados.erro) {
                  document.querySelector('#conteudo').style.display = 'block';
                  document.querySelector('#conteudo').innerHTML =
                    'Não há Débitos Disponiveis';
                } else {
                  document.querySelector('#conteudo').style.display = 'block';
                  document.querySelector(
                    '#conteudo'
                  ).innerHTML = `<table class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th scope="col" style="width:20px">Pagar</th>
                      <th scope="col">Valor</th>
                      <th scope="col">Vencimento</th>
                      <th scope="col">Exercício</th>
                  </tr>
              </thead>
              <tbody>`;
                  var tbody = document.querySelector('tbody');
                  document.getElementById('buscar').innerHTML = 'Gerar Boleto';
                  document
                    .getElementById('buscar')
                    .setAttribute('onclick', 'buscaParcelas(this);');
                  idfisico = dados.Cadastro.idFisico;

                  for (var i = 0; i < dados.Debitos.length; i++) {
                    if (dados.Debitos[i].situacao != 'Normal') {
                    } else {
                      let data = new Date(dados.Debitos[i].dtVencimento);
                      let dataFormatada =
                        data.getDate() +
                        '/' +
                        (data.getMonth() + 1) +
                        '/' +
                        data.getFullYear();

                      var valor = parseFloat(dados.Debitos[i].vlrTotal);
                      var debito = valor.toLocaleString('pt-BR', {
                        minimumFractionDigits: 2,
                      });

                      var tabelist = document.createElement('tr');
                      tabelist.innerHTML = '';
                      tabelist.innerHTML += `<td><input type="checkbox" id="idparc" name="idparc" value="${dados.Debitos[i].idParcela}" onclick="adicionaIdPar(${dados.Debitos[i].idParcela})"></td>`;
                      tabelist.innerHTML += '<td>R$' + debito + '</td>';
                      tabelist.innerHTML += '<td>' + dataFormatada + '</td>';
                      tabelist.innerHTML +=
                        '<td>' + dados.Debitos[i].exercicioLancto + '</td>';

                      tbody.appendChild(tabelist);
                    }
                  }
                  document.querySelector('#conteudo').innerHTML += `         
              </tbody>
              </table>`;
                  document.getElementById('novabusca').style.display = '';
                }
              })
              .catch(console.error);
          }
        })
        .catch(console.error);
    }
  }
}
var parcelas = [];
function adicionaIdPar(valor) {
  if (parcelas.indexOf(valor) === -1) {
    parcelas.push(valor);
  } else {
    parcelas.splice(parcelas.indexOf(valor), 1);
  }

  console.log(parcelas);
  console.log(ccm);
}
function buscaParcelas() {
  $('html, body').animate(
    {
      scrollTop: $('#contact').offset().top,
    },
    2000
  );
  conparc = parcelas.join(';');
  console.log(parcelas);
  if (parcelas == '') {
    alert('Selecione uma  parcela');
  } else {
    document.querySelector('#conteudo').style.display = 'block';
    document.querySelector('#conteudo').innerHTML =
      'Calculando os Débitos Selecionados';
    fetch(
      'https://servicos.prefeituradearuja.sp.gov.br/tbw/loginWeb.jsp?execobj=Servicos&servico=guias&tipo=debitos&idfisico=' +
        idfisico +
        '&idparcela=' +
        conparc,
      requestOptions
    )
      .then(function (dados) {
        if (!dados.ok) {
          throw new Error('Erro de HTTP, status = ' + dados.status);
        }
        return dados.json();
      })
      .then(function (dados) {
        document.querySelector('#conteudo').style.display = 'block';
        let data = new Date(dados.Boleto.dtVencimento);
        let dataFormatada =
          data.getDate() +
          '/' +
          (data.getMonth() + 1) +
          '/' +
          data.getFullYear();

        GerarCodigoDeBarras('21231');

        var valor = parseFloat(dados.Boleto.vlrDocumento);
        var debito = valor.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
        });
        document.getElementById('novabusca').style.display = '';
        document.querySelector(
          '#conteudo'
        ).innerHTML = `<table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Valor</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col">Código de Barras</th>
                </tr>
            </thead>
            <tbody>
            `;
        var tbody = document.querySelector('tbody');
        document.getElementById('buscar').innerHTML = 'Copiar Código de Barras';
        document
          .getElementById('buscar')
          .setAttribute('onclick', 'copiaBoleto(this);');
        var tabelist = document.createElement('tr');
        tabelist.innerHTML = '';
        tabelist.innerHTML += '<td>R$' + debito + '</td>';
        tabelist.innerHTML += '<td>' + dataFormatada + '</td>';
        // tabelist.innerHTML += `<td> <input type="text" name="codbol"  id="codbol" value="${dados.Boleto.Linha.replaceAll(
        //   '-',
        //   ''
        // )}" readonly="readonly" style="border: none;
        //     background-color:#F2F2F2;
        //     width: 100%;height:30px;" /> </td>`;
        tabelist.innerHTML += '<td><p id="mensagem"></p></td>';
        tabelist.innerHTML += '<td><svg id="codBarras"></svg></td>';

        tbody.appendChild(tabelist);
        document.querySelector('#conteudo').innerHTML += `         
            </tbody>
            </table>
          `;
        console.log(dados);
      })
      .catch(console.error);
  }
  console.log('Chegou aqui');
}

function teste() {
  $('html, body').animate(
    {
      scrollTop: $('#contact').offset().top,
    },
    2000
  );
  conparc = parcelas.join(';');
  console.log(parcelas);
  if (parcelas == '') {
    alert('Selecione uma  parcela');
  } else {
    fetch(
      'https://servicos.prefeituradearuja.sp.gov.br/tbw/loginWeb.jsp?execobj=Servicos&servico=guias&tipo=debitos&ccm=' +
        ccm +
        '&idparcela=' +
        conparc,
      requestOptions
    )
      .then(function (dados) {
        if (!dados.ok) {
          throw new Error('Erro de HTTP, status = ' + dados.status);
        }
        return dados.json();
      })
      .then(function (dados) {
        document.querySelector('#conteudo').style.display = 'block';
        document.querySelector(
          '#conteudo'
        ).innerHTML = `<table class="table table-striped table-hover">
          <thead>
              <tr>
                  <th scope="col">Valor</th>
                  <th scope="col">Vencimento</th>
                  <th scope="col">Código de Barras</th>
              </tr>
          </thead>
          <tbody>
          `;
        var tbody = document.querySelector('tbody');
        document.getElementById('buscar').innerHTML = 'Copiar Código de Barras';
        document
          .getElementById('buscar')
          .setAttribute('onclick', 'copiaBoleto(this.value);');
        var tabelist = document.createElement('tr');
        let data = new Date(dados.Boleto.dtVencimento);
        let dataFormatada =
          data.getDate() +
          '/' +
          (data.getMonth() + 1) +
          '/' +
          data.getFullYear();

        GerarCódigoDeBarras(dados.Boleto.codBarra);
        var valor = parseFloat(dados.Boleto.vlrDocumento);
        var debito = valor.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
        });
        console.log(dados.linkPDF);
        document.getElementById('novabusca').style.display = '';
        // document.getElementById('gerarboleto').style.display = '';
        // document
        //   .getElementById('gerarboleto')
        //   .setAttribute('onclick', 'geraBoleto(dados.linkPDF)');
        tabelist.innerHTML = '';
        tabelist.innerHTML += '<td>R$' + debito + '</td>';
        tabelist.innerHTML += '<td>' + dataFormatada + '</td>';
        // tabelist.innerHTML += `<td> <input type="text" name="codbol"  id="codbol" value="${dados.Boleto.Linha.replace(
        //   '-',
        //   ''
        // )}" readonly="readonly" style="border: none;
        //   background-color:#F2F2F2;
        //   width: 100%;" /> </td>`;
        tabelist.innerHTML += '<td><svg id="codBarras"></svg></td>';
        tbody.appendChild(tabelist);
        document.querySelector('#conteudo').innerHTML += `         
          </tbody>
          </table>
        `;
        console.log(dados);
      })
      .catch(console.error);
  }
  console.log('Chegou aqui');
}
function novaBusca() {
  alteraInput();
  buscaValor();
  document.getElementById('buscar').innerHTML = 'Buscar';
  document
    .getElementById('buscar')
    .removeAttribute('onclick', 'buscaParcelas(this);');
  document
    .getElementById('buscar')
    .removeAttribute('onclick', 'buscaParcelas;');
  document.getElementById('buscar').setAttribute('onclick', 'buscaValor()');
  parcelas = [];
  $('html, body').animate(
    {
      scrollTop: $('#contact').offset().top,
    },
    2000
  );
}

function geraBoleto(bol) {
  window.location.href = 'bol';
}

function copiaBoleto() {
  var textInput = document.getElementById('codbol');
  var copyButton = document.getElementById('buscar');
  textInput.select();
  document.execCommand('copy');
}

function GerarCodigoDeBarras(elementoInput) {
  let configuracao = {
    format: 'pharmacode',
    lineColor: '#0aa',
    width: 4,
    height: 40,
    displayValue: false,
    valid: function (valido) {
      if (valido) {
        document.getElementById('mensagem').innerHTML = 'Olá';
      } else {
        document.getElementById('mensagem').innerHTML = 'Valor invalido';
      }
    },
  };
  JsBarcode('#codBarras', elementoInput.value, configuracao);
}
