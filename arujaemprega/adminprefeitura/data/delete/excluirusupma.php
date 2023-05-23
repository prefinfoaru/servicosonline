<?php       

include ("../conexao.php");
  
$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('id=', $URL_ATUAL, 2);
$id = $numprot[1];

		$delete = "DELETE FROM `bd_emprega_aruja`.`tb_cadastrousuario_restrito` WHERE `id_cadastrorestrito`='$id';";
		
		$resultado_del = mysqli_query($conn, $delete);

		if($resultado_del){

			echo 	"<script>window.location.href ='../../?p=excluirusupre&res=1'</script>"; 
			exit();
			
		}
		else{
		
			echo 	"<script>window.location.href ='../../?p=excluirusupre&res=2'</script>"; 
			exit();
		}
	

		







?>