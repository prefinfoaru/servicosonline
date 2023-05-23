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
        <div align="center">
          <h2 class="mt-4">Finalizar Agendamentos</h2>
        </div><br>
    <?php
       $id=$_GET['id'];
       $busca_agendamentos = "SELECT * FROM agendamentos WHERE id='$id' ";
       $resultado_buscas = mysqli_query($conn, $busca_agendamentos);
       while($row_dados = mysqli_fetch_assoc($resultado_buscas)){
    ?>
   <form name="atualiza" method="POST" action="#">
       <div class="form-row">
           <div class="form-group col-md-6">
           <label>CPF</label>
           <input type="text" name="cpf_agendamento" class="form-control" id="cpf" value="<?php echo($row_dados['cpf']);?>" readonly   >
           </div>
           <div class="form-group col-md-6">
           <label>Nome</label>
           <input type="text" name="nome_agendamento" class="form-control" id="nome" value="<?php echo(utf8_encode($row_dados['nome']));?>" readonly>
           </div>
       </div>
       <div class="form-row">
         <div class="form-group col-md-8 ">
             <label>Tipo do Agendamento</label>
             <input type="text" name="tipo_agendamento" class="form-control" id="tipoagendamento" value="<?php echo(utf8_encode($row_dados['unidade_agenda']));?>" readonly>
         </div>
         <?php
               if($row_dados['unidade_agenda']=="Atendimento de comunique-se de processo físico")
               {?>
               <div class="form-group col-md-4">
                 <label>Numero do Processo</label>
                     <input type="text" name="processo_agendamento" class="form-control"  value="<?php echo($row_dados['processo_agenda']);?>" readonly>
               </div>
               <?php
               }
             ?>
       </div>
       <div class="form-row">
           <div class="form-group col-md-6">
               <label>Data do Agendamento</label>
               <input type="text" name="data_agendamento" class="form-control" id="data" value="<?php echo($row_dados['data_agenda']=implode('/', array_reverse(explode('-', $row_dados['data_agenda']))));?>" readonly>
           </div>
           <div class="form-group col-md-4">
           <label>Horario do Agendamento</label>
               <input type="text" name="horario_agendamento" class="form-control"  value="<?php echo($row_dados['horario_agenda']);?>" readonly>
           </div>
           <div class="form-group col-md-2">
           <label>Compareceu</label>
           <select id="compareceu" class="form-control" name="compareceu_agendamento">
               <?php
                   if(!empty($row_dados['compareceu_agenda']))
                   {?>
                       <option selected value="<?php echo(utf8_encode($row_dados['compareceu_agenda']));?>"><?php echo(utf8_encode($row_dados['compareceu_agenda']));?></option>
                   <?php
                   }
                   else
                   {?>
                       <option value="">Selecione uma das opções</option> 
                   <?php
                   }
                   if($row_dados['compareceu_agenda']=="Sim")
                   {

                   }
                   else
                   {?>
                       <option value="Sim">Sim</option>
                   <?php                                
                   }
                   if(utf8_encode($row_dados['compareceu_agenda'])=="Não")
                   {

                   }
                   else
                   {?>
                       <option value="Não">Não</option>
                   <?php                                
                   }?>  
           </select>
           </div>
       </div>
       <div class="form-group col-md-12">
           <label>Comentario do Atendimento</label>
           <textarea class="form-control" name="comentario_agendamento" id="comentario" rows="3" maxlength="320" ><?php echo(utf8_encode($row_dados['comentario_agenda']));?></textarea>
          <input type="hidden" id="id" name="id_agenda" value="<?php echo($row_dados['id']);?>">
          <button type="submit" name="salvar" value="salvar" class="btn btn-success">Salvar</button>
          <a href="finalizar.php"><button type="button" class="btn btn-primary">Cancelar</button></a><hr>
       </div>
       

   </form>
       <?php 
           }
           if(isset($_POST['salvar']))
           {
               //Receber os dados do formulário
               $id=addslashes($_POST['id_agenda']);
               $nome = addslashes(utf8_decode($_POST['nome_agendamento']));
               $cpf = addslashes($_POST['cpf_agendamento']);
               $data = addslashes($_POST['data_agendamento']);
               $horario=addslashes($_POST['horario_agendamento']);
               $processo=addslashes($_POST['processo_agendamento']);
               $unidade = addslashes(utf8_decode($_POST['tipo_agendamento']));
               $compareceu= addslashes(utf8_decode($_POST['compareceu_agendamento']));
               $comentario= addslashes(utf8_decode($_POST['comentario_agendamento']));
               
                //Tratando a data
                $data=implode('-', array_reverse(explode('/', $data)));

               if(empty($nome) || empty($cpf) || empty($data) || empty($horario) || empty($unidade) )
               {
                   echo ("<script LANGUAGE='Algum campo necessário não está preenchido!'>
                       window.alert('Ocorreu um erro!');
                       window.location.href='finalizar.php?id=$cpf';
                       </script>");
               }
               else
               {
                   $atualiza_dados= "UPDATE agendamentos
                   SET nome='$nome',cpf='$cpf',unidade_agenda='$unidade',processo_agenda='$processo',data_agenda='$data',horario_agenda='$horario',status_agenda = '2',compareceu_agenda= '$compareceu' ,comentario_agenda= '$comentario'
                   WHERE id='$id'";
                   $executa=mysqli_query($conn, $atualiza_dados);
                   if(mysqli_affected_rows($conn) >0)
                   {
                       echo ("<script LANGUAGE='JavaScript'>
                       window.alert('Informações Alteradas!');
                       window.location.href='finalizar.php';
                       </script>");
                       
                   }
                   else
                   {
                       echo ("<script LANGUAGE='JavaScript'>
                       window.alert('Não foi realizada nenhuma alteração!');
                       window.location.href='finalizar.php';
                       </script>");
                   }
               }
              
           }
        ?>
        
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
