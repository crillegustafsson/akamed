<?php

include_once('inc/include.php');

if(!isset($_SESSION["Fnamn"])){
  header ("location: loggain.php");
  exit();
}

$content = <<<END

<form id="calculate-route" name="calculate-route" action="#" method="get" data-id="1">
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
           <label for="to" class="to">Antal:</label>
        </div>
        <div id="rightbox">
            <input type="text" id="platser" name="platser" required="required" placeholder="2 personer" size="30" />
        </div>
        <br /><br>
      </div>
      <div id="box">
        <div id="leftbox">
          <label for="to" id="go" class="to">Beskrivning:</label>
        </div>
        <div id="rightbox">
          <input typ="textarea" id="bes" size="40" placeholder="Bekrivning" ></input>
        </div>
        <br /><br>
      </div>
      <div id="sokbox">
        <input class="button" type="submit" value="Lägg till" />
      </div>
      <!--<input type="reset" />-->
    </form>

      <div id="result" class="hide">

          <div id="fromtext"><p>Från:</p><div id="fromDisplay"></div></div>
          <div id="totext"><p>Till:</p><div id="toDisplay"></div></div>
          <div id="datetext"><p>Datum:</p><div id="datumDisplay"></div></div>
          <div id="platstext"><p>Platser:</p><div id="platserDisplay"></div></div>

        <div id="map"></div>
          <div id="bestext"><p>Beskrivning</p>
            <div id="besDisplay"></div>
          </div>
      </div>

    <p id="error"></p>
    </div>

END;

echo $header;
echo $content;
echo $footer;

?>