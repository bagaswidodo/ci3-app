<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<!--
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>
-->
		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>

		<h1>Apps</h1>
		<ul>
				<li><?php echo anchor('welcome/autocomplete', 'Autocomplete'); ?></li>
				<li><?php echo anchor('autocomplete_chain', 'Autocomplete Chain'); ?></li>
				<li><?php echo anchor('autocomplete', 'Autocomplete v2'); ?></li>
				<li><a href="<?php echo base_url(); ?>/harviacode">CRUD Generator</a></li>
				<li><?php echo anchor('coba', 'Datatables CRUD Generator (coba)'); ?></a></li>
				<li><?php echo anchor('chart', 'Google Chart'); ?></a></li>
				<li><?php echo anchor('daily', 'Daily Activity With JqGrid'); ?></a></li>
				<li><?php echo anchor('sinkron', 'Auto Refresh drop down combo box'); ?></a></li>
				<li><?php echo anchor('simple_gis', 'Aplikasi GIS Sederhana'); ?></a></li>
				<li><?php echo anchor('plugins/select2', 'Select2'); ?></a></li>
				<li><?php echo anchor('plugins/timepicker', 'Timepicker'); ?></a></li>
				<li>
					<?php echo anchor('welcome/validasi_form_default', 'Form validation 1 input'); ?> |
					<?php echo anchor('welcome/validas_form_dua_input', 'Form validation 2 input'); ?>
				</li>
				<li><?php echo anchor('welcome/upload_file', 'Upload File'); ?></li>
				<li><?php echo anchor('auth', 'Ion Auth User role Administration (Login-logout-register)'); ?></li>
				<li><?php echo anchor('user', 'Simple user registration login logout register'); ?></li>
				<li><?php echo anchor('todo_spa', 'To Do List Single page application'); ?></li>
				<li><?php echo anchor('warung/warung', 'Aplikasi Warung (full feature) v1'); ?></li>
				<li>
					<?php echo anchor('gmap_marker', 'Display Marker by JSON'); ?> |
					<?php echo anchor('gmap_marker/location_lbs', 'Display Marker by JSON and HTML 5 GEO'); ?>
					<?php echo anchor('gmap_marker/direction', 'Google Direction'); ?>
				</li>
				<li>
						<?php echo anchor('api/demo', 'REST powered by  REST library(static)'); ?> |
						<?php echo anchor('api/', 'REST with DB'); ?> |
						<?php echo anchor('api/rest_user/', 'REST user with Form'); ?> 
				</li>
				<li>
					<?php echo anchor('tags/node', 'Ajax App to tag a Node with google map'); ?> 
				</li>


		</ul>

	</div>



	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
