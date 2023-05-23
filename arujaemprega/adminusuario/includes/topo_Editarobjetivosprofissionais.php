<?php //include "../data/for/for_edit_cv.php" 
              
              //conexao com banco ********************************************************************************************************************************************************************************

include  "./data/conexao.php";
include  "./data/banco.php";
$pdo = Banco::conectar();

$URL_ATUAL 	= "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id_soli	= $_GET['id'];
$numprot 	= explode('res=', $URL_ATUAL, 2);
$saida	 	= explode('saida=', $URL_ATUAL, 2);
  		

if(isset($saida[1])){
  $sair    =   $saida[1];
	
}else{   
  $sair = "";
        
}

if(isset($id_soli)){
  $id    =   $id_soli;
	
}else{   
   $id = "";
        
}

if(isset($numprot[1])){
  $res    =   $numprot[1];
	
}else{   
   $res = "";
        
}


if($sair == 1){
	$res = "";

}
?>

<script src="./assets/js/sweetalert.js" type="text/javascript"></script>
<link href="./assets/css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<style>
.modal-content {
    width: 300px;
}
</style>

<?php
        if ($res == 1  ){ ?>

<script>
swal.fire({
    title: 'Dados inseridos com sucesso!',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=objetivosprofissionais&id=<?php echo $id ?>&?saida=1">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }  
        
        if ($res  == 2 ){?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível inserir os dados!',
    html: '<p>Por favor, tente novamente.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=objetivosprofissionais&id=<?php echo $id ?>&?saida=1">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  } 

        if ($res == 3  ){ ?>

<script>
swal.fire({
    title: 'Dados excluídos com sucesso!',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=objetivosprofissionais&id=<?php echo $id ?>&?saida=1">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }
		
		 if ($res  == 4 ){ ?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível excluir os dados!',
    html: '<p>Por favor, tente novamente.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=objetivosprofissionais&id=<?php echo $id ?>&?saida=1">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  } ?>