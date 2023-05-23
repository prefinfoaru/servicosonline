<?php include "./includes/topo_Editarobjetivosprofissionais.php"; ?>




<div class="main-panel">
<style>.cursor{cursor: pointer;}</style>
           
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
								
                                <div class="card-body">
								<div class="card-header"><br>
									<h4 class="card-title"> Inserir Objetivos Profissionais</h4><br>
								</div>
                                <form method="post" action="./data/update/obj_profissionalUP.php">    
                                        <div class="row">
											<div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                   	<label>JORNADA</label>
                                                   	<select name="jornada" id="jornada" class="form-control" required="">
														<?php 
															$sql_jornada = "SELECT * FROM bd_emprega_aruja.tb_pre_jornada; ";

															foreach($pdo->query($sql_jornada) as $jornada){
															echo    '<option value="'   .$jornada['jornada'].'">'    .$jornada['jornada'].'</option>';
															}
														?>
													</select>
                                                </div>
                                            </div>
										
											<div class="col-md-3 pr-1">
												<div class="form-group">
													<label>TIPO DE CONTRATO</label>
													<select name="tipo_contrato" class="form-control" id="nivel" required="">
														<?php 
															$sql_contrato = "SELECT * FROM bd_emprega_aruja.tb_pre_tipo_contrato; ";
															foreach($pdo->query($sql_contrato) as $contrato){
															echo    '<option value="'   .$contrato['tipo_contrato'].'">'    .$contrato['tipo_contrato'].'</option>';
															}
														?>
													</select>
												</div>
											</div>
											
											<div class="col-md-3 pr-1" id="estado_div">
												<div class="form-group">
													<label>HIERARQUIA MÍNIMA</label>	
													<select name="hierarquia_minima" id="hierarquia_minima" class="form-control" required="">
														<?php 
															$sql_h_minima = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_profissao ";

															foreach($pdo->query($sql_h_minima) as $h_minima){
															echo    '<option value="'   .$h_minima['tb_nivel_hierarquico'].'">'    .$h_minima['tb_nivel_hierarquico'].'</option>';
															}
														?>
													</select>
												</div>
											</div>
											
											<div class="col-md-3 pr-1">
                                                <div class="form-group">
													<label>HIERARQUIA MÁXIMA</label>
                                                    <select name="hierarquia_maxima" id="hierarquia_maxima" class="form-control" required="">
														<?php 
															$sql_h_maxima = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_profissao ";

															foreach($pdo->query($sql_h_maxima) as $h_maxima){
															echo    '<option value="'   .$h_maxima['tb_nivel_hierarquico'].'">'    .$h_maxima['tb_nivel_hierarquico'].'</option>';
															}
														?>
													</select>
                                                </div>
                                            </div>
										</div>
										<div class="row">
											
											<div class="col-md-3 pr-1" id="Ensino_Fundamental">
                                                <div class="form-group">
                                                    <label>PRETENSÃO SALARIAL (MÍNIMO)</label>
                                                    <input id="meuDinheiro" data-thousands="." data-decimal="," name="pretensao_min" placeholder="A partir R$" class="form-control input-md" type="text" required="">
                                                </div>
                                            </div>
											
											<div class="col-md-3 pr-1" id="Ensino_Fundamental">
                                                <div class="form-group">
                                                    <label>PRETENSÃO SALARIAL (MÁXIMO)</label>
                                                    <input id="meuDinheiro2" data-thousands="." data-decimal="," name="pretensao_max" placeholder="Até R$" class="form-control input-md" type="text" required="">
                                                </div>
                                            </div>
											
											<div class="col-md-3 pr-1">
												<div class="form-group">
													<label>PROFISSÃO DESEJADA</label>
													<select name="profissao" id="profissao" class="selectpicker form-control" id="nivel" required="" data-live-search="true">
														<?php 
															$sql_profissao = "SELECT * FROM bd_emprega_aruja.tb_pre_profissao; ";
															foreach($pdo->query($sql_profissao) as $profissao){
															echo    '<option value="'.$profissao['profissao'].'">'.$profissao['profissao'].'</option>';
															}
														?>
													</select>
												</div>
											</div>
                                    	</div>	
										<input type="hidden" name="id_soli" value="<?php echo $id ?>"></input>
									
											
										<div class="col-md-12 pr-1 text-center" id="ano_divCURSO">
											<div class="form-group">
												<span id="msg"></span><br>
												<button id="btnSave" name="btnSave" class="btn btn-primary cursor" type="Submit" title="Cadastrar Dados">Cadastrar</button>
											</div>
											
										</div>
									
									</form>
									
									<script>$("#meuDinheiro").maskMoney();</script>	
									<script>$("#meuDinheiro2").maskMoney();</script>	

									<link rel="stylesheet"  type="text/css" href="assets/css/select2.css" />
									<script> $.noConflict(); </script>
									<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
									<script src="assets/js/select2.js"></script>
									<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt-BR.js"></script>
									<script>$('.selectpicker').select2(); </script>
								<hr>
								<div class="card-header"><br>
									<h4 class="card-title"> Dados Já Cadastrados</h4><br>
								</div>
                           		<div class="card strpied-tabled-with-hover">
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
											<tr>
												<th>Jornada</th>
												<th>Contrato</th>
												<th>Informações</th>
												<th>Excluir</th>
											</tr>
                                        </thead>
										<?php 
										$select_objprofissional	=	"SELECT * FROM bd_emprega_aruja.tb_objetivo_profissional where id_solicitante = '$id' ";	
										foreach($pdo->query($select_objprofissional)as $objprofissional){
										?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $objprofissional ['jornada'] ?></td>
                                                <td><?php echo $objprofissional ['tipo_contrato'] ?></td>
												
                                                <td><button type="button" class="btn btn-primary btn-simple btn-link cursor" rel="tooltip"><a data-toggle="modal" data-target="#myModal1<?php echo $objprofissional['id_obj_prof'] ?>"><i class="fa fa-question-circle-o" title="Mais Informações" style="font-size: 20px;"></i></a></button></td>
												
                                                <td><button type="button" class="btn btn-danger btn-simple btn-link cursor" rel="tooltip"><a data-toggle="modal" data-target="#myModal2<?php echo $objprofissional['id_obj_prof'] ?>"><i class="fa fa-times" title="Excluir" style="font-size: 20px;"></i></a></button></td>
                                            </tr>
											<?php include "./includes/modals/modal_objprofissional.php"; ?>
                                        </tbody>
										<?php } ?>
                                    </table>
                               	</div>
                            </div>
								
							<a href="?p=editar_cv&idcpfcon=<?php echo $id; ?>"><button type="submit" class="btn btn-danger btn-fill pull-right cursor" onclick="demo.showNotification('top','center')" name="button" id="btnUP" title="Voltar Para Menu">Voltar</button> </a>
                            <div class="clearfix"></div>
                                    
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
	
            </div>
	