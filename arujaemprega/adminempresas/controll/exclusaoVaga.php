<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php 

    $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $numid = explode('id=', $URL_ATUAL, 2);
    if(isset($numid[1])){
        $idvaga=$numid[1];
    }
    

	$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $msgid = explode('cad=', $URL_ATUAL, 2);
    $cad = isset($msgid[1]);

    $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $numvaga= explode('vaga=', $URL_ATUAL, 3);
    if(isset($numvaga[1]))
    {
        $idvaga=$numvaga[1];
    }
	


include('./data/banco.php');
if ($cad == 1 ){?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga Cadastrada com Sucesso.</strong>',
    html: '<p>Você será redirecionado para informar se a vaga possui algum adicional. Para liberação da vaga é preciso preencher esses dados.</p><hr><button  class="btn btn-default"></button>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php } ?>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu Administração -> Excluir Vagas</a>
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
                        <form class="vagas" name="excluirvagas" action="./data/insert/cadastraradicional.php"
                            method="POST">
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form">
                                                <div class="panel-heading"><br>
                                                    <h5 class="panel-title" style="color:#F4A4A6 ">Para exclusão da vaga
                                                        pedimos que responda um pequeno questionameno</h5>
                                                </div>
                                                <hr> <br>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="control-label">ESTÁ CIENTE QUE OS DADOS
                                                                    INCLUIDOS NO CADASTRO DA VAGA NÃO ESTARAM MAIS
                                                                    DISPONIVÉIS PARA CONSULTA TANTO PARA USUÁRIO COMO
                                                                    PARA EMPRESA</label><br>
                                                                <input type="radio" name="optexperiencia" value="Sim"
                                                                    id="optexperiencia" />
                                                                <label class="control-label"> Sim</label>
                                                                <input type="radio" name="optexperiencia" value="Não"
                                                                    id="optexperiencia" />
                                                                <label class="control-label">Não </label>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="sel1">A vaga em questão foi preenchida pelo
                                                                    candidato com perfil cadastrado no ARUJÁ EMPREGA
                                                                    ?</label>
                                                                <select class="form-control" id="sel1" required>
                                                                    <option value="">SELECIONE UMA RESPOSTA</option>
                                                                    <option value="1">SIM</option>
                                                                    <option alue="2">NÃO</option>

                                                                </select>
                                                                <BR>

                                                                <label for="sel1">Caso a vaga tenha sido prrenchida não
                                                                    utilizando o Arujá Emprega, Qual motivo ?</label>
                                                                <select class="form-control" id="sel1"
                                                                    class="form-control input-sm" required>
                                                                    <option value="">SELECIONE UMA RESPOSTA</option>
                                                                    <option value="1">SIM</option>
                                                                    <option alue="2">NÃO</option>
                                                                </select>



                                                            </div>







                                                        </div>

                                                    </div>

                                                    <button type="submit" name="cadastrar"
                                                        class="btn btn-danger  pull-CENTER"
                                                        type="button">EXCLUIR</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/habilitacao.js"></script>
    <?php include "./controll/mensagens/mensagens.php" ?>