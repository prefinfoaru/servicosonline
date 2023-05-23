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
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    
   
    <title>Sistema de Agendamento</title>
   
  </head>
  <body>
  	<div class="container-fluid">
        <div class="jumbotron">
          <a href="index.php"> 
              <img src="logo.png" class="logo">
            <h1>Agendamento</h1><br> 
          </a>
        </div><br>
        <form name="verifica_agendamento" id="form_valida" action="" method="POST">
            <div class="col-sm-3 col-sm-offset-4"> 
            <label>CPF</label>         
            <input class="form-control" type="text" id="cpf" name="cpf_agendamento" placeholder="Digite seu CPF" maxlength="14" onchange="ValidaCPF(this);" onkeydown="javascript: fMasc( this, mCPF );"  required>
            </div>
            <div class="col-sm-3 col-sm-offset-4"> 
                <br><button type="submit" class="btn btn-success"> Consultar Agendamento</button>
                <a href="index.php"><button type="button" class="btn btn-success">Voltar</button></a>
            </div>
        </form>
        <div class="col-sm-3 col-sm-offset-4">
          <hr>
        </div>
        <div class="col-sm-3 col-sm-offset-4"> 
        <?php
                if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>        
          <div id="resp_valida">  </div> <!-- recebe resposta no php, via ajax -->
        </div>
    </div>
    <footer class="footer navbar-fixed-bottom">
      <h3>Prefeitura Municipal de Arujá</h3>
    </footer>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
     <script>
       function ValidaCPF(){	
            var RegraValida=document.getElementById("cpf").value; 
            var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;	 
            if (cpfValido.test(RegraValida) == true)	{ 
            	
            } else	{	 
            alert("CPF Inválido");	
            }
              }
            function fMasc(objeto,mascara) {
          obj=objeto
          masc=mascara
          setTimeout("fMascEx()",1)
          }

            function fMascEx() {
          obj.value=masc(obj.value)
          }

            function mCPF(cpf){
          cpf=cpf.replace(/\D/g,"")
          cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
          cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
          cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
          return cpf
          }  
    </script>
     <script type="text/javascript" src="ajax.js"></script>
  </body>
</html>
