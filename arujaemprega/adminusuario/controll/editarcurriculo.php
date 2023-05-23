  
<?php 

include "./includes/topo_editarcv.php";  

?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="./assets/js/jsjs.js"></script>
<div class="main-panel">
<style>.cep_cursor{cursor: pointer;}</style>
            <!-- Navbar -->
        
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title">Editar Cadastro </h4><hr>
                                </div>
								
                                <div class="card-body">
                                    <form action="#" method="post">
										
										<div class="card-header">
											<h4 class="card-title">Formação Acadêmica</h4><br>
										</div>
                                        
                                        <?php 
										$select_formacao_acadmc	=	"SELECT * FROM bd_emprega_aruja.tb_formacao_academica where id_solicitante = '$id'";	
										foreach($pdo->query($select_formacao_acadmc)as $formacao_acadmc){
											
										echo '<div class="row">';
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>NOME DA INSTITUIÇÃO</label>';
                                                    echo '<input type="text" name="instituicao" class="form-control" placeholder="Company" value="'.$formacao_acadmc ['nome_instituicao'].'">';
                                                echo '</div>';
                                            echo '</div>';
										?>
											<div class="col-md-4 pr-1">
												<div class="form-group">
													<label>PAÍS</label>
													<select name="pais" id="pais" class="form-control" onChange="optionPais()">
														<option><?php echo $formacao_acadmc ['pais'] ?></option>
														<?php
															$sql_paises = "SELECT * FROM bd_emprega_aruja.tb_pre_paises ";
															foreach($pdo->query($sql_paises) as $paises){
															echo    '<option value="'   .$paises['pais'].'">'    .$paises['pais']   .'</option>';
															}
														?>
													</select>
												</div>
											</div>
											
											<div class="col-md-4 pr-1" id="estado_div">
												<div class="form-group">
													<label>ESTADO</label>	
													<select name="estado" id="estado"  class="form-control">
														<option><?php echo $formacao_acadmc ['estado'] ?></option>
														<?php 
															$sql_estados = "SELECT * FROM bd_emprega_aruja.tb_pre_estados; ";
															foreach($pdo->query($sql_estados) as $estados){
															echo    '<option value="'   .$estados['estado'].'">'    .$estados['estado']   .'</option>';
															}
														?>
													</select>
												</div>
											</div>
										</div>
										<?php	
										echo '<div class="row">';		
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>CURSO</label>';
                                                    echo '<input type="text"  name="curso" class="form-control" placeholder="Company" value="'.$formacao_acadmc ['curso'].'">';
                                                echo '</div>';
                                            echo '</div>';	
											
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>NÍVEL</label>';
                                                    echo '<input type="text"  name="nivel_curso" class="form-control" placeholder="Company" value="'.$formacao_acadmc ['nivel'].'">';
                                                echo '</div>';
                                            echo '</div>';		
												
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>STATUS DO CURSO</label>';
                                                    echo '<select name="status_curso" class="form-control" id="status_curso" onChange="optionDisponivel()">';
													echo '<option>Concluído</option>';
													echo '<option>Cursando</option>';
													echo '<option>Trancado</option>';
													echo '</select>';
                                                echo '</div>';
                                            echo '</div>';	
												
                                        echo '</div>';
											
										echo '<div class="row">';		
											echo '<div class="col-md-3 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>INÍCIO DO CURSO (Dia/Mês)</label>';
                                                    echo '<input type="text"  name="inicio_mesCURSO" class="form-control" placeholder="Company" value="'.$formacao_acadmc ['inicio_mes'].'">';
                                                echo '</div>';
                                            echo '</div>';	
												
											echo '<div class="col-md-3 pr-1">';
												echo '<label><br></label>';
                                                echo '<div class="form-group">';
                                                    echo '<input type="text"  name="inicio_anoCURSO" class="form-control" placeholder="Company" value="'.$formacao_acadmc ['inicio_ano'].'">';
                                                echo '</div>';
                                            echo '</div>';	
												
											echo '<div class="col-md-3 pr-1" id="mes_div">';
                                                echo '<div class="form-group">';
                                                    echo '<label>CONCLUSÃO DO CURSO (Dia/Mês)</label>';
                                                    echo '<input type="text"  name="conclusao_mesCURSO" class="form-control" placeholder="Company" value="'.$formacao_acadmc ['conclusao_mes'].'" id="conclusao_mes">';
                                                echo '</div>';
                                            echo '</div>';
												
											echo '<div class="col-md-3 pr-1" id="ano_div">';
                                                echo '<div class="form-group">';
                                                    echo '<label><br></label>';
                                                    echo '<input type="text"  name="conclusao_anoCURSO" class="form-control" placeholder="Company" value="'.$formacao_acadmc ['conclusao_ano'].'" id="conclusao_ano">';
                                                echo '</div>';
											echo '<br><br>';
                                            echo '</div>';
                                        echo '</div>';	
											
												
										echo '<input type="hidden" name="id" value="'.$formacao_acadmc ['id_formacao'].'"></input>' ;
											
										include "./includes/condicao_disponivel.php";
										}
											
											
										?>
										
									<div class="card-header">
										<h4 class="card-title">Habilidades e Idiomas</h4><br>
									</div>
									<div class="row">
										<div class="col-md-4 pr-1">
										<div class="form-group">
											<label>IDIOMAS (Dia/Mês)</label>
										<?php
										$select_idiomas	=	"SELECT * FROM bd_emprega_aruja.tb_idiomas where id_solicitante = '$id'";
										foreach($pdo->query($select_idiomas)as $idiomas){
											
                                        echo '<input type="text"  name="idiomas" class="form-control" placeholder="Company" value="'.$idiomas ['idiomas'].'"><br>';
											
										echo '<input type="hidden" name="id" value="'.$idiomas ['id_indiomas'].'"></input>' ;
                                               
										}
										?>
										</div>
										</div>	
											
										
										<div class="col-md-4 pr-1">
										<div class="form-group">
											<label>Nível</label>
										<?php
										$select_idiomas	=	"SELECT * FROM bd_emprega_aruja.tb_idiomas where id_solicitante = '$id'";
										foreach($pdo->query($select_idiomas)as $idiomas){
                                        echo '<input type="text"  name="nivel" class="form-control" placeholder="Company" value="'.$idiomas ['nivel'].'"><br>';
											
										echo '<input type="hidden" name="id" value="'.$idiomas ['id_indiomas'].'"></input>' ;
                                                
										}
										?>
										</div>
										</div>
									</div>
										
										<div class="row">
										<div class="col-md-4 pr-1">
										<div class="form-group">
											<label>Habilidades</label>
										<?php
										
										$select_habilidades	=	"SELECT * FROM bd_emprega_aruja.tb_habilidade where id_solicitante = '$id'";
										
										foreach($pdo->query($select_habilidades)as $habilidades){
                                        echo '<input type="text"  name="habilidades " class="form-control" placeholder="Company" value="'.$habilidades ['descricao_habilidade'].'"><br>';
										
										echo '<input type="hidden" name="id" value="'.$habilidades ['id_habilidade'].'"></input>' ;
										}
										?>
										</div>
										</div>
									</div>
										
										<div class="card-header">
											<h4 class="card-title">Experiências Profissionais</h4><br>
										</div>
									
										<?php 
										$select_dados_prof	=	"SELECT * FROM bd_emprega_aruja.tb_dados_profissionais where id_solicitante = '$id' ";	
										foreach($pdo->query($select_dados_prof)as $dados_prof){
											
										echo '<div class="row">';
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>NOME DA EMPRESA</label>';
                                                    echo '<input type="text" name="nome_empresa" class="form-control" value="'.$dados_prof ['nome_empresa'].'">';
                                                echo '</div>';
                                            echo '</div>';
												
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>CARGO</label>';
                                                    echo '<input type="text" name="cargo" class="form-control" value="'.$dados_prof ['cargo'].'">';
                                                echo '</div>';
                                            echo '</div>';	
												
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>SALÁRIO</label>';
                                                    echo '<input type="text"  name="salario" class="form-control" value="'.$dados_prof ['salario'].'">';
                                                echo '</div>';
                                            echo '</div>';	
                                        echo '</div>';
											
										echo '<div class="row">';
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>NÍVEL HIERÁRQUICO</label>';
                                                    echo '<input type="text" name="nivel_hierarquico_dadosPROF" class="form-control" value="'.$dados_prof ['nivel_hierarquico'].'">';
                                                echo '</div>';
                                            echo '</div>';
												
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>ÁREA DE ATUAÇÃO</label>';
                                                    echo '<input type="text" name="area_de_atuacao" class="form-control" value="'.$dados_prof ['area_de_atuacao'].'">';
                                                echo '</div>';
                                            echo '</div>';	
												
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>ESPECIALIZAÇÃO</label>';
                                                    echo '<input type="text"  name="especializacao" class="form-control" value="'.$dados_prof ['especializacao'].'">';
                                                echo '</div>';
                                            echo '</div>';	
                                        echo '</div>';
											
										echo '<div class="row">';
											echo '<div class="col-md-3 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>DATA DE INÍCIO</label>';
                                                    echo '<input type="text" name="inicio_mes_prof" class="form-control" value="'.$dados_prof ['inicio_mes'].'">';
                                                echo '</div>';
                                            echo '</div>';
											echo '<div class="col-md-3 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label><br></label>';
                                                    echo '<input type="text" name="inicio_ano_prof" class="form-control" value="'.$dados_prof ['inicio_ano'].'">';
                                                echo '</div>';
                                            echo '</div>';
												
											echo '<div class="col-md-3 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>DATA DE CONCLUSÃO</label>';
														if($dados_prof ['conclusao_mes'] != ''){
															echo '<input type="text" name="conclusao_mes_prof" class="form-control" value="'.$dados_prof ['conclusao_mes'].'">';
														}else{
															echo '<input type="text" name="conclusao_mes_prof" class="form-control" value="...">';
														}	
                                            	echo '</div>';
                                            echo '</div>';
												
											echo '<div class="col-md-3 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label><br></label>';
                                                    	if($dados_prof ['conclusao_ano'] != ''){
															echo '<input type="text" name="conclusao_ano" class="form-control" value="'.$dados_prof ['conclusao_ano'].'">';
														}else{
															echo '<input type="text" name="pais" class="form-control" value="...">';
														}
                                                	echo '</div>';
                                            	echo '</div>';	
											echo '</div>';
										echo '<div class="row">';
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>ATUALIDADE</label>';
                                                    echo '<input type="text"  name="atualiadade" class="form-control" value="'.$dados_prof ['atualiadade'].'">';
                                                echo '</div>';
                                            echo '</div>';	
                                        echo '</div><br><br>';
										
										echo '<input type="hidden" name="id" value="'.$dados_prof ['id_dados'].'"></input>' ;
										}
											
											
										?>
										
										<div class="card-header">
											<h4 class="card-title">Objetivos Profissionais</h4><br>
										</div>
										<?php 
										$select_obj_prof	=	"SELECT * FROM bd_emprega_aruja.tb_objetivo_profissional where id_solicitante = '$id' ";	
										foreach($pdo->query($select_obj_prof)as $obj_prof){
											
										echo '<div class="row">';
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>JORNADA</label>';
                                                    echo '<input type="text" name="jornada" class="form-control" value="'.$obj_prof ['jornada'].'">';
                                                echo '</div>';
                                            echo '</div>';
												
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>TIPO DE CONTRATO</label>';
                                                    echo '<input type="text" name="contrato" class="form-control" value="'.$obj_prof ['tipo_contrato'].'">';
                                                echo '</div>';
                                            echo '</div>';	
												
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>HIERARQUIA MÍNIMA</label>';
                                                    echo '<input type="text"  name="hierarquia_minima_obj" class="form-control" value="'.$obj_prof ['nivel_hierarquico_minimo'].'">';
                                                echo '</div>';
                                            echo '</div>';	
                                        echo '</div>';
											
										echo '<div class="row">';
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>HIERARQUIA MÁXIMA</label>';
                                                    echo '<input type="text" name="hierarquia_maxima_obj" class="form-control" value="'.$obj_prof ['nivel_hierarquico_maximo'].'">';
                                                echo '</div>';
                                            echo '</div>';
												
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>PRETENSÃO MÍNIMA</label>';
                                                    echo '<input type="text" name="pretensao_minima_obj" class="form-control" value="'.$obj_prof ['pretensao_minima'].'">';
                                                echo '</div>';
                                            echo '</div>';	
												
											echo '<div class="col-md-4 pr-1">';
                                                echo '<div class="form-group">';
                                                    echo '<label>PRETENSÃO MÁXIMA</label>';
                                                    echo '<input type="text"  name="pretensao_maxima_obj" class="form-control" value="'.$obj_prof ['pretensao_maxima'].'">';
                                                echo '</div>';
                                            echo '</div>';	
                                        echo '</div>';
											
										echo '<input type="hidden" name="id" value="'.$obj_prof ['id_obj_prof'].'"></input>' ;
										}
											
											
										?>
                                   <!--     <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                                </div>
                                            </div>
                                        </div> --> <br>
                                        
                                        
                                        <button type="submit" class="btn btn-info btn-fill pull-right" onclick="demo.showNotification('top','center')" name="button" id="btnUP">Atualizar</button> 
                                        <div class="clearfix"></div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="./../imagens/backgroundedit.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
										
                                     <img class="avatar border-gray" src="./../adminusuario/<?php echo $tratado  ?>"> 
                                     <h5 class="title"><?php  if (empty($nome)){echo "..." ;}else {echo $nome;} ?></h5>
                                     Dt Nasc: <?php  if (empty($datadep)){echo "..." ;}else {echo $datadep;} ?><br>
                                        
                                     email:  <?php  if (empty($email)){echo "..." ;}else {echo $email;} ?> 
                                        
                                    </div>
                                    <p class="description text-center">
                                     <br><b style="color:#F59D9E">Apresentação:</b><br>
                                      <?php  if (empty($res)){echo "..." ;} else {echo $res;} ?> 
                                    </p>
                                </div>
                                <!--
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                       
                                        <i class="fa fa-facebook-square"></i>
                                        
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                      
                                        <i class="fa fa-twitter"></i>
                                        
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                       
                                        <i class="fa fa-google-plus-square"></i>
                                        
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include "../includes/condicao_pais_estado_cidade.php"; ?>
<?php include "../includes/condicao_cursando.php"; ?>

<?php //include "./data/update/editar_curriculoUP.php"; ?>	
