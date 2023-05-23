<?php include "../includes/topo_cad_cv4.php"; ?>

<div class="container">

  <form class="form-horizontal" id="cad_form" method="post" action="../data/insert/insert_idiomas_habilidades.php">

    <!--CABEÇARIO -->
    <div class="panel panel-default">
      <h2><i class='fas fa-address-book' style='font-size:36px'></i>Dados Curricular </h2><i style="color: #E77577">
        <h11>* Campo Obrigatório</h11>
      </i>
      <h5 style='text-align: right; color: #3498db; font-size: 16px;'> 4/5 &nbsp;&nbsp;&nbsp; </h5>
      <hr>
      <div class="col-md-12">
        <h3>Idiomas </h3><br><br>
      </div>

      <!-- GRUPO **************************************************************************************************************************************************************************-->
      <div class="form-group" align="center">
        <label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Idioma <h11>*</h11></label>
        <div class="col-md-3">
          <select name="idioma[]" id="idioma" class="form-control" style="width: 98%" required="">
            <option value="Português">Português</option>
            <?php
            $sql_idioma = "SELECT * FROM bd_emprega_aruja.tb_pre_idioma ";
            foreach ($pdo->query($sql_idioma) as $idioma) {
              echo    '<option value="'   . $idioma['idioma'] . '">'    . $idioma['idioma'] . '</option>';
            }
            ?>

          </select><br>
        </div>

        <label class="col-md-1 control-label" for="instituicao">&nbsp;&nbsp;Nível <h11>*</h11></label>
        <div class="col-md-2">
          <select name="nivelidi[]" class="form-control" id="nivel" style="width: 98%" required="">
            <option value="">Clique Aqui</option>
            <?php
            $sql_nivel = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_idioma ";
            foreach ($pdo->query($sql_nivel) as $nivel) {
              echo    '<option value="'   . $nivel['nivel'] . '">'    . $nivel['nivel'] . '</option>';
            }
            ?>

          </select><br>
        </div>

        <div class="col-md-4">
          <button type="button" id="add-idioma" class="btn btn-success"> + </button>
        </div>

      </div>

      <div class="form-group" id="idiomas"></div>
      <br>
      <hr>

      <div class="col-md-12">
        <h3>Habilidades </h3><br><br>
      </div>

      <div class="form-group" align="center">
        <label class="col-md-2 control-label" for="habilidades" style="text-align: right">&nbsp;&nbsp;Habilidades </label>
        <div class="col-md-6">
          <input id="habilidades" name="habilidades[]" placeholder="Informe suas habilidades" class="form-control input-md" type="text" style="width: 98%"><br>
        </div>

        <div class="col-md-4">
          <button type="button" id="add-habilidade" class="btn btn-success"> + </button>
        </div>

      </div>

      <div class="form-group" id="habilidade"></div>

      <br>
      <hr>



      <div class="col-md-12">
        <h3>Informática </h3><br><br>
      </div>

      <div class="form-group" align="center">

        <label class="col-md-1 control-label" for="informatica" style="text-align: right">&nbsp;&nbsp;Área</label>
        <div class="col-md-2">
          <select name="area[]" class="form-control" style="width: 98%" onChange="optionInfor(this.value)">
            <option value="">Clique Aqui</option>
            <?php
            $sql_area = "SELECT * FROM bd_emprega_aruja.tb_pre_informatica; ";
            foreach ($pdo->query($sql_area) as $row_area) {
              echo    '<option value="'   . $row_area['dados_informatica'] . '">'    . $row_area['dados_informatica'] . '</option>';
            }
            ?>
          </select>
        </div>

        <label class="col-md-2 control-label" for="instituicao" style="text-align: center">&nbsp;Conhecimentos </label>

        <div class="col-md-2" id="clique_div" style="display: none">
          <select name="conhecimento[]" class="form-control" id="clique" style="width: 98%" disabled>
            <option value="">Clique Aqui</option>
          </select><br>
        </div>

        <div class="col-md-2" id="banco_div" style="display: block">
          <select name="dados_infor[]" class="form-control" id="banco" style="width: 98%" required="" disabled>
            <option value="">Clique Aqui</option>
            <?php
            $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '1' ";
            foreach ($pdo->query($sql_infor) as $row_infor) {
              echo    '<option value="'   . $row_infor['dados_infor'] . '">'    . $row_infor['dados_infor'] . '</option>';
            }
            ?>

          </select><br>
        </div>

        <div class="col-md-2" style="display: none" id="programacao_div">
          <select name="dados_infor[]" class="form-control" id="programacao" style="width: 98%" required="" disabled>
            <option value="">Clique Aqui</option>
            <?php
            $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '2' ";
            foreach ($pdo->query($sql_infor) as $row_infor) {
              echo    '<option value="'   . $row_infor['dados_infor'] . '">'    . $row_infor['dados_infor'] . '</option>';
            }
            ?>

          </select><br>
        </div>

        <div class="col-md-2" style="display: none" id="graficos_div">
          <select name="dados_infor[]" class="form-control" id="graficos" style="width: 98%" required="" disabled>
            <option value="">Clique Aqui</option>
            <?php
            $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '3' ";
            foreach ($pdo->query($sql_infor) as $row_infor) {
              echo    '<option value="'   . $row_infor['dados_infor'] . '">'    . $row_infor['dados_infor'] . '</option>';
            }
            ?>

          </select><br>
        </div>

        <div class="col-md-2" style="display: none" id="escritorio_div">
          <select name="dados_infor[]" class="form-control" id="escritorio" style="width: 98%" required="" disabled>
            <option value="">Clique Aqui</option>
            <?php
            $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '4' ";
            foreach ($pdo->query($sql_infor) as $row_infor) {
              echo    '<option value="'   . $row_infor['dados_infor'] . '">'    . $row_infor['dados_infor'] . '</option>';
            }
            ?>

          </select><br>
        </div>

        <div class="col-md-2" style="display: none" id="operacionais_div">
          <select name="dados_infor[]" class="form-control" id="operacionais" style="width: 98%" required="" disabled>
            <option value="">Clique Aqui</option>
            <?php
            $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '5' ";
            foreach ($pdo->query($sql_infor) as $row_infor) {
              echo    '<option value="'   . $row_infor['dados_infor'] . '">'    . $row_infor['dados_infor'] . '</option>';
            }
            ?>

          </select><br>
        </div>

        <div class="col-md-2" style="display: none" id="outros_div">
          <select name="dados_infor[]" class="form-control" id="outros" style="width: 98%" required="" disabled>
            <option value="">Clique Aqui</option>
            <?php
            $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '6' ";
            foreach ($pdo->query($sql_infor) as $row_infor) {
              echo    '<option value="'   . $row_infor['dados_infor'] . '">'    . $row_infor['dados_infor'] . '</option>';
            }
            ?>

          </select><br>
        </div>
        <label class="col-md-1 control-label" for="nivel" style="text-align: right">&nbsp;&nbsp;Nivel </label>
        <div class="col-md-2">
          <select name="nivel[]" class="form-control" id="nivel" style="width: 98%">
            <option value="">Clique Aqui</option>
            <option value="Básico">Básico</option>
            <option value="Intermediário">Intermediário</option>
            <option value="Avançado">Avançado</option>

          </select>
        </div>
        <div class="col-md-2">
          <button type="button" id="add-informatica" class="btn btn-success"> + </button>
        </div>
      </div>

      <div class="form-group" id="informatica"></div>
      <br>




      <input id="id_soli" name="id_soli" class="hidden" value="<?php echo $id_soli ?>" type="text">



  </form>
  <div class="form-group" align="left">
    <label class="col-md-2 control-label" for="Cadastrar"></label>
    <div class="col-md-8">
      <button type="submit" id="Cadastrar" class="btn btn-success"> Avançar </button>

      <!-- <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button> -->
    </div>
  </div>

</div>

</div>

<?php

include "../includes/incluir_campo.php"


?>
<?php include "../includes/condicao_dados_informatica.php" ?>