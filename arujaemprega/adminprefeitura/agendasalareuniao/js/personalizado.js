document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid'],
        // defaultDate: '2019-04-12',
        editable: true,
        eventLimit: true,
        events: './agendasalareuniao/list_eventos.php',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function (info) {
         
           


            info.jsEvent.preventDefault(); // don't let the browser navigate
            // console.log(info.event.extendedProps.data);
            $('#visualizar #id').text(info.event.id);
            $('#visualizar #id').val(info.event.id);
            $('#visualizar #title').text(info.event.title);
            $('#visualizar #title').val(info.event.title);
            $('#visualizar #responsavel').text(info.event.extendedProps.responsavel);
            $('#visualizar #responsavel').val(info.event.extendedProps.responsavel);
            $('#visualizar #start').text(info.event.start.toLocaleString());
            $('#visualizar #start').val(info.event.start.toLocaleString());
            $('#visualizar #end').text(info.event.end.toLocaleString());
            $('#visualizar #end').val(info.event.end.toLocaleString());
            $('#visualizar #sala').text(info.event.extendedProps.sala);
            $('#visualizar #sala').val(info.event.extendedProps.sala);
            $('#visualizar #color').val(info.event.backgroundColor);
            $('#visualizar').modal('show');
    
            var data_1 = info.event.extendedProps.data;
       
           //calculando diferença entre dias
           hoje = new Date();
           dia = hoje.getDate();
           mesatu = hoje.getMonth();
           ano = hoje.getFullYear();
           //pegando o ano informado pelo usuário
           anodig = data_1.substr(0, 4);
           //pegando o mes informado pelo usuário
           mesdig = data_1.substr(5,2);
           //pegando o ano informado pelo usuário
           diadig = data_1.substr(8,2);
           //convertrando a a data informada para o tipo Date  
           var z = new Date(Date.parse(anodig + "," + mesdig + "/" + diadig));
           //convertendo a data atual para o tipo Date
           var x = new Date(Date.parse(hoje.getFullYear() + "," + (hoje.getMonth() + 1) + "/" + hoje.getDate()));
           //declarando uma variável com o valor de 1 dia
           var umdia = 1000 * 60 * 60 * 24;
           //declarando uma variávell com a diferença entre as datas
           var c = parseInt(z.getTime() - x.getTime());
           //declarando uma variável com os dias dessa diferença 
           var d = (c / umdia);

           if (d >= 0) {

            $('#visualizar #cancela').css('display', 'block');
               
            } else{

                $('#visualizar #cancela').css('display', 'none');
                

            }



        },
        selectable: true,
        select: function (info) {
            console.log(info);
            //alert('Início do evento: ' + info.start.toLocaleString());
            $('#cadastrar #start').val(info.start.toLocaleDateString());
        
            $('#cadastrar').modal('show');
        }
    });
   
    calendar.render();
});



function exclui(valor){

    

    var v = document.getElementById('div_esconde');
    
    if(v.style.display == 'none'){

        v.style.display = 'block';
        $("#apagar_evento").attr("action", "./agendasalareuniao/proc_apagar_evento.php?id=" + valor);
        
    }else{
        v.style.display = 'none';

    }
    
    


}