$.noConflict();
jQuery(document).ready(function($) {

    $('.enviar_qtd_brindes').click(function(){
        var total = new Number(0);

        $("input.qtd_brinde").each(function(){
            qtd = parseInt($(this).val());
            if (isNaN(qtd)) qtd = 0;

            total += qtd;
        })//alert(total)

        TrocaQtdBrindes = parseInt($('#TrocaQtdBrindes').val());
        if(total > TrocaQtdBrindes){
            alert('Total de brindes deve ser menor ou igual a '+ TrocaQtdBrindes);
            return false;
        }else{//alert('ok')
            return true;
        }
        return false;
    })
});
