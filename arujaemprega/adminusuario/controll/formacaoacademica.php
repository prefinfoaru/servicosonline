  <?php 

include "./includes/topo_Editarformacaoacademica.php";  

?>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="./assets/js/jsjs.js"></script>
  <div class="main-panel">
      <style>
      .cursor {
          cursor: pointer;
      }
      </style>

      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">

                          <div class="card-body">
                              <div class="card-header"><br>
                                  <h4 class="card-title"> Inserir Formação Acadêmica</h4><br>
                              </div>
                              <form method="post" action="./data/update/formacao_academicaUP.php">
                                  <div class="row">
                                      <div class="col-md-4 pr-1">
                                          <div class="form-group">
                                              <label>NOME DA INSTITUIÇÃO</label>
                                              <input type="text" name="instituicao" class="form-control"
                                                  placeholder="Digite o nome da instituição" required>
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1">
                                          <div class="form-group">
                                              <label>PAÍS</label>
                                              <select name="pais" id="pais" class="form-control" onChange="optionPais()"
                                                  required>
                                                  <option>Brasil</option>
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
                                              <select name="estado" id="estado" class="form-control" required>
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
                                  <div class="row">
                                      <div class="col-md-4 pr-1">
                                          <div class="form-group">
                                              <label>NÍVEL</label>
                                              <select name="nivel" id="escolari" class="form-control"
                                                  onchange="optionDepto()" style="width: 98%" required="">
                                                  <?php 
															$sql_escolaridade = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_escolaridade; ";
															foreach($pdo->query($sql_escolaridade) as $escolaridade){
															echo    '<option value="'   .$escolaridade['escolaridade'].'">'    .$escolaridade['escolaridade'].'</option>';
															}
														?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1" id="Ensino_Fundamental">
                                          <div class="form-group">
                                              <label>CURSO</label>
                                              <select name="curso" class="form-control" id="fundamental" required>
                                                  <?php 
														$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='1' ";
														foreach($pdo->query($sql_curso) as $curso){
														echo    '<option value="'   .$curso['curso'].'">'    .$curso['curso'].'</option>';
														}
													?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1" style="display: none;" id="extra_curricular">
                                          <div class="form-group">
                                              <label>CURSO</label>
                                              <select name="curso" class="form-control" id="extra" disabled required=""
                                                  onchange="OutrosCursos(this.value)">
                                                  <?php 
															$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='2' order by curso asc ";
															foreach($pdo->query($sql_curso) as $curso){
															echo    '<option value="'   .$curso['curso'].'">'    .$curso['curso'].'</option>';
															}
														?>
                                              </select>

                                              <input name="outroCurso" id="outrosCursos" style="display: none"
                                                  type="text" class="form-control mt-2"
                                                  placeholder="Digite o nome do curso...">
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1" style="display: none;" id="Ensino_Medio">
                                          <div class="form-group">
                                              <label>CURSO</label>
                                              <select name="curso" class="form-control" id="Medio" disabled required="">
                                                  <?php 
															$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='3' ";
															foreach($pdo->query($sql_curso) as $curso){
															echo    '<option value="'   .$curso['curso'].'">'    .$curso['curso'].'</option>';
															}
														?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1" style="display: none;" id="curso_tecnico">
                                          <div class="form-group">
                                              <label>CURSO</label>
                                              <select name="curso" class="form-control" id="tecnico" disabled
                                                  required="">
                                                  <?php 
															$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='4' ";
															foreach($pdo->query($sql_curso) as $curso){
															echo    '<option value="'   .$curso['curso'].'">'    .$curso['curso'].'</option>';
															}
														?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1" style="display: none;" id="Ensino_Superior">
                                          <div class="form-group">
                                              <label>CURSO</label>
                                              <select name="curso" class="form-control" id="Superior" disabled
                                                  required="">
                                                  <?php 
															$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='5' ";
															foreach($pdo->query($sql_curso) as $curso){
															echo    '<option value="'   .$curso['curso'].'">'    .$curso['curso'].'</option>';
															}
														?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1" style="display: none;" id="esp_MBA">
                                          <div class="form-group">
                                              <label>CURSO</label>
                                              <select name="curso" class="form-control" id="MBA" disabled required="">
                                                  <?php 
															$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='6' ";
															foreach($pdo->query($sql_curso) as $curso){
															echo    '<option value="'   .$curso['curso'].'">'    .$curso['curso'].'</option>';
															}
														?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1" style="display: none;" id="pos_mestrado">
                                          <div class="form-group">
                                              <label>CURSO</label>
                                              <select name="curso" class="form-control" id="mestrado" disabled
                                                  required="">
                                                  <?php 
															$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='7' ";
															foreach($pdo->query($sql_curso) as $curso){
															echo    '<option value="'   .$curso['curso'].'">'    .$curso['curso'].'</option>';
															}
														?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1" style="display: none;" id="pos_doutorado">
                                          <div class="form-group">
                                              <label>CURSO</label>
                                              <select name="curso" class="form-control" id="doutorado" disabled
                                                  required="">
                                                  <?php 
															$sql_curso = "SELECT * FROM bd_emprega_aruja.tb_pre_escolaridade_curso where id_nivel_escolaridade ='8' ";
															foreach($pdo->query($sql_curso) as $curso){
															echo    '<option value="'   .$curso['curso'].'">'    .$curso['curso'].'</option>';
															}
														?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4 pr-1">
                                          <div class="form-group">
                                              <label>STATUS DO CURSO</label>
                                              <select name="tempo_curso" class="form-control" id="status_curso"
                                                  onChange="optionDisponivel()" required>
                                                  <option>Concluído</option>
                                                  <option>Cursando</option>
                                                  <option>Trancado</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-3 pr-1">
                                          <div class="form-group">
                                              <label>INÍCIO DO CURSO (Mês/Ano)</label>
                                              <input type="text" name="inicio_mesCURSO" class="form-control"
                                                  placeholder="Digite o mês que o curso foi iniciado" maxlength="2">
                                          </div>
                                      </div>

                                      <div class="col-md-3 pr-1">
                                          <label><br></label>
                                          <div class="form-group">
                                              <input type="text" name="inicio_anoCURSO" class="form-control"
                                                  placeholder="Digite o ano que o curso foi iniciado" maxlength="4">
                                          </div>
                                      </div>

                                      <div class="col-md-3 pr-1" id="mes_divCURSO">
                                          <div class="form-group">
                                              <label>CONCLUSÃO DO CURSO (Mês/Ano)</label>
                                              <input type="text" name="conclusao_mesCURSO" class="form-control"
                                                  id="conclusao_mesCURSO"
                                                  placeholder="Digite o mês que o curso foi ou será concluído"
                                                  maxlength="2">
                                          </div>
                                      </div>

                                      <div class="col-md-3 pr-1" id="ano_divCURSO">
                                          <div class="form-group">
                                              <label><br></label>
                                              <input type="text" name="conclusao_anoCURSO" class="form-control"
                                                  id="conclusao_anoCURSO"
                                                  placeholder="Digite o ano que o curso foi ou será concluído"
                                                  maxlength="4">
                                          </div>

                                      </div>
                                      <div class="col-md-12 pr-1 text-center" id="ano_divCURSO">
                                          <div class="form-group">
                                              <span id="msg"></span><br>
                                              <button id="btnSave" name="btnSave" class="btn btn-primary cursor"
                                                  type="Submit" title="Cadastrar Dados">Cadastrar</button>
                                          </div>
                                      </div>
                                  </div>
                                  <input type="hidden" name="id_soli" value="<?php echo $id ?>"></input>
                              </form>

                              <?php		
										include "./includes/condicao_disponivel.php";
										include "./includes/condicao_pais_estado_cidade.php";
										include "./includes/dados_curricular_curso.php";
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
                                                  <th>Instituição</th>
                                                  <th>Curso</th>
                                                  <th>Status</th>
                                                  <th>Informações</th>
                                                  <th>Excluir</th>
                                              </tr>
                                          </thead>
                                          <?php 
										$select_formacao_acadmc	=	"SELECT * FROM bd_emprega_aruja.tb_formacao_academica where id_solicitante = '$id'";	
										foreach($pdo->query($select_formacao_acadmc)as $formacao_acadmc){
										?>
                                          <tbody>
                                              <tr>
                                                  <td><?php echo $formacao_acadmc ['nome_instituicao'] ?></td>
                                                  <td><?php echo $formacao_acadmc ['curso'] ?></td>
                                                  <td><?php echo $formacao_acadmc ['status_curso'] ?></td>

                                                  <td><button type="button"
                                                          class="btn btn-primary btn-simple btn-link cursor"
                                                          rel="tooltip"><a data-toggle="modal"
                                                              data-target="#myModal1<?php echo $formacao_acadmc['id_formacao'] ?>"><i
                                                                  class="fa fa-question-circle-o"
                                                                  title="Mais Informações"
                                                                  style="font-size: 20px;"></i></a></button></td>

                                                  <td><button type="button"
                                                          class="btn btn-danger btn-simple btn-link cursor"
                                                          rel="tooltip"><a data-toggle="modal"
                                                              data-target="#myModal2<?php echo $formacao_acadmc['id_formacao'] ?>"><i
                                                                  class="fa fa-times" title="Excluir"
                                                                  style="font-size: 20px;"></i></a></button></td>
                                              </tr>
                                              <?php include "./includes/modals/modal_formacaoacademica.php"; ?>
                                          </tbody>
                                          <?php } ?>
                                      </table>
                                  </div>
                              </div>

                              <a href="?p=editar_cv&idcpfcon=<?php echo $id; ?>"><button type="submit"
                                      class="btn btn-danger btn-fill pull-right cursor"
                                      onclick="demo.showNotification('top','center')" name="button" id="btnUP"
                                      title="Voltar Para Menu">Voltar</button> </a>
                              <div class="clearfix"></div>

                          </div>
                      </div>
                  </div>

              </div>
          </div>

      </div>