<?php
     include_once("../conexao.php");    
    session_start();
	if(!isset($_SESSION["login"])){
		header ("Location: index.php?msg=2");
  }
?> 

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
    
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"/>

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
      href="../css/bootstrap-datepicker.min.css"
    />
   
    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  </head>

  <body>
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto">
          <img src="../logo.png" class="img-responsive">
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
          
        <div class="card-body" style="box-shadow: none;">
							<div class="table-responsive" style="box-shadow: none;">
								<table  class ="table table-borderless" id="dataTable" width="100%" cellspacing="0" style="box-shadow: none; font-size: 12px;" >
              <thead style="background-color: #f6f7ff;">
                  <tr>
                      <th scope="col">Nome</th>
                      <th>CPF</th>
                      <th>Unidade</th>
                      <th>Data</th>
                      <th>Horario</th>
                      <th>Compareceu</th>
                      <th>Comentario</th>
                      <th>Editar</th>
                  </tr>
              </thead>
              <tbody style="background-color: #fff;">
              <?php
                  $hoje=date('Y-m-d');
                  $busca_agendamentos = "SELECT * FROM agendamentos WHERE data_agenda='$hoje' AND status_agenda='0' OR data_agenda='$hoje' AND status_agenda='2' ";
                  $resultado_buscas = mysqli_query($conn, $busca_agendamentos);
                  while($row_dados = mysqli_fetch_assoc($resultado_buscas)){
              ?>
                  <tr>
                      <td><?php echo utf8_encode($row_dados['nome']);?></td>
                      <td><?php echo($row_dados['cpf']);?></td>
                      <td><?php echo(utf8_encode($row_dados['unidade_agenda']));?></td>
                      <td><?php echo($row_dados['data_agenda']=implode('/', array_reverse(explode('-', $row_dados['data_agenda']))));?></td>
                      <td><?php echo($row_dados['horario_agenda']);?></td>
                      <td><?php echo(utf8_encode($row_dados['compareceu_agenda']));?></td>
                      <td><?php echo(utf8_encode($row_dados['comentario_agenda']));?></td>
                      <td><button class="btnn btn-success btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row_dados['id']; ?>">Editar</button></td>
                  </tr>

<!-- The Modal -->
<div id="myModal<?php echo $row_dados['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Deseja realmente acessar e fazer alterações?</h4>
      </div>
      <!-- <div class="modal-body">
        <p>Some text in the modal.</p>
      </div> -->
      <div class="modal-footer">
        <a href="finalizaconsulta.php?id=<?php echo $row_dados['id']; ?>"><button type="button" class="btn btn-success">Sim</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
      </div>
    </div>

  </div>
</div>


                  <?php 
                  }
                  ?>
              </tbody>
              </table>
							</div>
							<!-- /.container-fluid -->
						</div>
						<!-- End of Main Content -->
          </div>
        </div>
      </section>
      <!-- End Contact Section -->
    </main>
    <!-- End #main -->

   
    
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>


    <script
      type="text/javascript"
      src="../js/jquery.maskedinput-1.1.4.pack.js"
    ></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../ajax.js"></script>
  </body>
</html>
