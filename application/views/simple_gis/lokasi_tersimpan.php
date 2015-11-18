<script type="text/javascript">
	$(document).ready(function() {
		$(".delbutton").click(function(){
		 var element = $(this);
		 var del_id = element.attr("id");
		 var info = 'nomor=' + del_id;
		 if(confirm("Anda yakin akan menghapus?"))
		 {
			 $.ajax({
			 type: "POST",
			 url : "<?php echo base_url(); ?>simple_gis/hapus_lokasi",
			 data: info,
			 success: function(){
			 }
			 });
		 $(this).parents(".content").animate({ opacity: "hide" }, "slow");
 			}
		 return false;
		 });
	})
	</script>
  lokasi tersimpan
<?php
foreach($locations as $l){
	?>

	<ul>

    <li class="content">
      <a href="javascript:carikordinat(new google.maps.LatLng(<?php echo $l->x; ?>,<?php echo $l->y; ?>))">
        <?php echo $l->nama_tempat; ?></a> -
        <a href="#" class="delbutton" id="<?php echo $l->nomor; ?>">(Hapus)</a></li>
	</ul>
	<?php
}
?>
