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
        <h2 style="margin-top:0px">Tb_faskes <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">nama_faskes <?php echo form_error('nama_faskes') ?></label>
                <input type="text" class="form-control" name="nama_faskes" id="nama_faskes" placeholder="nama_faskes" value="<?php echo $nama_faskes; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">id_tipe <?php echo form_error('id_tipe') ?></label>
                <input type="text" class="form-control" name="id_tipe" id="id_tipe" placeholder="id_tipe" value="<?php echo $id_tipe; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">alamat <?php echo form_error('alamat') ?></label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="<?php echo $alamat; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">no_telpon <?php echo form_error('no_telpon') ?></label>
                <input type="text" class="form-control" name="no_telpon" id="no_telpon" placeholder="no_telpon" value="<?php echo $no_telpon; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">foto <?php echo form_error('foto') ?></label>
                <input type="text" class="form-control" name="foto" id="foto" placeholder="foto" value="<?php echo $foto; ?>" />
            </div>
	    <div class="form-group">
                <label for="point">location <?php echo form_error('location') ?></label>
                <input type="text" class="form-control" name="location" id="location" placeholder="location" value="<?php echo $location; ?>" />
            </div>
	    <input type="hidden" name="id_faskes" value="<?php echo $id_faskes; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('faskes') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>