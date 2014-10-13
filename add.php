<?php

include_once('inc/include.php');

$content = <<<END

<form id="calculate-route" name="calculate-route" action="tes.php" method="get">
      <div id="box">
        <div id="leftbox">
          <label for="from" class="from">Från:</label>
        </div>
        <div id="rightbox">
          <input type="text" id="from" name="from" required="required" placeholder="Halmstad" size="30" />
       </div>
      </div>
      <div id="box">
        <div id="leftbox">
         <label for="to" class="to">Till:</label>
       </div>
        <div id="rightbox">
          <input type="text" id="to" name="to" required="required" placeholder="Göteborg" size="30" />
        </div>
      <br />
      </div>
      <div id="box">
        <div id="leftbox">
          <label for="to" class="to">Datum:</label>
        </div>
        <div id="rightbox">
          <input type="text" id="datepicker" name="datum" required="required" placeholder="Datum" size="30" />
        </div>
      </div>
      <div id="box">
        <div id="leftbox">
          <label for="to" id="go" class="to">Beskrivning:</label>
        </div>
        <div id="rightbox">
          <input typ="textarea" id="bes" size="40" placeholder="Bekrivning"></input>
        </div>
        <br /><br>
      </div>
      <input class="button" type="submit" value="Lägg till" />
      <!--<input type="reset" />-->
    </form>

          <div id="result" class="hide">
        <div id="map">

        </div>
        <div id="datumDisplay"></div>
        <div id="besDisplay"></div>
      </div>

    <p id="error"></p>
    </div>

END;

echo $header;
echo $content;
echo $footer;

?>