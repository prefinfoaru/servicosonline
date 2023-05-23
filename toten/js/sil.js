var myHeaders = new Headers();
myHeaders.append('Cookie', 'JSESSIONID=6241AD1F31C427A677616FEB2E5A145B');

var requestOptions = {
  method: 'GET',
  headers: myHeaders,
  redirect: 'follow',
};

function buscaValor(opc, valor) {
  parcelas = [];
  var numPesq = valor;

  // cpf.replace(/\D+/g, '');

  console.log(opc);

  if (opc == 'TAXAS') {
    if (numPesq.length == 0) {
      document.querySelector('#mensagem').style.display = 'block';
      document.querySelector('#mensagem').innerHTML =
        '<h3>Digite um CPF ou CNPJ Válido</h3>';
    } else {

      document.querySelector('#mensagem').style.display = 'block';
      document.querySelector('#mensagem').innerHTML =
        '<h3>Por favor aguarde, estamos buscando as informações...</h3>';
      fetch(
        'http://servicos.prefeituradearuja.sp.gov.br:8080/tbw/loginWeb.jsp?execobj=Servicos&servico=guias&tipo=debitosNormal&cnpj=' +
        numPesq,
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

            document.querySelector('#mensagem').style.display = 'block';
            document.querySelector('#mensagem').innerHTML =
              '<h3>Não há parcelas do exercício disponível para essa inscrição</h3>';
          } else {
            var div1 = document.getElementById('cont2');
            div1.style.cssText += 'display:none';
            var div2 = document.getElementById('cont3');
            div2.style.cssText += 'display:block';
            document.querySelector('#valor').style.display = 'block';
            document.querySelector(
              '#valor'
            ).innerHTML = `<table class="table table-striped  id="parcela">
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
            document.querySelector('#valor').innerHTML += `         
              </tbody>
              </table>`;

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
    document.querySelector('#mensagem').style.display = 'block';
    document.querySelector('#mensagem').innerHTML =
      '<h3>Por favor aguarde, estamos buscando as informações...</h3>';

    if (numPesq.length == 0) {
      document.querySelector('#mensagem').style.display = 'block';
      document.querySelector('#mensagem').innerHTML =
        '<h3>Digite uma Inscrição Válida</h3>';
    } else {
      fetch(
        'http://servicos.prefeituradearuja.sp.gov.br:8080/tbw/loginWeb.jsp?execobj=Servicos&servico=segunda_via&tipo=iptu&inscricao_fisico=' +
        numPesq,
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
              document.querySelector('#mensagem').style.display = 'block';
              document.querySelector('#mensagem').innerHTML =
                '<h3>Não foi localizado nenhum cadastro com essa inscrição</h3>';
            } else {
              document.querySelector('#mensagem').style.display = 'block';
              document.querySelector('#mensagem').innerHTML =
                '<h3>Não há parcelas do exerício dispoível para esse imóvel</h3>';
            }
          } else {
            idfisico = dados.Cadastro.idFisico;


            fetch(
              'http://servicos.prefeituradearuja.sp.gov.br:8080/tbw/loginWeb.jsp?execobj=Servicos&servico=guias&tipo=debitos&idfisico=' +
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
                  document.querySelector('#valor').style.display = 'block';
                  document.querySelector('#valor').innerHTML =
                    '<h3>Não há Débitos Disponiveis</h3>';
                } else {

                  var div1 = document.getElementById('cont2');
                  div1.style.cssText += 'display:none';
                  var div2 = document.getElementById('cont3');
                  div2.style.cssText += 'display:block';
                  document.querySelector('#valor').style.display = 'block';
                  document.querySelector(
                    '#valor'
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
                  document.querySelector('#valor').innerHTML += `         
              </tbody>
              </table>`;

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
var codBarra;
var valorAgrupado;
function adicionaIdPar(valor) {
  if (parcelas.indexOf(valor) === -1) {
    parcelas.push(valor);
  } else {
    parcelas.splice(parcelas.indexOf(valor), 1);
  }

  // console.log(parcelas);
  // console.log(ccm);
}
function buscaParcelas() {

  conparc = parcelas.join(';');
  console.log(parcelas);
  if (parcelas == '') {
    alert('Selecione uma  parcela');
  } else {
    document.querySelector('#mensagem2').style.display = 'block';
    document.querySelector('#mensagem2').innerHTML =
      '<h3>Calculando os Débitos Selecionados</h3>';
    fetch(
      'http://servicos.prefeituradearuja.sp.gov.br:8080/tbw/loginWeb.jsp?execobj=Servicos&servico=guias&tipo=debitos&idfisico=' +
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
        document.querySelector('#proc2').style.display = 'none';
        document.querySelector('#mensagem2').style.display = 'none';
        let data = new Date(dados.Boleto.dtVencimento);
        let dataFormatada =
          data.getDate() +
          '/' +
          (data.getMonth() + 1) +
          '/' +
          data.getFullYear();

        valorAgrupado = parseFloat(dados.Boleto.vlrDocumento);
        var debito = valorAgrupado.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
        });

        var codBoleto = dados.Boleto.Linha;
        codBarra = dados.Boleto.codBarra;
        document.querySelector(
          '#valor'
        ).innerHTML = `<table class="table table-striped table-hover" id="boleto">
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
        document.getElementById('buscar').value = "Imprimir";
        document
          .getElementById('buscar')
          .setAttribute('onclick', 'imprimirCodigo();');
        var tabelist = document.createElement('tr');
        tabelist.innerHTML = '';
        tabelist.innerHTML += '<td>R$' + debito + '</td>';
        tabelist.innerHTML += '<td>' + dataFormatada + '</td>';
        tabelist.innerHTML += `<td> <input type="text" name="codbol"  id="codbol" value="${codBoleto}" readonly="readonly" style="border: none;
            background-color:#F2F2F2;
            width: 100%;height:30px;" /> </td>`;

        tbody.appendChild(tabelist);
        document.querySelector('#valor').innerHTML += `         
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

  conparc = parcelas.join(';');
  console.log(parcelas);
  if (parcelas == '') {
    alert('Selecione uma  parcela');
  } else {
    fetch(
      'http://servicos.prefeituradearuja.sp.gov.br:8080/tbw/loginWeb.jsp?execobj=Servicos&servico=guias&tipo=debitos&ccm=' +
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
        document.querySelector('#valor').style.display = 'block';
        document.querySelector(
          '#valor'
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

        var codBoleto = dados.Boleto.Linha;
        codBarra = dados.Boleto.codBarra;
        valorAgrupado = parseFloat(dados.Boleto.vlrDocumento);
        var debito = valorAgrupado.toLocaleString('pt-BR', {
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
        tabelist.innerHTML += `<td> <input type="text" name="codbol"  id="codbol" value="${codBoleto}" readonly="readonly" style="border: none;
          background-color:#F2F2F2;
          width: 100%;" /> </td>`;
        tbody.appendChild(tabelist);
        document.querySelector('#conteudo').innerHTML += `         
          </tbody>
          </table>
        `;
        console.log(dados);
      })
      .catch(console.error);
  }
  console.log('Chegou aqui teste');
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





function imprimirCodigo() {


  var codigo = $("#boleto tr").find("td:last").html();

  console.log(codigo);


  var div = document.getElementById('cont3');
  div.style.cssText += 'display:none';




  var telacar = document.getElementById('telacarregamento');
  telacar.style.cssText += 'display:block';


  telacar.innerHTML += "<h1 class='centro palavra2' id='tela'>Aguarde, Processando as Informações!</h1><br><br>";
  telacar.innerHTML += "<center id='conteudo'><div class='c-loader '></div></center>";




  var com = document.getElementById('comprovante');
  com.innerHTML += "<img src='img/logo1.png' style='width: 20%;'>Prefeitura Municipal de Arujá<br>";
  com.innerHTML += "----------------------------------------------------------------";
  com.innerHTML += "<h5>Código de Barras referente ao  seu débito no valor de R$" + valorAgrupado.toLocaleString('pt-BR', { minimumFractionDigits: 2, }) + ".</h5>";
  // com.innerHTML += "<center><img src='img/qrcode.png' style='width: 50%;'></center>";
  com.innerHTML += "<svg id='barcode'></svg>";
  com.innerHTML += "----------------------------------------------------------------";




  setTimeout(function () {

    var telacar = document.getElementById('telacarregamento');
    telacar.style.cssText += 'display:none';
    var telacar = document.getElementById('telacarregamento2');
    telacar.style.cssText += 'display:block';
    document.getElementById('telacarregamento2').innerHTML += "<h1 class='centro palavra2'>Aguarde a impressão do seu Código de Barras!</h1><br><br>";

    document.getElementById('telacarregamento2').innerHTML += "<h1 class='centro palavra2'>Obrigado por usar o Totem!</h1><br><br><br>";

    document.getElementById('telacarregamento2').innerHTML += "<div id='nav'><ul ><button class='pullUp btnsec' onclick='window.print()' type='button'>Imprimir Novamente</button><button class='pullUp btnsec' onclick='paginaini()' type='button'>Finalizar</button></ul></div>";

    console.log('imprimiu');
    console.log(codBarra);
    window.print();
    window.close();
  }, 3000);
  JsBarcode("#barcode", codBarra);
}

function paginaini() {

  window.location.href = 'http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/toten/index.html';
}