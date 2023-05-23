<?php
session_start();
	if(!isset($_SESSION["login"])){
		header ("Location: index.php?msg=2");
  }
?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Consulta de Agendamento</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="../css/estilo.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker.min.css">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">
   
      <div class="list-group list-group-flush" >
      <div class="img_logo">
        <img src="../prefeitura.png" style="width: 43px;" class="logo"><span class="texto_logo">PREFEITURA MUNICIPAL DE ARUJÁ</span>
      </div>
          <a href="../index.php" class="list-group-item list-group-item-action " target="_blank">Cadastrar Agendamento</a>
          <a href="../consulta.php" class="list-group-item list-group-item-action " target="_blank">Consulta Protocolo</a>
          <a href="finalizar.php" class="list-group-item list-group-item-action nav-link" target="_blank">Finalizar Agendamento</a> 
        <!-- <a href="consultando.php" class="list-group-item list-group-item-action ">Consultar Agendamento</a> -->
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: #AACAE2;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="user">
          <p style="color:#fff;">Seja Bem-Vindo, <?php echo($_SESSION["login"])?>!	</p>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active" id="esconde">
              <a href="../index.php" class="nav-link" target="_blank" style="color:#fff;">Cadastrar Agendamento</a>
              <a href="../consulta.php" class="nav-link" target="_blank" style="color:#fff;">Consulta Protocolo</a>
              <a href="finalizar.php" class="nav-link" target="_blank" style="color:#fff;">Finalizar Agendamento</a> 
              <a class="nav-link" href="logout.php" style="color:#fff;"> Sair <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid fundo_cont" align="center"><br>
        <h2 class="mt-4">Consultar Agendamentos</h2>
        <p>Selecione uma data abaixo e clique em gerar para visualizar os agendamentos.</p>
        <form id="form_consulta" method="post" action="relatorio.php" target="_blank">  
            <div class="col-sm-6 col-sm-offset-3"><br>
              <label>Data </label>
              <input  data-provide="datepicker"  id="data_agenda" class="datepicker" name="data" placeholder="Data"  autocomplete="off" >
              <button type="submit" class="btn btn-primary "> Visualizar Agendamentos</button><br><br><br><br>
            </div>
        </form>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- <footer class="footer navbar-fixed-bottom">
      <h3>Prefeitura Municipal de Arujá</h3>
  </footer> -->
  <!-- /#wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap-datepicker.min.js"></script>
   	<script src="../locales/bootstrap-datepicker.pt-BR.min.js"></script>
   	<script type="text/javascript">
   		$('.datepicker').datepicker({
            format: 'dd/mm/yyyy', 
            language: "pt-BR",
            weeKStart: 1,
            todayBtn: 1,
            autoclose: 'true',
            todayHighlight: 1,
            forceParse: 0,
            format: 'dd/mm/yyyy', 
            daysOfWeekDisabled: "0,6",
             disableTouchKeyboard:	true
            });
            //Bloquear usuario de digitar data e somente selecionar pelo calendario
            $(".datepicker").on("keydown", function() {
              event.preventDefault();
              return false;
            });

    </script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
