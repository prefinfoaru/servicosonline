
				
	<div class="modal fade modal-mini modal-primary" id="myModal1<?php echo $formacao_acadmc['id_formacao']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header justify-content-center">
	                <div class="modal-profile">
	                    <i class="nc-icon nc-bell-55" style="color: #C7C400"></i>
	                </div>
	            </div><br>
	            <div class="modal-body">
						<li><b>Nível: </b><br><i><?php echo $formacao_acadmc ['nivel'] ?></i></li>
						<li><b>País: </b><br><i><?php echo $formacao_acadmc ['pais'] ?></i></li>
						<li><b>Estado: </b><br><i><?php echo $formacao_acadmc ['estado'] ?></i></li>
						<li><b>Data de Início: </b><br><i><?php echo $formacao_acadmc ['inicio_mes'] ?> - <?php echo $formacao_acadmc ['inicio_ano']  ?></i></li>
						<li><b>Data de Conclusão: </b><br><i><?php if($formacao_acadmc ['conclusao_mes'] != ''){ echo $formacao_acadmc ['conclusao_mes'] ?> - <?php echo $formacao_acadmc ['conclusao_ano']; }else{ echo "Trancado";} ?></i></li>
	            </div>
	            <div class="modal-footer">
					<div class="button-fechar">
	                	<button type="button" class="btn btn-default cursor" data-dismiss="modal">Fechar</button>
					</div>	
	            </div>
	        </div>
			
	    </div>
		
	</div>
	
	<div class="modal fade modal-mini modal-primary" id="myModal2<?php echo $formacao_acadmc['id_formacao']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
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
	                	<a href="./data/delete/excluir_formacaoacademica.php?del=<?php echo $formacao_acadmc['id_formacao'] ?>&id=<?php echo $formacao_acadmc['id_solicitante'] ?>"><button type="button" class="btn btn-default cursor btn-excluir">Sim</button></a>
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
	
