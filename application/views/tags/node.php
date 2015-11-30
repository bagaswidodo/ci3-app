<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Node Tagger Ajax</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>"
     media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.2.min.js'); ?>"></script>
  </head>
  <body>
  	<!-- nav -->

    <nav class="navbar navbar-default">
	  <div class="container container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">
	        Brand
	      </a>
	    </div>
	  </div>
	</nav>

	<!-- end nav -->

  	<div class="container">
  		<div class="row">
  			<div class="col-md-6">
		  		<div class="panel panel-default">
				  <div class="panel-heading">Form</div>
				  <div class="panel-body">
				    	<form method="post" action="<?php echo base_url('tags/simpan'); ?>" id="form_user" name="form_user">
						  	<div class="form-group">
						    	<label for="exampleInputEmail1">Location</label>
						    	<input type="latlng" class="form-control" name="location" id="location" placeholder="Lat,Lng">
					 		</div>
					 		<div class="form-group">
						    	<label for="exampleInputEmail1">Geocode Location</label>
						    	<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Geocode Location">
					 		</div>
							<button type="submit" class="btn btn-info">Add Node</button>
					 	</form>
				  </div>
				</div>
  			</div>
  			<div class="col-md-6">
  				<div class="panel panel-default">
				  <div class="panel-heading">Map</div>
				  <div class="panel-body">
				    	<div id="map" style="height:300px">Map</div>
				  </div>
				</div>
  			</div>
  		</div>

  		<div class="row">
  			<div class="panel panel-default">
				  <div class="panel-heading">Location data</div>
				  <div class="panel-body">
				    	<table class="table table-bordered table-striped">
				    		<thead>
				    		<tr>
				    			<td>No</td>
				    			<td>Location</td>
				    			<td>Lat,lng</td>
				    			<td>Action</td>
				    		</tr>
				    		</thead>
				    		
				    		<tbody></tbody>

				    	</table>
				  </div>
				</div>
  		</div>

  	</div>
  </body>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        	<script>
        		var map;
        		function initialize() {


        			var latLng = new google.maps.LatLng( -7.2669,110.4039);
        			var map = new google.maps.Map(document.getElementById('map'), {
        				zoom: 10,
        				center: latLng,
        				mapTypeId: google.maps.MapTypeId.ROADMAP
        			});

        			var marker = new google.maps.Marker({
        				position: latLng,
        				title: 'Lokasi',
        				map: map,
        				draggable: true
        			});


        			google.maps.event.addListener(marker, 'dragend', function(evt){
        			//	document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(4) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
        				setInput(evt);
        			//  alert(evt);
        			});

        			google.maps.event.addListener(marker, 'dragstart', function(evt){
        				//document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
        			});
        		}
        		google.maps.event.addDomListener(window, 'load', initialize);

        		function setInput(e)
        		{
        			lat = e.latLng.lat().toFixed(4);
        			lng = e.latLng.lng().toFixed(4);
        			document.getElementById('location').value = lat + "," + lng;
        		}
  	</script>


  	<!-- ajax -->
  	<script type="text/javascript">
			var userId;
             
            function getListTableUser() {
                $('.table tbody').load('<?php echo site_url('tags/getList'); ?>');
            }
             
            getListTableUser();

			$(document).ready(function(){    
			    $('#form_user').on('submit', function(e){ // submit handler
			        e.preventDefault();
			        $.post(this.action, $(this).serialize(), function(data){ // ajax post
			            var data = eval('('+ data + ')');
			            if(data.status == "success") {
			                getListTableUser();
			                document.form_user.location.value = "";
			                document.form_user.alamat.value = "";
			                // document.form_user.id.value = "";
			                $('.close').trigger('click'); // close modal
			                clearMsg();
			            }
			            else if(data.status == "error") {
			                $('#user_form_validation').show();
			                $('.error_msg').html(data.msg);
			            }
			        });
			    });

			   
			     
			    function clearMsg(){
			        // $('#user_form_validation').hide();
			        // $('.error_msg').html("");
			    }
			});

			 function hapus(nodeId){
		                $.post('<?php echo site_url('tags/hapus'); ?>', {id: nodeId}, function(e) {
		                    getListTableUser();
		                });
		                // $('.close').trigger('click'); // close modal
		                // userId = null; // hapus id
		            }
			  	</script>
</html>