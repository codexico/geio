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
        proximoCupom = proximoCupom.replace(/Cupom\sFiscal\s#1/g,"Cupom Fiscal #"+(i+1)); //troca legend
        proximoCupom = proximoCupom.replace(/CupomFiscal0/g,"CupomFiscal"+i);           //troca id, label
        proximoCupom = proximoCupom.replace(/CupomFiscal\]\[0/g,"CupomFiscal]["+i);     //troca name

        $("ul#cupons").append("<li class=cupom>"+proximoCupom+"</li>");

        //adiciona os listeners no novo form
        sincronizaSelectLoja(i);
        sincronizaSelectBandeira(i);

        i++;//mantem i com a quantidade correta

    })

    var valorOutros = new Number(0);
    var valorBandeira = new Number(0);
    var count_CF = 0;
    var regrasValor = 100;
    var regrasBandeiraValor = 2;
    var c = 0;
    var restoOutros =  parseFloat($('#saldo_outros').val());//alert(restoOutros);
    var restoBandeira =  parseFloat($('#saldo_bandeira').val());//alert(restoBandeira);

    function _calculaCupomPromocional(){
    
        valorOutros = new Number(0);
        valorBandeira = new Number(0);
        restoOutros = new Number(0);
        restoBandeira = new Number(0);
        count_CF = 0;
        regrasValor = $('#regras-valor').val();
        regrasBandeiraValor = $('#bandeira-qtd').val();
        c = 0;

        if($('#saldo_outros').val() != undefined){
            restoOutros +=  parseFloat($('#saldo_outros').val());//alert(restoOutros);
            restoBandeira +=  parseFloat($('#saldo_bandeira').val());//alert(restoBandeira);
        }

        $("li.cupom").each(function(){
            count_CF++;
            valor = ($(this).find("input[name*=valor]").val()).replace(/(,)/g,".");
            if( isNaN( parseFloat(valor) ) ){
                valor = 0
            }
            bandeira = ($(this).find("[name*=bandeira]").val())

            if(bandeira.toUpperCase()=="VISA"){
                valorBandeira += parseFloat(valor);//alert(valorBandeira);
            }else{
                valorOutros += parseFloat(valor);
            }
        })

        restoBandeira += parseFloat(valorBandeira);
        if (restoBandeira >= regrasValor) {
            c += ( Math.floor(restoBandeira/regrasValor) )*regrasBandeiraValor ;
            restoBandeira = restoBandeira%regrasValor
        }
        //alert('restoBandeira = '+restoBandeira + " c = " + c )
        restoOutros += valorOutros ;
        if (restoOutros >= regrasValor) {
            c += ( Math.floor(restoOutros/regrasValor) );
            restoOutros = restoOutros%regrasValor
        }

        restoBandeira = restoBandeira.toFixed(2);//transforma em string
        restoOutros = restoOutros.toFixed(2);//alert(restoOutros);;alert(typeof(restoOutros));
    }

    $('form.novatroca').submit(function() {
        _calculaCupomPromocional();

        message = "";
        if ( (parseFloat(restoOutros)+parseFloat(restoBandeira)) >= regrasValor) {
            message += "\n\n\"OK\" para gerar agora "+ (c+1) +" cupom(s)";
            message += "\n\"Cancelar\" para gerar agora  "+ (c) +" cupom(s) e guardar os créditos para uma troca futura";
            juntar = confirm(message);
            if(!juntar){
                $('#juntar_saldos').val('false');//avisar o php para guardar os saldos separados
            }else{
                $('#juntar_saldos').val('true');
            }
        }
        return confirm("Confirma o envio dos dados?");
    });

    /**
     * calcula o total de pontos somando os valores de acordo com as regras
     */
    $('#calcular-troca').click(function(){
        _calculaCupomPromocional();

        linha = "\n=======================================================\n";

        regra = "";
        regra += "\n Regra da campanha:";
        regra += "\n\tA cada R$"+regrasValor+",00 em cupons fiscais:"
        regra += "\n\n\t\tCom a bandeira da promoção = "+regrasBandeiraValor+" cupons"
        regra += "\n\t\tOutras formas de pagamento = 1 cupom";

        resultado = "";
        resultado += "\nTotal de cupons fiscais= "+ count_CF;
        resultado += "\nNúmero de cupons promocionais = "+ c;

        cupomMinimo = regrasValor-restoBandeira;
        cupomMinimo = cupomMinimo.toFixed(2);
        if ( (parseFloat(restoOutros)+parseFloat(restoBandeira)) >= regrasValor) {
            message = "";
            message = "\n\nCréditos:\n";
            message += "\nR$ " + restoBandeira + " em créditos da Bandeira";
            message += "\nR$ " + restoOutros + " em créditos normais";
            message += "\n\nSobraram Créditos suficientes para um cupom extra se juntar os créditos de bandeira e comum.";
            message += "\n\nAtenção: Cadastrar outro cupom de no mínimo R$" + cupomMinimo+" em créditos da Bandeira";
            message += "\npode gerar mais "+ regrasBandeiraValor +" cupom(s)";
            alert(regra+linha+resultado+message);
        }else{
            message = "";
            message = "\n\nSobraram Créditos:\n";
            message += "\n\t R$" + restoBandeira + " em créditos da Bandeira";
            message += "\n\t R$" + restoOutros + " em créditos normais";
            message += "\n\nAtenção: Cadastrar outro cupom de no mínimo R$" + cupomMinimo +" em créditos da Bandeira";
            message += "\npode gerar mais "+ regrasBandeiraValor +" cupom(s)";
            alert(regra+linha+resultado+message);
        }
    })
    

    $('.remover-cupom-fiscal').live('click', function(){
        $(this).closest('li.cupom').remove()
    })


})