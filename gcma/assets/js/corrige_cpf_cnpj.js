// Testando a validação usando jQuery
$(function() {

    // ## EXEMPLO 3
    // Aciona a validação e formatação ao sair do input
    $('#cpf').blur(function() {

        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();

        // Testa a validação e formata se estiver OK
        if (formata_cpf_cnpj(cpf_cnpj)) {
            $(this).val(formata_cpf_cnpj(cpf_cnpj));
        } else {
            swal.fire({
                title: 'CPF Inválido',
                icon: "error",
                showConfirmButton: true,
                allowOutsideClick: true
            });
            document.getElementById('cpf').value = ("");

        }

    });

    $('#cpf2').blur(function() {

        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();

        // Testa a validação e formata se estiver OK
        if (formata_cpf_cnpj(cpf_cnpj)) {
            $(this).val(formata_cpf_cnpj(cpf_cnpj));
        } else {
            swal.fire({
                title: 'CPF Inválido',
                icon: "error",
                showConfirmButton: true,
                allowOutsideClick: true
            });
            document.getElementById('cpf2').value = ("");

        }

    });

    $('#cpf3').blur(function() {

        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();

        // Testa a validação e formata se estiver OK
        if (formata_cpf_cnpj(cpf_cnpj)) {
            $(this).val(formata_cpf_cnpj(cpf_cnpj));
        } else {
            swal.fire({
                title: 'CPF Inválido',
                icon: "error",
                showConfirmButton: true,
                allowOutsideClick: true
            });
            document.getElementById('cpf3').value = ("");

        }

    });

});