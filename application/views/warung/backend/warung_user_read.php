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
        <h2 style="margin-top:0px">Warung_user Read</h2>
        <table class="table">
	    <tr><td>nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>level</td><td><?php echo $level; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('warung_user') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>