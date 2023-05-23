<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$res    = explode('res=', $URL_ATUAL, 2);


if (isset($res[1])) {

    $res    =   $res[1];
} else {

    $res = "";
}
if ($res  == "nok") { ?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível realizar a candidatura!',
    text: 'Por favor, tente novamente.',
    html: '<p>Esta vaga é exclusiva para Jovem Aprendiz e residentes de Arujá!</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=buscar_vagas&?tpbusca=1&?buscar=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php
}
?>

<meta https-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- <link href="css/bootstrap-3.4.1.css" rel="stylesheet" type="text/css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="js/jquery-1.12.4.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<!-- <script src="js/bootstrap-3.4.1.js"></script> -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" type="text/css" href="assets/css/select2.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="assets/js/select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt-BR.js"></script>
<!-- Custom styles for this template-->
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<div class="main-panel">
    <!---conexão e querys  ---------------------------------------------------------------------------------------------------------------------------------------------->
    <?php
    include './data/banco.php';
    include './includes/pesquisaavancadavagas.php';
    ?>


    <!--- final conexão e querys  ------------------------------------------------------------------------------------------------------------------------------------->


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu de Vagas </a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>

        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pesquisa Avançada de Vagas</h4>
                            <p class="card-category">As vagas mostradas na lista são referentes a sua àrea de atuação e
                                que estão abertas, para refinar sua busca utilize a pesquisa avançada.</p>
                            <hr>
                            <p class="card-category">Área de Pesquisa Avançada
                        </div>

                        <div class="card-body all-icons">
                            <div class="row">


                                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab">
                                            <h6 class="panel-title" style="text-decoration: none;"
                                                title="Refine sua pesquisa usando a pesquisa avançada clicando abaixo ">
                                                <a data-toggle="collapse" data-parent="#accordion1"
                                                    href="#collapseOne1">&nbsp;&nbsp;&nbsp;Acessar Filtro de pesquisa
                                                    Avançada &nbsp;&nbsp;&nbsp;<i style="color: #A80F11"
                                                        class="nc-icon nc-zoom-split"></i>&nbsp;&nbsp;&nbsp;<i
                                                        class="nc-icon nc-stre-down"></i></a></h6><br>
                                        </div>
                                        <div id="collapseOne1" class="panel-collapse collapse in">

                                            <form class="form-inline" action="" method="post">
                                                <div class="form-group">
                                                    <label
                                                        title="Para uma consulta por favor digite somente uma palavra para buscar pesquisa em todas as vagas disponivéis">&nbsp;&nbsp;Palavra
                                                        chave :&nbsp;&nbsp;</label>
                                                    <input type="text" class="form-control" name="palavra" value=""
                                                        placeholder="Digite uma palavra"
                                                        title="Para uma consulta por favor digite somente uma palavra para buscar pesquisa em todas as vagas disponivéis">

                                                </div>
                                                <div class="form-group">
                                                    <label for="pwd">&nbsp;&nbsp; Profissão :&nbsp;&nbsp;</label>
                                                    <select class="selectpicker form-control" data-live-search="true"
                                                        name="esp">
                                                        <option value=''>Selecione uma Profissão</option>
                                                        <?php foreach ($pdo->query($especificacao) as $row_esp) { ?>
                                                        <option value='<?php echo $row_esp['profissao']; ?>'>
                                                            <?php echo $row_esp['profissao']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pwd">&nbsp;&nbsp; Cidade :&nbsp;&nbsp;</label>
                                                    <select class="form-control" name="cidade">

                                                        <option value=''>Seleione uma Cidade</option>
                                                        <?php foreach ($pdo->query($cidades) as $row_menu) { ?>
                                                        <option value='<?php echo $row_menu['city']; ?>'><?php echo $row_menu['city'];
                                                                                                            } ?>
                                                        </option>

                                                    </select>
                                                </div>&nbsp;&nbsp;&nbsp;

                                                <button type="submit"
                                                    class="btn btn-info">Pesquisar</button>&nbsp;&nbsp;&nbsp; <br>
                                            </form> <br>
                                            <div style="text-align:center">
                                                <a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=buscar_vagas&?tpbusca=2&?buscar=0"
                                                    title="Essa opção posibilita a consulta de todas as vagas dispónivel não usando qualquer tipo de filtro"><button
                                                        type="submit" class="btn btn-success">Filtrar todas as
                                                        vagas</button></a>
                                                <a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/?p=buscar_vagas&?tpbusca=1&?buscar=0"
                                                    title="Volta para o filtro refêrente a sua àrea de atuação"><button
                                                        type="submit" class="btn btn-warning">Limpar
                                                        Filtros</button></a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">

            <!-- DataTales Example -->
            <div class="card">
                <div class="card-header py-3" style="background-color:#E1E0E0">
                    <h6 class="m-0 font-weight-bold text-default">Lista das vagas</h6>
                </div>
                <div class="card-body" style="box-shadow: none;">
                    <div class="table-responsive" style="box-shadow: none;">
                        <table class="table table-striped ; table-bordered" id="dataTable" width="100%" cellspacing="0"
                            style="box-shadow: none; font-size: 12px;">
                            <thead>
                                <tr>

                                    <th></th>
                                    <th>Titulo</th>
                                    <th>Descrição</th>
                                    <th>Cargo</th>
                                    <th>Àrea</th>
                                    <th>Data de inclusão</th>
                                    <th>Acessar Vaga</th>

                                </tr>
                            </thead>
                            <tbody>
                                <script></script>
                                <?php
                                // var_dump($exec);
                                while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {

                                ?>
                                <tr>

                                    <td><?php echo ($row_transacoes['id_vaga']); ?></td>
                                    <td><?php echo ($row_transacoes['titulo']); ?></td>
                                    <td><?php echo strip_tags(limita_caracteres($row_transacoes['descricao'], 300)); // Resultado: Mensagem d... 
                                            ?></td>
                                    <td><?php echo ($row_transacoes['hierarquia']); ?></td>
                                    <td><?php echo ($row_transacoes['profissao']); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row_transacoes['data'])); ?></td>

                                    <?php
                                        echo "<td align='center'>";
                                        echo " <a href='?p=visualizar_vaga&id=$row_transacoes[id_vaga]'> " . "
                                                        <i class='fas fa-eye'></i>" . '</a>' .
                                            "</td>";


                                        ?>
                                </tr>
                                <?php }    ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->


        <?php
        function limita_caracteres($texto, $limite, $quebra = false)
        {
            $tamanho = strlen($texto);
            if ($tamanho <= $limite) { //Verifica se o tamanho do texto é menor ou igual ao limite
                $novo_texto = $texto;
            } else { // Se o tamanho do texto for maior que o limite
                if ($quebra == true) { // Verifica a opção de quebrar o texto
                    $novo_texto = trim(substr($texto, 0, $limite)) . "...";
                } else { // Se não, corta $texto na última palavra antes do limite
                    $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
                    $novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . "..."; // Corta o $texto até a posição localizada
                }
            }
            return $novo_texto; // Retorna o valor formatado
        }
        ?>

        <script>
        $('.selectpicker').select2();
        </script>