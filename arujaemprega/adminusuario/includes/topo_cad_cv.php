<?php 
session_start();

include "../data/conexao.php"; 
include "../data/banco.php"; 
$pdo = Banco::conectar();
@$cpf = $_GET['cod'];
$URL_ATUAL 	= "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot 	= explode('res=', $URL_ATUAL, 2);
	
	
?>
<script src="../assets/js/sweetalert.js" type="text/javascript"></script>
<link href="../assets/css/sweetalert.css" rel="stylesheet">
<link href="../assets/css/style-form.css" rel="stylesheet">
<script src="../assets/js/jsjs.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="../assets/css/style-form.css" rel="stylesheet">

<?php


if(isset($numprot[1])){
  $res    =   $numprot[1];
	
}else{   
   $res = "";
        
}
        if ($res == 1  ){ ?>

<script>
swal.fire({
    title: 'Cadastro de acesso efetuado com sucesso!<br>',
    icon: "success",
    html: '<p>Você será redirecionado para preenchimento do seu currículo.</p><hr><button  class="btn btn-default"><a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/cad_cv.php?cod=<?php echo $cpf ?>" class="">OK</a></button>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  } 

         if ($res  == 6 ){?>

<script>
swal.fire({
    icon: 'info',
    title: 'PREENCHA TODAS AS ETAPAS!',
    html: '<p>Para realizar o login, você deve preencher todas as etapas do cadastro, obrigado!</p><hr><button  class="btn btn-default"><a style="color:#000" href="?cod=<?php echo $cpf ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }

         if ($res == 2 ){?>

<script>
swal.fire({
    icon: 'error',
    title: 'Ocorreu um erro!',
    html: '<p>A foto deve estar em formato:<br> JPG / JPEG / PNG <br><br> Por favor, tente novamente!</p><hr><button  class="btn btn-default"><a style="color:#000" href="?cod=<?php echo $cpf ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }	