<?php
session_start();
$data_ano = date('Y') ;
$data_mes = date ('m');

?>
<meta charset="utf-8">


<!--- não colocar como chamada externa -->
<script>
jQuery(function ($) {

$(".sidebar-dropdown > a").click(function() {
$(".sidebar-submenu").slideUp(200);
if (
$(this)
.parent()
.hasClass("active")
) {
$(".sidebar-dropdown").removeClass("active");
$(this)
.parent()
.removeClass("active");
} else {
$(".sidebar-dropdown").removeClass("active");
$(this)
.next(".sidebar-submenu")
.slideDown(200);
$(this)
.parent()
.addClass("active");
}
});

$("#close-sidebar").click(function() {
$(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
$(".page-wrapper").addClass("toggled");
});




});

</script>

<!---********************************************************************************************************************************************************************  -->

</head>

<body>
<div class="page-wrapper chiller-theme toggled">
<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
<i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
<div class="sidebar-content">
<div class="sidebar-brand">
	<i style="color: #C7C7C7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ESCONDER O MENU</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div id="close-sidebar">
<i class="fas fa-times"></i>
</div>
</div>
<div class="sidebar-header">
<div class="user-info">
<span class="user-name"><?php echo utf8_encode($_SESSION['nome']); ?>
</span>
<!--<span class="user-role"><?php// echo utf8_encode($_SESSION['email']); ?></span> -->
<span class="user-role"><?php echo utf8_encode($_SESSION['funcao']); ?></span>
<span class="user-role"><?php echo utf8_encode($_SESSION['secretaria']); ?></span>
<!--<span class="user-role"><?php // echo utf8_encode($_SESSION['matricula']); ?></span> -->
<!--<span class="user-role"><?php // echo utf8_encode($_SESSION['id_cad_user']); ?></span> -->
<span class="user-role"></span>
</div>
</div>
<!-- sidebar-header  -->


<div class="sidebar-menu">
<ul>
<li class="header-menu">
<span>Menu</span>
</li>
<li class="sidebar-dropdown">
<a href="?p+home">
<i class="fa fa-tachometer-alt"></i>
<span>Dashboard</span>
<!--<span class="badge badge-pill badge-warning">Novo</span>-->
</a>
</li>
<li class="sidebar-dropdown">
<a href="?p=solicitar">
<i class="fa fa-bullhorn"></i>
<span>Solicitar</span>
<!-- <span class="badge badge-pill badge-danger">3</span> -->
</a>

</li>

<li class="header-menu">
<span>Extra</span>
</li>
    
<li>
<a href="?p=intecorrencias">
<i class="fa fa-book"></i>
<span>Dados extras</span>

</a>
</li>


<li>
    
<a href="../sair.php">
<i class="fa fa-folder"></i>
<span>Sair</span>
</a>
</li>
</ul>
</div>
<!-- sidebar-menu  -->
</div>
<!-- sidebar-content  -->
<div class="sidebar-footer">

    
<a href="../sair.php"><h8 style="color: #FFFFFF">Aperte para sair&nbsp;&nbsp;</h8>
<i class="fa fa-power-off"></i>
</a>
</div>
</nav>
<!-- sidebar-wrapper  -->
<main class="page-content">
<div class="container-fluid"> 

<div align="center"> 
<h2  style="color:#114A6F ; font-size: 15px;"><img src="http://www.educacao.aruja.sp.gov.br/intranet/cpanel/img/brasao/brasão.png" width="50px" height="70px"><br>SGDER<br> <i style="font-size: 10px">( SISTEMA DE SOLICITAÇÃO DE HORAS EXTRAS )</i></h2>

</div> 