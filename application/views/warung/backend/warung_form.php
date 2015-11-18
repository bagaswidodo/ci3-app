<div class="container">


        <h2 style="margin-top:0px">Warung <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">Nama Lokasi <?php echo form_error('nama_lokasi') ?></label>
                <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" placeholder="nama_lokasi" value="<?php echo $nama_lokasi; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">Tipe <?php echo form_error('id_tipe') ?></label>
                <select class="form-control" name="id_tipe" id="id_tipe"></select>
            </div>
	    <div class="form-group">
                <label for="time">Jam Buka <?php echo form_error('jam_buka') ?></label>
                <input type="text" class="form-control" name="jam_buka" id="jam_buka" placeholder="jam_buka" value="<?php echo $jam_buka; ?>" />
            </div>
	    <div class="form-group">
                <label for="time">Jam Tutup <?php echo form_error('jam_tutup') ?></label>
                <input type="text" class="form-control" name="jam_tutup" id="jam_tutup" placeholder="jam_tutup" value="<?php echo $jam_tutup; ?>" />
            </div>
	    <div class="form-group">
                <label for="float">latitude <?php echo form_error('latitude') ?></label>
                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="latitude" value="<?php echo $latitude; ?>" />
            </div>
	    <div class="form-group">
                <label for="float">longitude <?php echo form_error('longitude') ?></label>
                <input type="text" class="form-control" name="longitude" id="longitude" placeholder="longitude" value="<?php echo $longitude; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">id_user <?php echo form_error('id_user') ?></label>
                <input type="text" class="form-control" name="id_user" id="id_user" placeholder="id_user" value="<?php echo $id_user; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">rate <?php echo form_error('rate') ?></label>
                <input type="text" class="form-control" name="rate" id="rate" placeholder="rate" value="<?php echo $rate; ?>" />
            </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('warung') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
<link href="<?php echo base_url('assets/select2/'); ?>/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url('assets/select2/'); ?>/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/timepicker/'); ?>/jquery.timepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/timepicker/'); ?>/jquery.timepicker.css" />

<script>
  //load data via ajax
  $( "#id_tipe" ).select2({
    ajax: {
      url: "<?php echo base_url(); ?>warung/tipe/json",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          q: params.term
        };
      },
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    },
    minimumInputLength: 2,
  });



    $('#jam_buka').timepicker({
        'minTime': '5:00am',
        'maxTime': '11:30pm',
      'timeFormat': 'H:i',
        'showDuration': true
    }).on('selectTime', function(){
        $('#jam_tutup').timepicker({
          'minTime': $('#jam_buka').val(),
          'maxTime': '11:30pm',
          'timeFormat': 'H:i',
          'showDuration': true
        }).on('selectTime', function(){
          //	$('#tutup').html($('#durationExample2').val());
        });

     });


</script>
