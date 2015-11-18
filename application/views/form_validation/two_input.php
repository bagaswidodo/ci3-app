<html>
<head>
<title>My Form</title>
</head>
<body>

<?php
//global error
 //echo validation_errors();
 ?>

<?php echo form_open('welcome/validas_form_dua_input'); ?>
<h5>Angka 1</h5>
<?php
// each error
echo form_error('angka1');
?>
<input type="text" name="angka1" value="<?php echo set_value('angka1'); ?>" size="50" />
<h5>Angka 2</h5>
<?php
// each error
echo form_error('angka2');
?>
<input type="text" name="angka2" value="<?php echo set_value('angka2'); ?>" size="50" />
<div><input type="submit" value="Submit" /></div>
<?php echo form_close(); ?>
</body>
</html>
