<?php



// if ($_SESSION['logado'] == "") {

//     $_SESSION['msg'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Favor efetuar o login. Obrigado!</div>";
//     echo "<script>window.location='login.php'</script>";
//     break;
// }


?>
<!--**
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free, 
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 *-->


<meta charset='utf-8' />
<link href='./agendasalareuniao/css/core/main.min.css' rel='stylesheet' />
<link href='./agendasalareuniao/css/daygrid/main.min.css' rel='stylesheet' />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="./agendasalareuniao/css/personalizado.css">

<script src='./agendasalareuniao/js/core/main.min.js'></script>
<script src='./agendasalareuniao/js/interaction/main.min.js'></script>
<script src='./agendasalareuniao/js/daygrid/main.min.js'></script>
<script src='./agendasalareuniao/js/core/locales/pt-br.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="./agendasalareuniao/js/personalizado.js"></script>
<div class="container">
<?php


if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}



?>
</div>



<div id='calendar'></div>

<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="visevent">
                    <dl class="row">
                        <dt class="col-sm-3">ID do evento:</dt>
                        <dd class="col-sm-9" id="id"></dd>

                        <dt class="col-sm-3">Título do evento:</dt>
                        <dd class="col-sm-9" id="title"></dd>

                        <dt class="col-sm-3">Responsável:</dt>
                        <dd class="col-sm-9" id="responsavel"></dd>

                        <dt class="col-sm-3">Sala:</dt>
                        <dd class="col-sm-9" id="sala"></dd>

                        <dt class="col-sm-3">Início do evento:</dt>
                        <dd class="col-sm-9" id="start"></dd>

                        <dt class="col-sm-3">Fim do evento:</dt>
                        <dd class="col-sm-9" id="end"></dd>
                    </dl>
               
                
                
                    <button onclick="exclui(document.getElementById('id').value)" id="cancela" class="btn btn-warning">Deseja cancelar a reserva?</button>
                    <form action="" method="post" id="apagar_evento">
                    
                    <dl class="row" id="div_esconde" style="display:none">
                    <hr>
                    
                         <dt class="col-sm-4">Motivo:</dt>
                         <dd class="col-sm-12"><input name="motivo" type="text" class="form-control" required></dd>
                      

                        <!-- <a href="" id="apagar_evento" class="btn btn-danger">Cancelar</a> -->

                        <dt class="col-sm-4"> <input type="submit" class="btn btn-danger" value="Cancelar"></dt>

                    </dl>

                   
                    </form>
                    
             </div>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="msg-cad"></span>
                <form  method="POST" action="./agendasalareuniao/cad_event.php" >
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Color</label>
                        <div class="col-sm-10">
                            <select name="color" class="form-control" id="color">
                                <option value="">Selecione</option>
                                <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                
                                <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                <option style="color:#228B22;" value="#228B22">Verde</option>
                                <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">data da reserva</label>
                        <div class="col-sm-10">
                            <input type="text" name="data" class="form-control" id="start" readonly="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Horário de Início</label>
                        <div class="col-sm-4">
                            <input type="time"  name="horarioinicio" class="form-control" required>
                        </div>
                        <label class="col-sm-2 col-form-label">Horário de Final</label>
                        <div class="col-sm-4">
                            <input type="time"  name="horariofim" class="form-control" required>
                        </div>


                    </div>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Responsável</label>
                        <div class="col-sm-10">
                            <input type="text"  name="responsavel" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sala</label>
                        <div class="col-sm-10">
                            <input type="text"  name="sala" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>