jQuery(document).ready(function($) {

$("#procurar").hide();
    $("#mostraProcurar").click(function(){
        $("#procurar").toggle();
    })

    //persquisar consumidor por cpf
    $('#pesquisarcpf').click(function(){
        var cpf = $.trim($('#cpf').val());

        $.ajax({
            type: "POST",
            url: "consumidores/consumidorCpfAjax",
            data: "data[cpf]="+cpf,
            success: function(xhr) {
                if(xhr != "nao encontrou"){
                    //mostrarConsumidor(xhr);
                    window.location = "consumidores/view/"+xhr;
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
        var rg = $.trim($('#rg').val());

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
        $('#consumidorencontrado').html('<div class="message">Consumidor Não Encontrado</div>');
    }

    $('#ConsumidorEstado').live('change', function() {
        if($(this).val()!=''){
            $('#ConsumidorPais').val('Brasil')
        }else{
            $('#ConsumidorPais').val('')
        }
    });


})