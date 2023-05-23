
<form method="post" action="?p=gerar_listaAprovados&id=<?php echo $idvaga ?>">
<div class="modal fade  modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
				<!--<div class="modal-profile">
                </div>-->
            </div>
            <div class="modal-body text-center">
				
				<h5>Informe a data do agendamento que deseja para gerar a lista. </h5>
				<div class="row">
					<div class="text-left">
						<div class="col-md-12 pr-1">
							<div class="form-group">
								<span>A partir de: </span>
								<input type="date"  name="data1" class="form-control">
							</div>
						</div>
					</div>	
					<div class="text-left">
						<div class="col-md-12 pr-1">
							<div class="form-group">
								<span>Até: </span> 
								<input type="date"  name="data2" class="form-control">
							</div>
						</div>
					</div>	
				</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-fill pull-center cursor">ENVIAR</button>
				
                <button type="button" class="btn btn-warning btn-fill pull-center cursor" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
	</div>
</div>
</form>	