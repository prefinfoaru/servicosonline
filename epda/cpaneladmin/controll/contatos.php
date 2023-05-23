<?php 
include 'contatoquery.php'
                      
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<div class="resume">
    <header class="page-header">
    <h1 class="page-title">SECRETARIA DA EDUCAÇÃO</h1>
    
  </header>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading resume-heading">
        <div class="row">
          <div class="col-lg-10">
            <div class="col-xs-12 col-sm-4">
          
               <img src="http://localhost/intranet/cpanel/img/profiles/teste.jpg" width="160px" height="160px" >
             
              
              
              
            </div>

            <div class="col-xs-12 col-sm-8">
              <ul class="list-group">
                <li class="list-group-item"><?php echo $secretariaresp; ?></li>
                <li class="list-group-item">Secretária</li>
                
                <li class="list-group-item"><i class="fa fa-phone"></i> 000-000-0000 </li>
                <li class="list-group-item"><i class="fa fa-envelope"></i> educ.secretaria@aruja.sp.gov.br</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4 align="center">Estrutura</h4><hr>
        <p>
        &nbsp;A Secretaria de Educação de Arujá coordena a política educacional em conformidade com as legislações municipal, estadual e federal. Ela é a responsável pela administração das 35 unidades escolares do município e tem por objetivos a garantia de acesso do aluno à escola e a oferta de um ensino de qualidade, com educadores capacitados e estrutura física apropriada.
        </p>
       
      </div>
     

      <div class="bs-callout bs-callout-danger">
     
        <u
      </div>
   
      
    
    </div>
    <?php  Banco::desconectar();	 ?>
  </div>
</div>

</div>

</div>