<?php
session_start();
session_destroy();
header("location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/login.php"); 

?>