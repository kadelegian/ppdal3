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
        <h2 style="margin-top:0px">T_wilayah Read</h2>
        <table class="table">
	    <tr><td>Wilayah</td><td><?php echo $wilayah; ?></td></tr>
	    <tr><td>Prefix Wilayah</td><td><?php echo $prefix_wilayah; ?></td></tr>
	    <tr><td>Nomor Wilayah</td><td><?php echo $nomor_wilayah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wilayah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>