/**
 * listener para sincronizar valor de nome fantasia e razao social
 * ficou muito complexo usar o live para criar uma funcao q fizesse isso para novos elementos
 */
function sincronizaSelectLoja(i){

    $('#CupomFiscal'+i+'LojaId').bind('change', {
        indice: i
    }, function(event){
        var valor = $(this).val();
        $('#CupomFiscal'+event.data.indice+'LojaRazaoSocial').val(valor)
    })

    $('#CupomFiscal'+i+'LojaRazaoSocial').bind('change', {
        indice: i
    }, function(event){
        var valor = $(this).val();
        $('#CupomFiscal'+event.data.indice+'LojaId').val(valor)
    })
}

function sincronizaSelectBandeira(i){
    //alert($('#CupomFiscal'+i+'FormaDePagamento').val()!='Dinheiro');
    if($('#CupomFiscal'+i+'FormaDePagamento').val()=='Dinheiro'){
        $('#CupomFiscal'+i+'Bandeira').attr('disabled', 'disabled');
    }

    $('#CupomFiscal'+i+'FormaDePagamento').bind('change', {
        indice: i
    }, function(event){
        if( $(this).val() != "Dinheiro" ){
            $('#CupomFiscal'+event.data.indice+'Bandeira').removeAttr('disabled')
            .val('VISA');//ajudazinha (preenchimento automatico)
        }else{
            $('#CupomFiscal'+event.data.indice+'Bandeira').val('').attr('disabled', 'disabled');
        }
    })
}

$(document).ready(function() {

    //adiciona os listeners no primeiro form
    sincronizaSelectLoja(0);
    sincronizaSelectBandeira(0);


    ////////////////
    //Acrescentar novo cupom
    ////////////////

    /**
     * clone do primeiro form da pagina
     * BUG: se o primeiro for um form enviado anteriormente formCupom ira clona-lo e nao sera vazio
     */
    var formCupom = $("li.cupom").clone().end();
    /**
     * numero total de formularios de cupons na pagina
     */
    var i = $("li.cupom").size();

    $("#acrescentar-cupom").click(function(){
        /**
         * formulario de cupom que sera inserido
         */
        var proximoCupom = formCupom.html();

        //troca os indices dos elementos do formulario
        proximoCupom = proximoCupom.replace(/Cupom\sFiscal\s1/g,"Cupom Fiscal "+(i+1)); //troca legend
        proximoCupom = proximoCupom.replace(/CupomFiscal0/g,"CupomFiscal"+i);           //troca id, label
        proximoCupom = proximoCupom.replace(/CupomFiscal\]\[0/g,"CupomFiscal]["+i);     //troca name

        $("ul#cupons").append("<li class=cupom>"+proximoCupom+"</li>");

        //adiciona os listeners no novo form
        sincronizaSelectLoja(i);
        sincronizaSelectBandeira(i);

        i++;//mantem i com a quantidade correta

    })

    /**
     * calcula o total de pontos somando os valores de acordo com as regras
     */
    $('#calcular-troca').click(function(){
        var valorOutros = new Number(0);
        var valorBandeira = new Number(0);
        var count_CF = 0;
        var regrasValor = 100;
        var regrasBandeiraValor = 2;
        var c = 0;
        var restoOutros = 0;
        var restoBandeira = 0;

        $("li.cupom").each(function(){
            count_CF++;
            valor = ($(this).find("input[name*=valor]").val())
            if( isNaN( parseFloat(valor) ) ){
                valor = 0
            }
            bandeira = ($(this).find("[name*=bandeira]").val())

            if(bandeira.toUpperCase()=="VISA"){
                valorBandeira += parseFloat(valor)
            }else{
                valorOutros += parseFloat(valor)
            }
        })

        restoBandeira += valorBandeira;
        if (valorBandeira >= regrasValor) {
            c += ( Math.floor(valorBandeira/regrasValor) )*regrasBandeiraValor ;
            restoBandeira = valorBandeira%regrasValor
        }
        //alert('restoBandeira = '+restoBandeira + " c = " + c )
        restoOutros += valorOutros ;
        if (valorOutros >= regrasValor) {
            c += ( Math.floor(valorOutros/regrasValor) );
            restoOutros = valorOutros%regrasValor
        }
        //alert('restoOutros = '+restoOutros + " c = " + c  )

        if ( (restoOutros+restoBandeira) >= regrasValor) {
            c++
            restoBandeira = restoOutros+restoBandeira - regrasValor
            restoOutros = 0
        }
        //alert('restoOutros = '+restoOutros + 'restoBandeira = '+restoBandeira + " c = " + c  )

        regra = "\n\n Regra:\n\
                    A cada R$100,00 em cupons fiscais:\n\n\
                    Com a bandeira da promoção = 2 cupons\n\
                    Outras formas de pagamento = 1 cupom\n\n";

        alert("\n Total de cupons fiscais= "+ count_CF +"\n Total de cupons promocionais = "+ c + regra)
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

    /**
     * calcula o total de pontos somando os valores de acordo com as regras
     * @deprecated  nao eh mais assim que se calcula a troca, talvez no futuro use em programas de fidelidade
     *//*
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
    */

})