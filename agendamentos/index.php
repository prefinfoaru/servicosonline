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
    <script type="text/javascript">
    function dataEhora(){
      var nome_agendamento=document.getElementById("nome").value;
      var cpf_agendamento=document.getElementById("cpf").value;
      var data_agendamento=document.getElementById("data_agenda").value;
      var unidade_agendamento=document.getElementById("unidade_agenda").value;
      var resp_agendamento=document.getElementById("gerarhr").value;
      
      if (nome_agendamento && cpf_agendamento  && data_agendamento && unidade_agendamento && resp_agendamento !="") {
        document.getElementById("nm_a").value=nome_agendamento;
        document.getElementById("cpf_a").value=cpf_agendamento;
        document.getElementById("dt_a").value=data_agendamento;
        document.getElementById("uni_a").value=unidade_agendamento;
        document.getElementById("hr_a").value=resp_agendamento;
      }
    }
  </script>
 
  <script type='text/javascript'>
			$(document).ready(function(){
				$("input[name='cpf']").blur(function(){
					var $nome = $("input[name='nome']");
					$.getJSON('function.php',{ 
						cpf: $( this ).val() 
					},function( json ){
						$nome.val( json.nome );
					});
				});
			});
      
		</script>
    
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
              Preencha as informações abaixo para agendar uma data e horario de
              atendimento na Prefeitura Municipal de Arujá
            </p>
          </div>

          <div class="row">
            <div class="col-md-12">
              <form
                method="post"
                role="form"
                class="php-email-form"
                id="form_consulta"  action=""
              >
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">CPF</label>
                      <input
                        class="form-control"
                        type="text"
                        id="cpf"
                        name="cpf"
                        placeholder="Digite seu CPF"
                        maxlength="14"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nome Completo</label>
                      <input
                        class="form-control"
                        type="text"
                        maxlength="36"
                        id="nome"
                        name="nome"
                        placeholder="Digite seu nome Completo"
                        required=""
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Setor</label>
                      <select
                        id="unidade_agenda"
                        name="unidade_agenda"
                        class="form-control" onchange="validaHorario()"
                      >
                        <option value="">Selecione o setor</option>
                        <option value="Cadastro">Cadastro</option>
                        <option value="Dívida Ativa">Dívida Ativa</option>
                        <option value="Dívisão de Rendas">
                          Dívisão de Rendas
                        </option>
                        <option value="Habitação">Habitação</option>
                        <option value="Obras">Obras</option>
                        <option value="Ouvidoria">Ouvidoria</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="bmd-label-floating">Data</label>
                    <input
                      data-provide="datepicker"
                      maxlength="10"
                      id="data_agenda"
                      class="datepicker form-control"
                      name="data_agenda"
                      data-date-end-date="+20d"
                      onchange="validaHorario(this.value)"
                      placeholder="Selecione a data"
                      required
                    />
                  </div>
                  <div class="col-md-3">
                      <label class="bmd-label-floating" id="horaspan" style="display:none">Horarios</label>
                      <select  class="form-control" id="gerarhr" style="width: 160px;  display:none">
                      </select>
                  </div>
                </div>
               </form>
               
                  <div class="row" >
                    <div class="col-md-12" style="text-align: center;">
                        <div class="col-md-12">
                          <?php
                                session_start();
                                if(isset($_SESSION['msg'])){?>
                                <?php
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                                }
                              ?>
                          
                        </div>
                      <form id="form_agendamento" method="post" action="" class="php-email-form">
                     
                      <!-- exibe data e horario escolhtype="hidden"ido -->
                            <input class="form-control"  type="hidden" id="nm_a" name="nome_agendamento" readonly>      
                            <input class="form-control"  type="hidden" id="cpf_a" name="cpf_agendamento" readonly> 
                            <input  type="hidden"class="form-control" id="uni_a" name="unidade_agendamento" readonly>
                            <input  type="hidden" class="form-control"  id="hr_a" name="horario_agendamento" readonly>  
                            <input  type="hidden" class="form-control"  id="dt_a" name="data_agendamento" readonly>   
                            <input  type="hidden" class="form-control"  id="pr_a" name="processo_agendamento" readonly>    

                      <button
                        type="submit"
                        class="btn btn-success"
                        onclick="dataEhora()"
                      >
                        Agendar Atendimento
                      </button>
                        <a class="btn btn-info"  href='consulta.php'>
                          Consultar Agendamento
                        </a>
                        <a class="btn btn-danger"  href='cancela.php'>
                        Cancelar Agendamento
                        </a>
                      </div>
                    </div>
                    
                </form>
            
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

    <script src="./js/bootstrap-datepicker.min.js"></script>
    <script src="./locales/bootstrap-datepicker.pt-BR.min.js"></script>
    <script type="text/javascript">
      var disabledDates = [
        '02/04/2021',
        '21/04/2021',
        '01/05/2021',
        '03/06/2021',
        '04/06/2021',
        '07/06/2021',
        '08/06/2021',
        '09/07/2021',
        '06/08/2021',
        '06/09/2021',
        '07/09/2021',
        '11/10/2021',
        '12/10/2021',
        '29/10/2021',
        '01/11/2021',
        '02/11/2021',
        '15/11/2021',
        '20/11/2021',
        '24/12/2021',
        '25/12/2021',
        '31/12/2021',
      ];
      $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weeKStart: 1,
        todayBtn: 1,
        autoclose: 'true',
        todayHighlight: 1,
        forceParse: 0,
        startDate: '-0d',
        daysOfWeekDisabled: '0,6',
        disableTouchKeyboard: true,
        datesDisabled: disabledDates,
      });
      //Bloquear usuario de digitar data e somente selecionar pelo calendario
      $('.datepicker').on('keydown', function () {
        event.preventDefault();
        return false;
      });

      function validaHorario(str) {
        var data_brasileira = document.getElementById('data_agenda').value;
                var data = data_brasileira.split('/').reverse().join('-');
                var unidade =document.getElementById('unidade_agenda').value;
                if(unidade ==''){
                  alert("Escolha o Setor Primeiro");
                } 
                console.log(unidade);
        var xhttp;
        if (str == '') {
          document.getElementById('horario_retorno').innerHTML = '';
          return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('gerarhr').innerHTML = this.responseText;
            if (document.getElementById('gerarhr').value == '') {
              if(data!='')
              {
                document.getElementById('gerarhr').style.display = 'block';
                document.getElementById('horaspan').style.display = 'block';
              }
            } else {
              if(data==""){
                document.getElementById('gerarhr').style.display = 'none';
                document.getElementById('horaspan').style.display = 'none';
              }
              else
              {
                document.getElementById('gerarhr').style.display = 'block';
                document.getElementById('horaspan').style.display = 'block';
                console.log('dados');
              }
            }
          }
        };
        xhttp.open('GET', './consulta_horario.php?data=' + data+'&unidade='+unidade, true);
        xhttp.send();
      }
    </script>
    <script
      type="text/javascript"
      src="js/jquery.maskedinput-1.1.4.pack.js"
    ></script>
    <script src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
  </body>
</html>
