<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contoh Aplikasi Peta GIS Sederhana Dengan Google Map API</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
var peta;
var koorAwal = new google.maps.LatLng(-8.46011002854049, 115.07475175624995);
function peta_awal(){
    loadDataLokasiTersimpan();
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}

function tandai(lokasi){
    $("#koorX").val(lokasi.lat());
    $("#koorY").val(lokasi.lng());
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta
    });
}

$(document).ready(function(){
    $("#simpanpeta").click(function(){
        var koordinat_x = $("#koorX").val();
        var koordinat_y = $("#koorY").val();
        var nama_tempat = $("#namaTempat").val();
        $.ajax({
            url: "<?php echo base_url(); ?>simple_gis/simpan_lokasi_baru",
            data: "koordinat_x="+koordinat_x+"&koordinat_y="+koordinat_y+"&nama_tempat="+nama_tempat,
            success: function(msg){
                $("#namaTempat").val(null);
                $("#koorX").val(null);
                $("#koorY").val(null);
            }
        });
    });
});



function loadDataLokasiTersimpan(){
    $('#kordinattersimpan').load('<?php echo base_url(); ?>simple_gis/lokasi_tersimpan');
}
setInterval (loadDataLokasiTersimpan, 3000);

function carikordinat(lokasi){
    var settingpeta = {
        zoom: 10,
        center: lokasi,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta
    });
    google.maps.event.addListener(tanda, 'click', function() {
      infowindow.open(peta,tanda);
    });
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}


function gantipeta(){
    loadDataLokasiTersimpan();
	var isi = document.getElementById('cmb').value;
	if(isi=='1')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
	}
	else if(isi=='2')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.TERRAIN
        };
	}
	else if(isi=='3')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.SATELLITE
        };
	}
	else if(isi=='4')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.HYBRID
        };
	}
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}

</script>

</head>
<style>
body{
font-size:12px;
font-family:Tahoma;
margin:0px auto;
padding:0px;
color:#FFFFFF;
background-color:#333333;
}
a{
text-decoration:none;
color:#FF0000;
font-weight:bold;
}
a:hover{
color:#FF9900;
}
ul{
margin:0px auto;
padding:0px 15px 0px 15px;
list-style:square;
}
li{
padding-left:15px;
padding:0px 15px 0px 5px;
}
input,select{
padding:5px;
border:1px solid #FFFFFF;
background-color:#FF9900;
}
input,button{
padding:5px;
border:1px solid #FFFFFF;
background-color:#FF9900;
}
button:hover{
padding:5px;
border:1px solid #FFFFFF;
background-color:#FF3300;
cursor:pointer;
}
</style>
<body onLoad="peta_awal()">
<div id="kanvaspeta" style=" margin:0px auto; width:72%; height:630px; float:right; padding:10px;"></div>
<div id="form_lokasi" style="background-color:#333333;width:23%; height:600px;text-align:left;padding:10px; float:left;">
<table>
<tr>
<td>Ganti Jenis Peta</td><td>:
<select id="cmb" onchange="gantipeta()">
<option value="1">Peta Roadmap</option>
<option value="2">Peta Terrain</option>
<option value="3">Peta Satelite</option>
<option value="4">Peta Hybrid</option>
</select>
</td>
</tr>
<tr><td>Koordinat X</td><td>: <input type="text" name="koordinatx" id="koorX" readonly="readonly"></td></tr>
<tr><td>Koordinat Y</td><td>: <input type="text" name="koordinaty" id="koorY" readonly="readonly"></td></tr>
<tr><td>Nama Lokasi</td><td>: <input type="text" name="namatempat" id="namaTempat"></td></tr>
<tr><td></td><td><button id="simpanpeta">Simpan</button><button onclick="javascript:carikordinat(koorAwal);">Koordinat Awal</button></td></tr>
</table>
<div id=kordinattersimpan></div>
</div>
</div>
</body>
</html>
