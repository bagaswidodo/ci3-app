<html>
<head>
<title>My Form</title>
</head>
<body>

<?php
//global error
 //echo validation_errors();
 ?>

<?php echo form_open('welcome/validasi_form_default'); ?>

<h5>Username</h5>

<!-- untuk populting form
 value="<?php echo set_value('username'); ?>" -->
<?php
// each error
echo form_error('username');
?>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<h5>Password</h5>
<?php
// each error
echo form_error('password');
?>
<input type="text" name="password" value="" size="50" />

<h5>Password Confirm</h5>
<?php
// each error
echo form_error('passconf');
?>
<input type="text" name="passconf" value="" size="50" />

<?php
// each error
echo form_error('email');
?>
<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>
