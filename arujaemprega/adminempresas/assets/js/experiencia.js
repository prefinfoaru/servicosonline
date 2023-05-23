function validaTempo(valor) {
    console.log(valor.value);
    let tempo=valor.value;
    if(tempo >6){
        console.log('teste');
        Swal.fire({
            icon: 'error',
            title: 'Tempo de Experiência Inválido',
            text: 'O tempo de experiência não pode ser superior que 6 meses.',
          });
         valor.value="";
    }
}
