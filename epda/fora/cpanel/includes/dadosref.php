
      <br>
      <br>
      <div class="container">
      <h2>Informações sobre sua solicitação</h2>
      <p>Solicitação para hora extra referente ao protocolo nº   <i style="color: red"><?php echo $protocolo ?></i></p>            
      <table class="table table-striped"><br><hr>
      Dados Funcionário :  
      <thead>
      <tr style="font-size: 13px">
      <th>Nome</th>
      <th>Função</th>
      <th>Departamento</th>
      <th>Data da HR</th>
      <th>Tipo de Hr</th>

      </tr>
      </thead>
      <tbody>
      <tr style="font-size: 11px">
      <td><?php echo $nome; ?></td>
      <td><?php echo $funcao; ?></td>
      <td><?php echo $departamento; ?></td>
      <td><?php echo $data_status; ?></td>
      <td><?php echo $tipoHr; ?></td>

      </tr>

      </tbody>
      </table>


      <table class="table table-striped"><hr>
      Movimentção entre Secretárias  : 
      <thead>
      <tr style="font-size: 13px">
      <th>Secretária</th>
      <th>Data Movimentação</th>
      <th>Movimentado para :</th>
      <th>Motivo :</th>

      </tr>
      </thead>
      <tbody>
      <tr style="font-size: 11px">

      <td><?php echo $atualSec ?></td>
      <td><?php echo $dataMov ?></td>
      <td><?php echo $secMov ?></td>
      <td><?php echo $motivoobs ?></td>

      </tr>

      </tbody>
      </table>

      <table class="table table-striped"><hr>
      Situação da Solicitação   : 
      <thead>
      <tr style="font-size: 13px">
      <th>Situação </th>
      <th>Data da Resposta</th>
      <th>Observação:</th>

      </tr>
      </thead>
      <tbody>
      <tr style="font-size: 11px">

      <td><?php echo $row['situacao']; ?></td>
      <td><?php echo $datR ?></td>
      <td><?php echo  $obsR  ?></td>

      </tr>

      </tbody>
      </table>
      </div>

      </body>
      </html>
