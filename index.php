<?php

include_once('inc/include.php');

$content = <<<END

    <form id="calculate-route" name="calculate-route" action="#" method="get">
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
      <input class="button" type="submit" value="Sök resa" />
      <!--<input type="reset" />-->
    </form>
    <p id="error"></p>

END;
echo $header;
echo $content;
echo $footer;

?>