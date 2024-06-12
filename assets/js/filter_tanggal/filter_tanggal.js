$(document).ready(function () {

    var startDateTextBox = $('#date-picker1');
    var endDateTextBox = $('#date-picker2');

    startDateTextBox.datetimepicker({
        format: 'd/m/Y',
        timepicker: false,

    });

    endDateTextBox.datetimepicker({
        format: 'd/m/Y',
        timepicker: false,

    });

    $("#form-filter").submit(function (event) {

        var startDate = startDateTextBox.val();
        var endDate = endDateTextBox.val();

        if (startDate && endDate) {
            // Convert dates from d/m/Y to Y-m-d
            var startDateParts = startDate.split('/');
            var endDateParts = endDate.split('/');

            var startDateFormatted = new Date(startDateParts[2], startDateParts[1] - 1, startDateParts[0]);
            var endDateFormatted = new Date(endDateParts[2], endDateParts[1] - 1, endDateParts[0]);

            if (startDateFormatted > endDateFormatted) {
                alert('Tanggal Awal harus lebih kecil dari Tanggal Akhir');
                event.preventDefault();
            }
        }
    });
});