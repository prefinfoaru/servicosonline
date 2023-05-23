<?php

                     $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                     $res = explode('res=', $URL_ATUAL, 2);
                     $aprova = explode('aprova=', $URL_ATUAL, 2);
                     $reprova = explode('reprova=', $URL_ATUAL, 2);
                     $exclui = explode('exclui=', $URL_ATUAL, 2);
                     $id =   explode('id=', $URL_ATUAL, 2);
                     $liberado =   explode('liberado=', $URL_ATUAL, 2);
                    
                     if(isset($res[1]))
                     {
                        if ($res[1]  == 1 ){?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Reserva para Vaga feita com Sucesso</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=listavagareserva&id=<?=$id[1];?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                        }
                        else if($res[1] == 0){?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao Reservar.</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=listavagareserva&id=<?=$id[1];?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                        }
                    }
                    
                    if(isset($liberado[1]))
                    {
                       if ($liberado[1]  == 1 ){?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga Liberada Com Sucesso</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=listarvagas">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                       }
                       else if($liberado[1] == 0){?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Não Foi Possível Liberar Esta Vaga.</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=listarvagas">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                       }
                   }

                    if(isset($aprova[1]))
                    {
                       if ($aprova[1]  == 1 ){?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Sala Reservada com sucesso!</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=solicitacaosalaentre">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                       }
                       else if($aprova[1] == 0){?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao Reservar a sala.</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=solicitacaosalaentre">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                       }
                   }
                   if(isset($reprova[1]))
                   {
                      if ($reprova[1]  == 1 ){?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Reprova feita com sucesso!</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=solicitacaosalaentre">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                      }
                      else if($reprova[1] == 0){?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao Reprovar.</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=solicitacaosalaentre">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                      }
                  }
                  if(isset($exclui[1]))
                  {
                     if ($exclui[1]  == 1 ){?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Exclusão feita com sucesso!</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=listarvagas">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                     }
                     else if($eclui[1] == 0){?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao excluir.</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=listarvagas">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
                     }
                 }
                
                     
 ?>