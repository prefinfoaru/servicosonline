<?php include './include/topo_cadUsuarioArea.php'; ?>
<style>
    .cursor {
        cursor: pointer;
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
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
    <script src="/assets/js/jsjs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <div class="content">
        <div class="card">
            <div class="card-header py-3" style="background-color:#E1E0E0">
                <h6 class="m-0 font-weight-bold text-default">Lista de Usuarios</h6>
            </div>
            <div class="card-body" style="box-shadow: none;">
                <div class="table-responsive" style="box-shadow: none;">
                    <table class="table table-striped  table-bordered" id="dataTable" width="100%" cellspacing="0" style="box-shadow: none; font-size: 12px;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome do Usuário</th>
                                <th>CPF</th>
                                <th>Área de Atuação</th>
                                <th>Data do Cadastro</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                        $stmt = $pdo->query($query);

                        foreach($stmt as $row) {
                            echo '
                                <tr>
                                    <td>' . $row['id_solicitante'] . '</td>
                                    <td>' . $row['nome'] . '</td>
                                    <td>' . $row['cpf'] . '</td>
                                    <td>' . $row['cargo'] . '</td>
                                    <td>' . $row['data_cadastro'] . '</td>
                                </tr>
                            ';
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        include('./controll/mensagens/mensagens.php');
        function formatCnpjCpf($value)
        {
            $CPF_LENGTH = 11;
            $cnpj_cpf = preg_replace("/\D/", '', $value);

            if (strlen($cnpj_cpf) === $CPF_LENGTH) {
                return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
            }

            return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
        }
        ?>


    </div>