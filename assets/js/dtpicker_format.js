$(document).ready(function () {

    var startDateTextBox = $('#date-picker1');
    var endDateTextBox = $('#date-picker2');
    var joinDate = $('#join_date');
    joinDate.datetimepicker({
        format: 'd/m/Y',
        timepicker: false
    });
    startDateTextBox.datetimepicker({
        dateFormat: 'dd/mm/yy',
        altField: '#date-picker1-alt',
        altFormat: 'yy-mm-dd',
        onClose: function (selectedDate) {
            // Set the minDate of the end date picker to the selected start date
            endDateTextBox.datepicker('option', 'minDate', selectedDate);
        }
    });

    endDateTextBox.datetimepicker({
        dateFormat: 'dd/mm/yy',
        altField: '#date-picker2-alt',
        altFormat: 'yy-mm-dd',
        onClose: function (selectedDate) {
            // Set the maxDate of the start date picker to the selected end date
            startDateTextBox.datepicker('option', 'maxDate', selectedDate);
        }
    });
});
