<?php
include("../data/conexaoBD.php");


?>

<link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/conteudo/emendas.css">

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<div class="container" style="background:#ffff">
    <div class="row">
        <div class="col-md-12">


            <div style="text-align: center;">

                <h2 style="text-decoration: underline;">Emendas Impositivas</h2><br>

                <h5>Conforme art. 16 da <a href="https://www.prefeituradearuja.sp.gov.br/Atos/Leis/Livro74_OCR/LEI%203.383_2021_OCR.pdf" target="_blank">
                        <font color="#2E86C1">Lei 3383/2021</font>
                    </a>, disponibilizamos relatório sobre a execução de emendas parlamentares.</h5><br>
                <h5>Data da Liberação do recurso: LOA 2022</h5>

            </div>


        </div><br>

    </div>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <label for="">Selecione o ano:</label>
            <select class="form-control" id="ano" onchange="emendas(this.value)">
                <?php
                $sql = "SELECT ano FROM emendasimpositivas.emendas group by ano order by ano desc";
                foreach ($conexao->query($sql) as $row) {
                    echo '<option value"' . $row['ano'] . '">' . $row['ano'] . '</option>';
                }

                ?>
            </select>
        </div>

    </div>
    <br>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-advance table-hover" id="listaEmendas">

                    <thead>
                        <tr>
                            <th>Número Emenda</th>
                            <th>Vereador</th>
                            <th>Valor</th>
                            <th>Objeto</th>
                            <th>Unidade orçamentária</th>
                            <th>Categoria Econômica</th>
                            <th>Valor Empenhado</th>
                            <th>Valor Liquidado</th>
                            <th>Status Atual</th>
                            <th>Documentos</th>
                        </tr>
                    </thead>

                </table>

            </div>
        </div>
    </div>
    <br>
</div>


<script>
    $(document).ready(function() {

        emendas($('#ano').val());


    });

    function emendas(ano) {
        var ano = ano;

        $('#listaEmendas').DataTable().clear().destroy();
        $('#listaEmendas').DataTable({

            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '../includes/listaEmendas.php',
                "data": {
                    "ano": ano
                }
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
                    data: 'secretaria'
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
                    data: 'arquivo'
                }
            ],

            dom: 'Blfrtip',
            buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    },
                    filename: 'EmendasImpositivas',
                    title: 'Emendas Impositivas',
                    messageTop: 'Conforme art. 16 da Lei 3383/2021, disponibilizamos relatório sobre a execução de emendas parlamentares.'
                },
                {
                    extend: 'excel',
                    filename: 'EmendasImpositivas',
                    title: 'Emendas Impositivas',
                    messageTop: 'Conforme art. 16 da Lei 3383/2021, disponibilizamos relatório sobre a execução de emendas parlamentares.'
                }
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'Todos'],
            ],
        });
    }
</script>
<script src="../../vendor/datatables/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js" defer></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js" defer></script>
<!-- <script src="./assets/js/datatable.js" type="text/javascript" defer></script> -->