<style>
	/* IMPORTANT - must give map div height */
	#map-canvas {
		height:400px;
	}
	/* IMPORTANT - fixes webkit infoWindow rendering */
	#map-canvas img {
		max-width: none;
	}
</style>

<div class="row">
	<div class="span12">
		<h1>{{pageTitle}}</h1>
	</div>
</div>

<div class="row">

	<div class="span6">
		<div id="map-canvas"></div>
		<br>
		<p>
			<a href="/data/places" target="_blank">View Places JSON</a>
		</p>

	</div>

	<!-- right column -->
	<div class="span6">

		<form class="form-horizontal">
			<fieldset>

			<!-- Form Name -->
			<legend>Add Your Place</legend>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label">Your name</label>
			  <div class="controls">
			    <input id="place_name" name="name" type="text" placeholder="" class="input-xlarge" required="">

			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label">Location</label>
			  <div class="controls">
			    <input id="location" name="location" type="text" placeholder="Enter a city, state or zipcode" class="input-xlarge" required="">
			    <p class="help-block">This field will be geocoded with Google Maps API</p>
			  </div>
			</div>

			<!-- Button -->
			<div class="control-group">
			  <label class="control-label"></label>
			  <div class="controls">
			    <input type="submit" id="locationBtn" name="locationBtn" class="btn btn-primary" value="Add Location">
			  </div>
			</div>

			</fieldset>
		</form>


	</div>

</div>

<div class="row">
	<div class="offset1 span10">

		<hr>

		<h2>Here's the source...</h2>
		<!-- display code sample Github Gist -->
		<script src="https://gist.github.com/johnschimmel/5319511.js"></script>
	</div>
</div>

<!-- START OF THE GOOD STUFF -->

<!-- Load the Google Maps JS API. Your Google maps key will be rendered. -->
<script type="text/javascript"
  src="//maps.googleapis.com/maps/api/js?sensor=false&key={{google_maps_key}}">
</script>
<script type="text/javascript">
  var geocoder;
  var map;
  var places;
  var markers = [];
  function initialize() {
  	// create the geocoder
  	geocoder = new google.maps.Geocoder();

    // set some default map details, initial center point, zoom and style
    var mapOptions = {
      center: new google.maps.LatLng(40.74649,-74.0094),
      zoom: 7,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    // create the map and reference the div#map-canvas container
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    // fetch the existing places (ajax)
    // and put them on the map
    fetchPlaces();
  }
  // when page is ready, initialize the map!
  google.maps.event.addDomListener(window, 'load', initialize);
  // add location button event
  jQuery("form").submit(function(e){
  	// the name form field value
  	var name = jQuery("#place_name").val();

  	// get the location text field value
  	var loc = jQuery("#location").val();
  	console.log("user entered location = " + loc);
  	geocoder.geocode( { 'address': loc }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      	// log out results from geocoding
      	console.log("geocoding results");
        console.log(results);

        // reposition map to the first returned location
        map.setCenter(results[0].geometry.location);

        // put marker on map
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
        bindInfoWindow(marker, map, infowindow, places[p].name + "<br>" + places[p].geo_name);
		// not currently used but good to keep track of markers
		markers.push(marker);

        // preparing data for form posting
        var lat = results[0].geometry.location.lat();
        var lng = results[0].geometry.location.lng();
        var loc_name = results[0].formatted_address;
        // send first location from results to server as new location
        jQuery.ajax({
        	url : '/add_place',
        	dataType : 'json',
        	type : 'POST',
        	data : {
        		name : name,
        		latlng : lat + "," + lng,
        		geo_name : loc_name
        	},
        	success : function(response){
        		// success - for now just log it
        		console.log(response);
        	},
        	error : function(err){
        		// do error checking
        		alert("something went wrong");
        		console.error(err);
        	}
        });
      } else {
        alert("Try again. Geocode was not successful for the following reason: " + status);
      }
  	});

    e.preventDefault();
    return false;
  });
	// fetch Places JSON from /data/places
	// loop through and populate the map with markers
	var fetchPlaces = function() {
		var infowindow =  new google.maps.InfoWindow({
		    content: ''
		});
		jQuery.ajax({
			url : '/data/places',
			dataType : 'json',
			success : function(response) {

				if (response.status == 'OK') {
					places = response.places;
					// loop through places and add markers
					for (p in places) {
						//create gmap latlng obj
						tmpLatLng = new google.maps.LatLng( places[p].geo[0], places[p].geo[1]);
						// make and place map maker.
						var marker = new google.maps.Marker({
						    map: map,
						    position: tmpLatLng,
						    title : places[p].name + "<br>" + places[p].geo_name
						});
						bindInfoWindow(marker, map, infowindow, '<b>'+places[p].name + "</b><br>" + places[p].geo_name);
						// not currently used but good to keep track of markers
						markers.push(marker);
					}
				}
			}
		})
	};
	// binds a map marker and infoWindow together on click
	var bindInfoWindow = function(marker, map, infowindow, html) {
	    google.maps.event.addListener(marker, 'click', function() {
	        infowindow.setContent(html);
	        infowindow.open(map, marker);
	    });
	}

</script>
<!-- demo at http://dwd-nodejs-remoteapis.herokuapp.com/ -->
