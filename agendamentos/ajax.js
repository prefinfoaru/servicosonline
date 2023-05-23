$('#form_agendamento').submit(function () {
  var form7 = $(this).serialize();
  $.ajax({
    url: 'processa.php',
    method: 'POST',
    type: 'POST',
    data: form7,
    success: function (return_agendame) {
      $('#resp_agenda').html(return_agendame);
      $('#form_agendamento')[0].reset();
      setTimeout(function () {
        $(location).attr('href', 'index.php');
      }, 100);
    },
    error: function () {
      alert('Erro ao achar caminho do arquivo');
    },
  });
  return false;
});

$('#form_valida').submit(function () {
  var form8 = $(this).serialize();
  $.ajax({
    url: 'valida_consulta.php',
    method: 'POST',
    type: 'POST',
    data: form8,
    success: function (return_consulta) {
      $('#resp_valida').html(return_consulta);
    },
    error: function () {
      alert('Erro ao achar caminho do arquivo');
    },
  });
  return false;
});
