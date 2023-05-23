<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Sistema de Agendamento - Prefeitura Municipal de Arujá</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Favicons -->
    <link href="../acessibilidade/img/brasao.ico" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <script src="js/valida_cpf_cnpj.js"></script>
    <script src="js/corrige_cpf_cnpj.js"></script>
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <!-- <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    /> -->
    <link href="./css/bootstrap.css" rel="stylesheet" />
    <!-- <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" /> -->

    <link
      rel="stylesheet"
      type="text/css"
      href="./css/bootstrap-datepicker.min.css"
    />
   
    <!-- Template Main CSS File -->
    <link href="./assets/css/style.css" rel="stylesheet" />
      
 

  </head>

  <body>
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto">
          <img src="logo.png" class="img-responsive">
        </h1>
        <!-- <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="index.html">Agendar</a></li>
            <li><a href="#about">Consultar</a></li>
            <li><a href="#services">Cancelar</a></li>
          </ul>
        </nav> -->
      </div>
    </header>
    <!-- End Header -->

    <main id="main">
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Sistema de Agendamento</h2>
            <p>
              Digite o CPF no campo abaixo para realizar a consulta do seu agendamento.
            </p>
          </div>

          <div class="row">
            <div class="col-md-12" >
              <form name="verifica_agendamento" class="php-email-form" id="form_valida" action="" method="POST" >
              <div class="row" >
                <div class="form-group" >
                  <div class="col-sm-4 col-sm-offset-4"> 
                      <input
                        class="form-control"
                        type="text"
                        id="cpf"
                        name="cpf_agendamento"
                        placeholder="Digite seu CPF"
                        maxlength="14"
                        required
                      />
                     
                   </div>
                </div>
              
            </div><br>
            <div class="row" >
              <div class="col-md-12" style="text-align:center">
                      <button
                            type="submit"
                            class=" btn-success"
                            style="background:#5bc0de"
                          >
                            Consultar
                          </button>
                    </form>
                          <a href="index.php"><button type="button" class="btn btn-success">Voltar</button></a>
                </div>
                <div class="col-md-12" style="text-align:center"> 
                <?php
                        session_start();
                        if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>     
                <div id="resp_valida">  </div>    
             
            </div>
            
        
        </div>
          </div>
        </div>
      </section>
      <!-- End Contact Section -->
    </main>
    <!-- End #main -->

   
    
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    <script
      type="text/javascript"
      src="js/jquery.maskedinput-1.1.4.pack.js"
    ></script>
    <script src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
  </body>
</html>
