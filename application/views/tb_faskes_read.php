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
        <h2 style="margin-top:0px">Tb_faskes Read</h2>
        <table class="table">
	    <tr><td>nama_faskes</td><td><?php echo $nama_faskes; ?></td></tr>
	    <tr><td>id_tipe</td><td><?php echo $id_tipe; ?></td></tr>
	    <tr><td>alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>no_telpon</td><td><?php echo $no_telpon; ?></td></tr>
	    <tr><td>foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>location</td><td><?php echo $location; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('faskes') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>