
<form method="post" action="?p=relatorio_candidatos">
<div class="modal fade  modal-primary" id="ModalCandidatos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
				<!--<div class="modal-profile">
                </div>-->
            </div>
            <div class="modal-body text-center">
				
				<h5>Informe a data que deseja para gerar o relatório: </h5>
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
				<p>Status das Solicitações:</p>
				<label class="radio-inline"><input type="radio" name="tipo" value="1" checked>&nbsp;Aprovado</label>&nbsp;&nbsp;
				<label class="radio-inline"><input type="radio" name="tipo" value="2">&nbsp;Contratado</label>&nbsp;&nbsp;
				<label class="radio-inline"><input type="radio" name="tipo" value="3">&nbsp;Reprovado</label>&nbsp;&nbsp;
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-fill pull-center cursor">ENVIAR</button>
				
                <button type="button" class="btn btn-warning btn-fill pull-center cursor" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
	</div>
</div>
</form>	