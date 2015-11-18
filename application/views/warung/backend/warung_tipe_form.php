<div class="container">

        <h2 style="margin-top:0px"><?php echo $button ?> Tipe Warung </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">deskripsi <?php echo form_error('deskripsi') ?></label>
                <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi" value="<?php echo $deskripsi; ?>" />
            </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('warung_tipe') ?>" class="btn btn-default">Cancel</a>

    </div>
