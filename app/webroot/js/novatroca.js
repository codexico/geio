$(document).ready(function() {

    var $formCupom = $('li.cupom').clone();//o form nao preenchido

    var i = 0;

    sincronizaSelectLoja();//adiciona o listener no primeiro
        
    $('#acrescentar-cupom').click(function(){
        i++;
        var proximoCupom = $formCupom.html().replace(/CupomFiscal0/g,'CupomFiscal'+i);
        proximoCupom = proximoCupom.replace(/CupomFiscal\]\[0/g,'CupomFiscal]['+i);

        $('li.cupom').append("<li class=cupom>"+proximoCupom+"</li>");

        sincronizaSelectLoja();//adiciona o listener no novo cupom

    })

    /**
     * listener para sincronizar valor de nome fantasia e razao social
     * ficou muito complexo usar o live para criar uma funcao q fizesse isso para novos elementos
     */
    function sincronizaSelectLoja(){
        selectnomefantasia = '#CupomFiscal'+i+'LojaId';
        selectrazaosocial = "#CupomFiscal"+i+"LojaRazaoSocial";

        $(selectnomefantasia).change(function(){
            var valor = $(this).val();
            $(selectrazaosocial).val(valor)
        })
        $(selectrazaosocial).change(function(){
            var valor = $(this).val();
            $(selectnomefantasia).val(valor)
        })
    }

})