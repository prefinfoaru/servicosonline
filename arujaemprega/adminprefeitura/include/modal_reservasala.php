
     
<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $id_vaga ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reservar Sala para empresa: <?php echo $razaosocial;  ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="POST" action="./data/insert/reservasalapre.php">
      <div class="modal-body">
     


	  	 <div class="row">	
				<div class="col-md-6 pr-1">
                    <div class="form-group">
                        <label>Data da entrevista:</label>
                        		<input type="date"  name="data" class="form-control" required>
                    </div>
                </div>	
						
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Horário de Inicio:</label>
						 		<input type="time"  name="horarioinicio" class="form-control" required>
							</div>
                        </div>
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Horário témino:</label>
						 		<input type="time"  name="horariofim" class="form-control" required>
							</div>
                        </div>	
        </div>	
		<div class="row">
			<div class="col-md-12 pr-1">
				<label>Responsável:</label>
				<input type="text" name="responsavel" class="form-control">
			</div>

		</div>
		<br>
		<div class="row">
		
				<div class="col-md-12 ">
					<center>
					<input class="form-check-input" type="radio" name="sala" value="sala 1" >
					<label class="form-check-label" for="exampleRadios1">Sala 1 </label>
					</center>
				</div>
				
				<div class="col-md-12 ">
					<center>
					<input class="form-check-input" type="radio" name="sala" value="sala 2" >
					<label class="form-check-label" for="exampleRadios1">Sala 2</label>
					</center>
				</div>
				
		</div>




		<input type="hidden" name="idvaga" value="<?php echo $id_vaga ?>">
		<input type="hidden" name="idempresa" value="<?php echo $id;?>">
		<input type="hidden" name="nomeempresa" value=" <?php echo $razaosocial;  ?>">
	</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
			<button type="submit" class="btn btn-success">Reservar</button>
      	</div>
	   </form>




      
    </div>
  </div>
</div>