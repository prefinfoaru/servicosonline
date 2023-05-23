<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Pagamentos de Tributos Municipais Prefeitura Municipal de Arujá</title>
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link href="./css/main.css" rel="stylesheet" media="all" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    
  </head>
    <?php include('include/header.php');?>
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="titulo">
                <h2>Pagamento de Tributos Municipais</h2>
            </div>
        <div class="page-wrapper p-t-45 p-b-50">
            
            <div class="wrapper wrapper--w790">
                <div class="card card-5">
                    
                <div class="card-heading">
                    <h2 class="title">Digite o código de barras do boleto</h2>
                </div>
                <div class="card-body">
                    <form name="formulario" action="simulacao.php" method="POST">
                    <div class="form-row">
                        <div class="name">Número</div>
                        <div class="value">
                        <div class="input-group">
                            <input
                            class="input--style-5"
                            type="text"
                            name="cod"
                            id="cod"
                            placeholder="Digite o código de barras do boleto"
                            required=""
                            />
                        </div>
                        </div>
                    </div>
                    <div id="pg"></div>
                    <div class="botao">
                        <button class="btn btn--radius-2 btn--blue" type="submit">
                        Confirmar
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <?php include('include/footer.php');?>
    </div>
</div>
</div>

 
    <script type="text/javascript">
      $('#cod').mask('00000000000-0 00000000000-0 00000000000-0 00000000000-0');
    </script>
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
