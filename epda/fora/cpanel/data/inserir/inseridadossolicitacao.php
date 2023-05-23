<meta charset="utf-8">
<?php
session_start();
include 'variaveis.php';
include '../../banco/ConexaoSQL.php';

try {

  $Conexao    = Conexao::getConnection();
  $query      = $Conexao->query("SELECT [Nome]
      ,[Matricula]
      ,[SalarioBase]
      ,[Secretaria]
      ,[Departamento]
      ,[CPF]
      ,[CargoReferencia]
      ,[VinculoEmpregaticio]
      FROM [ARUJADB].[dbo].[vwHoraExtra] where Matricula = $matriculafunc
  ");
  $produtos   = $query->fetchAll();
} catch (Exception $e) {

  echo $e->getMessage();
  exit;
}

$nome = $produtos[0]['Nome'];
$funcaofunc = $produtos[0]['CargoReferencia'];
$secretaria = $produtos[0]['Secretaria'];
$salario = $produtos[0]['SalarioBase'];
$departamento = $produtos[0]['Departamento'];

include '../../componentes/calculaHorasExtras.php';


//var_dump($produtos);
/****************************************** ****************************************************************************************************************************************************/ ////
$pdo = Banco::conectar();
$query_solicitacao =  "INSERT INTO `bd_sol_hr`.`tb_solicitacao` 
(`tb_id_solicitante`, `tb_matricula_solicitante`, `tb_nome_solicitante`, `tb_funcao_solicitante`, `tb_id_funcionario`, 
`tb_nome_funcionario`, `tb_funcao_funcionario`, `tb_secretaria_funcionario`, `tb_departamento_funcionario`, `tb_motivo`, `tb_numprotocolo`, 
`tb_situacao`, `tb_data_solicitacao`, `tb_hr_solicitada`, `tb_calculo`, `dia_semana`, `dia_semana_valor`, `tb_data_status`,
 `tb_status`, `tb_v_estimativa`) VALUES 
($matricula, $id_cad,'$nomesol','$funcao',$matriculafunc, 
'$nome', '$funcaofunc', '$secretaria', '$departamento', '$descricao ', '$protocolo', 1, '$dataatual', 
'$he_est', ' $calculo', '$diadasemanaExtenso', $numeroSemana, '$data_int', '$statusSolc',  '$ValorfinalCalculado ')";
$resultado_cadastro = $pdo->query($query_solicitacao);

//campo 20 sera atualizado conforme definição do restrito 


include('../mensagens/msg_confirmacao.php');
?>