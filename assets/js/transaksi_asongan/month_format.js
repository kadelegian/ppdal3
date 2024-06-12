$(document).ready(function () {
    var minimal = $('#min-month').val();
    var periodePickers = $('input.periode-picker');

    $('#periode_akhir').MonthPicker({
        Button: false,
        MonthFormat: 'M, yy',
        MinMonth: minimal + 'm',
        AltField: '#sampai_dengan',
        AltFormat: 'yy-mm-dd',
    }).on('change', function () {
        get_kalkulasi();
    });
    $('#id_penjamin').on('change', function () {
        get_kalkulasi();
    });
    function getBaseUrl() {
        return window.location.protocol + "//" + window.location.host + "/";
    }

    function get_kalkulasi() {
        var startDateVal = $("#awal_periode").val();
        var endDateVal = $("#sampai_dengan").val();
        var selectValue = $("#id_penjamin").val();
        var idJenisDagangan = $('#id_jenis_dagangan').val();
        $.ajax({
            url: getBaseUrl() + "transaksi_iuran_pedagang/kalkulasi_update", // Use the dynamic base URL function
            method: "POST",
            data: {
                startDate: startDateVal,
                endDate: endDateVal,
                idPenjamin: selectValue,
                idJenis: idJenisDagangan
            },
            success: function (response) {
                $("#result").html(response);
            },
            error: function () {
                $("#result").html("An error occurred");
            }
        });
    }

});