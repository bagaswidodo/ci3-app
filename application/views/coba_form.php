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
        <h2 style="margin-top:0px">Coba <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">Nama_Barang <?php echo form_error('Nama_Barang') ?></label>
                <input type="text" class="form-control" name="Nama_Barang" id="Nama_Barang" placeholder="Nama_Barang" value="<?php echo $Nama_Barang; ?>" />
            </div>
	    <input type="hidden" name="Kode_Barang" value="<?php echo $Kode_Barang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('coba') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>