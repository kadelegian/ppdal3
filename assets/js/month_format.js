$(document).ready(function(){
    var minimal= $('#min-month').val();
    $('#periode_akhir').MonthPicker({
        Button:false,        
        MonthFormat:'M, yy',
MinMonth:minimal+'m',
AltField:'#sampai_dengan',
AltFormat:'yy-mm-dd',
    });
});