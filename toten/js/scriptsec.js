//mostra as secretarias/departamento disponiveis
var urlencoded = new URLSearchParams();
var ul = document.querySelector('ul');

var requestOptions = {
    method: 'GET',
    redirect: 'follow'
  };

  fetch("https://60195fddfa0b1f0017acd024.mockapi.io/toten", requestOptions)
  .then(function(response) {
    if (!response.ok) {
        throw new Error("HTTP error, status = " + response.status);
        }
        return response.json();
    })

    .then(function(response) {

    for(var i = 0; i < response.length; i++) {
    var listaSec = document.createElement('button');
    listaSec.classList.add('pullUp', 'btnsec');
    listaSec.type = ("button");
    listaSec.innerHTML +=  response[i].Sec;
    listaSec.id = response[i].idsec;
    ul.appendChild(listaSec);
    }

})

.catch(error => console.log('error', error))



// Adiciona evento ao clicar no botao da secretaria
var globalidsec;

var el = document.getElementById('menu');
el.addEventListener('click', function(e) {
    var idsec = e.target.id;
    
    globalidsec = idsec;
    
    
    teste(idsec);

});






// pega o valor do botão e some com as secretarias  e aparece os processos

function teste(valor){
    
    var li = document.getElementsByTagName('button');
    for(var i = 0; i < li.length; i++) {

        li[i].style.cssText += 'display:none';

    }

    document.getElementById("titulo").innerHTML = "Escolha o processo que você deseja abrir";
    
    document.getElementById("voltar").href="sec.html"; 
    document.getElementById("voltar").innerHTML="VOLTAR";
    



    var url = "https://60195fddfa0b1f0017acd024.mockapi.io/toten?idsec=" + valor;
   
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    
    fetch(url, requestOptions)
    .then(function(response) {
        if (!response.ok) {
            throw new Error("HTTP error, status = " + response.status);
            }
            return response.json();
        })
        .then(function(response) {

         var ul = document.getElementById('menu1');

        for(var i = 0; i < response.length; i++) {

            for(var j=0; j < response[i].processo.length; j++){

               
                var list = document.createElement('button');
               
                list.classList.add('slideExpandUp', 'btnproc');
                list.type = ("button");
                list.id = [j];
                // list.id = response[i].processo[j].nome;
                list.innerHTML +=  response[i].processo[j].nome;
                ul.appendChild(list);

                

            }
        

        }

    
    })

    .catch(error => console.log('error', error))

 
    


}


  // Adiciona evento ao clicar no botao do processo
var  globalnomeproc;

  var el = document.getElementById('menu1');
  el.addEventListener('click', function(e) {
   
    var nomeproc = e.target.id;

    globalnomeproc = nomeproc;

    form(nomeproc);
   


  });

 
    // Adiciona a div do form do processo

    function form(nomeprocesso){

        
        var div = document.getElementById('cont1');
        div.style.cssText += 'display:none';



        var div = document.getElementById('cont2');
        div.style.cssText += 'display:flex';
       
        

        var url = "https://60195fddfa0b1f0017acd024.mockapi.io/toten?idsec=" + globalidsec;
   
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        
        fetch(url, requestOptions)
        .then(function(response) {
            if (!response.ok) {
                throw new Error("HTTP error, status = " + response.status);
                }
                return response.json();
            })
            .then(function(response) {
    
              var form = document.querySelector('#form');
              var proc = document.getElementById('proc');
             for(var i = 0; i < response.length; i++) {

                

                for(var j=0; j < response[i].processo[nomeprocesso].campos.length; j++){
                         var type = response[i].processo[nomeprocesso].campos[j].tipo;
                        var classe = 'default';
                        form.innerHTML +=  '<label  class="palavra">' + response[i].processo[nomeprocesso].campos[j].label+'</label>';

                         if(type == "data"){
                           

                            type = 'text';
                            classe = 'telephone';
                            


                         }else{

                            type = type;
                            classe = classe;
                            
                         }
                        
                         $('#form').append($('<input>').attr('type', type) .attr('name', response[i].processo[nomeprocesso].campos[j].label).addClass('form-control').addClass('keyboard').addClass(classe));
                 
                }
                
                $('.telephone').keyboard();
                $('.default').keyboard();
                $('.telephone').focus(function(event) {telefone();event.preventDefault();})
                $('.default').focus(function(event) {defaulti();event.preventDefault();})
                

              


                var titulo = document.createElement('h4');
                titulo.innerHTML +=   'Abertura do processo: ' + response[i].processo[nomeprocesso].nome;
                titulo.classList.add('fadeIn', 'proc');
                proc.appendChild(titulo);
            }
           
          
        })
    
        .catch(error => console.log('error', error))
  

        

    }
    
    function pegar(){

        var div = document.getElementById('cont2');
        div.style.cssText += 'display:none';


    
      
        var telacar = document.getElementById('telacarregamento');
        telacar.style.cssText += 'display:block';

        
        telacar.innerHTML += "<h1 class='centro palavra2' id='tela'>Aguarde, Processando as Informações!</h1><br><br>";
        telacar.innerHTML += "<center id='conteudo'><div class='c-loader '></div></center>";




        
        console.log(globalidsec);
        console.log(globalnomeproc);

             
        var input = document.getElementsByClassName('keyboard');
       
        for(i=0;i<input.length;i++){
            var e = input[i];
            console.log(e.value);
            console.log(e.name);


        }

// se der certo cria o protocolo

        
        var com = document.getElementById('comprovante');
        com.innerHTML += "<img src='img/logo1.png' style='width: 20%;'>Prefeitura Municipal de Arujá<br>";
        com.innerHTML += "----------------------------------------------------------------";
        com.innerHTML += "<h5>Requerente: </h5>";
        com.innerHTML += "<h5>Abertura do processo: "+ globalnomeproc + "</h5>";
        com.innerHTML += "<center>17/11/2015 - 11:57:52</center>";
        com.innerHTML += "----------------------------------------------------------------";
        com.innerHTML += "<h5>Protocolo:</h5>";
        com.innerHTML += "----------------------------------------------------------------";
        com.innerHTML += "<h5>Para acompanhar seu processo leia o QR Code abaixo:</h5>";
        com.innerHTML += "<center><img src='img/qrcode.png' style='width: 50%;'></center>";
        com.innerHTML += "<br>";
        com.innerHTML += "----------------------------------------------------------------";
       
        
       
       

        
         setTimeout(imprimir, 10000);

            
    }

 
    function imprimir() {

        document.getElementById('tela').innerHTML="O número do seu protocolo é: " ;

        document.getElementById('conteudo').remove();

        document.getElementById('telacarregamento').innerHTML += "<h1 class='centro palavra2'>Aguarde a impressão do seu comprovante!</h1><br><br>";

        document.getElementById('telacarregamento').innerHTML += "<h1 class='centro palavra2'>Obrigado por usar o Toten!</h1><br><br><br>";

        document.getElementById('telacarregamento').innerHTML += "<div id='nav'><ul ><button class='pullUp btnsec' onclick='window.print()' type='button'>Imprimir Novamente</button><button class='pullUp btnsec' onclick='paginaini()' type='button'>Finalizar</button></ul></div>";


        window.print();


       

    }

   function paginaini(){

    window.location.href = 'http://www.prefeituradearuja.sp.gov.br/toten/index.html';
   }
   //caso de errado, mostra mensagem de erro e voltar para pagina inicial
 
    
  