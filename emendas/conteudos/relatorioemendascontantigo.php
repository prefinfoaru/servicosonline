<body>



    <?php
    include("../data/conexaoBD.php");

    if (isset($_GET['ano'])) {
        $year = $_GET['ano'];
    } else {
        $year = date("Y");
    }
    ?>


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


            </div><br><br>
            <div class="col-md-5"></div>
            <div class="col-md-3">
                <select class="form-control" onchange="mudaAno(this.value)">
                    <option selected>Selecione o ano</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
            </div>
            <div class="col-md-4">

                <input class="form-control" id="myInput" type="text" placeholder="Pesquisar">

            </div>
            <br><br>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-advance table-hover">
                        <hr>
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
                        <?php
                        $sql = "SELECT * FROM emendasimpositivas.emendas WHERE ano=$year";
                        foreach ($conexao->query($sql) as $row) {
                            //  $id = "infocontmanutencao_emendas.php?id=" .$id = $row['id_emendas'];
                            // $doc = "" .$id = $row['id_emendas'];
                            $justify = $row['justificativa_inicial'];
                            $id = '2';
                            echo    '<tbody id="myTable">';
                            echo '<tr style="font-size: 15px;  " >';
                            echo '<td ">'                             . $row['numero_emenda']     . '</td>';
                            echo '<td ">'                             . $row['vereador']     . '</td>';
                            echo '<td ">R$'                             . number_format(intval($row['valor_emenda']), 2, ",", ".")    . '</td>';
                            echo '<td ">'                             . $row['justificativa_inicial'] . '</td>';
                            echo '<td ">'                            . $row['secretaria'] . '</td>';
                            echo '<td ">'                             . $row['categoria_economica'] . '</td>';
                            echo '<td ">R$'                            . $row['valor_empenhado']  .  '</td>';
                            echo '<td ">R$'                            . $row['valor_liquidado']  .  '</td>';
                            echo '<td ">'             . $row['status_emendas']     . '</td>';
                            echo '<td>';
                            echo    $row['arquivos'] == null ? 'Sem Anexo'   :  '<a href="https://www.prefeituradearuja.sp.gov.br/'    . $row['arquivos'] .   '" target="_blank"><button class="btn btn-default btn-sm btn-center" style="color: #CB4335" title="Comprovantes"><i class="fa fa-file-pdf-o"></i></button></a>'; //operador ternario

                            echo    '</td>';
                            echo    '</tr>';
                            echo    '</tbody>';
                        }
                        ?>
                    </table>
                    <script type="text/javascript">
                        //barra de pesquisa
                        $(document).ready(function() {
                            $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                    </script>
                </div>
            </div>
            <script>
                function mudaAno(ano) {
                    window.location = 'relatorioemendas.php?ano=' + ano;
                }
            </script>