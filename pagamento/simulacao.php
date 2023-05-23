<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Simulação de Pagamento de Tributos Municipais</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/simula.css" rel="stylesheet" media="all" />

    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link href="./css/main.css" rel="stylesheet" media="all" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Alerta -->
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
  </head>
  <body>
      <?php 
        
        $boleto= addslashes($_POST['cod']);
        include('funcoes/valida_boleto.php'); 
       
        if(boleto($boleto) == 1 && $valida == 1 )
        {
          $codigoBarras = str_replace([' ', '-'], '', $boleto);
          if (!preg_match("/^[0-9]{48}$/", $codigoBarras)) {
              return 0;
          }
          //include('funcoes/consulta.php');
          include('funcoes/credpay.php');
          credPayInfo($valor);
          include('include/header.php');
      ?>
        <form name="formulario" method="POST" action="funcoes/envia.php">
      <!-- <div class="container mb-5 mt-5">
        <div class="pricing card-deck flex-column flex-md-row mb-3"> -->
            <!-- <div class="card card-pricing text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">SelfPay</span>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15"><span class="price">Valor no Débito</span><span class="h6 text-muted ml-2"></span></h1>
                </div>
                <div class="card-body pt-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Valor do Débito</th>
                      <th scope="col">Valor a pagar</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php //buscaValoresDeb($valor);?>
                  </tbody>
                </table>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15"><span class="price">Valores no Crédito</span><span class="h6 text-muted ml-2"></span></h1>
                </div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Valor do Débito</th>
                      <th scope="col">Valor a pagar</th>
                      <th scope="col">QTD parcelas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php //buscaValoresCred($valor);?>
                  </tbody>
                </table>
                <input type="submit"  class="btn btn-primary" name="acessarself" value="Acessar">
                </div>
            </div> --> 
            <div class="card card-pricing text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">CredPay</span>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15"><span class="price">Valor no Débito</span><span class="h6 text-muted ml-2"></span></h1>
                </div>
                <div class="card-body pt-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Valor do Débito</th>
                      <th scope="col">Valor a pagar</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        credPayDeb();
                      ?>
                  </tbody>
                </table>
                <div class="bg-transparent card-header pt-4 border-0">
                    <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15"><span class="price">Valores no Crédito</span><span class="h6 text-muted ml-2"></span></h1>
                </div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Valor do Débito</th>
                      <th scope="col">Valor a pagar</th>
                      <th scope="col">QTD parcelas</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        credPayCred();
                      ?>
                  </tbody>
                </table>
                  <div class="flex-box container-box">
                    <input type="submit"  class="btn btn-primary" name="acessarcred" value="Acessar">
                  </div>
                  <input type="hidden" name="codbarras" value="<?php echo($codigoBarras);?>">
                </form>
                </div>
            </div>
        </div>
        <div class="text-muted mt-5 mb-5 text-center small">
          <a href="http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/pagamento"><button type="button" class="btn btn-primary" >Voltar</button>
          </a>
        </div>
        <?php include('include/footer.php');?>
    </div>
    <?php
        }
        else
        {
          ?>
             <script>
                var closable = alertify.alert().setting('closable');
                alertify.alert('Boleto Inválido', '');
                alertify.alert()
                .setting({
                    'label':'Voltar',
                    'message': 'Boleto indisponível ' + (closable ? ' ' : ' not ') + 'para pagamento.' ,
                    'onok': function(){ 
                      window.location.href = "http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/pagamento/";
                    }
                }).show();
            </script>
        <?php
        }
    ?>
     <script src="./assets/js/jquery.min.js"></script> 
    <script src="./assets/js/wow.min.js"></script> 
    <script src="./assets/js/bootstrap.min.js"></script> 
    <script src="./assets/js/slick.min.js"></script> 
    <script src="./assets/js/jquery.li-scroller.1.0.js"></script> 
    <script src="./assets/js/jquery.newsTicker.min.js"></script> 
    <script src="./assets/js/jquery.fancybox.pack.js"></script> 
    <script src="./assets/js/custom.js"></script>
  </body>
</html>
