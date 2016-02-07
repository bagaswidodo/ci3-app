<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

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

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	#wrapper {
		margin-right: auto;
		margin-left: auto;
		background: #EEEEEE;
		padding: 20px;
		border: 1px solid #E6E6E6;
	}

	</style>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.9.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.form.js'); ?>"></script>
	<script type="text/javascript"> 
        jQuery(document).ready(function() { 
			jQuery('#form-upload').on('submit', function(e) {
				e.preventDefault();
				jQuery('#submit-button').attr('disabled', ''); 
				jQuery("#output").html('<div style="padding:10px"><img src="<?php echo base_url('assets/images/loading.gif'); ?>" alt="Please Wait"/> <span>Mengunggah...</span></div>');
				jQuery(this).ajaxSubmit({
					target: '#output',
					success:  sukses 
				});
			});
        }); 

		function sukses()  { 
			jQuery('#form-upload').resetForm();
			jQuery('#submit-button').removeAttr('disabled');

		} 
    </script> 
</head>
<body>

<div id="container">
	<h1>CodeIgniter Ajax Upload <span style="float:right">Dida Nurwanda</span></h1>

	<div id="body">
		<div align="center" id="wrapper">
			<form action="<?php echo site_url('didanurwanda/ajax_upload/upload'); ?>" method="post" enctype="multipart/form-data" id="form-upload">
				<input name="image" type="file" />
				<input type="submit" id="submit-button" value="Upload" />
			</form>
			<div id="output"></div>
		</div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>