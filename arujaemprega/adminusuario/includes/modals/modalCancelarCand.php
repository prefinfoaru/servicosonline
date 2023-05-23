<div class="modal fade  modal-primary" id="myModalCancelar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
				<!--<div class="modal-profile">
                </div>-->
            </div>
                <div class="modal-body text-center">
                    
                    <h5>Deseja realmente cancelar esta candidatura? </h5>
                    
                    <div class="text-left">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <!-- <input type="text"  name="NIS" class="form-control" placeholder="Digite o número do seu NIS sem pontuação." maxlength="11" required> -->
                            </div>
                        </div>
                    </div>	
                    
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-warning btn-fill pull-center cursor" data-dismiss="modal">NÃO</button>
                    
                    <a href="data/delete/excluir_candidatura.php?idVaga=<?=$id_vaga?>&idSoli=<?=$id_solicitante?>"><button type="button" class="btn btn-success btn-fill pull-center cursor">SIM</button></a>
                </div>
        </div>
	</div>
</div>