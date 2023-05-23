<?php
/**pega valor referente ao protocolo do requerimento */
$protocolo =  $_GET['protocolo'];

include "../controll/banco.php";
  

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <title>Subir Anexos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    
    
    <div class="form-group" align="center"><br>
     <h4>Anexar Arquivos para Requerimento</h4><hr>
        
        
        <div style="width: 80% ; background-color: #F5B2B3">
        <strong style="color: red">Observação:</strong><br> <i>Clique no botão escolher arquivos ou arraste um ou mais arquivos, verifique se a quantidade de arquivos selecionados está correta, após verificar clique em anexar. Logo abaixo na verificação de envio mostrará se os arquivos foram carregados e enviados com sucesso, após esse procedimento continue com o preenchimento do formulário.</i><br><br><br>
      </div>
        <hr>
        <form enctype="multipart/form-data" method="POST" action="">
        <div class="col-sm-10">          
        <input type="file" class="form-control" name="arquivo[]" multiple="multiple"  >
      </div>
    </div>
    
    
 <div class="form-group" align="center">
			
			
		
							<button type="submit" class="btn btn-warning" >Anexar</button>
 </div>
							
        </form>
			<br>
    <hr>
     <label class="control-label col-sm-2" for="pwd" style="color: #DF3A3C">Verificação de envio de arquivo:</label><br>
     
    
     <div class="form-group" align="center">
     
    <?php include "../consulta/upload.php" ?>
    
    </div>
    <?php 
      $buscaQnt = "SELECT count(protocolo) as qntProtocolo FROM bd_epda.tb_anexo where protocolo = '$protocolo'";
      $resultadoBuscaQnt = mysqli_query($conn, $buscaQnt);
      $rowDadosQnt = mysqli_fetch_assoc($resultadoBuscaQnt);
    ?>

    <label class="control-label col-sm-2" for="pwd" style="color: #DF3A3C"><?= $rowDadosQnt['qntProtocolo'] ?> Arquivos inseridos</label><br>
      
     <hr>
    <div class="form-group" align="center">
      <a href="#" onclick="javascript:window.open('', '_self', '').close()"><button class="btn btn-danger" type="button">Fechar</button></a>
    </div>
        
        </button>
</body>
</html>