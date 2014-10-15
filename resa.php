<?php 
include_once('inc/Connstring.php');
include_once('inc/include.php');

$id = isset($_GET['Rid']) ? $_GET["Rid"] : '';

$query =<<<END

SELECT * FROM `resa`
INNER JOIN user ON resa.Aid = user.Aid
WHERE `Rid`='{$id}'

END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);


$row = $res->fetch_object();

$Fnamn = $row->Fnamn;
$Enamn = $row->Enamn;
$Email = $row->Email;
$tele = $row->tele;
$startLat=$row->startLat;
$startLong=$row->startLong;
$endLat=$row->endLat;
$endLong=$row->endLong;
$bes=$row->beskrivning;
$id=$row->Rid;
$platser=$row->platser;
$datum=$row->datum;
$till=$row->till;
$fran=$row->fran;




$content =<<<END

<div class="content">


<div id="result">

          <div id="fromtext"><p>Från:</p><div id="fromDisplay">{$fran}</div></div>
          <div id="totext"><p>Till:</p><div id="toDisplay">{$till}</div></div>
          <div id="datetext"><p>Datum:</p><div id="datumDisplay">{$datum}</div></div>
          <div id="platstext"><p>Platser:</p><div id="platserDisplay">{$platser}</div></div>

        <div id="map" data-sLat="{$startLat}" data-sLong="{$startLong}" data-eLat="{$endLat}" data-eLong="{$endLong}"></div>
          <div id="bestext"><p>Beskrivning</p>
            <div id="besDisplay">{$bes}<br>{$Fnamn} {$Enamn} {$Email} {$tele}</div>
          </div>
      </div>


</div>

END;


echo $header;
echo $content;
echo $footer;

?>

