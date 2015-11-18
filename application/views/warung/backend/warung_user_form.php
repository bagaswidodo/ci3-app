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
        <h2 style="margin-top:0px">Warung_user <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">nama <?php echo form_error('nama') ?></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?php echo $nama; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">email <?php echo form_error('email') ?></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $email; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">username <?php echo form_error('username') ?></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="username" value="<?php echo $username; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">password <?php echo form_error('password') ?></label>
                <input type="text" class="form-control" name="password" id="password" placeholder="password" value="<?php echo $password; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">level <?php echo form_error('level') ?></label>
                <input type="text" class="form-control" name="level" id="level" placeholder="level" value="<?php echo $level; ?>" />
            </div>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('warung_user') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>