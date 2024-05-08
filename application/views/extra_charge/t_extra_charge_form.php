<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Extra Charge</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="keterangan_charge">Keterangan Charge <?php echo form_error('keterangan_charge') ?></label>
                    <input type="text" class="form-control" name="keterangan_charge" id="keterangan_charge" placeholder="Keterangan Charge" value="<?php echo $keterangan_charge; ?>" />
                </div>
                <div class="form-group">
                    <label for="extra_charge">Extra Charge <?php echo form_error('extra_charge') ?></label>
                    <input type="text" class="form-control" name="extra_charge" id="extra_charge" placeholder="Extra Charge" value="<?php echo number_format($extra_charge, 0, ',', '.'); ?>" />
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('extra_charge') ?>" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    // Function to format a number with commas
    function formatNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Function to handle input change event
    function handleInputChange(event) {
        const input = event.target;
        let value = input.value.replace(/[^\d-]/g, ''); // Remove non-numeric characters except '-'

        // Count the occurrence of '-' in the value
        const minusCount = (value.match(/-/g) || []).length;

        // Remove all '-' if there is more than one
        if (minusCount > 1) {
            value = value.replace(/-/g, '');
        }

        // If it's negative and starts with '-', do nothing
        if (value.startsWith('-')) {
            if (minusCount > 1) {
                value = '-' + value;
            }
        }

        // Parse the number
        let number = parseInt(value, 10);

        // If it's a valid number, format it
        if (!isNaN(number)) {
            // Format the number
            value = formatNumber(number);
        }

        // Update the input value
        input.value = value;
    }

    // Add event listener to the input field
    document.getElementById('extra_charge').addEventListener('input', handleInputChange);
</script>