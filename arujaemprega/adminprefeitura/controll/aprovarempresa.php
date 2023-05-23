<style>
.cursor {
    cursor: pointer;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu Empresas > Aprovar Empresas</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>

        </div>
    </nav>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <script src="./assets/js/sweetalert.js" type="text/javascript"></script>
    <link href="./assets/css/sweetalert.css" rel="stylesheet">
    <style>
    .cursor {
        cursor: pointer;
    }
    </style>
    <?php 
        
     

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
        title: 'Empresa Aprovada!',
        icon: "success",
        html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=aprovarempresa">OK</button></a>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    </script>

    <?php  }  
        
        if ($res  == 2 ){?>

    <script>
    swal.fire({
        icon: 'error',
        title: 'Não foi possivel aprovar a empresa!',
        text: 'Por favor, tente novamente.',
        html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=aprovarempresa">OK</button></a>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    </script>

    <?php  } ?>









    <div class="content">
        <!-- DataTales Example -->
        <div class="card">
            <div class="card-header py-3" style="background-color:#E1E0E0">
                <h6 class="m-0 font-weight-bold text-default">Aprovar empresas</h6>
            </div>
            <div class="card-body" style="box-shadow: none;">
                <div class="table-responsive" style="box-shadow: none;">
                    <table class="table table-striped ; table-bordered" id="dataTable" width="100%" cellspacing="0"
                        style="box-shadow: none; font-size: 12px;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nome Fantasia</th>
                                <th>Razão Social</th>
                                <th>Ramo</th>
                                <th>Informações adicionais</th>
                                <th>Situação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
										include './data/banco.php';
                                        $pdo  = Banco::conectar();
                                        
                                       
										$sql  = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa WHERE status =0";
                                       
                                        $exec = $pdo->query($sql);
                                       
                                        
										while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {
											
										
                                             
										?>
                            <tr>
                                <td><?php echo ($row_transacoes['id_cadastroempresa']); ?></td>
                                <td><?php echo ($row_transacoes['nome_fantasia']); ?></td>
                                <td><?php echo ($row_transacoes['razao_social']); ?></td>
                                <td><?php echo ($row_transacoes['ramo']); ?></td>
                                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#exampleModal<?php echo ($row_transacoes['id_cadastroempresa']); ?>">Visualizar</button>
                                <td>
                                    <?php if($row_transacoes['status'] == '1'){
                                                   echo '<h5 style="color: green">Aprovado</h5>';
                                               }else{

                                                    echo    '<h5><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Aprovar'.$row_transacoes['id_cadastroempresa'] .'">Aprovar</button></h5>';

                                               }
                                                
                                                ?>
                                </td>




                                <div class="modal fade"
                                    id="exampleModal<?php echo $row_transacoes['id_cadastroempresa']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <?php echo $row_transacoes['nome_fantasia']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <?php


                                                            echo    'CEP: '.$row_transacoes['cep'].'<br>';
                                                            echo    'Rua: '.$row_transacoes['rua'].'<br>';
                                                            echo    'Número: '.$row_transacoes['numero'].'<br>';
                                                            echo    'Bairro :'.$row_transacoes['bairro'].'<br>';
                                                            echo    'Cidade:.'.$row_transacoes['cidade'].'<br>';
                                                            echo    'Estado: '.$row_transacoes['estado'].'<br>';
                                                            echo    'Complemento: '.$row_transacoes['complemento'].'<br>';
                                                            echo    'Celular: '.$row_transacoes['celular'].'<br>';
                                                            echo    'Telefone: '.$row_transacoes['telefone'].'<br>';
                                                            echo    'E-mail: '.$row_transacoes['email'].'<br>';

                                                            
                                                            
                                                            ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="vagas" name="excluirvagas" action="./data/update/aprovaempresa.php"
                                    method="POST">
                                    <div class="modal fade"
                                        id="Aprovar<?php echo $row_transacoes['id_cadastroempresa']; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Aprovar Empresa:
                                                        <?php echo ($row_transacoes['nome_fantasia']); ?></h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <h4>Tem Certeza que deseja Aprovar essa empresa?<br>
                                                        A ação não poderá ser desfeita!</h4>
                                                    <input type="hidden" name="idempresa"
                                                        value="<?php echo $row_transacoes['id_cadastroempresa'];?>">
                                                    <input type="hidden" name="email"
                                                        value="<?php echo $row_transacoes['email'];?>">
                                                    <input type="hidden" name="nome"
                                                        value="<?php echo $row_transacoes['nome_fantasia'];?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="cadastrar"
                                                        class="btn btn-danger  pull-CENTER"
                                                        type="button">APROVAR</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </tr>
                            <?php
                                        
                                                }
                                        
                                        
                                        ?>
                        </tbody>
                    </table>
                    <!-- Mini Modal -->

                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>

        <?php
                        // include('./controll/mensagens/mensagens.php');
                    ?>


    </div>