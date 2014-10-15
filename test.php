<?php 
include_once('inc/Connstring.php');
include_once('inc/include.php');

$id = isset($_GET['Rid']) ? $_GET["Rid"] : '';

$query ="SELECT * FROM `resa` WHERE `Rid`='{$id}'";

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);


$row = $res->fetch_object();

$startLat=$row->startLat;
$startLong=$row->startLong;
$endLat=$row->endLat;
$endLong=$row->endLong;
$bes=$row->beskrivning;
$id=$row->Rid;




$div =<<<END

 style="width:900px; height:550px;" data-sLat="{$startLat}" data-sLong="{$startLong}" data-eLat="{$endLat}" data-eLong="{$endLong}"
END;

 ?>
 <html>
 <head>
 	<title></title>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
 	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
 </head>
 <body>
 
 <div id="map" <?php echo $div; ?> ><?php echo $bes ?></div>



 <script>
$(document).ready(function(){
	
 var getId = document.getElementById("map");
 
        var sLat = getId.getAttribute("data-sLat");
        var sLong = getId.getAttribute("data-sLong");
        var eLat = getId.getAttribute("data-eLat");
        var eLong = getId.getAttribute("data-eLong");

        var data = {};
        data.start = {'lat': sLat, 'long': sLong}
    	data.end = {'lat': eLat, 'long':eLong}

    	console.log(data.start);

    	goma(data);

function setroute(data)
{
	//var start = {"lat" : data.startLat , "long" : data.startLong};
	//var end = {"lat" : data.endLat , "long" : data.endLong};
	console.log( data);
	var wp = [];/*
	for(var i=0;i<data1[0].length;i++)
		wp[i] = {'location': new google.maps.LatLng(data1[0].start),'stopover':false }*/

	ser.route({'origin':new google.maps.LatLng(data.start.lat, data.start.long),
	'destination':new google.maps.LatLng(data.end.lat, data.end.long),
	'waypoints': wp,
	'travelMode': google.maps.DirectionsTravelMode.DRIVING},function(res,sts) {
		if(sts=='OK')ren.setDirections(res);
	})	
}

var map, ren, ser;
var data = {};

function goma(data)
{
map = new google.maps.Map( document.getElementById('map'), {'zoom':12, 'mapTypeId': google.maps.MapTypeId.ROADMAP, 'center': new google.maps.LatLng(26.05678288577881, -80.30236816615798) })

	ren = new google.maps.DirectionsRenderer( {'draggable':false} );
	ren.setMap(map);
	ser = new google.maps.DirectionsService();
	setroute(data)
}

	/*  var getId = document.getElementById("mappy");
 
        var id = getId.getAttribute("data-id");
        id = id.toString();

		var url="get.php?id="+id;

		var urls ="get.php";

	//$("#jsondata tbody").html("");
	$.getJSON(urls,function(data1){
			
	//var test = data1[0].start;

		
			console.log(data1);


*/




});

</script>
 </body>
 </html>

<?php

echo $header;
echo $div;
echo $footer;

?>