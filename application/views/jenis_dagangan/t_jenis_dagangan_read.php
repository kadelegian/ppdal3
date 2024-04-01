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
        <h2 style="margin-top:0px">T_jenis_dagangan Read</h2>
        <table class="table">
	    <tr><td>Nama Dagangan</td><td><?php echo $nama_dagangan; ?></td></tr>
	    <tr><td>Prefix Dagangan</td><td><?php echo $prefix_dagangan; ?></td></tr>
	    <tr><td>Iuran</td><td><?php echo $iuran; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis_dagangan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>