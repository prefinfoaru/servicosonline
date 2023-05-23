<?php  
include	"../conexao.php";



$id    = $_POST['id'] ;
$perg  = $_POST['perg1'] ;



			$Atualiza = "UPDATE `bd_emprega_aruja`.`tb_cadastro_vaga` SET `excluida`='1', `motexclusao`='$perg' WHERE `id_vaga`='$id'";
			 
			$resultado_atualiza = mysqli_query($conn, $Atualiza);
			 
 			
				
   					echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=listarvagas'</script>"; 
 					


 		 	


				
?>