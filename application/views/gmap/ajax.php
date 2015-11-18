<script type="text/javascript" src="http://localhost/cdn/jquery.js"></script>
<script type="text/javascript">
  $(function(){
      $.ajax({
          type : 'GET',
          url : '<?php echo base_url('gmap_marker/marker_json'); ?>',
          success: function(locations)
          {
            //alert(JSON.parse(locations)[0].latitude);
            var obj =  JSON.parse(locations);
            totalLocations = obj.length;
            for (var i = 0; i < totalLocations; i++) {
              console.log(obj[i].latitude,obj[i].longitude);
         //
         //                     // Init markers
         //                     var marker = new google.maps.Marker({
         //                         position: new google.maps.LatLng(obj[i].latitude + ',' + obj[i].longitude),
         //                         map: map,
         //                         title: 'Click Me ' + i
         //                     });
            }
            //  $.each(locations,function(i, locations){
            //      console.log(location.latitude + "," + location)
            //   });
          },
          error : function()
          {
            alert('whoops');
          }
      })
  });
</script>
