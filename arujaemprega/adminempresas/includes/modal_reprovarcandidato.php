
<div class="modal fade  modal-primary" id="myModal2<?php echo $id_soli ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
				<div class="modal-profile">
                   <i style="color: red;" class="nc-icon nc-simple-remove"></i>
                </div>
            </div>
            <div class="modal-body text-center">
            <form method="post" action="./data/insert/candidato_reprovado.php">
					<h6>TEM CERTEZA QUE DESEJA REPROVAR ESTE CANDIDATO?</h6>
				<div class="text-left">
					<!-- GRAVAR NO BANCO E ENVIAR EMAIL CASO FOR APROVADO-->
					
					<p style="font-size: 12px;"> </p>
					
						
				</div>	
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link btn-simple">Sim</button>
				<input type="hidden" value="<?php echo $idvaga; ?>" name="id_vaga" />
				<input type="hidden" value="<?php echo $id_soli; ?>" name="id_soli" />
				<input type="hidden" value="<?php echo date("Y-m-d H:i:s");; ?>" name="data" />
			</form>	
                <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Não</button>
            </div>
        </div>
	</div>
</div>