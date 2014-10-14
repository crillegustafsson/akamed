<?php
session_start();

include_once('inc/include.php');
include_once('inc/Connstring.php');

$till = $_SESSION['till'];
$from = $_SESSION['from'];

$query = <<<END
    SELECT * FROM `resa` WHERE `till` = '{$till}' AND `fran` = '{$from}'
END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);

$row = $res->fetch_object();


$tillStad = $row->till;
$franStad = $row->fran;
$Rid = $row->Rid;

$content = <<<END

 <div id="resebox">
          <div id="resebox1">
              <div id="firstbox">
                  <label id="name">Namn: Crille G</label>
                  <label id="date">Datum: 2014-12-24</label>
              </div>
              <div id="resebox2">
                  <div id="boxleft">
                    <div id="frombox">Från:</div>
                    <label id="from">{$franStad}</label>
                    <br>
                    <a href="resa.php?Rid={$Rid}">Läs mer</a>
                  </div>
                  <div id="boxright">
                    <div id="frombox">Till:</div>
                    <label id="to">{$tillStad}</label>
                  </div>
              </div>
          </div>
  </div>

END;

echo $header;
echo $content;
echo $footer;

?>