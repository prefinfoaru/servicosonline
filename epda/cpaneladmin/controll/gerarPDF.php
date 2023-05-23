
<?php	
// pega os proximos Valores dos GET
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('protocolo=', $URL_ATUAL, 2);
$ProtocoloRequerimento = $numprot[1];
include "conexao.php";
$pdo  = Banco::conectar();
$sqlConsultaRequerimento = "SELECT * FROM bd_epda.tb_layout_ata where num_Ata = '$ProtocoloRequerimento';" ;
$sqlConsultaToken = "SELECT * FROM bd_epda.token_membro where protocolo = '$ProtocoloRequerimento';" ;
$sqlfooter = "SELECT * FROM bd_epda.token_documento where protocolo = '$ProtocoloRequerimento';";
//referenciar o DomPDF com namespace

        $html = '<table class="table table-bordered">';	
		$html .= '<thead>';
		$html .= '<tr>';
		
		$html .= '<th>Nome</th>';
		$html .= '<th>Autenticação</th>';
		$html .= '</tr>';
		$html .= '</thead>';
		$html .= '<tbody>';

      


  foreach($pdo->query($sqlfooter)as $rowtokendoc){
    
     $tokendoc		= $rowtokendoc['token']  ;
	
       
  }


  foreach($pdo->query($sqlConsultaRequerimento)as $row){
    
     $data_dep_ano		= substr($row['data'] , -10,4)  ;
	 $data_dep_mes1	= substr($row['data'] , 5,2)  ;
	 $data_dep_dia		= substr($row['data'] , 8,2);   
     $datamod = $data_dep_dia."/".$data_dep_mes1."/".$data_dep_ano ;}

        

foreach($pdo->query($sqlConsultaToken)as $row2){
  
    $html .= '<tr>';
    $html .= '<td>'.$row2['membro']. "</td>";
	$html .= '<td>'.$row2['token']. "</td>";		
	}
	$html .= '</tr>';
	$html .= '</tbody>';
	$html .= '</table>';

	use Dompdf\Dompdf;
   /**cabeçario *************************************************************************************************************************************/  
require_once("../dompdf/autoload.inc.php");
	//Criando a Instancia
	
     $dompdf = new DOMPDF();	
	// Carrega seu HTML
  
	$dompdf->load_html('
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <i class="fas fa-chalkboard-teacher"></i><i class="fas fa-chalkboard-teacher"></i> <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                 <div class="col-lg-12" align="center">
          			<div class="form-panel">
                  	
                      
                  
                            <div class="container" >
 
  <div align="center"><br>
  <img src="../img/brasao.png" width="6%">
    <P><b style="font-size: 20px;">Prefeitura Municipal de Arujá</b>  <br>
    <b style="font-size: 13px;">- Estado de São Paulo -</b>  <br>
    <b style="font-size: 13px;">- EPDA - Escritório Plano Diretor de Arujá - </b><br><br><br>
 
  <table class="table table-bordered">
    <thead>
      <tr style=" text-align: center">
        <th style="text-align: center; font-size: 13px">- PARECER DO EPDA - ESCRITÓRIO PLANO DIRETOR DE ARUJÁ -</th>
   
        
        
      </tr>
    </thead>
        </tbody>
  </table>
<div class="container">
          
  <table class="table table-bordered"  >
    <thead>
      <tr style=" text-align: center">
        <th><b style="font-size: 14px;">ATA nº :</b> <i>'.$row['num_Ata'].'</i> </th>
        <th><b style="font-size: 14px;">Data :</b> <i>'.$datamod.'</i> </th>
        <th><b style="font-size: 14px;">Data :</b> <i>'.$row['numPortaria'].'</i> </th>
      </tr>
    </thead>    
   
    </tbody>
  </table>
     
      <table class="table table-bordered"  >
    <thead>
      <tr style=" text-align: center">
        <th><b style="font-size: 14px;">Processo nº :</b> <i>'.$row['processo'].'</i> </th>
        <th><b style="font-size: 14px;">Interessado :</b> <i>'. utf8_decode($row['interessado']).'</i> </th>
      </tr>
    </thead>    
   
    </tbody>
  </table>
     
     <table class="table table-bordered"  >
    <thead>
      <tr style=" text-align: center">
        <th><b style="font-size: 14px;">Apresentador :</b> <i>'.$row['apresentador'].'</i> <br>
        <b style="font-size: 14px;">Assunto :</b> <i>'.$row['assunto'].'</i>
        
        </th>
      </tr>
    </thead> 
    </tbody>
  </table>
     
     <table >
    <thead>
      <tr>
        '.$row['parecer'] .'
        </tr>
    </thead> 
    </tbody>
  </table>
     <br><br>
        
   <b style="text-align: center; font-size: 13px">- Membros do EPDA - Escritório do Plano Diretor de Arujá -</b>
  

     
     
     '. $html .'
   <table >
    <thead>
      <tr>
       Assinado Digitalmente pelo sistema EPDA da Prefeitura Municipal de Arujá : '.$tokendoc .'
        </tr>
    </thead> 
    </tbody>
  </table>
     
     ' );
   

 //   $dompdf->setPaper ('A4', 'landscape');// configura a pagina	
	//Limpando antes de renderizar
	
	//Renderizar o html
	$dompdf->render();
    ob_clean();
	//Exibibir a página
    $dompdf->set_paper("legal", "landscape");
    $dompdf->stream(
	"epda".$row['num_Ata'], array("Attachment" => false
	 //Para realizar o download somente alterar para true
		)
	);
?> 