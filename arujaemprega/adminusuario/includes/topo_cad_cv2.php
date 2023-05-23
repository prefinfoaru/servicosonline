<script src="../assets/js/sweetalert.js" type="text/javascript"></script>
<link href="../assets/css/sweetalert.css" rel="stylesheet">
<link href="../assets/css/style-form.css" rel="stylesheet">

<?php 

include "../data/conexao.php"; 
include "../data/banco.php"; 
$pdo 		= Banco::conectar();
@$id_soli	= $_GET['soli'];
$URL_ATUAL 	= "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot 	= explode('res=', $URL_ATUAL, 2);

if(isset($numprot[1])){
  $res    =   $numprot[1];
	
}else{   
   $res = "";
        
}
         if ($res  == 6 ){?>

<script>
swal.fire({
    icon: 'info',
    title: 'PREENCHA TODAS AS ETAPAS!',
    html: '<p>Para realizar o login, você deve preencher todas as etapas do cadastro, obrigado!</p><hr><button  class="btn btn-default"><a style="color:#000" href="?soli=<?php echo $id_soli ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  } ?>