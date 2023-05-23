<style>
    .cursor {
        cursor: pointer;
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu Listar Vagas</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>

        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Navbar -->
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!--    
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet" />

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
                                <th>Titulo da vaga</th>
                                <th>Profissão</th>
                                <th>Cargo</th>
                                <th>Status</th>
                                <th>Data de inclusão</th>
                                <th>Empresa</th>
                                <th>Visualizar Vaga</th>
                                <th>Disponibilizar Vaga para Candidatos</th>
                                <th>Excluir</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            // $date_atual = date("H:i:s");
                            // echo strtotime($date_atual);

                            include './data/banco.php';
                            $pdo  = Banco::conectar();


                            $sql  = "SELECT v.id_empresa, v.id_vaga, v.titulo, v.profissao, v.hierarquia, v.status, v.data, e.razao_social FROM bd_emprega_aruja.tb_cadastro_vaga as v inner join tb_cadastro_empresa as e on v.id_empresa = e.id_cadastroempresa where excluida is null and (v.status != '2' and v.status != '0');";

                            $exec = $pdo->query($sql);


                            while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                                <tr>
                                    <td><?php echo $row_transacoes['id_vaga']; ?></td>
                                    <td><?php echo $row_transacoes['titulo']; ?></td>
                                    <td><?php echo $row_transacoes['profissao']; ?></td>
                                    <td><?php echo $row_transacoes['hierarquia']; ?></td>
                                    <td>
                                        <?php
                                        if ($row_transacoes['status'] == 1) { ?>
                                            Publicada
                                        <?php
                                        } elseif ($row_transacoes['status'] == 2) { ?>
                                            Encerrada
                                        <?php
                                        } elseif ($row_transacoes['status'] == 4) { ?>
                                            Vaga Pausada
                                        <?php
                                        } elseif ($row_transacoes['status'] == 5) { ?>
                                            Vaga Expirada
                                        <?php
                                        } else { ?>
                                            Aguardando Liberação
                                        <?php
                                        }

                                        ?>
                                    </td>
                                    <td><?php echo $row_transacoes['data']; ?></td>


                                    <td><?php echo $row_transacoes['razao_social']; ?></td>

                                    <?php echo "<td align='center'><a href='?p=visualizar_vaga&id=$row_transacoes[id_vaga]'><i class='fas fa-eye'></i></a></td>"; ?>

                                    <?php
                                    if (($row_transacoes['status'] == 1) || ($row_transacoes['status'] == 2) || ($row_transacoes['status'] == 5)) { ?>
                                        <td align='center'><i class='fa fa-ban' title='Disponibilizar a Vaga'></i></td>
                                    <?php

                                    } else { ?>
                                        <td align="center">
                                            <a data-toggle='modal' data-target='#myModal4<?php echo $row_transacoes['id_vaga']; ?> '>
                                                <i class='fa fa-check-square cursor' title='Disponibilizar a Vaga' style="color: #235C26"></i></a>
                                        </td>
                                    <?php
                                    }
                                    ?>


                                    <td align='center'><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $row_transacoes['id_vaga']; ?>"><i class=' fa fa-trash' Style="color:red"></i> </button></td>



                                </tr>
                            <?php
                                include "./include/modal_excluivaga.php";
                                include "./include/modal_liberarvaga.php";
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