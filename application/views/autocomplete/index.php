<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>zunaidhi.com</title>
    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href='<?php echo base_url();?>assets/css/jquery.autocomplete.css' rel='stylesheet' />
    <script type='text/javascript' src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
	<script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script>
	    
    <script type='text/javascript'>
		var site = "<?php echo site_url();?>";
		$(function(){
			$('.autocomplete').autocomplete({
				serviceUrl: site+'/welcome/search',
				onSelect: function (suggestion) {
					document.form1.kodebarang.value = suggestion.data;
				}
			});	
		});
	
</script>
</head>
<body>


	

        <div class="well">
        	 <form name="form1" id="form1" method="post" action="#" >
		        <table width="40%" align="center">
                <h1 align="center">Autocomplete text dengan code igniter 2.2.0 dan Bootstrap 3 - zunaidhi.com</h1>
		          <tr>
		            <td><label>Nama Barang :</label></td>
		            <td><div class="form-group">
		              <input type='text' id='autocomplete1' class="autocomplete" placeholder="Input Nama Barang" required/>
		              </div></td>
		            </tr>
                    <tr>
		            <td><label>Kode Barang :</label></td>
		            <td>
		              <div class="form-group">
		                <input id="kodebarang" name="kodebarang" class="form-control" placeholder="Kode Barang" type="text" disabled />
	                  </div>
		              </td>
	              </tr>
		          
	            </table>
		      </form>
   

	<p class="footer" align="center">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
</body>
</html>