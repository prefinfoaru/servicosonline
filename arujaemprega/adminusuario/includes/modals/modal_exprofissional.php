
<div>				
	<div class="modal fade modal-mini modal-primary" id="myModal1<?php echo $ex_profissional['id_dados'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header justify-content-center">
	                <div class="modal-profile">
	                    <i class="nc-icon nc-bell-55" style="color: #C7C400"></i>
	                </div>
	            </div><br>
	            <div class="modal-body">
						<li><b>Nível Hierárquico: </b><br><i><?php echo $ex_profissional ['nivel_hierarquico'] ?></i></li>
						<li><b>Salário: </b><br><i><?php echo $ex_profissional ['salario'] ?></i></li>
						<li><b>Área de Atuação: </b><br><i><?php echo $ex_profissional ['area_de_atuacao'] ?></i></li>
						<!-- <li><b>Especializacao: </b><br><i><?php //echo $ex_profissional ['especializacao']?></i></li> -->
						<li><b>Atividades: </b><br><i><?php echo $ex_profissional ['descricao_da_atividade']?></i></li>
						<li><b>Atualidade: </b><br><i><?php if($ex_profissional ['atualiadade'] != ''){ echo $ex_profissional ['atualiadade'];}else {echo "Não";}?></i></li>
						
	            </div>
	            <div class="modal-footer">
					<div class="button-fechar">
	                	<button type="button" class="btn btn-default cursor" data-dismiss="modal">Fechar</button>
					</div>	
	            </div>
	        </div>
	    </div>
	</div>
	
	<div class="modal fade modal-mini modal-primary" id="myModal2<?php echo $ex_profissional['id_dados'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
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
	                	<a href="./data/delete/excluir_exprofissional.php?del=<?php echo $ex_profissional['id_dados'] ?>&id=<?php echo $ex_profissional['id_solicitante'] ?>"><button type="button" class="btn btn-default cursor btn-excluir">Sim</button></a>
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
	
