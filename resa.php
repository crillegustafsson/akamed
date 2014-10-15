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
$platser=$row->platser;
$till=$row->till;
$fran=$row->fran;




$content =<<<END

 <div id="map" style="width:900px; height:550px;" data-sLat="{$startLat}" data-sLong="{$startLong}" data-eLat="{$endLat}" data-eLong="{$endLong}"></div>
<div class="content">

{$till}<br>
{$fran}<br>
{$platser}<br>
{$bes}<br>


</div>

END;


echo $header;
echo $content;
echo $footer;

?>

