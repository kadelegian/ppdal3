$(document).ready(function () {
	
	var startDateTextBox = $('#date-picker1');
        var endDateTextBox = $('#date-picker2');

        startDateTextBox.datepicker({
            dateFormat: 'dd/mm/yy',
            altField: '#date-picker1-alt',
            altFormat: 'yy-mm-dd',
            onClose: function(selectedDate) {
                // Set the minDate of the end date picker to the selected start date
                endDateTextBox.datepicker('option', 'minDate', selectedDate);
            }
        });

        endDateTextBox.datepicker({
            dateFormat: 'dd/mm/yy',
            altField: '#date-picker2-alt',
            altFormat: 'yy-mm-dd',
            onClose: function(selectedDate) {
                // Set the maxDate of the start date picker to the selected end date
                startDateTextBox.datepicker('option', 'maxDate', selectedDate);
            }
        });
});
