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
              Selecione uma data para cancelar.
            </p>
          </div>

          <div class="row php-email-form" >
            <div class="col-md-12" >
            <?php
				//Incluir a conexão com o BD
				include_once("conexao.php");

				//Receber os dados do formulário
				$cpf = addslashes($_POST['cpf_agendamento']);
        session_start();
				
				//Validação dos campos
				if(empty(addslashes($_POST['cpf_agendamento']))){
					$_SESSION['msg'] = "<div class='alert alert-warning'>Digite Seu CPF para cancelar</div>";
					echo '<script type="text/javascript">' . "\n";
					echo 'window.location="cancela.php";';
					echo '</script>';
				}else{
					//Busca no Banco
					///Verificação Se já possui um agendamento Com esse CPD
					$result_data = "SELECT * FROM agendamentos WHERE cpf = '$cpf' AND status_agenda ='0' ORDER BY data_agenda DESC ";
					$resultado_data = mysqli_query($conn, $result_data);
					if(mysqli_num_rows($resultado_data)>0)
					{?>
						<?php
							while($row_transacoes = mysqli_fetch_assoc($resultado_data)){
								$horario=$row_transacoes['horario_agenda'];
								$data=implode('/', array_reverse(explode('-', $row_transacoes['data_agenda'])));?>
								<a href="comprovantecancelamento.php?pdf=<?php echo($row_transacoes['id']);?>" targe="_blank"><div class="alert alert-primary" role="alert"> <?php echo($data);?> as <?php echo($horario);?> horas. </div></a><br>
							<?php
							}	
					}
					else
					{
						$_SESSION['msg'] = "<div class='alert alert-danger'>Você não possui nenhum agendamento para cancelar</div>";
						echo '<script type="text/javascript">' . "\n";
						echo 'window.location="cancela.php";';
						echo '</script>';
					}
				}
			?> 
                </div>
                <div class="col-md-12" style="text-align:center">
                  <a href="index.php"  ><button type="button" class="btn btn-success">Voltar</button></a>
                </div>
                <div class="col-md-12" style="text-align:center"> 
                <?php
                        
                        if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        // unset($_SESSION['msg']);
                    }
                ?>     
                 <div id="resp_cancela">  </div> 
             
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
   
  </body>
</html>
