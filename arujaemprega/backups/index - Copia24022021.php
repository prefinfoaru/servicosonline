<!DOCTYPE html>

<?php
include "padrao/header.php";
include "data/banco.php" ;


?>
	
<link href="assets/css/style-panel-vagas.css" rel="stylesheet">
<link href="assets/css/style_carousel_index.css" rel="stylesheet">
		
<!-- ***************************** PLUGIN OWL CAROUSEL ************************************************-->	 
	  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>  
	
<!-- **************************************************************************************************-->			
		
		
	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12" align="center">
					<h1>BUSQUE SEU EMPREGO !</h1>
					<form class="form-inline" role="form">
					  <div class="form-group">
					    <input type="email" class="form-control" size="48" id="exampleInputEmail1"  placeholder="Digite o Cargo ou área profissional">
					  </div>
					  <button type="submit" class="btn btn-info btn-lg">Buscar</button><br><br>
                        <i style="background-color:#F7F7F7">&nbsp;&nbsp;&nbsp;Exemplos: Gerente Financeira, Vendedor, Professor, Outros&nbsp;&nbsp;&nbsp;</i>
					</form>					
				</div><!-- /col-lg-6 --> <br>
			<!--	<div class="col-lg-6" align="center">
					<img class="img-responsive" src="assets/img/ipad-hand.png" alt="">
				</div> /col-lg-6 -->
				
			</div><!-- /row -->
		</div><!-- /container -->
		<br>
	</div><!-- /headerwrap -->
	




	<div class="container">
     
		<div class="row mt centered panel-vagas-border">
           
			<div class="panel-vagas col-md-6"><hr style="background-color:#F7F7F8 "></div>			
			<div class="panel-vagas col-md-6"><hr style="background-color:#F7F7F8 "></div>
			<?php	include "include/panel_vagas_cadastradas.php" ?>
		</div><!-- /row -->
		
		<div class="container back-carousel">
			<div class="col-md-12 text-center">
				<h4 style="color: #9A9A9A"><b>EMPRESAS QUE ESTÃO CONTRATANDO</b></h4>
			</div><br>
			<div class="owl-carousel owl-theme carousel-text">
            <?php	include "include/seleciona_img_empresa.php" ?>
			</div>
		</div>
	</div><br><br>

	<div class="container dados-align">
		
	<div class="col-xl-6 col-lg-4 col-md-6 col-sm-12"><br>
		<div class="our-services-wrapper ">
			<div class="services-inner cardtam">
				
				<div class="our-services-text zoom-dados">
                    <i class="glyphicon glyphicon-th-list" style="font-size:48px;color:#3498db"></i><br>
					<span>Vagas de Emprego<br>
				<a href="">Procure Vagas</span></a>			
				</div>
			</div>
		</div><br>
	</div>	
		
	<div class="col-xl-6 col-lg-4 col-md-6 col-sm-12"><br>
		<div class="our-services-wrapper ">
			<div class="services-inner cardtam">
				<div class="our-services-text zoom-dados">
                    <i class="glyphicon glyphicon-star-empty" style="font-size:48px;color:#3498db"></i><br>
					<span>	Avaliações de Empresas<br>
				<a href="">Veja O Ranking</span></a>	
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
		<div class="our-services-wrapper ">
			<div class="services-inner cardtam">
				<div class="our-services-img">
					<img src="" width="68px" alt="">
				</div>
				<div class="our-services-text zoom-dados">
                    <i class="glyphicon glyphicon-list-alt" style="font-size:48px;color:#3498db"></i><br>
					<span>	Empresas Cadastradas<br>
				<a href="">Procure Empresas</span></a>
				</div>
			</div>
		</div>
	</div>
	</div>
	<br><br>

	
	
<?php

 
include "padrao/footer.php"; ?>
<!-- ** TEMPO DE ROTAÇÃO DO CAROUSEL ****************************************************************-->
	<script>
		 
		 $('.owl-carousel').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			autoplay: true,
			autoplayTimeout: 8000,
			 
			responsive:{
				0:{
					items:3
				},
				600:{
					items:5
				},
				1000:{
					items:8
				}
			}
		 })

	 	</script>  
 
