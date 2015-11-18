<title>Auto Refresh Dropdown</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>

<style>
	body{
	font-family:Tahoma;
	font-size:12px;
	}
	select{
	padding:5px;
	border:1px solid #666666;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	z-index: 9999 ;
	}
</style>

<div id="kelas">
Pilih Kelas :
<select name="id_kelas" id="id_kelas">
<?php
	echo "<option>- Pilih Nama Kelas -</option>";
	foreach($kelas->result_array() as $k)
	{
		echo "<option value='".$k['id_kelas']."'>Kelas ".$k['nama_kelas']."</option>";
	}
?>
</select>
</div>

    <div id="siswa">

    </div>

<script type="text/javascript">
	  	$("#id_kelas").change(function(){
	    		var id_kelas = {id_kelas:$("#id_kelas").val()};
	    		$.ajax({
						type: "POST",
						url : "<?php echo base_url(); ?>index.php/sinkron/siswa",
						data: id_kelas,
						success: function(msg){
							$('#siswa').html(msg);
						}
				  	});
	    });
	   </script>
