
<?php  

$dia = date('d');
$mes = date('m');
$ano = date('Y');
$semana = date('w');
$cidade = "Arujá";

// configuração mes 

switch ($mes){

case 1: $mes = "Janeiro"	; break;
case 2: $mes = "Fevereiro"	; break;
case 3: $mes = "Março"		; break;
case 4: $mes = "Abril"		; break;
case 5: $mes = "Maio"		; break;
case 6: $mes = "Junho"		; break;
case 7: $mes = "Julho"		; break;
case 8: $mes = "Agosto"		; break;
case 9: $mes = "Setembro"	; break;
case 10: $mes = "Outubro"	; break;
case 11: $mes = "Novembro"	; break;
case 12: $mes = "Dezembro"	; break;

}


// configuração semana 

switch ($semana) {

case 0: $semana = "Domingo"			; break;
case 1: $semana = "Segunda Feira"	; break;
case 2: $semana = "Terça Feira"		; break;
case 3: $semana = "Quarta Feira"	; break;
case 4: $semana = "Quinta Feira"	; break;
case 5: $semana = "Sexta Feira"		; break;
case 6: $semana = "Sábado"			; break;

}
//Agora basta imprimir na tela...

//consulta banner

?>


<!DOCTYPE html>

<html lang="pt-br">
<meta charset="utf-8">  
<title>Prefeitura de Arujá - Emendas</title>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->

<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   
<script src="https://www.google.com/recaptcha/api.js" async defer></script> 
    
    
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav" >
               <li style="background: red;"><a href="http://www.portaldenoticias.prefeituradearuja.sp.gov.br/portalnoticias/category/covid-19/"  ><b>COVID-19 Arujá</b></a></li>
              <li><a href="http://www.prefeituradearuja.sp.gov.br/pages/conhecaaruja.php" >Conheça Arujá</a></li>
              <li><a href="http://www.prefeituradearuja.sp.gov.br/pages/servidor.php" >Servidor</a></li>
            </ul>
            
          </div>
          <div class="header_top_right">
            <p><?php echo ("$cidade, $semana, $dia de $mes de $ano");  ?></p>
          </div>
        </div>
      </div>



	<div class="col-lg-12 col-md-12 col-sm-12">
		
		<div class="header_bottom">

			<div class="logo_area"><a href="http://prefeituradearuja.sp.gov.br" class="logo"><img src="http://prefeituradearuja.sp.gov.br/images/brasaopma.png" alt=""></a></div>
			 <!-- <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div> -->

       
			




		</div>

	</div>
    </div>
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-5RF67CGH0Y"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-5RF67CGH0Y');
      </script>
  </header>
  
  <section id="navArea" >
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
        
        
      <div id="navbar" class="navbar-collapse collapse" style="background:#585858">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="http://prefeituradearuja.sp.gov.br/"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <li><a href="http://prefeituradearuja.sp.gov.br/pages/Adminstracao.php">Administração</a>
			 
			 
              <!--
             comentario para submenu caso precise utilizar
              <ul class="dropdown-menu" role="menu" >
              <li><a href="#">Acesso Contribuinte</a></li>
              </ul> -->
              <!--   <li><a href="pages/404.html">Acesso ao Contribuintes</a></li>
              <li class="dropdown"> <a href="http://prefeituradearuja.sp.gov.br/cti/atos/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Atos Municipais</a>-->
              <!--
               <ul class="dropdown-menu" role="menu">
              <li><a href="#">Cidadão</a></li>
               </ul>
            -->
            
          </li>
		      <li><a href="http://prefeituradearuja.sp.gov.br/cti/atos/">Atos Municipais</a></li>
          <li><a href="http://www.prefeituradearuja.sp.gov.br/pages/cartaservico.php">Carta de Serviços</a></li>          
          <!---<li><a href="http://prefeituradearuja.sp.gov.br/pages/concursos.php">Concursos</a></li> --->        
          <li><a href="http://prefeituradearuja.sp.gov.br/pages/sic.php">SIC</a></li>
          <li><a href="http://www.portaldenoticias.prefeituradearuja.sp.gov.br/portalnoticias/">Portal de Notícias</a></li>
          <li><a href="http://www.prefeituradearuja.sp.gov.br/pages/teluteis.php">Telefones Úteis</a></li>
          
        </ul>
      </div>
    </nav>
  </section>
