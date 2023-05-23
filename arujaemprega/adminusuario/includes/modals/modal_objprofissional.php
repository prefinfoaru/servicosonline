
<div>				
	<div class="modal fade modal-mini modal-primary" id="myModal1<?php echo $objprofissional['id_obj_prof'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header justify-content-center">
	                <div class="modal-profile">
	                    <i class="nc-icon nc-bell-55" style="color: #C7C400"></i>
	                </div>
	            </div><br>
	            <div class="modal-body">
						<li><b>Hierarquia Mínima: </b><br><i><?php echo $objprofissional ['nivel_hierarquico_minimo'] ?></i></li>
						<li><b>Hierarquia Máxima: </b><br><i><?php echo $objprofissional ['nivel_hierarquico_maximo'] ?></i></li>
						<li><b>Salário Mínimo: </b><br><i><?php echo $objprofissional ['pretensao_minima'] ?></i></li>
						<li><b>Salário Máximo: </b><br><i><?php echo $objprofissional ['pretensao_maxima']?></i></li>
	            </div>
	            <div class="modal-footer">
					<div class="button-fechar">
	                	<button type="button" class="btn btn-default cursor" data-dismiss="modal">Fechar</button>
					</div>	
	            </div>
	        </div>
			
	    </div>
		
	</div>
	
	<div class="modal fade modal-mini modal-primary" id="myModal2<?php echo $objprofissional['id_obj_prof']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
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
	                	<a href="./data/delete/excluir_objprofissional.php?del=<?php echo $objprofissional['id_obj_prof'] ?>&id=<?php echo $objprofissional['id_solicitante'] ?>"><button type="button" class="btn btn-default cursor btn-excluir">Sim</button></a>
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
	
