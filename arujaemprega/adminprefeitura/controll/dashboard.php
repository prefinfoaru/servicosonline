 <? include('include/dadosdashboard.php'); ?>
 <style>
     .my-card {
         position: absolute;
         top: -20px;
         border-radius: 50%;
     }
 </style>

 <div class="main-panel">
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg " color-on-scroll="500">
         <div class="container-fluid">
             <a class="navbar-brand" href="#pablo"> Dashboard </a>
             <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                 <div class="col-md-4">
                     <div class="card ">
                         <div class="card-header ">
                             <h4 class="card-title">Estatíticas de Vagas</h4>
                             <p class="card-category"></p>
                         </div>
                         <div class="card-body ">
                             <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                             <div class="legend" style="text-align:center">
                                 <i class="fa fa-circle text-info2" style="color:#446AB1"></i> Em preenchimento: <?= $vagaspretotal['COUNT(*)'] ?>
                                 <i class="fa fa-circle text-info"></i> Abertas: <?= $vagaslibetotal['COUNT(*)'] ?><br>
                                 <i class="fa fa-circle text-danger"></i>Excluidas: <?= $vagasexecetotal['COUNT(*)'] ?>
                                 <i class="fa fa-circle text-warning"></i>Aguardando Liberação: <?= $vagasaguaretotal['COUNT(*)'] ?>
                                 <i class=""></i>Total: <?= $vagastotal['COUNT(*)'] ?>
                                 <input type="text" name="prenchimento" id="prenchimento" value="<?= $vagaspretotal['COUNT(*)'] ?>" style="display:none">
                                 <input type="text" name="abertas" id="abertas" value="<?= $vagaslibetotal['COUNT(*)'] ?>" style="display:none">
                                 <input type="text" name="excluidas" id="excluidas" value="<?= $vagasexecetotal['COUNT(*)'] ?>" style="display:none">
                                 <input type="text" name="aguarda" id="aguarda" value="<?= $vagasaguaretotal['COUNT(*)'] ?>" style="display:none">
                                 <input type="text" name="total" id="total" value="<?= $vagastotal['COUNT(*)'] ?>" style="display:none">
                             </div>
                             <hr>
                             <div class="stats">
                                 <!-- <i class="fa fa-clock-o"></i> -->
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-8">
                     <?php
                        //Dados  vagas empresas
                        foreach ($vagasemptotal as $vagas) {
                            if ($vagas['month(data)'] == 1) {
                                $janeiroemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 2) {
                                $fevereiroemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 3) {
                                $marcoemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 4) {
                                $abrilemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 5) {
                                $maioemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 6) {
                                $junhoemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 7) {
                                $julhoemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 8) {
                                $agostoemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 9) {
                                $setembroemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 10) {
                                $outubroemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 11) {
                                $novembroemp = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 12) {
                                $dezembroemp = $vagas['COUNT(*)'];
                            }
                        }
                        //Dados vaga prefeitura
                        foreach ($vagaspreftotal as $vagas) {
                            if ($vagas['month(data)'] == 1) {
                                $janeiropref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 2) {
                                $fevereiropref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 3) {
                                $marcopref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 4) {
                                $abrilpref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 5) {
                                $maiopref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 6) {
                                $junhopref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 7) {
                                $julhopref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 8) {
                                $agostopref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 9) {
                                $setembropref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 10) {
                                $outubropref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 11) {
                                $novembropref = $vagas['COUNT(*)'];
                            } else if ($vagas['month(data)'] == 12) {
                                $dezembropref = $vagas['COUNT(*)'];
                            }
                        }

                        ?>
                     <script>
                         //Dados    VagasEmpresas
                         var janeiroemp = <?php echo isset($janeiroemp) ? $janeiroemp : 0 ?>;
                         var fevereiroemp = <?php echo isset($fevereiroemp) ? $fevereiroemp : 0 ?>;
                         var marcoemp = <?php echo isset($marcoemp) ? $marcoemp : 0 ?>;
                         var abrilemp = <?php echo isset($abrilemp) ? $abrilemp : 0 ?>;
                         var maioemp = <?php echo isset($maioemp) ? $maioemp : 0 ?>;
                         var junhoemp = <?php echo isset($junhoemp) ? $junhoemp : 0 ?>;
                         var julhoemp = <?php echo isset($julhoemp) ? $julhoemp : 0 ?>;
                         var agostoemp = <?php echo isset($agostoemp) ? $agostoemp : 0 ?>;
                         var setembroemp = <?php echo isset($setembroemp) ? $setembroemp : 0 ?>;
                         var outubroemp = <?php echo isset($outubroemp) ? $outubroemp : 0 ?>;
                         var novembroemp = <?php echo isset($novembroemp) ? $novembroemp : 0 ?>;
                         var dezembroemp = <?php echo isset($dezembroemp) ? $dezembroemp : 0 ?>;

                         //Dados    Vagas Prefeitura
                         var janeiropref = <?php echo isset($janeiropref) ? $janeiropref : 0 ?>;
                         var fevereiropref = <?php echo isset($fevereiropref) ? $fevereiropref : 0 ?>;
                         var marcopref = <?php echo isset($marcopref) ? $marcopref : 0 ?>;
                         var abrilpref = <?php echo isset($abrilpref) ? $abrilpref : 0 ?>;
                         var maiopref = <?php echo isset($maiopref) ? $maiopref : 0 ?>;
                         var junhopref = <?php echo isset($junhopref) ? $junhopref : 0 ?>;
                         var julhopref = <?php echo isset($julhopref) ? $julhopref : 0 ?>;
                         var agostopref = <?php echo isset($agostopref) ? $agostopref : 0 ?>;
                         var setembropref = <?php echo isset($setembropref) ? $setembropref : 0 ?>;
                         var outubropref = <?php echo isset($outubropref) ? $outubropref : 0 ?>;
                         var novembropref = <?php echo isset($novembropref) ? $novembropref : 0 ?>;
                         var dezembropref = <?php echo isset($dezembropref) ? $dezembropref : 0 ?>;
                     </script>
                     <div class="card ">
                         <div class="card-header ">
                             <h4 class="card-title">Cadastro de Vagas</h4>
                             <p class="card-category"></p>
                         </div>
                         <div class="card-body ">
                             <div id="chartActivity" class="ct-chart"></div>
                         </div>
                         <div class="card-footer ">
                             <div class="legend">
                                
                                 <i class="fa fa-circle text-info"></i> Empresas
                                 <i class="fa fa-circle text-danger"></i> Prefeitura
                             </div>
                             <hr>
                             <div class="stats">
                                 <!-- <i class="fa fa-check"></i>  -->
                             </div>
                         </div>
                     </div>
                 </div>



                 <div class="col-md-4">
                     <div class="card border mx-sm-1 p-3">
                         <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-area-chart" aria-hidden="true"></span></div>
                         <div class="text-info text-center mt-3">
                             <h4>Cadastro Usuários</h4>
                         </div>
                         <div class="text-info text-center mt-2">
                             <h1><?php echo $qnt_candidatostotal['qnt_solicitante']; ?></h1>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-4">
                     <div class="card border mx-sm-1 p-3">
                         <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-bar-chart" aria-hidden="true"></span></div>
                         <div class="text-info text-center mt-3">
                             <h4>Cadastro Empresas</h4>
                         </div>
                         <div class="text-info text-center mt-2">
                             <h1><?php echo $qnt_empresatotal['qnt_empresa']; ?></h1>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-4">
                     <div class="card border mx-sm-1 p-3">
                         <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-line-chart" aria-hidden="true"></span></div>
                         <div class="text-info text-center mt-3">
                             <h4>Cadastro Vagas</h4>
                         </div>
                         <div class="text-info text-center mt-2">
                             <h1><?php echo $qnt_vagatotal['qnt_vaga']; ?></h1>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="row">

                 <div class="col-md-12">
                     <!-- <div class="card ">
                         <div class="card-header ">
                             <h4 class="card-title">Cadastro de Vagas</h4>
                             <p class="card-category"></p>
                         </div>
                         <div class="card-body ">
                             <div id="chartActivity" class="ct-chart"></div>
                         </div>
                         <div class="card-footer ">
                             <div class="legend">
                                 <input type="text" name="empresa" id="empresa" value="<?php //$vagasemptotal['COUNT(*)'] ?>" style="display:none">
                                 <input type="text" name="prefeitura" id="prefeitura" value="<?php //$vagaspreftotal['COUNT(*)'] ?>" style="display:none">
                                 <i class="fa fa-circle text-info"></i> Empresas
                                 <i class="fa fa-circle text-danger"></i> Prefeitura
                             </div>
                             <hr>
                             <div class="stats">
                                 <i class="fa fa-check"></i>  
                             </div>
                         </div>
                     </div> -->
                 </div>
                 <div class="col-md-6">
                     <!-- <div class="card  card-tasks">
                                <div class="card-header ">
                                    <h4 class="card-title">Tasks</h4>
                                    <p class="card-category">Backend development</p>
                                </div>
                                <div class="card-body ">
                                    <div class="table-full-width">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" checked>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Read "Following makes Medium better"</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" disabled>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Unfollow 5 enemies from twitter</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div> -->
                 </div>
             </div>
         </div>
     </div>
     
     <script src="assets/js/demo.js" defer></script>
     <script src="assets/js/teste.js" defer></script>
