<body>



    <?php
    include("../data/conexaoBD.php");

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

                    <h2 style="text-decoration: underline;">Emendas Parlamentares</h2><br>

                    <h5>Conforme art. 21 da <a href="http://www.prefeituradearuja.sp.gov.br/Atos/Leis/Livro74_OCR/LEI%203.404_2021_OCR.pdf" target="_blank">
                            <font color="#2E86C1">Lei 3404/2021</font>
                        </a>, disponibilizamos relatório sobre a execução de emendas parlamentares.</h5><br>

                </div>


            </div><br><br>



            <div class="col-md-8"></div>

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
                                <th>Deputado</th>
                                <th>Valor Emenda</th>
                                <th>Tipo Emenda</th>
                                <th>Objeto Emenda</th>
                            </tr>
                        </thead>
                         <tbody id="myTable">
                        <?php
                        $sql = "SELECT * FROM emendasimpositivas.emendas_parlamentares";
                        foreach ($conexao->query($sql) as $row) {
                            //  $id = "infocontmanutencao_emendas.php?id=" .$id = $row['id_emendas'];
                            // $doc = "" .$id = $row['id_emendas'];
                            // $justify = $row['justificativa_inicial'];
                            // $id = '2';
                           
                            echo '<tr style="font-size: 15px;  " >';
                            echo '<td ">'                             . $row['deputado']     . '</td>';
                            $valorEmenda = strval($row['valor_emenda']);
                            // $valorEmenda = substr($valorEmenda, 0, -2);
                            echo ('<td>R$' . number_format($valorEmenda, 2, ',', '.') . '</td>');
                            echo '<td ">'             . $row['tipo_emenda']     . '</td>';
                            echo '<td ">'             . $row['objeto_emenda']     . '</td>';
                            // echo '<td>';
                            // // echo    $row['arquivos'] == null ? 'Sem Anexo'   :  '<a href="'    . $row['arquivos'] .   '" target="_blank"><button class="btn btn-default btn-sm btn-center" style="color: #CB4335" title="Comprovantes"><i class="fa fa-file-pdf-o"></i></button></a>';

                            // echo    '</td>';
                            echo    '</tr>';
                            
                        }
                        ?>
                      </tbody>
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