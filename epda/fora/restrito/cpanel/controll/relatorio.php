<?php
include 'conexao.php';
include 'includes/QueryRelatorio.php'


?>

<meta charset="utf-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</script>
</head>

<div class="container">
   <div id="menu_acesso">

      <h3 align="center">Menu de Acesso aos Relat&oacute;rios</h3>
   </div><br>
   <div id="sub_titulo">
      <h4 style="color: #7A7A7A">TIPOS DE RELATÓRIOS</h4>
      <hr>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <p>


            <a href="#" class="btn btn-sq btn-default">
               <i><img src="./../img/rela.png" width="60px" height="60px" data-toggle="modal" data-target="#myModal"></i><br />
               Relat&oacute;rio <br>Geral Solicitação
            </a>

            <a href="#" class="btn btn-sq btn-default">
               <i><img src="./../img/image.png" width="60px" height="60px" data-toggle="modal" data-target="#myModal2"></i><br />
               Relat&oacute;rio <br>por Secretária
            </a>

            <a href="#" class="btn btn-sq btn-default">
               <i><img src="./../img/19-512.png" width="60px" height="60px" data-toggle="modal" data-target="#myModal3"></i><br />
               Relat&oacute;rio <br>por Departamento
            </a>

            <a href="#" class="btn btn-sq btn-default">
               <i><img src="./../img/1-relatorios.png" width="60px" height="60px" data-toggle="modal" data-target="#myModal4"></i><br />
               Relat&oacute;rio <br>por Funcionário
            </a>

            <hr>


            <br><br><br>
            <?php include 'modais.php' ?>
            <!-- ******************************************************************************************************************************************************* -->
            <!--    
    <div id= "sub_titulo">
    <h3>Departamentos</h3>
    </div>-->

            <!-- ******************************************************************************************************************************************************* -->

            <!-- off
        
            
    <a href="http://www.prefeituradearuja.sp.gov.br/transparencia/restrito/consultar.php" class="btn btn-sq btn-primary">
    <i><img src="img/transito.png" width="60px" height="60px" ></i><br/>
    Departamento <br>Transito
    </a> -->

            <!-- ******************************************************************************************************************************************************* -->
            <!-- <a href="#" class="btn btn-sq btn-warning">
    <i><img src="img/guarda.png" width="60px" height="60px" ></i><br/>
    Departamento <br>Guarda Municipal
    </a> -->

            <!-- ******************************************************************************************************************************************************* -->
            <!-- <a href="#" class="btn btn-sq btn-warning">
    <i><img src="img/comunicacao.png" width="60px" height="60px" ></i><br/>
    Departamento <br>Comunicação
    </a> -->
         </p><br><br><br>
         <!-- ******************************************************************************************************************************************************* -->




         <!-- ******************************************************************************************************************************************************* -->
         <a href="index.php" button class="btn btn-danger">Fechar </a></button>
      </div>
   </div>




</div>
</div>