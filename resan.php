<?php

include_once('inc/include.php');

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
                    <label id="from">Halmstad</label>
                  </div>
                  <div id="boxright">
                    <div id="frombox">Till:</div>
                    <label id="to">Värnamo</label>
                  </div>
              </div>
          </div>
  </div>

END;

echo $header;
echo $content;
echo $footer;

?>