<script src="./assets/js/sweetalert.js" type="text/javascript"></script>
<link href="./assets/css/sweetalert.css" rel="stylesheet">
<?php 

$id		=	$_GET['idcpfcon'];
 
$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('res=', $URL_ATUAL, 2);
if(isset($numprot[1])){
	
  $res    =   $numprot[1];
	
}else{
      
   $res = "";
        
}
        if ($res == 1  ){ ?>

<script>
swal.fire({
    title: 'Dados inseridos com sucesso!',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=editar_cv&idcpfcon=<?php echo $id ?>">OK</button></a>',
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
    html: '<p>Por favor, tente novamente.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=editar_cv&idcpfcon=<?php echo $id ?>">OK</button></a>',
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
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=formacaoacademica&id=<?php echo $id ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }
		
		 if ($res  == 4 ){?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível excluir os dados!',
    html: '<p>Por favor, tente novamente.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=editar_cv&idcpfcon=<?php echo $id ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }
?>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu Alterar Dados Do Currículo</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>

        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Acesso aos dados do Currículo Cadastrado </h4>
                            <p class="card-category">Àrea para alteração dos dados do currículo cadastrado no Arujá
                                Emprega

                            </p>
                        </div>

                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="font-icon-list col-lg-3 col-md-3 col-sm-4 col-6">
                                    <a href="?p=formacaoacademica&id=<?php echo $id; ?>">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-ruler-pencil"></i>
                                            <p>Formação Acadêmica</p>

                                        </div>
                                </div>
                                </a>
                                <div class="font-icon-list col-lg-3 col-md-3 col-sm-4 col-6">
                                    <a href="?p=habilidadeseidiomas&id=<?php echo $id; ?>">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-layers-3"></i>

                                            <p>Habilidades, Idiomas e Informática</p>

                                        </div>
                                </div>
                                </a>
                                <div class="font-icon-list col-lg-3 col-md-3 col-sm-4 col-6">
                                    <a href="?p=experienciasprofissionais&id=<?php echo $id; ?>">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-paper-2"></i>

                                            <p>Experiências Profissionais</p>

                                        </div>
                                </div>
                                </a>
                                <div class="font-icon-list col-lg-3 col-md-3 col-sm-4 col-6">
                                    <a href="?p=objetivosprofissionais&id=<?php echo $id; ?>">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-bullet-list-67"></i>

                                            <p>Objetivos Profissionais</p>

                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>