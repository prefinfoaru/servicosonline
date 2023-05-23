<style>
.cursor {
    cursor: pointer;
}
</style>
<?php
$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('id=', $URL_ATUAL, 2);
if(isset($numprot[1])){

$id_empresa   =   $numprot[1];

}

include './data/banco.php';

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
    paging: false,
        searching: false
});
</script>


<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo"></a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>

        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Navbar -->
    <script src="/assets/js/jsjs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!--    
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet" /> -->
    <!-- 
     <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

    <div class="content">
        <!-- DataTales Example -->
        <div class="card">
            <div class="card-header py-3" style="background-color:#E1E0E0">
                <h6 class="m-0 font-weight-bold text-default">Lista das solicitações</h6>
            </div>
            <div class="card-body" style="box-shadow: none;">
                <div class="table-responsive" style="box-shadow: none;">
                    <table class="table table-striped  table-bordered" id="dataTable" width="100%" cellspacing="0"
                        style="box-shadow: none; font-size: 12px;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Responsável</th>
                                <th>Data de Agendamento</th>
                                <th>Horário de início</th>
                                <th>Horário de finalização</th>
                                <!--<th>Motivo</th>-->

                            </tr>
                        </thead>
                        <tbody>
                            <?php
									
                                       
									$sql  = "SELECT * FROM bd_emprega_aruja.tb_reservasala where id_empresa = '$id_empresa' and status = '0'";
                                       
                                    $exec = $pdo->query($sql);
                                       
									while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {  
                                          $id_reservasala = $row_transacoes['id_reservasala'];
                                          $data =  date('d-m-Y',strtotime($row_transacoes['data_agenda']));
                                          
										?>

                            <tr>
                                <td><?php echo $row_transacoes['id_vaga']; ?></td>
                                <td><?php echo $row_transacoes['responsavel']; ?></td>
                                <td><?php echo $data; ?></td>
                                <td><?php echo $row_transacoes['horario_inicio']; ?></td>
                                <td><?php echo $row_transacoes['horario_fim']; ?></td>

                                <!-- <td><?php //echo $row_transacoes['status']; ?></td>-->


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
                        include('./controll/mensagens/mensagens.php');
                    ?>


    </div>