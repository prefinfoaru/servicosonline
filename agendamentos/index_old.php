<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/valida_cpf_cnpj.js"></script>
    <script src="js/corrige_cpf_cnpj.js"></script>
    

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    
    <title>Sistema de Agendamento</title>
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
  	<div class="container-fluid">
      <div class="jumbotron"> 
          <img src="logo.png" class="logo">
    	   <h1>Agendamento</h1><br>      
      </div><br>
      <div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-contact100">
          <form class="contact100-form validate-form" id="form_consulta" method="post" action="">
            <span class="contact100-form-title">
              Preencha os dados abaixo para agendar
            </span>

            <div class="col-md-6" >
              <span class="label-input100">CPF</span>
              <input class="form-control" type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" maxlength="14"   required>
            </div>

            <div class="col-md-6" >
              <span class="label-input100">Nome Completo</span>
              <input class="form-control" type="text" maxlength="36" id="nome" name="nome" placeholder="Digite seu nome Completo" required="">
            </div>
            <div class="col-md-6">
              <span class="label-input100">Setor</span>
              <select  id="unidade_agenda" name="unidade_agenda" class="form-control">
                <option value="Cadastro">Cadastro</option>
                <option value="Dívida Ativa">Dívida Ativa</option>
                <option value="Dívisão de Rendas">Dívisão de Rendas</option>
                <option value="Habitação">Habitação</option>
                <option value="Obras">Obras</option>
                <option value="Ouvidoria">Ouvidoria</option>
              </select>
            </div>
            <div class="col-md-6">
              <span class="label-input100">Data</span>
              <input  data-provide="datepicker"  maxlength="10" id="data_agenda" class="datepicker form-control" name="data_agenda"  data-date-end-date="+20d"   onchange="validaHorario(this.value)" required>
            </div>
            <div class="col-md-3">
              <span class="label-input100" id="horaspan" style="display:none">Horarios</span>
                <select  class="form-control" id="gerarhr" style="width: 90px; padding: 6px; display:none">
                </select>
            </div>

            

            
          </form>

          <!-- vISUALIZAÇÃO DO AGENDAMENTO OCULTA-->
          <form id="form_agendamento" method="post" action="" style="clear: both;">
         
          <div class="col-sm-3 col-sm-offset-3">
                <!-- exibe data e horario escolhtype="hidden"ido -->
                  <input class="form-control"  type="hidden" id="nm_a" name="nome_agendamento" readonly>      
                  <input class="form-control"  type="hidden" id="cpf_a" name="cpf_agendamento" readonly> 
                  <input  type="hidden"class="form-control" id="uni_a" name="unidade_agendamento" readonly>
                  <input  type="hidden" class="form-control"  id="hr_a" name="horario_agendamento" readonly>  
                  <input  type="hidden" class="form-control"  id="dt_a" name="data_agendamento" readonly>   
                  <input  type="hidden" class="form-control"  id="pr_a" name="processo_agendamento" readonly>    
          </div>      
          <div class="col-sm-6 col-sm-offset-3">
            	<hr>
          </div>    
          <div class="col-md-12" style="text-align: center;">
                <button type="submit" id="agendar" class="btn btn-success" onclick="dataEhora()"> Agendar Atendimento </button> <a class="btn btn-primary btn_carrega_conteudo" href='consulta.php' id="pagina">Consultar Agendamentos</a>
                <a class="btn btn-primary btn_carrega_conteudo" href='cancela.php' id="pagina" style="background-color:#FE0000;border-color:#FE0000;">Cancelar Agendamentos</a><br><br>
                <p id="resp_agenda">  </p> <!-- recebe resposta no php, via ajax -->
          </form>
    			</div>
          <div class="col-md-12">
          <?php
                if(isset($_SESSION['msg'])){?>
                <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
              ?>
          </div>
        </div>
            
    </div>
    <footer class="footer navbar-fixed-bottom">
      <h3>Prefeitura Municipal de Arujá</h3>
    </footer>
   	<script src="js/bootstrap-datepicker.min.js"></script>
   	<script src="locales/bootstrap-datepicker.pt-BR.min.js"></script>
   	<script type="text/javascript">
	 var disabledDates = ['25/05/2020', '08/06/2020', '11/06/2020', '12/06/2020'];
   		$('.datepicker').datepicker({
    format: 'dd/mm/yyyy', 
    language: "pt-BR",
    weeKStart: 1,
   	todayBtn: 1,
   	autoclose: 'true',
   	todayHighlight: 1,
   	forceParse: 0,
     startDate: '-0d',
     daysOfWeekDisabled: "0,6",
     disableTouchKeyboard:	true,
	 datesDisabled: disabledDates
});
//Bloquear usuario de digitar data e somente selecionar pelo calendario
$(".datepicker").on("keydown", function() {
  event.preventDefault();
  return false;
});


	


  function validaHorario(str) {
      var xhttp;  
      if (str == "") {
        document.getElementById("horario_retorno").innerHTML = "";
        return;
      }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("gerarhr").innerHTML = this.responseText;
          if(document.getElementById("gerarhr").value == "")
          {
             
          }
          else{
              document.getElementById("gerarhr").style.display="block";
              document.getElementById("horaspan").style.display="block";
            console.log('dados');
          }
          
        }
      };
      xhttp.open("GET", "./consulta_horario.php?data="+str, true);
      xhttp.send();
    }
   	</script>
     <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
  </body>
</html>
