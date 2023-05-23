<meta https-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- <link href="css/bootstrap-3.4.1.css" rel="stylesheet" type="text/css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="js/jquery-1.12.4.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<!-- <script src="js/bootstrap-3.4.1.js"></script> -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />


<!-- Custom styles for this template-->
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="main-panel">
    <style>
    .cursor {
        cursor: pointer;
    }
    </style>
    <!---conexão e querys  ---------------------------------------------------------------------------------------------------------------------------------------------->
    <?php
 
 $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 @$idvaga	= explode('id=', $URL_ATUAL, 2);
 @$numprot 	= explode('res=', $URL_ATUAL, 2);
	
  if(isset($idvaga[1])){
        
        $id_vaga    =   $idvaga[1];
        
        }else{
        
            $id_vaga = "";
        
        }
	
  if(isset($numprot[1])){
        
        $res    =   $numprot[1];
        
        }else{
        
            $res = "";
        
        }	
	
 include './data/banco.php';
	
	$cpf				=	$_SESSION['usuario'];
	$select_solicitante	=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where cpf = '$cpf' ";
	foreach($pdo->query($select_solicitante) as $solicitante){
		$id_solicitante	=	$solicitante['id_solicitante'];
	}
	
	$select_vaga	=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga as c inner join tb_cadastro_vaga_adicionais as a on c.id_vaga = a.id_vaga  where a.id_vaga = '$id_vaga';";
	foreach($pdo->query($select_vaga) as $vaga){
        $escolaridade	=	$vaga['escolaridade'];
        $idade	=	$vaga['idade'];
	}
           
        if ($res == 1  ){ ?>

    <script>
    swal.fire({
        title: 'Candidatura realizada com sucesso!',
        icon: "success",
        html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=listar_vagas&res=0">OK</button></a>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    </script>

    <?php  }
	
		if ($res  == 2 ){?>

    <script>
    swal.fire({
        icon: 'error',
        title: 'Não foi possível atualizar a candidatura!',
        text: 'Por favor, tente novamente.',
        html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=buscar_vagas&?tpbusca=1&?buscar=0">OK</button></a>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    </script>

    <?php  } 
	
		if ($res  == 3 ){?>

    <script>
    swal.fire({
        icon: 'error',
        title: 'Candidatura não realizada',
        text: '',
        html: '</p>Essa vaga exige <?php echo $escolaridade; ?>.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=buscar_vagas&?tpbusca=1&?buscar=0">OK</button></a>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    </script>

    <?php  } 
        
        if ($res  == 4 ){ ?>

    <script>
    swal.fire({
        icon: 'error',
        title: 'Candidatura não realizada',
        text: '',
        html: '</p>Essa vaga exige ter idade mínima de <?php echo $idade; ?>.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=buscar_vagas&?tpbusca=1&?buscar=0">OK</button></a>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    </script>

    <?php  }

        if ($res  == 5 ){?>

    <script>
    swal.fire({
        icon: 'error',
        title: 'Esta candidatura ja foi realizada!',
        html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=buscar_vagas&?tpbusca=1&?buscar=0">OK</button></a>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    </script>

    <?php  } 

        if ($res == 6  ){ ?>

    <script>
    swal.fire({
        title: 'Cancelamento realizado!',
        icon: "success",
        html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=listar_vagas&res=0">OK</button></a>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    </script>

    <?php  }

        if ($res == 7  ){ ?>

    <script>
    swal.fire({
        title: 'Não foi possível cancelar esta candidatura!',
        icon: "error",
        html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=listar_vagas&res=0">OK</button></a>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    </script>

    <?php  } ?>