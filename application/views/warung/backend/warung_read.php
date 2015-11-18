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
        <h2 style="margin-top:0px">Warung Read</h2>
        <table class="table">
	    <tr><td>nama_lokasi</td><td><?php echo $nama_lokasi; ?></td></tr>
	    <tr><td>id_tipe</td><td><?php echo $id_tipe; ?></td></tr>
	    <tr><td>jam_buka</td><td><?php echo $jam_buka; ?></td></tr>
	    <tr><td>jam_tutup</td><td><?php echo $jam_tutup; ?></td></tr>
	    <tr><td>latitude</td><td><?php echo $latitude; ?></td></tr>
	    <tr><td>longitude</td><td><?php echo $longitude; ?></td></tr>
	    <tr><td>id_user</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>rate</td><td><?php echo $rate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('warung') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>