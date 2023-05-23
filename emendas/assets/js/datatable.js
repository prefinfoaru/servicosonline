

$(document).ready(function() {
 
    $('#listaEmendas').DataTable({
        dom: 'Bfrtip',
        columnDefs: [
            {
                targets: 1,
                className: 'noVis'
            }
        ],
        buttons: [
            {
                extend: 'colvis',
                text:"Ocultar Colunas",
                columns: ':not(.noVis)',
            },
            {
                extend: 'copy',
                text:"Copiar",
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
               }
            },
            {
                extend: 'excel',
                text:"Excel",
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
               }
            },
            {
                extend: 'pdf',
                text:"PDF",
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
               },
               orientation:'landscape',
               customize: function (doc) {
                doc.content[1].table.widths = 
                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');
              }
            },
        ],
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'ajax': {
           'url':'./includes/listarMatriculados.php?cod='+cod
       },
       'columns': [
        { data: 'id_cadastro' },
        { data: 'nome' },
        { data: 'cpf' },
        { data: 'data_nascimento' },
        { data: 'curso' },
        { data: 'informacoes' },
        { data: 'acoes' },
       ]
   });
});

