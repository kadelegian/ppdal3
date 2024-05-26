<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T_extra_charge Read</h2>
        <table class="table">
	    <tr><td>Keterangan Charge</td><td><?php echo $keterangan_charge; ?></td></tr>
	    <tr><td>Extra Charge</td><td><?php echo $extra_charge; ?></td></tr>
	    <tr><td>Persentase Charge</td><td><?php echo $persentase_charge; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('extra_charge') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>