var myVar;

var img = document.querySelector('img');
var a = document.querySelector('a');
var ti = document.querySelector('#titulo');
function myFunction() {
  myVar = setTimeout(load, 2000);
}



function load(){
    img.classList.remove('bigEntrance');
    img.classList.add('tossing');

    a.classList.remove('bigEntrance');

    ti.classList.remove('pullUp');
    ti.classList.add('floating');
}

