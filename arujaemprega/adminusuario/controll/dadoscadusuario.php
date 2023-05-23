  <?php 
include "./includes/topo_editardadosCad.php ";            
?>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

  <script src="https://cdn.tiny.cloud/1/d7mf8inz10za7x62gz4c3g9zny7wl7gk3hnswc2nj5r77wun/tinymce/5/tinymce.min.js"
      referrerpolicy="origin"></script>
  <script src="./assets/js/jsjs.js"></script>
  <div class="main-panel">
      <style>
      .cursor {
          cursor: pointer;
      }
      </style>
      <!-- Navbar -->

      <!-- End Navbar -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Editar Cadastro </h4>
                          </div>
                          <div class="card-body">
                              <form action="./data/update/dados_cadastraisUP.php" method="post"
                                  enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-md-8 pr-1">
                                          <div class="form-group">
                                              <label>Nome</label>
                                              <input type="text" name="nome" class="form-control" placeholder="Company"
                                                  value="<?php  if (empty($nome)){echo "..." ;}else {echo $nome;} ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-4 pr-1">
                                          <div class="form-group">
                                              <label>E-mail</label>
                                              <input type="email" name="email" class="form-control"
                                                  placeholder="Username"
                                                  value="<?php  if (empty($email)){echo "..." ;}else {echo $email;} ?>">
                                          </div>
                                      </div>

                                  </div>
                                  <div class="row">
                                      <div class="col-md-3 pr-1">
                                          <div class="form-group">
                                              <label>Data de Nascimento</label>
                                              <input type="date" name="dt_nasc" class="form-control"
                                                  placeholder="Company"
                                                  value="<?php  if (empty($nasc)){echo "..." ;}else {echo $nasc;} ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-3 pr-1">
                                          <div class="form-group">
                                              <label>Telefone</label>
                                              <input type="text" name="tel" class="form-control" placeholder="Company"
                                                  value="<?php  if (empty($tel)){echo "..." ;}else {echo $tel;} ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-3 pl-1">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Celular</label>
                                              <input type="text" name="celular" class="form-control"
                                                  value='<?php  if (empty($cel)){echo "..." ;}else {echo $cel;} ?>'>
                                          </div>
                                      </div>
                                      <div class="col-md-3 pl-1">
                                          <div class="form-group">
                                              <label>Estado Civíl</label>
                                              <select required id="Estado_Civil" name="civil" class="form-control"
                                                  style="width: 90%">
                                                  <?php 
														
														if ($civil == "Solteiro(a)"){echo "<option selected>Solteiro(a)</option>" ;}else {echo "<option>Solteiro(a)</option>";}	
														
														if ($civil == "Casado(a)"){echo "<option selected>Casado(a)</option>" ;}else {echo "<option>Casado(a)</option>";}	
														
														if ($civil == "Divorciado(a)"){echo "<option selected>Divorciado(a)</option>" ;}else {echo "<option>Divorciado(a)</option>";}	
														
														if ($civil == "Viuvo(a)"){echo "<option selected>Viuvo(a)</option>" ;}else {echo "<option>Viuvo(a)</option>";}	
														
													  ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12 pr-1">
                                          <div class="form-group">
                                              <label>Outros Contatos</label>
                                              <input type="text" name="outrosCont" maxlength="100" class="form-control"
                                                  value="<?php echo $outrosCont;?>">
                                          </div>
                                      </div>


                                  </div>
                                  <div class="row">
                                      <div class="col-md-3 pr-1">
                                          <div class="form-group">
                                              <label>CEP</label>
                                              <input id="cep" name="cep" placeholder="Apenas números"
                                                  class="form-control input-md" required=""
                                                  value="<?php  if (empty($cep)){echo "..." ;}else {echo $cep;} ?>"
                                                  type="search" maxlength="8" pattern="[0-9]+$">

                                          </div>
                                          <div class="form-group">
                                              <button type="button" class="btn btn-primary cursor"
                                                  onclick="pesquisacep(cep.value)">Pesquisar</button>
                                          </div>
                                      </div>
                                      <!-- <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                                </div>
                                            </div> -->

                                      <div class="col-md-4 pl-1">
                                          <div class="form-group">
                                              <label>Rua</label>
                                              <input id="rua" name="rua" class="form-control" placeholder="" required=""
                                                  readonly="readonly" type="text"
                                                  value="<?php  if (empty($rua)){echo "..." ;}else {echo $rua;} ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-2 pl-1">
                                          <div class="form-group">
                                              <label>N°</label>
                                              <input id="numero" name="numero" class="form-control" placeholder=""
                                                  required="" type="text"
                                                  value="<?php  if (empty($numero)){echo "..." ;}else {echo $numero;} ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Complemento</label>
                                              <input id="complemento" name="complemento" class="form-control"
                                                  placeholder="" type="text"
                                                  value="<?php  if (empty($complemento)){echo "..." ;}else {echo $complemento;} ?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Bairro</label>
                                              <input id="bairro" name="bairro" class="form-control" placeholder=""
                                                  required="" readonly="readonly" type="text"
                                                  value="<?php  if (empty($bairro)){echo "..." ;}else {echo $bairro;} ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Cidade</label>
                                              <input id="cidade" name="cidade" class="form-control" placeholder=""
                                                  required="" readonly="readonly" type="text"
                                                  value="<?php  if (empty($cidade)){echo "..." ;}else {echo $cidade;} ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Estado</label>
                                              <input id="estado" name="estado" class="form-control" placeholder=""
                                                  required="" readonly="readonly" type="text"
                                                  value="<?php  if (empty($estado)){echo "..." ;}else {echo $estado;} ?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <!-- <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                                </div>
                                            </div> -->
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Habilitado</label>
                                              <select class="form-control" name="habilitado" id="habilitacao"
                                                  onchange="optionHabilitado()">
                                                  <option>
                                                      <?php  if (empty($habilitado)){echo "..." ;}else {echo $habilitado;} ?>
                                                  </option>
                                                  <option>
                                                      <?php  if ($habilitado == "sim"){echo "não" ;}else {echo "sim";} ?>
                                                  </option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Categoria</label>


                                              <?php
														
														if ($habilitado == "não"){echo '<select class="form-control" name="categoria" id="categoria_sel" disabled>' ;}else {echo '<select class="form-control" name="categoria" id="categoria_sel">';}
														
														if ($tipo_habilitacao == "não possui"){echo "<option selected>Não possui</option>" ;}
														
														if ($tipo_habilitacao == "A"){echo "<option selected>A</option>" ;}else {echo "<option>A</option>";}
														
														if ($tipo_habilitacao == "B"){echo "<option selected>B</option>" ;}else {echo "<option>B</option>";}
														
														if ($tipo_habilitacao == "C"){echo "<option selected>C</option>" ;}else {echo "<option>C</option>";}
														
														if ($tipo_habilitacao == "A-B"){echo "<option selected>A-B</option>" ;}else {echo "<option>A-B</option>";} 
														
														if ($tipo_habilitacao == "A-C"){echo "<option selected>A-C</option>" ;}else {echo "<option>A-C</option>";} 
														
														if ($tipo_habilitacao == "A-D"){echo "<option selected>A-D</option>" ;}else {echo "<option>A-D</option>";}
														
														if ($tipo_habilitacao == "A-E"){echo "<option selected>A-E</option>" ;}else {echo "<option>A-E</option>";}
														
														if ($tipo_habilitacao == "B-C"){echo "<option selected>B-C</option>" ;}else {echo "<option>B-C</option>";} 
														
														if ($tipo_habilitacao == "B-D"){echo "<option selected>B-D</option>" ;}else {echo "<option>B-D</option>";} 
														
														if ($tipo_habilitacao == "B-E"){echo "<option selected>B-E</option>" ;}else {echo "<option>B-E</option>";}
														?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Veículo Próprio</label>
                                              <select class="form-control" name="veiculo">
                                                  <option>
                                                      <?php  if (empty($veiculo_proprio)){echo "..." ;}else {echo $veiculo_proprio;} ?>
                                                  </option>
                                                  <option>
                                                      <?php  if ($veiculo_proprio == "sim"){echo "não" ;}else {echo "sim";} ?>
                                                  </option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Disponibilidade Para Viajar</label>
                                              <select class="form-control" name="viajar">
                                                  <option>
                                                      <?php  if (empty($viajar)){echo "..." ;}else {echo $viajar;} ?>
                                                  </option>
                                                  <option>
                                                      <?php  if ($viajar == "sim"){echo "não" ;}else {echo "sim";} ?>
                                                  </option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Disponibilidade Para Mudar</label>
                                              <select class="form-control" name="mudar">
                                                  <option><?php  if (empty($mudar)){echo "..." ;}else {echo $mudar;}?>
                                                  </option>
                                                  <option><?php  if ($mudar == "sim"){echo "não" ;}else {echo "sim";} ?>
                                                  </option>
                                              </select>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="row">
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Possui deficiência?</label><br>
                                              <select class="form-control" name="possuiDeficiencia"
                                                  id="possuiDeficiencia">
                                                  <?php if ($possuiDeficiencia == '' || $possuiDeficiencia == null || $possuiDeficiencia == 'Não') {?>
                                                  <option value="Não" selected>Não</option>
                                                  <option value="Sim">Sim</option>
                                                  <input type="hidden" value="Não" id="psDefi">
                                                  <?php }else {?>
                                                  <option value="Sim" selected>Sim</option>
                                                  <option value="Não">Não</option>
                                                  <input type="hidden" value="Sim" id="psDefi">
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>TIPO</label>
                                              <select class="form-control" name="deficiencia" id="deficiencia"
                                                  onchange="optionDados()">
                                                  <?php
                                                        
                                                        if ($deficiencia == '') {
                                                            echo '<option value="'.$deficiencia.'">'.$deficiencia.'</option>';
                                                            echo '<option value="Nenhuma">Nenhuma</option>';

                                                            $sql_def = "SELECT * FROM bd_emprega_aruja.tb_pre_deficiencias";

                                                            foreach($pdo->query($sql_def) as $def){
                                                                echo '<option value="'.$def['deficiencia'].'">'.$def['deficiencia'].'</option>';
                                                            }
                                                        }else {
                                                            echo '<option value="'.$deficiencia.'">'.$deficiencia.'</option>';

                                                            echo '<option value="Nenhuma">Nenhuma</option>';

                                                            $retira = '<option value="'.$deficiencia.'">'.$deficiencia.'</option>';
                                                            
                                                            $options = [];

                                                            $sql_def = "SELECT * FROM bd_emprega_aruja.tb_pre_deficiencias";

                                                            foreach($pdo->query($sql_def) as $def){
                                                                $optValue = '<option value="'.$def['deficiencia'].'">'.$def['deficiencia'].'</option>';
                                                                array_push($options, $optValue);
                                                            }

                                                            $retirar = array_search($retira, $options);

                                                            array_splice($options, $retirar, 1);

                                                            foreach ($options as $option) {
                                                                echo $option;
                                                            }
                                                        }
                                                        
                                                        ?>
                                              </select>
                                              <input type="hidden" value="<?php echo $deficiencia ?>"
                                                  id="comparadorDeficiencia">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <!-- Include dos tipos de deficiência -->
                                          <?php include './include/dados_def.php'; ?>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label class=" control-label">Resumo </label>
                                              <textarea rows="3" name="resumo" id="basic-example"
                                                  class="form-control"><?php  if (empty($res)){echo "..." ;} else {echo $res;} ?> </textarea>
                                          </div>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="col-md-6 control-label" style="text-align: right">Alterar
                                                  imagem de perfil</label>

                                              <input type="file" class="form-control" name="imagem"
                                                  accept=".jpg,.png,.jpeg"
                                                  style="background-color: #58B0EA ; color: #141E4D ; font-size: 11px; width: 98%"><br>


                                          </div>
                                      </div>
                                  </div>

                                  <br>

                                  <div class="row">
                                      <div class="col-md-11 pr-1">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-info btn-fill cursor"
                                                  onclick="demo.showNotification('top','center')" name="button"
                                                  id="btnUP">Atualizar</button>
                                              <a href="?p=config_usu"><button type="button" name="button"
                                                      class="btn btn-danger cursor">Voltar</button></a>
                                          </div>
                                      </div>
                                  </div>

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

                                  email: <?php  if (empty($email)){echo "..." ;}else {echo $email;} ?>

                              </div>

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
      <script src="./includes/defiScripts.js"></script>
      <script>
      function optionHabilitado() {
          var optionHabilitado = document.getElementById("habilitacao").value;

          if (optionHabilitado == "sim") {
              document.getElementById("categoria_sel").disabled = false;

          } else {
              document.getElementById("categoria_sel").disabled = true;
          }
          if (optionHabilitado == "não") {
              document.getElementById("categoria_sel").disabled = true;

          } else {
              document.getElementById("categoria_sel").disabled = false;
          }
      }




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

      function liberaDeficiencia(value) {
          valor = document.getElementById('psDefi').value;
          if (value != valor) {
              document.getElementById('deficiencia').disabled = false;
          } else {
              document.getElementById('deficiencia').value = '';
              document.getElementById('deficiencia').disabled = true;
          }
      }
      </script>

      <?php //include ""; ?>