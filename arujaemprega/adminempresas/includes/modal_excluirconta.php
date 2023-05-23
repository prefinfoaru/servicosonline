
	
	<div class="modal fade modal-primary" id="ModalExcluirConta" tabindex="-1" role="dialog" aria-labelledby="ModalExcluirContaLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            
				<div class="modal-header">
					<h5 class="modal-title" >Excluir seu Perfil no ArujáEmprega:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
      			</div>
				<form method="POST" action="./data/delete/excluiconta.php">
					<div class="modal-body">
				


						<div class="row">	
							<h4>Tem Certeza que deseja excluir seu Perfil?</h4>
							<h5>Essa ação irá excluir todos os seus dados e você precisará se cadastrar novamente para ter acesso.</h5>
							<h5>Somente será permitida a exclusão se não existir vaga aberta!</h5>
							
						</div>	




					</div>
					<input type="hidden" name="id" value="<?php echo $usu;?>">
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-danger">Excluir</button>
					</div>
				</form>




	        </div>
	    </div>
	</div>
	<script>
$('.modal').click(function(event){
    $(event.target).modal('hide');
});

</script>
	
