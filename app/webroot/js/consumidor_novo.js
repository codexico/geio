//$.noConflict();
jQuery(document).ready(function($) {
    // Code that uses jQuery's $ can follow here.
    $('#ConsumidorEstado').change(function(){
        if($(this).val()!=''){
            $('#ConsumidorPais').val('Brasil')
        }else{
            $('#ConsumidorPais').val('')
        }
    })


   $("#ConsumidorCel").live('focus', function(){
       $(this).mask("(99) 9999-9999");
   })
   $("#ConsumidorTel").live('focus', function(){
       $(this).mask("(99) 9999-9999");
   })

});
