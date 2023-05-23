r<style>
    .cursor {
        cursor: pointer;
    }
</style>
<?php
$data_inicio    =   $_POST['data1'];
$data_fim       =   $_POST['data2'];
$tipo           =   $_POST['tipo'];


if ($tipo == '0') {
    $select = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where data_cadastro >= '$data_inicio' and data_cadastro <= '$data_fim' && status = '0'";
} elseif ($tipo == '1') {
    $select = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where data_cadastro >= '$data_inicio' and data_cadastro <= '$data_fim' && status = '1'";
} else {
    $select = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where data_cadastro >= '$data_inicio' and data_cadastro <= '$data_fim'";
}

include '../data/banco.php';
$pdo  = Banco::conectar();

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'copy',
                    text: 'Copiar'
                }, {
                    extend: 'print',
                    text: 'Imprimir'
                },
                'csv', 'excel', 'pdf'
            ]

        });

    });
</script>


<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo"></a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!--    
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet" /> -->
    <!-- 
     <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

    <div class="content">
        <!-- DataTales Example -->
        <div class="card">
            <div class="card-header py-3" style="background-color:#E1E0E0">
                <h6 class="m-0 font-weight-bold text-default">Lista das vagas</h6>
            </div>
            <div class="card-body" style="box-shadow: none;">
                <div class="table-responsive" style="box-shadow: none;">
                    <table class="table table-striped  table-bordered" id="dataTable" width="100%" cellspacing="0" style="box-shadow: none; font-size: 12px;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nome da Empresa</th>
                                <th>CNPJ / CPF</th>
                                <th>Data</th>
                                <th>Telefone</th>
                                <!--<th>Status</th>
                                            <th>Data de inclusão</th>
                                        
                                            <th>Visualizar Vaga</th>
                                            <th>Reservou/Solicitou sala</th>
                                            <th>Reservar sala</th>-->


                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql  = "$select";

                            $exec = $pdo->query($sql);

                            while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {
                                $id_empresa =  $row_transacoes['id_cadastroempresa'];
                                $data_cadastro =  date('d-m-Y', strtotime($row_transacoes['data_cadastro']));
                            ?>

                                <tr>
                                    <td><?php echo $id_empresa; ?></td>
                                    <td><?php echo $row_transacoes['nome_fantasia']; ?></td>
                                    <td><?php echo $row_transacoes['cnpjcpf']; ?></td>
                                    <td><?php echo $data_cadastro; ?></td>
                                    <!-- <td>-->
                                    <?php
                                    if ($row_transacoes['cnpjcpf'] == "56901275000150") { ?>
                                        <td><?php echo "-"; ?></td>

                                    <?php
                                    } else {
                                    ?>
                                        <td><?php echo $row_transacoes['telefone']; ?></td>
                                </tr>
                        <?php
                                    }
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