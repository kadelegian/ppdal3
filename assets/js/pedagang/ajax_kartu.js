$(document).ready(function(){
    $("#btncarikartu").click(function(){
        let nomor_kartu = document.getElementById("nomorKartu").value;
        let id = document.getElementById("id_pedagang").value;
        var base_url= document.getElementById("base_url").value;
        if(!isNumeric(nomor_kartu))       {
            alert('Input hanya numerik kartu');
            return;
        }
        request_ajax(nomor_kartu,id,base_url);
    });
});
    function cari_kartu() {
        let nomor_kartu = document.getElementById("nomorKartu").value;
        let id = document.getElementById("id_pedagang").value;
        var base_url= document.getElementById("base_url").value;
        if(!isNumeric(nomor_kartu))       {
            alert('Input hanya numerik kartu');
            return;
        }
        request_ajax(nomor_kartu,id,base_url);
                 
       
    }
    function isNumeric(value){
        return !isNaN(parseFloat(value)) && isFinite(value);
    }

    function request_ajax(nomor_kartu,id,base_url){
        $.ajax({
        url: base_url +'/kartu/ajax_get/',
        method: 'GET',
        data: {nomor: nomor_kartu, id_pedagang: id},
        timeout:3000,
        dataType: 'html',
        success: function(response) {
            // Handle the response from the PHP backend
            //$('#form_kartu').html(response);
            var home_url =base_url+'pedagang/update/'+id;
            location.href=home_url;
           
        },
        error: function(xhr, status, error) {
            // Check for the specific HTTP status code indicating an error
            if (xhr.status === 500) {
                var url_pedagang=base_url+'pedagang/update/'+xhr.responseText;
                if(confirm('Kartu ini  sudah ter-link dengan id pedagang lain, apakah anda ingin melihat data tersebut? '+ url_pedagang)){
                    location.href=url_pedagang;
                }
            } else {
                alert('Unexpected error: URL=' + xhr.responseText);
            }
        }
        });   
    }
