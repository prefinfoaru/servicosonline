
	
	<div class="modal fade modal-mini modal-primary" id="myModal2<?php echo $habilidades['id_habilidade']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header justify-content-center">
	                <div class="modal-profile">
	                    <i class="nc-icon nc-simple-remove" style="color: #FF7979"></i>
	                </div>
	            </div>
	            <div class="modal-body text-center">
						<label> DESEJA REALMENTE EXCLUIR ESSES DADOS? </label>
	            </div>
	            <div class="modal-footer">
					<div class="btn-excluir">
	                	<a href="./data/delete/excluir_habilidades.php?del=<?php echo $habilidades['id_habilidade'] ?>&id=<?php echo $habilidades['id_solicitante'] ?>"><button type="button" class="btn btn-default cursor btn-excluir">Sim</button></a>
					</div>
					<div class="btn-naoexcluir">
	               		<button type="button" class="btn btn-default cursor" data-dismiss="modal">Não</button>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
	<script>
$('.modal').click(function(event){
    $(event.target).modal('hide');
});

</script>
	
