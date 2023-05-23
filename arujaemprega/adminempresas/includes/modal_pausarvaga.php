
<div class="modal fade modal modal-primary" id='myModal5<?php echo $id_vaga ?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" title="">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                   <h6 style="color:#235C26"> <i class='fa fa-check-square'></i> - Suspender Vaga:  <?php echo $id_vaga ?></h6>
                                </div>
                                <div class="modal-body text-center">
                                    <p style="font-size: 16px; color:#000"><strong><i>DESEJA REALMENTE SUSPENDER ESSA VAGA?</i></strong></p><hr>
                                   
                                    <form action="./data/update/pausar_vaga.php" method="post">
                                    <div class="form-group">
										
                                   <!--   <label for="sel1">Qual motivo da exclusão da vaga ?</label>
                                      <select class="form-control"  name="perg1" required>
                                      <option value="" >Selecione uma opção</option>
                                      <option value="1">Vaga preenchida</option>
                                      <option value="2">Dados da vaga preenchida errada</option>
                                      </select>
                                      </div>
                                    
                                    <div class="form-group">
                                      <label for="sel1">Caso a Vaga tenha sido preenchida ?</label>
                                      <select class="form-control" name="perg2" required>
                                      <option value="" >Selecione uma opção</option>
                                      <option value="1">Não encontrado perfil adequado no ARUJÁ EMPREGA</option>
                                      <option value="2">Indicação interna</option>
                                      <option value="3">Processo interno da empresa</option>
                                      </select>
                                      </div>-->
                                    
                                </div>
                                    <input type="hidden" value="<?php echo $id_vaga?>" name="id">
                                    
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success btn-simple" value="Sim"></button>
                                    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Não</button></form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  End Modal -->
							</div>