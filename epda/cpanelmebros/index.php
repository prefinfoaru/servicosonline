<?php session_start();

 $usuario_login = $_SESSION['nome'];
 $nivel = $_SESSION['nivel'];
 $idJurado = $_SESSION['Njurado'];
   //$sql2 = 'SELECT count(*) FROM atualizaiptu.cadastro where email_retorno is null ';
    if ($usuario_login == "") {
	   
	header("Location:http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/");	
		
	   
   } 
?>

<!DOCTYPE html>
<html lang="Pt-br">

<?php 

 

//if (!empty($_SESSION['id_cad_user'])) {
   include "include/header.php"  ;
    include "include/headerMenusuperior.php"  ;
  
    include "include/MenuLateral.php"  ;
     $valor = @$_GET['p'];
    include 'include/casemenu.php';  
/*}

else {
	$_SESSION['msg'] = "Área restrita";
	header("../");
} 
*/      ?> 
  
   
                
