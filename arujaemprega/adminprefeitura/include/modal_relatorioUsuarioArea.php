<form method="post" action="?p=relatorio_cadusuarioarea">
    <div class="modal fade  modal-primary" id="ModalCadUsuarioArea" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false"
        style="background-color: rgba(0, 0, 0, 0.5);">
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
                                    <input type="date" name="data1" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <span>Até: </span>
                                    <input type="date" name="data2" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left"><br>
                        <p>Selecione a área de atuação que deseja filtrar:</p>
                        <select class="form-control js-example-basic-single" name="cargo">
                            <option value="Todos">Todos</option>
                            <?php

							$busca_areas = $pdo->query("SELECT DISTINCT area_de_atuacao as cargo FROM bd_emprega_aruja.tb_dados_profissionais order by area_de_atuacao asc;");

							foreach ($busca_areas as $row_areas) {
								echo '
								<option value="' . $row_areas['cargo'] . '">' . $row_areas['cargo'] . '</option>
							';
							}

							?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fill pull-center cursor">ENVIAR</button>

                    <button type="button" class="btn btn-warning btn-fill pull-center cursor"
                        data-dismiss="modal">CANCELAR</button>
                </div>
            </div>
        </div>
    </div>
</form>