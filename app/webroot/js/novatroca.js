$(document).ready(function() {

    var $formCupom = $('li.cupom').clone().end();//o form nao preenchido

    var i = 0;

    sincronizaSelectLoja(i);//adiciona o listener no primeiro
        
    $('#acrescentar-cupom').click(function(){
        i++;
        var proximoCupom = $formCupom.html().replace(/CupomFiscal0/g,'CupomFiscal'+i);
        proximoCupom = proximoCupom.replace(/CupomFiscal\]\[0/g,'CupomFiscal]['+i);

        $('ul#cupons').append("<li class=cupom>"+proximoCupom+"</li>");

        sincronizaSelectLoja(i);//adiciona o listener no novo cupom

    })

    /**
     * listener para sincronizar valor de nome fantasia e razao social
     * ficou muito complexo usar o live para criar uma funcao q fizesse isso para novos elementos
     */
    function sincronizaSelectLoja(i){

        $('#CupomFiscal'+i+'LojaId').bind('change', {indice: i}, function(event){
            var valor = $(this).val();
            $('#CupomFiscal'+event.data.indice+'LojaRazaoSocial').val(valor)
        })

        $('#CupomFiscal'+i+'LojaRazaoSocial').bind('change', {indice: i}, function(event){
            var valor = $(this).val();
            $('#CupomFiscal'+event.data.indice+'LojaId').val(valor)
        })
    }

    /**
     * calcula o total de pontos somando os valores de acordo com as regras
     */
    $('#calcular-pontos').click(function(){
        var pontos = new Number(0);
        var count_CF = 0;
        $("li.cupom").each(function(){
            count_CF++;
            valor = ($(this).find("input[name*=valor]").val())
            if( isNaN( parseFloat(valor) ) ){
                valor = 0
            }
            forma_de_pagamento = ($(this).find("[name*=forma_de_pagamento]").val())
            bandeira = ($(this).find("[name*=bandeira]").val())

            if(forma_de_pagamento=="Credito" && bandeira=="VISA"){
                pontos += parseFloat(valor)*2
            }else{
                pontos += parseFloat(valor)*1
            }

        })

        regra = "\n\n\
                    Regra:\n\n\
                    A cada R$1,00:\n\n\
                    Crédito VISA = 2 pontos\n\
                    Outras formas de pagamento = 1 ponto\n\
                    \n\
                    Cada 100 pontos = 1 Cupom Promocional\n\n";

        totalCP = Math.floor(pontos/100);

        alert("\n Total de cupons fiscais= "+ count_CF +"\n Pontos = " + Math.floor(pontos) + "\n Total de cupons promocionais= "+ totalCP + regra)
    })

    /**
     * Adiciona consumidor por ajax sem sair da pagina
     */ /*
    $('#ConsumidorAddAjaxForm').submit(function(event){
        event.preventDefault();

        var dataString = $('#ConsumidorAddAjaxForm').serialize();
        alert(dataString);

        $.ajax({
            type: "POST",
            url: "consumidores/addAjax",
            data: dataString,
            success: function(xhr) {
                //display message back to user here
                alert("foi?")
                return false;
            },
            error: function(){
                alert("foi erro?")
                return false;
            }
        });
        return false;
    })
    */

})