        <!-- Resultado da pesquisa -->

        <?php //include "../data/for/for_edit_cv.php" 
              
              //conexao com banco ********************************************************************************************************************************************************************************

include  "./data/banco.php";
$pdo = Banco::conectar();

//Querys**************************************************************************************************************************************************************************************
if(!empty($_POST)){ 
     $cpf = $_POST['cpf'];
} else
	
{
    $cpf = '';
}
//***********************************************************************************************************************************************************************
//Tratam valor recebido *************************************************************************************************************************************************************************
$cpf_s_p     = $valor_recebido	= str_replace("." ,"", $cpf);
$cpf_s_t     = $valor_recebido	= str_replace("-" ,"", $cpf_s_p);
$cpf_tratado = $valor_recebido	= str_replace("/" ,"", $cpf_s_t);
//********************************************************************************************************************************************************************************************
$query_con_cpf = "SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where cpf = '$cpf_tratado'";

foreach($pdo->query($query_con_cpf )as $row)
{
							
$nome   = $row['nome'];	
$email  = $row['email'];	
$id     = $row['id_solicitante'];	}

//*************** VALIDAÇÃO PARA CONSULTA DO CPF ***************************//

if (empty($nome)){
    $bloqueia = '1';
}else{
    $bloqueia = '2';
}

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $numprot = explode('res=', $URL_ATUAL, 2);
        if(isset($numprot[1])){
        
        $res    =   $numprot[1];
        
        }else{
        
            $res = "";
        
        }
        if ($res == 1  ){ ?>

        <script>
swal.fire({
    title: 'Dados atualizados com sucesso!',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadoscadusuarioConsulta">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
        </script>

        <?php  }  
        
        if ($res  == 2 ){?>

        <script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível atualizar os dados!',
    text: 'Por favor, tente novamente.',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadoscadusuarioConsulta">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
        </script>

        <?php  } ?>