<?php

include_once('inc/include.php');
include_once('inc/connstring.php');

$content = "";

$till = $_SESSION['till'];

$from = $_SESSION['from'];

$query = <<<END
    SELECT * FROM `resa` WHERE `till` = '{$till}' AND `fran` = '{$from}'
END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);



if($res->num_rows >= 0){


$content .=<<<END
 <div id="felText">Tyvärr fanns det ingen resa från <b>{$from}</b> till <b>{$till}</b>.</div>
END;

}else{




while($row = $res->fetch_object()) {

  $tillStad = $row->till;
$franStad = $row->fran;
$Rid = $row->Rid;

$content .= <<<END

 <div id="resebox">
          <div id="resebox1">
              <div id="firstbox">
                <div id="boxleft">
                  <label id="name"><img src="img/profile.png" class="profileicon"> Crille G</label>
                </div>
                <div id="boxright">
                  <label id="date"><img src="img/date.png" class="dateicon"> 2014-12-24</label>
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