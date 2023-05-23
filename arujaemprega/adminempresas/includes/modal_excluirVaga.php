
<div class="modal fade modal modal-primary" id='myModal1<?php echo $id_vaga ?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" title="">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                   <h6 style="color:#CC7D7F"> <i class='fa fa-trash'></i> - Exclusão da Vaga <?php echo $id_vaga ?></h6>
                                </div>
                                <div class="modal-body text-center">
                                    <p style="font-size: 14px; color:#17507A"><i>Para exclusão da vaga, necessitamos de algumas informações.</i></p><hr>
                                   
                                    <form action="data/update/deleta_lista_vagas.php" method="post">


                                            <div class="form-group">
                                            <label for="sel1">Qual motivo da exclusão da vaga ?</label>
                                            <select class="form-control"  name="perg1" required>
                                                <option value="" >Selecione uma opção</option>
                                                <option value="1">Vaga preenchida</option>
                                            </select>
                                            </div>
                                            
                                            <!-- <div class="form-group">
                                            <label for="sel1">Caso a Vaga tenha sido preenchida ?</label>
                                            <select class="form-control" name="perg2" required+>
                                            <option value="" >Selecione uma opção</option>
                                            <option value="1">Não encontrado perfil adequado no ARUJÁ EMPREGA</option>
                                            <option value="2">Indicação interna</option>
                                            <option value="3">Processo interno da empresa</option>
                                            </select>
                                            </div> -->
                                    
                                            <input type="hidden" value="<?php echo $id_vaga?>" name="id">

                                </div>
                                   
                                    
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger btn-simple" ></button>
                                    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Fechar</button></form>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!--  End Modal -->
							</div>