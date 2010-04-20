
jQuery(document).ready(function($) {

    //persquisar consumidor por cpf
    $('#pesquisarcpf').click(function(){
        var cpf = $('#cpf').val();

        $.ajax({
            type: "POST",
            url: "pesquisarCpfAjax",
            data: "data[cpf]="+cpf,
            success: function(xhr) {
                if(xhr != "nao encontrou"){
                    mostrarConsumidor(xhr);
                }else{
                    consumidorNaoEncontrado();
                }
                return false;
            },
            error: function(){
                alert("Ocorreu algum erro de comunicação, tente novamente.\n\n Se o erro persistir chame o administrador.")
                return false;
            }
        });
    });

    //persquisar consumidor por rg
    $('#pesquisarrg').click(function(){
        var rg = $('#rg').val();;

        $.ajax({
            type: "POST",
            url: "pesquisarRgAjax",
            data: "data[rg]="+rg,
            success: function(xhr) {
                if(xhr != "nao encontrou"){
                    mostrarConsumidor(xhr);
                }else{
                    consumidorNaoEncontrado();
                }
                return false;
            },
            error: function(){
                alert("Ocorreu algum erro de comunicação, tente novamente.\n\n Se o erro persistir chame o administrador.")
                return false;
            }
        });
    });

    function mostrarConsumidor(consumidor){
        $('#consumidorencontrado').html(consumidor);
    }

    function consumidorNaoEncontrado(){
        $('#consumidorencontrado').html("<h2>Consumidor Não Encontrado</h2>");
    }

    $('#ConsumidorEstado').live('change', function() {
        if($(this).val()!=''){
            $('#ConsumidorPais').val('Brasil')
        }else{
            $('#ConsumidorPais').val('')
        }
    });


})