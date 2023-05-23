
     
<!-- Modal -->
<div class="modal fade" id="exampleModal2<?php echo $row['id_reservasala'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aprovar Reserva de Sala para empresa: <?php echo $row['nome_empresa'];  ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="POST" action="./data/update/reprovasala.php">
      	<div class="modal-body">
     


	  	 <div class="row">	
				<h3>Tem Certeza que deseja reprovar a reservar da sala : <astrong><?php echo	 $row['sala'];?></strong>?</h3><br>
				<h5>Motivo?</h5>
			<input type="text" name="motivo" class="form-control" required>
			
        </div>	




		<input type="hidden" name="id" value="<?php echo $row['id_reservasala'] ; ?>">
	
	</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			<button type="submit" class="btn btn-danger">Reprovar</button>
      	</div>
	   </form>




      
    </div>
  </div>
</div>