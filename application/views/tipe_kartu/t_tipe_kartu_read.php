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
        <h2 style="margin-top:0px">T_tipe_kartu Read</h2>
        <table class="table">
	    <tr><td>Tipe Kartu</td><td><?php echo $tipe_kartu; ?></td></tr>
	    <tr><td>Id Extra Charge</td><td><?php echo $id_extra_charge; ?></td></tr>
	    <tr><td>Id Diskon</td><td><?php echo $id_diskon; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tipe_kartu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>