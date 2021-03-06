<style type="text/css">
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    #map_canvas {
      height: 100%;
    }
</style>
<!-- Input field for new markers -->
<!-- <input id="newMarker" type="text" /> <input onclick="newMarker();" type="button" value="add city" /> <br class="clear" /> -->
<!-- Map Placeholder -->
<div id="map_canvas"></div>
<!-- - See more at: http://blog.sofasurfer.org/2011/06/27/dynamic-google-map-markers-via-simple-json-file/#sthash.4kIvLCR5.dpuf -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
 // data file with markers (could also be a PHP file for dynamic markers)
 var newDate = new Date;
 var map;
 // set default map properties
 function init(){
   var defaultLatlng = new google.maps.LatLng(49.00,10.00);
   // zoom level of the map
   var defaultZoom = 2;

   map = new google.maps.Map(document.getElementById('map_canvas'), {
 		zoom: defaultZoom,
 		center: defaultLatlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
 	});

  var tanda = new google.maps.Marker({
                    position: new google.maps.LatLng(49.00,10.00),
                    map: map,
                    //icon: gambar_tanda,
                    clickable: true
          });


          ambilMarker();
 }

 function ambilMarker()
 {
   $(function(){
       $.ajax({
           type : 'GET',
           url : '<?php echo base_url('gmap_marker/marker_json'); ?>',
           success: function(locations)
           {
             var obj =  JSON.parse(locations);
             totalLocations = obj.length;
             for (var i = 0; i < totalLocations; i++) {
               console.log(obj[i].latitude,obj[i].longitude);
                               var marker = new google.maps.Marker({
                                   position: new google.maps.LatLng(parseFloat(obj[i].latitude),parseFloat(obj[i].longitude)),
                                   map: map,
                                   title: obj[i].zip
                               });
             }
           },
           error : function()
           {
             alert('whoops');
           }
       })
   });
 }
 // end init

 google.maps.event.addDomListener(window, 'load', init);
</script>
