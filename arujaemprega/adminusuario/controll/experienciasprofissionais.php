


<?php 

include "./includes/topo_Editarexperiencia.php";  

?>
<script src="https://cdn.tiny.cloud/1/d7mf8inz10za7x62gz4c3g9zny7wl7gk3hnswc2nj5r77wun/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="main-panel">
<style>.cursor{cursor: pointer;}</style>
           
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
								
                                <div class="card-body">
								<div class="card-header"><br>
									<h4 class="card-title"> Inserir Experiências Profissionais</h4><br>
								</div>
                                <form method="post" action="./data/update/exprofissionalUP.php">    
                                        <div class="row">
											<div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                   	<label>NOME DA EMPRESA</label>
                                                   	<input type="text" name="empresa" class="form-control" placeholder="Digite o nome da empresa" required>
                                                </div>
                                            </div>
										
											<!-- <div class="col-md-4 pr-1">
												<div class="form-group">
													<label>INDIQUE SEU CARGO</label>
													<input type="text" name="cargo" class="form-control" placeholder="informe o cargo" required>
												</div>
											</div> -->
											
											<div class="col-md-4 pr-1">
												<div class="form-group">
													<div class="form-group">
													<label>SALÁRIO (R$)</label>
													<input type="text" name="salario" id="meuDinheiro" onkeyup="k(this);" class="form-control" placeholder="informe o salário" required>
												</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3 pr-1">
                                                <div class="form-group">
													<label>NÍVEL HIERÁRQUICO</label>
                                                    <select name="herarquia" id="herarquia" class="form-control" required>
														<?php 
															$sql_hierarquico = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_profissao ";

															foreach($pdo->query($sql_hierarquico) as $hierarquico){
															echo    '<option value="'   .$hierarquico['tb_nivel_hierarquico'].'">'    .$hierarquico['tb_nivel_hierarquico'].'</option>';
															}
														?>
													</select>
                                                </div>
                                            </div>
											
											<div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>ÁREA</label>
													<select class="selectpicker form-control" name="profissao" data-live-search="true">
														<option selected>Selecione a profissão</option>
														<?php
															$buscaprof  =  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_profissao");
															$dataprof = $buscaprof->fetchAll(); 
															foreach ($dataprof as $value) {?>
																<option value="<?php echo $value['profissao'];?>"><?php echo $value['profissao'];?></option>
															<?php
															}
														?>
													</select>
                                                </div>
                                            </div>	
											
											<div class="col-md-4 pr-1">
                                                <div class="form-group" align="center">
                                                    <label><br><br><label>
													<div class="form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" id="atual" name="atual" onClick="optionProfissional()" value="Sim">
 														<span>&nbsp;&nbsp; ATUALIDADE</span>
													</label>
													</div>	
													
                                                </div>
                                            </div>
                                        </div>
									
										<div class="row">	
											<div class="col-md-3 pr-1">
                                       			<div class="form-group">
                                         			<label>DATA DE INÍCIO (Mês/Ano)</label>
                                         			<input type="text"  name="inicio_mes" class="form-control" placeholder="Digite o mês que iniciou" maxlength="2" required>
                                       			</div>
                                        	</div>	
										
											<div class="col-md-3 pr-1">
										 			<label><br></label>
										   		<div class="form-group">
											 		<input type="text"  name="inicio_ano" class="form-control" placeholder="Digite o ano que iniciou" maxlength="4" required>
												</div>
                                        	</div>	
										
											<div class="col-md-3 pr-1" id="mes_div">
                                        		<div class="form-group">
													<label>DATA DE CONCLUSÃO (Mês/Ano)</label>
													<input type="text"  name="conclusao_mes" class="form-control" id="conclusao_mes" placeholder="Digite o mês que foi concluído" maxlength="2" required>
                                        		</div>
                                        	</div>
										
											<div class="col-md-3 pr-1" id="ano_div">
												<div class="form-group">
													<label><br></label>
													<input type="text"  name="conclusao_ano" class="form-control" id="conclusao_ano" placeholder="Digite o ano que foi concluído" maxlength="4" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 pr-1">
												<div class="form-group">
												  <label>Atividades:</label>
												  <textarea class="form-control" id="basic-example" rows="5" id="atividades" name="atividades" style="height: 120px;"></textarea required>
												</div>
											</div>
											
											<div class="col-md-3 pr-1">
												<div class="form-group">
													<label>PAÍS</label>
													<select name="pais" id="pais" onChange="optionPais()" class="form-control"  required="" required>
														<option value="Brasil">Brasil</option>	
														<?php 
															$sql_paises = "SELECT * FROM bd_emprega_aruja.tb_pre_paises ";
															foreach($pdo->query($sql_paises) as $paises){
															echo    '<option value="'   .$paises['pais'].'">'    .$paises['pais']   .'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="Acre_div">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="Acre" required="" required>
														<option>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'AC' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="AL_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="AL" required="" required>
														<option>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'AL' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="AP_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="AP" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'AP' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="AM_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="AM" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'AM' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="BA_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="BA" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'BA' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="CE_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="CE" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'CE' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="ES_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="ES" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'ES' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="GO_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="GO" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'GO' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="MA_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="MA" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'MA' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="MT_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="MT" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'MT' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="MS_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="MS" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'MS' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="MG_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="MG"required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'MG' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="PA_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="PA" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PA' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
												</div>	
												<div class="form-group" id="PB_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="PB"required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PB' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
												</div>	
												<div class="form-group" id="PR_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="PR" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PR' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="PE_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="PE" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PE' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="PI_div" style="display: none;">
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="PI" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PI' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="RJ_div" style="display: none;">	
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="RJ" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RJ' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="RN_div" style="display: none;">	
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="RN" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RN' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="RS_div" style="display: none;">		
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="RS" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RS' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="RO_div" style="display: none;">	
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="RO" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RO' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="RR_div" style="display: none;">	
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="RR" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RR' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="SC_div" style="display: none;">	
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="SC" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'SC' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="SP_div" style="display: none;">	
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="SP" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'SP' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="SE_div" style="display: none;">	
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="SE" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'SE' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>	
												<div class="form-group" id="TO_div" style="display: none;">	
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="TO" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'TO' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
												<div class="form-group" id="DF_div" style="display: none;">	
													<label>CIDADES</label>
													<select name="cidade" class="form-control" id="DF" required="" required>
														<option selected>Clique Aqui</option>
														<?php 
															$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'DF' ";
															foreach($pdo->query($sql_cidade) as $cidade){
															echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
															}
														?>
													</select>
                                        		</div>
											</div>
											
											<div class="col-md-3 pr-1" id="estado_div">
												<div class="form-group">
													<label>ESTADO</label>
													<select name="estado" id="estado" onChange="optionCidade()" class="form-control" required="">
														<option>Clique Aqui</option>
														<?php 
															$sql_estados = "SELECT * FROM bd_emprega_aruja.tb_pre_estados; ";
															foreach($pdo->query($sql_estados) as $estados){
															echo    '<option value="'   .$estados['estado'].'">'    .$estados['estado']   .'</option>';
															}
														?>
													</select>
                                        		</div>

												<div class="form-group"><br>
													<label class="col-md-9 control-label" for="instituicao" style="text-align: left">Experiência comprovada em carteira?</label>		
													<label class="checkbox-inline control-label">
														<input type="radio" value="Sim" name="exp_comprovada" required>Sim
													</label> 
													<label class="checkbox-inline control-label">
														<input type="radio" value="Não" name="exp_comprovada" required>Não
													</label> 
                                        		</div>

											</div>

											
											
											

											<div class="col-md-12 pr-1 text-center" id="ano_divCURSO">
												<div class="form-group">
													<span id="msg"></span><br>
													<button id="btnSave" name="btnSave" class="btn btn-primary cursor" type="Submit" title="Cadastrar Dados">Cadastrar</button>
												</div>
											
											</div>
                                        </div>
									<input type="hidden" name="id_soli" value="<?php echo $id ?>"></input>
									</form>
									
									<?php	
									include "./includes/condicao_especializacao.php";
									include "./includes/condicao_ex_profissional.php";
									include "./includes/condicao_disponivel.php";
									include "./includes/condicao_pais_estado_cidade.php";
									include "./includes/condicao_cidade.php";   
									?>
<script>


function k(i) {
	var v = i.value.replace(/\D/g,'');
	v = (v/100).toFixed(2) + '';
	v = v.replace(".", ",");
	v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
	v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
	i.value = v;
}




     $('.selectpicker').select2();
</script>
								<hr>
								<div class="card-header">
									<h4 class="card-title"> Dados Já Cadastrados</h4><br>
								</div>	
                           		<div class="card strpied-tabled-with-hover">
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
											<tr>
												<th>Empresa</th>
												<th>Área de Atuação</th>
												<th>Início</th>
												<th>Conclusão</th>
												<th>Informações</th>
												<th>Excluir</th>
											</tr>
                                        </thead>
										<?php 
										$select_ex_profissional	=	"SELECT * FROM bd_emprega_aruja.tb_dados_profissionais where id_solicitante = '$id'";	
										foreach($pdo->query($select_ex_profissional)as $ex_profissional){
										?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $ex_profissional ['nome_empresa'] ?></td>
                                                <td><?php echo $ex_profissional ['area_de_atuacao'] ?></td>
                                                <td><?php echo $ex_profissional ['inicio_mes'] ?> - <?php echo $ex_profissional ['inicio_ano'] ?></td>
                                                <td><?php if($ex_profissional ['conclusao_mes'] != ''){ echo $ex_profissional ['conclusao_mes'] ?> - <?php echo $ex_profissional ['conclusao_ano'];}else{echo "Atual";} ?></td>
												
                                                <td><button type="button" class="btn btn-primary btn-simple btn-link cursor" rel="tooltip"><a data-toggle="modal" data-target="#myModal1<?php echo $ex_profissional['id_dados'] ?>"><i class="fa fa-question-circle-o" title="Mais Informações" style="font-size: 20px;"></i></a></button></td>
												
                                                <td><button type="button" class="btn btn-danger btn-simple btn-link cursor" rel="tooltip"><a data-toggle="modal" data-target="#myModal2<?php echo $ex_profissional['id_dados'] ?>"><i class="fa fa-times" title="Excluir" style="font-size: 20px;"></i></a></button></td>
                                            </tr>
											<?php include "./includes/modals/modal_exprofissional.php"; ?>
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
                        
						<script>
						
						  
tinymce.init({
  selector: 'textarea#basic-example',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});


						
						
						
						
						</script>
                    </div>
                </div>
	
            </div>
	
