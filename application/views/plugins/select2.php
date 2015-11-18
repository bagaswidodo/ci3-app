<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
AJax Request
<hr />
<select class="form-control" name="id_tipe" id="id_tipe" style="width:80%"></select>
<hr />
User define
<select class="form-control" name="hari" id="hari" >
    <?php
    $hari = array(
    1=>'Senin',
    2=>'Selasa',
    3=>'Rabu',
    4=>'Kamis',
    5=>'Jumat',
    6=>'Sabtu');
    foreach($hari as $k => $v)
    {
      echo '<option value='.$k.'>'.$v .'</option>';
    }
    ?>
</select>
<script>
  //load data via ajax
  $( "#id_tipe" ).select2({
    ajax: {
      url: "<?php echo base_url(); ?>plugins/select2_data",
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


  $('#hari').select2({
    placeholder: "Pilih Hari Buka",
  //  allowClear: true
  });
</script>
