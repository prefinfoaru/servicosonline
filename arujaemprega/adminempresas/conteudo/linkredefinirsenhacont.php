<?php  
session_start();


include ("../data/conexao.php");
include ("../data/banco.php");


$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('?id=', $URL_ATUAL, 2);
$ft = $numprot[1];

  $consulta = "SELECT * FROM bd_emprega_aruja.tb_redefinitsenha_empresa where protocolo = '$ft';";
		
	$resultado_consulta = mysqli_query($conn, $consulta);
	$row_dados = mysqli_fetch_assoc($resultado_consulta);

	if($row_dados >= '1'){

    
		$id = $row_dados['id_solicitante'];//id solicitantes
		$data = $row_dados['data_solicitacao'];//data da confirmação
		$status = $row_dados['status'];//data da confirmação
		$datanow =  date("Y-m-d");//dia de hoje

		$date1 = date_create($data);
		$date2 = date_create($datanow);
		$diff = date_diff($date1,$date2);
		$dia =  $diff->format("%a");

		if($dia >= '1' || $status == '1'){

      echo  "<script>alert('Link indisponível!')</script>";
      echo 	"<script>window.location.href ='../pages/login.php'</script>"; 

		}else{ ?>

<link href="../assets/css/login.css" rel="stylesheet">



<script>
setTimeout(function() {
    $('#timemsg').fadeOut('slow');
}, 3000);
</script>



<br><br>
<br><br>
<div class="wrapper fadeInDown zero-raduis">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <!-- <img src="https://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
            <h2 class="my-5">Redefinir senha</h2>
        </div>
        <div id="timemsg">
            <?php // mensagem de erro que pega por sessão no processsamento pelo c_dados.
                  if(isset($_SESSION['msg']))
                  {
                  echo     $_SESSION['msg']   ;
                  unset   ($_SESSION['msg'])  ;
                  }
                ?>
        </div>
        <!-- Login Form -->
        <form method="POST" action="../data/valida/senhanova.php">
            <input id="password" type="password" class="form-control" name="password" placeholder="Digite a nova senha."
                required="">

            <input id="confirm_password" type="password" class="form-control" name="confirm_password"
                placeholder="Confirme a nova senha." required="" onChange="validatePassword()">


            <br>
            <br>
            <div align="center" class="g-recaptcha my-5" name="g-recaptcha-response"
                data-sitekey="6LeQASYaAAAAAEbWxAehNYw_KPvE4d-XY1rGsWSx"></div><br>

            <br>

            <input type="submit" class="fadeIn fourth zero-raduis" value="Atualizar">
            <input type="hidden" name="idlink" value="<?php echo  $ft;  ?>">

            <?php include "../includes/valida-senha.php"; ?>
        </form>


    </div>
</div>
<br><br>
<br><br>


<?php  
  
  }

} else{

  echo  "<script>alert('Redefinição de Senha não Solicitada')</script>";
  echo 	"<script>window.location.href ='../pages/redefinirsenha.php'</script>";    
  exit();

  }

?>