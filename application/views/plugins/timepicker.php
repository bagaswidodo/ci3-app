<!-- timepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/css/bootstrap-datepicker.css" />

          <label for="time">jam_buka </label>
          <input type="text"  name="jam_buka" id="jam_buka" placeholder="jam_buka"
           />


          <label for="time">jam_tutup </label>
          <input type="text"  name="jam_tutup" id="jam_tutup" placeholder="jam_tutup"
          value="" />



      <script>
      //jam buka faskes
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
        //	$('#buka').html($('#durationExample').val());
         });
         </script>
