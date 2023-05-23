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
        <h2>Agendamentos para cancelar</h2><br> 
      
        <div class="col-sm-3 col-sm-offset-4">
          <hr>
		  <h4>Selecione uma data</h4>
		  <div class="row">
		  <?php
				//Incluir a conexão com o BD
				include_once("conexao.php");

				//Receber os dados do formulário
				$cpf = addslashes($_POST['cpf_agendamento']);

				
				//Validação dos campos
				if(empty(addslashes($_POST['cpf_agendamento']))){
					$_SESSION['msg'] = "<div class='alert alert-warning'>Digite Seu CPF para cancelar</div>";
					echo '<script type="text/javascript">' . "\n";
					echo 'window.location="cancela.php";';
					echo '</script>';
				}else{
					//Busca no Banco
					///Verificação Se já possui um agendamento Com esse CPD
					$result_data = "SELECT * FROM agendamentos WHERE cpf = '$cpf' AND status_agenda ='0' ORDER BY data_agenda DESC ";
					$resultado_data = mysqli_query($conn, $result_data);
					if(mysqli_num_rows($resultado_data)>0)
					{?>
						<?php
							while($row_transacoes = mysqli_fetch_assoc($resultado_data)){
								$horario=$row_transacoes['horario_agenda'];
								$data=implode('/', array_reverse(explode('-', $row_transacoes['data_agenda'])));?>
								<a href="comprovantecancelamento.php?pdf=<?php echo($row_transacoes['id']);?>" targe="_blank"><div class="alert alert-primary" role="alert"> <?php echo($data);?> as <?php echo($horario);?> horas. </div></a><br>
							<?php
							}	
					}
					else
					{
						$_SESSION['msg'] = "<div class='alert alert-danger'>Você não possui nenhum agendamento para cancelar</div>";
						echo '<script type="text/javascript">' . "\n";
						echo 'window.location="cancela.php";';
						echo '</script>';
					}
				}
			?>
		</div>
		<div class="col-sm-3 col-sm-offset-4">
			<div class="container-fluid">
				<br><a href="index.php"><button type="button" class="btn btn-success">Voltar</button></a>
			</div>
		</div>
		
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
     
  </body>
</html>

