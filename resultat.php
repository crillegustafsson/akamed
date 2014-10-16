<?php

include_once('inc/include.php');
include_once('inc/connstring.php');

$content = "";


$till = $_SESSION['till'];
$Aid = $_SESSION['Aid'] ;
$from = $_SESSION['from'];

$query = <<<END

SELECT * FROM `resa`
INNER JOIN user ON resa.Aid = user.Aid
WHERE resa.till = '{$till}' AND resa.fran = '{$from}' 

END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);



if($res->num_rows == 0){


$content .=<<<END
 <div id="felText">Tyvärr fanns det ingen resa från <b>{$from}</b> till <b>{$till}</b>.</div>
END;

}else{




while($row = $res->fetch_object()) {

$Fnamn = $row->Fnamn;
$Enamn = $row->Enamn;
$datum = $row->datum;
$tillStad = $row->till;
$franStad = $row->fran;
$Rid = $row->Rid;

$content .= <<<END

 <div id="resebox">
          <div id="resebox1">
              <div id="firstbox">
                <div id="boxleft">
                  <label id="name"><img src="img/profile.png" class="profileicon"> {$Fnamn} {$Enamn}</label>
                </div>
                <div id="boxright" class="padd">
                  <label id="date"><img src="img/date.png" class="dateicon"> {$datum}</label>
                </div>
              </div>
              <div id="resebox2">
                  <div id="boxleft">
                    <div id="frombox">Från:</div>
                    <label id="from">{$franStad}</label>
                    <br>
                  </div>
                  <div id="boxright">
                    <div id="frombox">Till:</div>
                    <label id="to">{$tillStad}</label>
                  </div>
                  <div id="readmore">
                    <a href="resa.php?Rid={$Rid}">Läs mer</a>
                  </div>
              </div>
          </div>
  </div>

END;

}




}


echo $header;
echo $content;
echo $footer;

?>