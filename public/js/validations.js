$(document).ready(function(){
    $('#phone').inputmask('(99)99999-9999');
    $("#carBoard").inputmask({mask: ['AAA-9999','AAA9A99']});
    $("#motorBoard").inputmask({mask: ['AAA-9999','AAA9A99']});

    $('#cpf').inputmask('999.999.999-99');
    $('#rg').inputmask('99.999.999-9');   

});

