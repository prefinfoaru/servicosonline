<div class="modal fade  modal-primary" id="myModal1<?php echo $id_soli ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false"
    style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            </div>
            <div class="modal-body text-center">
                <form method="post" action="./data/insert/candidato_aprovado.php" name="form-aprovar">
                    <h3>Aprovar Candidato Para Entrevista</h3>
                    <div class="text-left">
                        <!-- GRAVAR NO BANCO E ENVIAR EMAIL CASO FOR APROVADO-->

                        <p style="font-size: 12px;">Escolha uma das opções para enviar os dados da entrevista para o
                            usuário:</p>

                        <div class="row">

                            <div class="col-md-6 pr-1" class="datadiv" style="display: block">
                                <div class="form-group">
                                    <label>Data da entrevista:</label>
                                    <input type="date" name="data" class="form-control data_input" required>
                                </div>
                            </div>


                            <div class="col-md-6 pr-1" class="datadiv_res" style="display: none">
                                <div class="form-group">
                                    <label>Data da entrevista:</label>

                                    <?php if (@$status == "2") { ?>
                                    <input type="date" class="form-control data_res">

                                    <?php } elseif (@$status == "1") { ?>
                                    <!-- <input type="date" class="form-control data_res" value="<?php echo $data_agenda ?>" disabled required>
										<input type="hidden" name="data" class="form-control" value="<?php echo $data_agenda ?>" required> -->

                                    <?php } else { ?>
                                    <input type="date" class="form-control data_res">

                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-md-6 pr-1" class="horadiv" style="display: block">
                                <div class="form-group">
                                    <label>Horário da entrevista:</label>
                                    <input type="time" name="horario" class="form-control hora" required>
                                </div>
                            </div>

                            <!-- <div class="col-md-6 pr-1" class="pat_horadiv" style="display: none">
								<div class="form-group">
									<label>Horário da entrevista:</label>
									<input type="time" name="horario" class="form-control hora_res" min="<?php echo $horario_inicio; ?>" max="<?php echo $horario_fim ?>">
								</div>
							</div> -->


                        </div>



                        <?php //echo $id_soli 
						?>
                        <?php //echo $id_vaga 
						?>
                        <?php //echo date("Y-m-d H:i:s");
						$exec1 = $pdo->query($sql1);
						while ($row_transacoes3 = $exec1->fetch(PDO::FETCH_ASSOC)) {

							$endereco_empresa		= $row_transacoes3['endereco'];
							$numero_empresa			= $row_transacoes3['numero'];
							$complemento_empresa	= $row_transacoes3['complemento'];
							$bairro_empresa			= $row_transacoes3['bairro'];
							$cidade_empresa			= $row_transacoes3['cidade'];
							$estado_empresa			= $row_transacoes3['estado'];
						}
						$sql_PAT	=	"SELECT * FROM bd_emprega_aruja.tb_pre_enderecos_fixos where id_end = '1' ";
						$exec_PAT = $pdo->query($sql_PAT);
						while ($row_PAT 	= 	$exec_PAT->fetch(PDO::FETCH_ASSOC)) {
							$endereco		=	$row_PAT['endereco'];
							$numero			=	$row_PAT['numero'];
							$complemento	=	$row_PAT['complemento'];
							$bairro			=	$row_PAT['bairro'];
							$cidade			=	$row_PAT['cidade'];
							$estado			=	$row_PAT['estado'];
						}

						?>

                        <!-- CADA OPÇÃO IRÁ ABRIR UMA CONDIÇÃO PARA ESCOLHER QUAL ENDEREÇO SERÁ ENVIADO NO EMAIL DO USUÁRIO -->
                        <strong style="font-size: 12px;">LOCAL: </strong>
                        <div class="radio">
                            <label><input type="radio" class="empresa_check" name="end" onClick="optionEnd()"> Empresa
                            </label>
                            <div class="empresa_div" style="display: none">
                                <?php
								echo '<p>' . $endereco_empresa . ', ' . $numero_empresa . '&nbsp;' . $complemento_empresa . '- ' . $bairro_empresa . ' / ' . $cidade_empresa . ' - ' . $estado_empresa . '</p>';

								echo '<input type="hidden" class="empresa_input" name="end_empresa" style="width: 100%" value="' . $endereco_empresa . ', ' . $numero_empresa . '&nbsp;' . $complemento_empresa . ', ' . $bairro_empresa . ' / ' . $cidade_empresa . ' - ' . $estado_empresa . '" disabled></>';

								?>
                            </div>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="PAT_check" name="end" onClick="optionEnd()"> PAT / Arujá
                                Emprega </label>
                            <div class="PAT_div" style="display: none;">
                                <?php
								echo '<p>' . $endereco . ', ' . $numero . '&nbsp;' . $complemento . '- ' . $bairro . ' / ' . $cidade . ' - ' . $estado . '</p>';

								echo '<input type="hidden" class="PAT_input" name="pat" style="width: 100%" value="' . $endereco . ', ' . $numero . '&nbsp;' . $complemento . ', ' . $bairro . ' / ' . $cidade . ' - ' . $estado . '" disabled></>';
								?>
                            </div>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="digitar_check" name="end" onClick="optionEnd()"> Digitar
                                Endereço </label>
                            <div class="digitar_div" style="display: none;">
                                <div class="form-group">
                                    <label for="comment">Digite o endereço da entrevista:</label>
                                    <textarea class="form-control textarea_end" rows="5" name="digitar_end"
                                        disabled></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="aviso_pat" style="display: none">

                                <?php if (($status > "1") || ($status == "") || ($status == "1" && $data_agendada < $date_btn)) { ?>

                                <a style="color:red">Atenção, antes de agendar data e horario, você deve entrar em
                                    contato com o PAT para confirmar o agendamento da sala.<br><a
                                        href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=solicitacaosala&id=<?php echo $idvaga; ?>">Para
                                        reservar a sala de entrevista do PAT clique aqui!</a>

                                    <?php } elseif ($status == "0") { ?>

                                    <a style="color:red">Atenção, antes de agendar data e horario, você deve entrar em
                                        contato com o PAT para verificar a aprovação da solicitação.<br></a>

                                    <?php } else { ?>

                                    <a style="color:green">A reserva da sala foi realizada.</a>

                                    <?php

								} ?>

                            </div>
                            <label>Entrevistador(a): </label>
                            <input type="text" name="entrevistador" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="comment">Observações:</label>
                            <textarea class="form-control" rows="5" name="observacoes"></textarea>
                        </div>
                    </div>



            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-link btn-simple btn-enviar">Enviar</button>
                <input type="hidden" value="<?php echo $idvaga; ?>" name="id_vaga" />
                <input type="hidden" value="<?php echo $id_soli; ?>" name="id_soli" />

                <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>

    <script>
    function optionEnd() {


        var status = '<?= $status; ?>';
        if (status == 1) {

            var inicio = '<?= $horario_inicio; ?>';
            var fim = '<?= $horario_fim; ?>';

            var data_agenda = ' <?php echo $data_agenda; ?>';
            data_agenda = new Date(data_agenda).toISOString().split('T')[0];

        }

        var data_agendada = '<?= $data_agendada; ?>';
        var data_atual = '<?= $date_btn; ?>';

        var limite = <?php echo $contador; ?>;
        for (var i = 0; i < limite; i++) {
            if (document.querySelectorAll('.empresa_check').item(i).checked == true) {

                document.querySelectorAll('.empresa_div').item(i).style.display = 'block';
                document.querySelectorAll('.empresa_input').item(i).disabled = false;

            } else {
                document.querySelectorAll('.empresa_div').item(i).style.display = 'none';
                document.querySelectorAll('.empresa_input').item(i).disabled = true;
            }

            if (document.querySelectorAll('.PAT_check').item(i).checked == true && status == 1 && data_agendada >
                data_atual) {

                document.querySelectorAll('.PAT_div').item(i).style.display = 'block';
                // document.querySelectorAll('.hora_res').item(i).disabled = false;
                document.querySelectorAll('.hora').item(i).setAttribute('min', inicio);
                document.querySelectorAll('.hora').item(i).setAttribute('max', fim);
                document.querySelectorAll('.PAT_input').item(i).disabled = false;
                document.querySelectorAll('.data_input').item(i).readOnly = true;
                document.querySelectorAll('.aviso_pat').item(i).style.display = 'block';
                document.querySelectorAll(".data_input").item(i).value = data_agenda;
                // document.querySelectorAll('.pat_horadiv').item(i).style.display = 'block';
                // document.querySelectorAll('.datadiv_res').item(i).style.display = 'block';
                // document.querySelectorAll('.datadiv_res').item(i).required = true;
                // document.querySelectorAll('.horadiv').item(i).style.display = 'none';
                // document.querySelectorAll('.horadiv').item(i).required = false;
                // document.querySelectorAll('.datadiv').item(i).style.display = 'none';
                // document.querySelectorAll('.datadiv').item(i).required = false;
                // document.querySelectorAll('.btn-enviar').item(i).disabled = true;
                document.querySelectorAll('.btn-enviar').item(i).disabled = false;
            } else if (document.querySelectorAll('.PAT_check').item(i).checked == true && status != 1) {
                document.querySelectorAll('.PAT_div').item(i).style.display = 'block';
                document.querySelectorAll('.PAT_input').item(i).readOnly = false;
                document.querySelectorAll('.hora').item(i).readOnly = true;
                document.querySelectorAll(".data_input").item(i).value = "";
                document.querySelectorAll('.data_input').item(i).readOnly = true;
                document.querySelectorAll('.aviso_pat').item(i).style.display = 'block';
                document.querySelectorAll('.hora').item(i).removeAttribute('min', inicio);
                document.querySelectorAll('.hora').item(i).removeAttribute('max', fim);
                document.querySelectorAll('.btn-enviar').item(i).disabled = true;
            } else if (document.querySelectorAll('.PAT_check').item(i).checked == true && status == 1 && data_agendada <
                data_atual) {
                document.querySelectorAll('.PAT_div').item(i).style.display = 'block';
                document.querySelectorAll('.PAT_input').item(i).readOnly = false;
                document.querySelectorAll('.hora').item(i).readOnly = true;
                document.querySelectorAll(".data_input").item(i).value = "";
                document.querySelectorAll('.data_input').item(i).readOnly = true;
                document.querySelectorAll('.aviso_pat').item(i).style.display = 'block';
                document.querySelectorAll('.hora').item(i).removeAttribute('min', inicio);
                document.querySelectorAll('.hora').item(i).removeAttribute('max', fim);
                document.querySelectorAll('.btn-enviar').item(i).disabled = true;
            } else {
                document.querySelectorAll('.PAT_div').item(i).style.display = 'none';
                document.querySelectorAll('.PAT_input').item(i).disabled = true;
                document.querySelectorAll('.hora').item(i).readOnly = false;
                document.querySelectorAll(".data_input").item(i).value = "";
                document.querySelectorAll('.data_input').item(i).readOnly = false;
                document.querySelectorAll('.aviso_pat').item(i).style.display = 'none';
                document.querySelectorAll('.hora').item(i).removeAttribute('min', inicio);
                document.querySelectorAll('.hora').item(i).removeAttribute('max', fim);
                document.querySelectorAll('.btn-enviar').item(i).disabled = false;
                // document.querySelectorAll('.btn-enviar').item(i).disabled = false;
                // document.querySelectorAll('.datadiv_res').item(i).style.display = 'none';
                // document.querySelectorAll('.datadiv_res').item(i).required = false;
                // document.querySelectorAll('.horadiv').item(i).style.display = 'block';
                // document.querySelectorAll('.horadiv').item(i).required = true;
                // document.querySelectorAll('.datadiv').item(i).style.display = 'block';
                // document.querySelectorAll('.datadiv').item(i).required = true;


            }

            if (document.querySelectorAll('.digitar_check').item(i).checked == true) {
                document.querySelectorAll('.digitar_div').item(i).style.display = 'block';
                document.querySelectorAll('.textarea_end').item(i).disabled = false;
            } else {
                document.querySelectorAll('.digitar_div').item(i).style.display = 'none';
                document.querySelectorAll('.textarea_end').item(i).disabled = true;
            }
        }
    }
    $('.modal').click(function(event) {
        $(event.target).modal('hide');
    });
    </script>
</div>


</form>