  
<?php 

include "./includes/topo_EditarHabilidadesIdiomas.php";  

?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="./assets/js/jsjs.js"></script>
<div class="main-panel">
<style>.cursor{cursor: pointer;}</style>
           
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
								
                                <div class="card-body">
								<div class="card-header"><br>
									<h4 class="card-title"> Inserir Habilidades, Idiomas e Informática</h4><br>
								</div>
                                <form method="post" action="./data/update/idiomasUP.php">    
                                        <div class="row">
											<div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                   	<label>IDIOMA</label>
                                                   	<input type="text" name="idioma" class="form-control" placeholder="Digite o idoma que deseja incluir" required>
                                                </div>
                                            </div>
											
											<div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                   	<label>NÍVEL</label>	
													<select name="nivel" id="nivel" class="form-control" required>
														<?php 
															$sql_nivel = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_idioma ";
															foreach($pdo->query($sql_nivel) as $nivel){
															echo    '<option value="'.$nivel['nivel'].'">'    .$nivel['nivel'].'</option>';
															}
														?>
													</select>
                                                </div>
                                            </div>
										</div>
										
                                     	<div class="col-md-12 pr-1 " id="ano_divCURSO" required>
												<div class="form-group">
													<span id="msg"></span>
													<button name="btnSave" class="btn btn-primary cursor" type="submit" title="Cadastrar Idioma">Cadastrar Idioma</button>
												</div>
											<br><br>
										</div>
									<input type="hidden" name="id_soli" value="<?php echo $id ?>"></input>
									</form>
									
									<form method="post" action="./data/update/habilidadesUP.php"> 
                                        <div class="row">
											<div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                   	<label>HABILIDADE</label>
                                                   	<input type="text" name="habilidades" class="form-control" placeholder="Digite a habilidade que deseja incluir" required> 
                                                </div>
                                            </div>
										</div>
										
                                     	<div class="col-md-12 pr-1 " id="ano_divCURSO">
												<div class="form-group">
													<span id="msg"></span>
													<button id="btnSave" name="btnSave" class="btn btn-primary cursor" type="Submit" title="Cadastrar Habilidade">Cadastrar Habilidade</button>
												</div>
											
										</div>
									<input type="hidden" name="id_soli" value="<?php echo $id ?>"></input>
									</form>
									<br><br>
									<form method="post" action="./data/update/informaticaUP.php"> 
									<div class="row">
										<div class="col-md-4 pr-1">
                                              
                                                   		<label>Informática</label>
													   <select name="area" class="form-control"  style="width: 98%" required="" onChange="optionInfor(this.value)">
                                                                            <option value="">Clique Aqui</option>
                                                                            <?php 
                                                                                $sql_area = "SELECT * FROM bd_emprega_aruja.tb_pre_informatica; ";
                                                                                foreach($pdo->query($sql_area) as $row_area){
                                                                                echo    '<option value="'   .$row_area['dados_informatica'].'">'    .$row_area['dados_informatica'].'</option>';
                                                                                }
                                                                            ?>
                                                     </select>
                                               
                                        </div>
									
																	
                                                                    <div class="col-md-4 pr-1" id="clique_div" style="display: none">
																	<label> Conhecimentos*</label>  
                                                                        <select name="conhecimento" class="form-control" id="clique" style="width: 98%" required="" disabled>
                                                                            <option value="">Clique Aqui</option>
                                                                        </select><br>
                                                                    </div>
																
                                                                    <div class="col-md-4 pr-1" id="banco_div" style="display: block">
																	<label> Conhecimentos*</label>  
                                                                        <select name="dados_infor" class="form-control" id="banco" style="width: 98%" required="" disabled>
                                                                            <option value="">Clique Aqui</option>
                                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '1' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                        </select><br>
                                                                    </div>  
																
                                                                    <div class="col-md-4 pr-1" style="display: none" id="programacao_div">
																	<label> Conhecimentos*</label>  
                                                                        <select name="dados_infor" class="form-control" id="programacao" style="width: 98%" required="" disabled>
                                                                            <option value="">Clique Aqui</option>
                                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '2' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                        </select><br>
                                                                    </div>
																
                                                                    <div class="col-md-4 pr-1" style="display: none" id="graficos_div">
																	<label> Conhecimentos*</label>  
                                                                        <select name="dados_infor" class="form-control" id="graficos" style="width: 98%" required="" disabled>
                                                                            <option value="">Clique Aqui</option>
                                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '3' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                        </select><br>
                                                                    </div>
																
                                                                    <div class="col-md-4" style="display: none" id="escritorio_div">
																	<label> Conhecimentos*</label>  
                                                                        <select name="dados_infor" class="form-control" id="escritorio" style="width: 98%" required="" disabled>
                                                                            <option value="">Clique Aqui</option>
                                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '4' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                        </select><br>
                                                                    </div>
																
                                                                    <div class="col-md-4 pr-1" style="display: none" id="operacionais_div">
																	<label> Conhecimentos*</label>  
                                                                        <select name="dados_infor" class="form-control" id="operacionais" style="width: 98%" required="" disabled>
                                                                            <option value="">Clique Aqui</option>
                                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '5' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                        </select><br>
                                                                    </div>
																
                                                                    <div class="col-md-4 pr-1" style="display: none" id="outros_div">
																	<label> Conhecimentos*</label>  
                                                                        <select name="dados_infor" class="form-control" id="outros" style="width: 98%" required="" disabled>
                                                                            <option value="">Clique Aqui</option>
                                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '6' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                        </select><br>
                                                                    </div>
                                                             
                                                                <div class="col-md-4 pr-1">
																<label>Nivel*</label>  
																    <select name="nivel" class="form-control" id="nivel" style="width: 98%" required="">
                                                                            <option value="">Clique Aqui</option>
                                                                            <option value="Básico">Básico</option>
                                                                            <option value="Intermediário">Intermediário</option>
                                                                            <option value="Avançado">Avançado</option>
                                                                           
                                                                    </select>
                                                                </div> 
															</div>
																<div class="col-md-12 pr-1 ">
												
																<span id="msg"></span>
																<button id="btnSave" name="btnSave" class="btn btn-primary cursor" type="Submit" title="Cadastrar Informáticaa">Cadastrar Informática</button>
														
																</div>


																<input type="hidden" name="id_soli" value="<?php echo $id ?>"></input>




										</form>












									
									<?php		
										include "./includes/condicao_disponivel.php";
										include "./includes/condicao_pais_estado_cidade.php";
										include "./includes/dados_curricular_curso.php";
										include "./includes/condicao_dados_informatica.php"



									?>
							<hr>
							<div class="card-header"><br>
								<h4 class="card-title"> Dados Já Cadastrados</h4><br>
							</div>			
                           	<div class="card strpied-tabled-with-hover">
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
											<tr>
												<th class="col-md-4">Idiomas</th>
												<th>Níveis</th>
												<th>Excluir</th>
											</tr>
                                        </thead>
										<?php 
										$select_idiomas	=	"SELECT * FROM bd_emprega_aruja.tb_idiomas where id_solicitante = '$id'";	
										foreach($pdo->query($select_idiomas)as $idiomas){
										?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $idiomas ['idiomas'] ?></td>
                                                <td><?php echo $idiomas ['nivel'] ?></td>
                                                <td style="text-align: right"><button type="button" class="btn btn-danger btn-simple btn-link cursor" rel="tooltip"><a data-toggle="modal" data-target="#myModal1<?php echo $idiomas['id_indiomas'] ?>"><i class="fa fa-times" title="Excluir" style="font-size: 20px;"></i></a></button></td>
                                            </tr>
                                        </tbody>
										<?php 
											include "./includes/modals/modal_idiomas.php"; 
											} 
										?>
                                    </table>
                               	</div>
                            </div>
									
                           <div class="card strpied-tabled-with-hover">
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
											<tr>
												<th class="col-md-4">Habilidades</th>
												<th class="col-md-4">Excluir</th>
											</tr>
                                        </thead>
										<?php 
										$select_habilidades	=	"SELECT * FROM bd_emprega_aruja.tb_habilidade where id_solicitante = '$id'";	
										foreach($pdo->query($select_habilidades)as $habilidades){
										?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $habilidades ['descricao_habilidade'] ?></td>
                                                <td style="text-align: right"><button type="button" class="btn btn-danger btn-simple btn-link cursor" rel="tooltip"><a data-toggle="modal" data-target="#myModal2<?php echo $habilidades['id_habilidade'] ?>"><i class="fa fa-times" title="Excluir" style="font-size: 20px;"></i></a></button></td>
                                            </tr>
                                        </tbody>
										<?php
										include "./includes/modals/modal_habilidades.php"; 	
										} 
										?>
                                    </table>
                               	</div>
                            </div>

							<div class="card strpied-tabled-with-hover">
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
											<tr>
												<th>Area</th>
												<th>Conhecimento</th>
												<th>Nível</th>
												<th>Excluir</th>
											</tr>
                                        </thead>
										<?php 
										$select_informatica	=	"SELECT * FROM bd_emprega_aruja.tb_dados_informatica where id_solicitante = '$id'";	
										foreach($pdo->query($select_informatica)as $informatica){
										?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $informatica['curso']?></td>
												<td><?php echo $informatica['especializacao']?></td>
												<td><?php echo $informatica['nivel']?></td>
                                                <td ><button type="button" class="btn btn-danger btn-simple btn-link cursor" rel="tooltip"><a data-toggle="modal" data-target="#myModal3<?php echo $informatica['id_dados_info'] ?>"><i class="fa fa-times" title="Excluir" style="font-size: 20px;"></i></a></button></td>
                                            </tr>
                                        </tbody>
										<?php
										include "./includes/modals/modal_informatica.php"; 	
										} 
										?>
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
	
