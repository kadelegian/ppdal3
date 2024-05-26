$(document).ready(function(){
    var minimal= $('#min-month').val();
     var periodePickers = $('input.periode-picker');
    
    $('#periode_akhir').MonthPicker({
        Button:false,        
        MonthFormat:'M, yy',
MinMonth:minimal+'m',
AltField:'#sampai_dengan',
AltFormat:'yy-mm-dd',
    });
periodePickers.each(function() {
                $(this).MonthPicker({
        Button:false,        
        MonthFormat:'M, yy',

    });
            });


});