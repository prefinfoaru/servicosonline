
     
<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $row['id_reservasala'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aprovar Reserva de Sala para empresa: <?php echo $row['nome_empresa'];  ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="POST" action="./data/update/aprovasala.php">
      	<div class="modal-body">
     


	  	 <div class="row">	
				<h3>Tem Certeza que deseja reservar a sala : <astrong><?php echo	 $row['sala'];?></strong>?</h3><br>
				<h4>Essa sala será usada dia: <astrong><?php echo $row['data_agenda'];?></strong> das <astrong><?php echo $row['horario_inicio'];?></strong> ás <astrong><?php echo$row['horario_fim'];?></strong></h4>
        </div>	




		<input type="hidden" name="id" value="<?php echo $row['id_reservasala'] ; ?>">
	
	</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
			<button type="submit" class="btn btn-success">Aprovar</button>
      	</div>
	   </form>




      
    </div>
  </div>
</div>