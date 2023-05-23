<?php
session_start();

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('res=', $URL_ATUAL, 2);
@$res = $numprot[1];
 
?>

<script src="../assets/js/sweetalert.js" type="text/javascript"></script>
<link href="../assets/css/sweetalert.css" rel="stylesheet">
<link href="../assets/css/style-form.css" rel="stylesheet">

<?php
 
        if ($res  == 2 ){?>

<script>
swal.fire({
    icon: 'error',
    title: '<strong>Cpf já cadastrado.</strong>',
    text: 'Por favor, verifique e tente novamente!.',

    allowOutsideClick: false,
});
</script>

<?php 	} 

        if ($res  == 3 ){?>

<script>
swal.fire({
    icon: 'error',
    title: '<strong>EMAIL já cadastrado.</strong>',
    text: 'Por favor, verifique e tente novamente!.',

    allowOutsideClick: false,
});
</script>

<?php 	} ?>