<?php 
session_start();

if(!empty($_SESSION['iduser']))
{
    include "includes/header.php";
    include "includes/menu_barra_lateral.php";
    $valor = @$_GET['p'];
    include 'includes/casemenu.php' ;

    include "includes/rodape.php";
    include "includes/Core JS Files.php";
    
}else{
    $_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Área Restrita.</div>";
    header("location: pages/login.php");
} 

?>
 

  

