<style>
  .form-control {
    min-height: 37px;
  }
</style>


<!-- Modal Geral-->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h3>Relatório Geral</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

        <form action="?p=geral" method="POST">
          <div class="form-group">
            <label for="for=" sel1"">Escolha o Ano:</label>
            <select class="form-control" name="ano" id="sel1" autofocus required>
              <option value="2020">2020</option>

            </select></div>

          <div class="form-group">
            <label for="for=" sel1"">Escolha o Mês:</label>
            <select class="form-control" name="mes" id="sel1" autofocus required>
              <option value="01">Janeiro</option>
              <option value="02">Fevereiro</option>
              <option value="03">Março</option>
              <option value="04">Abril</option>
              <option value="05">Maio</option>
              <option value="06">Junho</option>
              <option value="07">Julho</option>
              <option value="08">Agosto</option>
              <option value="09">Setembro</option>
              <option value="10">Outubro</option>
              <option value="11">Novembro</option>
              <option value="12">Dezembro</option>
            </select></div>
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="todos">
              <label class="form-check-label" for="inlineRadio1">Todos</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="2">
              <label class="form-check-label" for="inlineRadio1">Aprovados</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="3">
              <label class="form-check-label" for="inlineRadio1">Negados</label>
            </div>
          </div>
          <br>
          <br>
          <i>Geração de Relatorio geral busca todas as Secretárias que houveram solicitações no mês consultado</i>
      </div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Consultar"></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
        </form>
      </div>
    </div>

  </div>
</div>
<!-- final modal geral--->


<!-- Modal secretária-->


<div class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h3>Relatório por Secretária</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

        <form action="?p=secretaria" method="POST">

          <div class="form-group">
            <div class="form-group">
              <label for="for=" sel1"">Escolha o Ano:</label>
              <select class="form-control" name="ano" id="sel1" autofocus required>
                <option value="2020">2020</option>

              </select></div>
            <div class="form-group">
              <label for="for=" sel1"">Escolha o Mês:</label>
              <select class="form-control" name="mes" id="sel1" autofocus required>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
              </select></div>
            <label for="for=" sel1"">Escolha a Secretária:</label>
            <select class="form-control" name="secretaria" value="secretaria" autofocus required>
              <?php foreach ($pdo->query($SqlQuerySecretaria) as $row) { ?>
                <option value="<?php echo $row['tb_secretaria_funcionario']; ?>"> <?php echo $row['tb_secretaria_funcionario']; ?>
                </option> <?php
                        }
                          ?></select>
          </div>
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="todos">
              <label class="form-check-label" for="inlineRadio1">Todos</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="2">
              <label class="form-check-label" for="inlineRadio1">Aprovados</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="3">
              <label class="form-check-label" for="inlineRadio1">Negados</label>
            </div>
          </div>
          <br>
          <br>
          <br>
          <i>Geração de Relatorio por secretária</i>
      </div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-danger" value="Enviar">
        <button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
        </form>
      </div>
    </div>

  </div>
</div>
<!-- final modal Secretária> -->




<!-- Modal Departamento-->


<div class="modal fade" id="myModal3" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h3>Relatório por Departamento</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

        <form action="?p=departamento" method="POST">

          <div class="form-group">
            <div class="form-group">
              <label for="for=" sel1"">Escolha o Ano:</label>
              <select class="form-control" name="ano" id="sel1" autofocus required>
                <option value="2020">2020</option>

              </select></div>
            <div class="form-group">
              <label for="for=" sel1"">Escolha o Mês:</label>
              <select class="form-control" name="mes" id="sel1" autofocus required>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
              </select></div>
            <label for="for=" sel1"">Escolha o Departamento:</label>
            <select class="form-control" name="departamento" value="departamento" autofocus required>
              <?php foreach ($pdo->query($SqlQueryDepartamento) as $row) { ?>
                <option value="<?php echo $row['tb_departamento_funcionario']; ?>"> <?php echo $row['tb_departamento_funcionario']; ?>
                </option> <?php
                        }
                          ?></select>
          </div>
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="todos">
              <label class="form-check-label" for="inlineRadio1">Todos</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="2">
              <label class="form-check-label" for="inlineRadio1">Aprovados</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="3">
              <label class="form-check-label" for="inlineRadio1">Negados</label>
            </div>
          </div>
          <br>
          <br>
          <br>
          <i>Geração de Relatorio por secretária</i>
      </div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-danger" value="Enviar">
        <button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
        </form>
      </div>
    </div>

  </div>
</div>
<!-- final modal Secretária>-->


<!-- Modal Usuario-->


<div class="modal fade" id="myModal4" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h3>Relatório por Funcionario</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

        <form action="?p=funcionario" method="POST">

          <div class="form-group">
            <div class="form-group">
              <label for="for=" sel1"">Escolha o Ano:</label>
              <select class="form-control" name="ano" id="sel1" autofocus required>
                <option value="2020">2020</option>

              </select></div>
            <div class="form-group">
              <label for="for=" sel1"">Escolha o Mês:</label>
              <select class="form-control" name="mes" id="sel1" autofocus required>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
              </select></div>
            <label for="for=" sel1"">Escolha o Departamento:</label>
            <select class="form-control" name="funcionario" value="secretaria" autofocus required>
              <?php foreach ($pdo->query($SqlNomeFuncionario) as $row) { ?>
                <option value="<?php echo $row['tb_nome_funcionario']; ?>"> <?php echo $row['tb_nome_funcionario']; ?>
                </option> <?php
                        }
                          ?></select>
          </div>
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="todos">
              <label class="form-check-label" for="inlineRadio1">Todos</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="2">
              <label class="form-check-label" for="inlineRadio1">Aprovados</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="filtro" id="inlineRadio1" value="3">
              <label class="form-check-label" for="inlineRadio1">Negados</label>
            </div>
          </div>
          <br>
          <br>
          <br>
          <i>Geração de Relatorio por secretária</i>
      </div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-danger" value="Enviar">
        <button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
        </form>
      </div>
    </div>

  </div>
</div>
<!-- final modal Secretária>