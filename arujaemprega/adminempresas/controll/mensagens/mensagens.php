<?php

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$deln = explode('del=', $URL_ATUAL, 2);
$baixado = explode('baixado=', $URL_ATUAL, 2);
$liberado = explode('liberado=', $URL_ATUAL, 2);
$prorrogado = explode('prorrogado=', $URL_ATUAL, 2);
$atu = explode('edit=', $URL_ATUAL, 2);
$cad =   explode('cad=', $URL_ATUAL, 2);
$cadinforconcluida =   explode('cadinforconcluida=', $URL_ATUAL, 2);
$edtadicionais =   explode('edtadicionais=', $URL_ATUAL, 2);
$edtbeneficios =   explode('edtbeneficios=', $URL_ATUAL, 2);
$cadidiomas =   explode('cadidiomas=', $URL_ATUAL, 2);
$delidiomas =   explode('delidiomas=', $URL_ATUAL, 2);
$cadinformatica =   explode('cadinformatica=', $URL_ATUAL, 2);
$delinformatica =   explode('delinformatica=', $URL_ATUAL, 2);
$idvaga =   explode('id=', $URL_ATUAL, 2);
$pausado =   explode('pausado=', $URL_ATUAL, 2);
$despausado =   explode('despausado=', $URL_ATUAL, 2);

if (isset($pausado[1])) {

    if ($pausado[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga suspensa.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($pausado[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao suspender a vaga.</strong>',

    html: '<hr>',
    showCancelButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
}

if (isset($despausado[1])) {

    if ($despausado[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga reativada.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($despausado[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao reativar a vaga.</strong>',

    html: '<hr>',
    showCancelButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
}

if (isset($deln[1])) {

    if ($deln[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Cadastro da vaga apagado.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($deln[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao Deletar a vaga.</strong>',

    html: '<hr>',
    showCancelButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
}

if (isset($baixado[1])) {

    if ($baixado[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga Baixada Com Sucesso.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($baixado[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao Baixar a vaga.</strong>',

    html: '<hr>',
    showCancelButton: false,
    allowOutsideClick: true
});
</script>
<?php
    }
}
if (isset($liberado[1])) {

    if ($liberado[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga Liberada para Candidatos.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($liberado[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao Liberar a vaga.</strong>',

    html: '<hr>',
    showCancelButton: false,
    allowOutsideClick: true
});
</script>
<?php
    }
}
if (isset($prorrogado[1])) {
    if ($prorrogado[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga Prorrogada por mais 15 dias.</strong>',
    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($prorrogado[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao Prorrogar a vaga.</strong>',

    html: '<hr>',
    showCancelButton: false,
    allowOutsideClick: true
});
</script>
<?php
    }
}

if (isset($cadinforconcluida[1])) {
    if ($cadinforconcluida[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Cadastro Concluído.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
}

if (isset($atu[1])) {

    if ($atu[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga Atualizada.</strong>',

    html: '<hr><hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadosEditarVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
    } else if ($atu[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Ocorreu um erro ao atualizar a vaga.</strong>',

    html: '<hr><hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadosEditarVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showCancelButton: false,
    allowOutsideClick: false
});
</script>
<?php
    }
}
if (isset($cad[1])) {

    if ($cad[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga Cadastrada com Sucesso.</strong>',

    html: '<p>Você será redirecionado para informar se a vaga possui algum adicional. Para liberação da vaga é preciso preencher esses dados.</p><hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($cad[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Ocorreu um erro ao cadastrar a vaga.</strong>',

    html: '<hr>',
    showCancelButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
}
if (isset($_SESSION['msgadc'])) {
    if ($_SESSION['msgadc'] == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Adicionais da Vaga Atualizados.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($_SESSION['msgadc'] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Ocorreu um erro ao atualizar adicionais da vaga.</strong>',

    html: '<hr>',
    showCancelButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
    unset($_SESSION['msgadc']);
}
if (isset($_SESSION['msgbene'])) {
    if ($_SESSION['msgbene'] == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Benefícios da Vaga Atualizados.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($_SESSION['msgbene'] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Ocorreu um erro ao atualizar os benefícios da vaga.</strong>',

    html: '<hr>',
    showCancelButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
    unset($_SESSION['msgbene']);
}
if (isset($_SESSION['msgidio'])) {
    if ($_SESSION['msgidio'] == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Idiomas da Vaga Atualizados.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($_SESSION['msgidio'] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Ocorreu um erro ao atualizar idiomas da vaga.</strong>',

    html: '<hr>',
    showCancelButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
    unset($_SESSION['msgidio']);
}
if (isset($_SESSION['msginfo'])) {
    if ($_SESSION['msginfo'] == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Informações de Informática da Vaga Atualizadas.</strong>',

    html: '<hr>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php
    } else if ($_SESSION['msginfo'] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Ocorreu um erro ao atualizar informações de informática da vaga.</strong>',

    html: '<hr>',
    showCancelButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
    unset($_SESSION['msginfo']);
}
if (isset($_SESSION['msgcad'])) {
    if ($_SESSION['msgcad'] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Ocorreu um erro ao cadastrar a vaga, verifique todos so campos.</strong>',

    html: '<hr>',
    showCancelButton: true,
    allowOutsideClick: true
});
</script>
<?php
    }
    unset($_SESSION['msgcad']);
}

if (isset($_SESSION['errocadinfor'])) {
    if ($_SESSION['errocadinfor'] == 2) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Ocorreu um erro.</strong>',

    html: '<p>Ao cadastrar as informações, verifique todos os campos e tente novamente.</p><hr>',
    allowOutsideClick: true,
});
</script>
<?php
    }
    unset($_SESSION['errocadinfor']);
}




if (isset($edtadicionais[1])) {

    if ($edtadicionais[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Adicionais da Vaga Atualizados com Sucesso.</strong>',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=menu_editarvagas&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
    } else if ($edtadicionais[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao atualizar Adicionais da vaga.</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=menu_editarvagas&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
    }
}
if (isset($edtbeneficios[1])) {

    if ($edtbeneficios[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Benefícios da Vaga Atualizados com Sucesso.</strong>',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=menu_editarvagas&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
    } else if ($edtbeneficios[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Erro ao atualizar Benefícios da vaga.</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=menu_editarvagas&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showCancelButton: false,
    allowOutsideClick: false
});
</script>
<?php
    }
}
if (isset($cadidiomas[1])) {

    if ($cadidiomas[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Idioma Cadastrado com Sucesso.</strong>',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=editarIdiomasVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
    } else if ($cadidiomas[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Não foi possível cadastrar o idioma</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=editarIdiomasVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showCancelButton: false,
    allowOutsideClick: false
});
</script>
<?php
    }
}

if (isset($delidiomas[1])) {

    if ($delidiomas[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Idioma Deletado com Sucesso.</strong>',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=editarIdiomasVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
    } else if ($delidiomas[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Não foi possível deletar o idioma</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=editarIdiomasVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showCancelButton: false,
    allowOutsideClick: false
});
</script>
<?php
    }
}
if (isset($cadinformatica[1])) {

    if ($cadinformatica[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Dado de Informática Cadastrado com Sucesso.</strong>',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=editarInformaticaVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
    } else if ($cadinformatica[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Não foi possível cadastrar o dado de informática</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=editarInformaticaVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showCancelButton: false,
    allowOutsideClick: false
});
</script>
<?php
    }
}

if (isset($delinformatica[1])) {

    if ($delinformatica[1]  == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Dado de Informática Deletado com Sucesso.</strong>',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=editarInformaticaVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>
<?php
    } else if ($delinformatica[1] == 0) { ?>
<script>
swal.fire({
    icon: 'error',
    title: '<strong>Não foi possível deletar o dado de Informática</strong>',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=editarInformaticaVaga&id=<?= $idvaga[1]; ?>">OK</button></a>',
    showCancelButton: false,
    allowOutsideClick: false
});
</script>
<?php
    }
}
?>