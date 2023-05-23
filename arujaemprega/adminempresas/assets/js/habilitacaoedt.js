function optionHab() {
  if (document.getElementById('habilitacao').checked == true) {
    document.getElementById('tipo_hab').style.display = 'block';
  } else {
    document.getElementById('tipo_hab').style.display = 'none';
  }
}


function optionIda() {
  if (document.getElementById('optidade').checked == true) {
    document.getElementById('ida').style.display = 'block';
  } else {
    document.getElementById('ida').style.display = 'none';
  }
}

function optionBene() {
  if (document.getElementById('beneficios').checked == true) {
    document.getElementById('escolhas').style.display = 'block';
  } else {
    document.getElementById('escolhas').style.display = 'none';
  }
}

function optionIdio() {
  if (document.getElementById('optidioma').checked == true) {
    document.querySelector('.conte').style.display = 'flex';
    document.querySelector('#idioma').required = true;
    document.querySelector('#nivel').required = true;
    document.querySelector('#obrigatorio').required = true;
  } else {
    document.querySelector('.conte').style.display = 'none';
    document.querySelector('#idioma').required = false;
    document.querySelector('#nivel').required = false;
    document.querySelector('#obrigatorio').required = false;
  }
}
