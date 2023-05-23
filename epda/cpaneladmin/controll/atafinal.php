<?php
// pega os proximos Valores dos GET
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('protocolo=', $URL_ATUAL, 2);
$ProtocoloRequerimento = $numprot[1];
include "conexao.php";
$pdo  = Banco::conectar();
$sqlConsultaRequerimento = "SELECT * FROM bd_epda.tb_layout_ata where num_Ata = '$ProtocoloRequerimento';" ; 


?>

<i class="fas fa-chalkboard-teacher"></i><i class="fas fa-chalkboard-teacher"></i> <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                 <div class="col-lg-12" align="center">
          			<div class="form-panel">
                  	
                         <h7><i style="color:#F48D8F">Não utilizar essa consulta como documento oficial a mesma não possui a assinatura digital obrigatória</i></h7>
                  
                            <div class="container" >
 
  <div align="center"><br>
  <img src="./img/brasao.png" width="6%">
    <P><b style="font-size: 25px;">Prefeitura Municipal de Arujá</b>  <br>
    <b style="font-size: 15px;">- Estado de São Paulo -</b>  <br>
    <b style="font-size: 15px;">- EPDA - Escritório Plano Diretor de Arujá - </b><br><br><br>
 
  <table class="table table-bordered">
    <thead>
      <tr style=" text-align: center">
        <th style="text-align: center; font-size: 15px">- PARECER DO EPDA - ESCRITÓRIO PLANO DIRETOR DE ARUJÁ -</th>
   
        
        
      </tr>
    </thead>
      
<div class="container">
          
  <table class="table table-bordered"  >
    <thead>
      <tr style=" text-align: center">
        <th style="text-align: center">ATA nº </th>
        <th style="text-align: center">Data: </th>
        <th style="text-align: center">Portaria nº: </th>
        
        
        
      </tr>
    </thead>
    <tbody>
    <tr>
    <?php 
	foreach($pdo->query($sqlConsultaRequerimento)as $row){
	    echo '<tr style="font-size: 12px; text-align: center " >';
	    echo '<td title="'.$row['num_Ata'].'">'									. $row['num_Ata'] 				 		 . '</td>';		
		echo '<td title="'.$row['data'].'">'								. $row['data'] 				 		 . '</td>';		
		echo '<td title="'.$row['numPortaria'].'">'									. $row['numPortaria'] 				 		 . '</td>';
		
	
		echo '<tr>';
		}
	?> 
    </tr>
      
    </tbody>
  </table>
</div>
      
<!--- 2 Divisão table ------------------------------------------------------------------------------------------------------------------------------------>
        
          
  <table class="table table-bordered"  >
    <thead>
      <tr style=" text-align: center">
        <th style="text-align: center">Processo: </th>
        <th style="text-align: center">Interessado: </th>
       
        
        
        
      </tr>
    </thead>
    <tbody>
    <tr>
    <?php 
	foreach($pdo->query($sqlConsultaRequerimento)as $row){
	    echo '<tr style="font-size: 12px; text-align: center " >';
	    echo '<td title="'.$row['processo'].'">'									. $row['processo'] 				 		 . '</td>';		
		echo '<td title="'.$row['interessado'].'">'								    . $row['interessado'] 				 		 . '</td>';		
	
	
		echo '<tr>';
		}
	?> 
    </tr>
      
    </tbody>
  </table>
      
      <!--- 3 Divisão table ------------------------------------------------------------------------------------------------------------------------------------>
        
          
  <table class="table table-bordered"  >
    <thead>
      <tr style=" text-align: center">
        <th style="text-align: center">Apresentador: </th>
        <th style="text-align: center">Assunto: </th>
       
        
        
        
      </tr>
    </thead>
    <tbody>
    <tr>
    <?php 
	foreach($pdo->query($sqlConsultaRequerimento)as $row){
	    echo '<tr style="font-size: 12px; text-align: center " >';
	 echo '<td title="'.$row['apresentador'].'">'									. $row['apresentador'] 				 		 . '</td>';		
		echo '<td title="'.$row['assunto'].'">'								. $row['assunto'] 				 		 . '</td>';		
	
		echo '<tr>';
		}
	?> 
    </tr>
      
    </tbody>
  </table>
      
   <table class="table"  >
  
    <tbody>
    <tr>
    <?php 
	foreach($pdo->query($sqlConsultaRequerimento)as $row){
	    echo '<tr  >';
	      echo '<td>'									. $row['parecer'] 				 		 . '</td>';		
		 
	
		echo '<tr>';
		}
	?> 
    </tr>
      
    </tbody>
  </table><hr>
                  
        <div align="left" >Clique aqui para Emitir a sua ATA -> <a href="<?php echo "http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpaneladmin/controll/gerarPDF.php?protocolo=".$row['num_Ata']?>" target="_blank"> <img src="./img/pdf-logo.png" width="4%"></a></div>        