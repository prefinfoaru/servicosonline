<div class="modal fade  modal-primary" id="myModal1<?php echo $id_informatica ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
				<div class="modal-profile">
                   <i style="color: red;" class="nc-icon nc-simple-remove"></i>
                </div>
            </div>
            <div class="modal-body text-center">
            <form method="post" action="./data/delete/delete_dadosInformatica.php">
					<h6>TEM CERTEZA QUE DESEJA EXCLUIR ESSAS INFORMAÇÕES?</h6>
				<div class="text-left">
					
					<p style="font-size: 12px;"> </p>
					
						
				</div>	
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default cursor">Sim</button>
				<input type="hidden" value="<?php echo $id_informatica; ?>" name="id" />
				<input type="hidden" value="<?php echo $id; ?>" name="id_vaga" />
			</form>	
                <button type="button" class="btn btn-default cursor" data-dismiss="modal">Não</button>
            </div>
        </div>
	</div>
</div>