<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php 

include "./data/banco.php";
$idempresa = $_SESSION['iduser'];

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numid = explode('id=', $URL_ATUAL, 2);
$id = $numid[1];
    
$sql  = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where id_cadastroempresa = '$idempresa' ";

$sql1  = "SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga = '$id' ";

$exec = $pdo->query($sql);
$exec1 = $pdo->query($sql1);

while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {  
	$nome_empresa = $row_transacoes['nome_fantasia'];
}
while ($row_transacoes1 = $exec1->fetch(PDO::FETCH_ASSOC)) {  
	$vaga_exclusiva_pcd = $row_transacoes1['vaga_exclusiva_pcd'];
}  
    
?>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Reservar Sala De Entrevista do PAT / Arujá Emprega </a>
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

                        <form class="vagas" name="cadastrarvagas" action="./data/insert/solicitacao_sala.php"
                            method="POST">
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Solicitação de Reserva</h3>

                                            </div> <br>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3">

                                                        <div class="form-group" id="exp">
                                                            <label class="control-label">Responsável</label>
                                                            <input name="responsavel" maxlength="200" type="text"
                                                                class="form-control"
                                                                placeholder="Digite o Nome do Responsável da Entrevista"
                                                                required />
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Sala</label><br>

                                                            <input type="radio" name="sala" required
                                                                onClick="salaCheck()" id="sala_um" value="1" />

                                                            <label class="control-label">Sala 1 &nbsp;&nbsp;&nbsp;(Caso
                                                                a vaga exija acessibilidade para PCD)</label>

                                                            <input type="radio" name="sala" required
                                                                onClick="salaCheck()" id="sala_dois" value="2" />

                                                            <label class="control-label">Sala 2 </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Data</label><br>

                                                            <input type="date" class="form-control" name="data"
                                                                id="optexperiencia" style="width: 100%" required />

                                                        </div>

                                                        <div id="salaum_pcd_div" style="display: none">
                                                            <div class="form-group" id="exp">
                                                                <label class="control-label">Horário de Início</label>
                                                                <input type="time" class="form-control"
                                                                    name="hora_inicio" id="inicio_pcd_aces"
                                                                    style="width: 100%" min="16:00" max="20:00" required
                                                                    disabled />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Horário do Fim</label>
                                                                <input type="time" class="form-control" name="hora_fim"
                                                                    id="fim_pcd_aces" style="width: 100%" min="16:00"
                                                                    max="20:00" required disabled />
                                                            </div>
                                                        </div>

                                                        <div id="saladois_pcd_div" style="display: none">
                                                            <div class="form-group">
                                                                <label class="control-label">Horário de Início</label>
                                                                <input type="time" class="form-control"
                                                                    name="hora_inicio" id="inicio_aces"
                                                                    style="width: 100%" min="08:00" max="20:00" required
                                                                    disabled />
                                                            </div>

                                                            <div class="form-group" id="exp">
                                                                <label class="control-label">Horário do Fim</label>
                                                                <input type="time" class="form-control" name="hora_fim"
                                                                    id="fim_aces" style="width: 100%" min="08:00"
                                                                    max="20:00" required disabled />
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <input type="hidden" name="idvaga" value="<?=$id;?>">
                                                <input type="hidden" name="idempresa" value="<?=$idempresa;?>">
                                                <input type="hidden" name="nome_empresa" value="<?=$nome_empresa;?>">

                                                <button type="submit" name="cadastrar"
                                                    class="btn btn-primary nextBtn pull-right"
                                                    type="button">Solicitar</button>
                                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include "./includes/condicao_soli_sala.php" ?>


        <?php /*}else{
                               <!-- 
                                <script>
                                    alert('Acesso não autorizado');
                                    window.location.href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=listarvagas";


                                </script>
-->
                            // } */?>

    </div>
</div>
</div>
</div>
</div>

<?php include "./controll/mensagens/mensagens.php" ?>