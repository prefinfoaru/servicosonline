
     
<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $row_transacoes['id_vaga'] ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir vaga: <?php echo $row_transacoes['titulo']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="POST" action="./data/update/excluivaga.php">
      	<div class="modal-body">
     


	  	 <div class="row">	
				<h3>Tem Certeza que deseja excluir essa vaga?</h3>
				<h4>Será enviado um e-mail a empresa informando a vaga e o motivo da exclusão!</h4><br>

				<h4>Motivo?</h4>
				<textarea name="motivo" rows="4" cols="50" class="form-control" required></textarea>
			
        </div>	




		<input type="hidden" name="id" value="<?php echo $row_transacoes['id_vaga'] ;?>">
		<input type="hidden" name="idempresa" value="<?php echo $row_transacoes['id_empresa'] ;?>">
	
	</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			<button type="submit" class="btn btn-danger">Excluir</button>
      	</div>
	   </form>




      
    </div>
  </div>
</div>