<?php
session_start();
require_once("../data/conexaoBD.php");




if ($_SESSION['logado'] == "") {

    $_SESSION['erro'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Favor efetuar o login. Obrigado!</div>";
    echo "<script>window.location='../pages/login.php'</script>";
} else {

    $secretaria = $_SESSION['secretaria'];
}
?>

<script>
setTimeout(function() {
    $('#timemsg').fadeOut('slow');
}, 3000);
</script>


<div id="timemsg">
    <br>
    <?php

    if (isset($_SESSION['loginOff'])) {
        echo $_SESSION['loginOff'];
        unset($_SESSION['loginOff']);
    }
    ?>
</div>

<body>
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>


    <!-- jQuery CDN -->

    <div class="container" style="background:#ffff">
        <div class="row">
            <div class="col-md-12">
                <div class="form-title">
                    <div style="text-align: center;">
                        <h1>Emendas Impositivas</h1>
                        <br>
                        <h3><?php echo  $secretaria; ?></h3>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div style="text-align: right">
                    <a class="btn btn-danger " style="font-size: 15px" href="../data/destruir.php"
                        role="button">Sair</a>
                </div>
            </div><br>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-advance table-hover" id="emendas">
                        <hr>
                        <thead>
                            <tr>
                                <th>Número Emenda</th>
                                <th>Vereador</th>
                                <th>Valor</th>
                                <th>Objeto</th>
                                <th>Unidade Executora</th>
                                <th>Categoria Econômica</th>
                                <th>Valor Empenhado</th>
                                <th>Valor Liquidado</th>
                                <th>Status Atual</th>
                                <th>Atualizar</th>

                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {



        $('#emendas').DataTable({

            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '../includes/emendasSecretaria.php',

            },
            'columns': [{
                    data: 'numero_emenda'
                },
                {
                    data: 'vereador'
                },
                {
                    data: 'valor'
                },
                {
                    data: 'justificativa_inicial'
                },
                {
                    data: 'unid_executora'
                },
                {
                    data: 'categoria_economica'
                },
                {
                    data: 'valor_empenhado'
                },
                {
                    data: 'valor_liquidado'
                },
                {
                    data: 'status_emendas'
                },
                {
                    data: 'edicao'
                }
            ],


        });
    });
    </script>


    <script src="../../vendor/datatables/jquery.dataTables.min.js" defer></script>