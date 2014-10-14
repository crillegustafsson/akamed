<?php
session_start();

include_once('inc/include.php');
include_once('inc/connstring.php');


$from = "";
$till = "";


if(!isset($_POST['from']) && !isset($_POST['till'])){

}else{


  $_SESSION['from'] = $_POST['from'];
  $_SESSION['till'] = $_POST['till'];


  header("location: resultat.php");
}

$content = <<<END

    <form id="search" name="search" action="index.php" method="post">
      <div id="box">
        <div id="leftbox">
          <label for="from" class="from">Från:</label>
        </div>
        <div id="rightbox">
          <input type="text" id="from" name="from" value="{$from}" required="riquired" placeholder="Halmstad" size="30" />
       </div>
      </div>
      <div id="box">
        <div id="leftbox">
         <label for="to" class="to">Till:</label>
       </div>
        <div id="rightbox">
          <input type="text" id="to" name="till" value="{$till}" required="riquired" placeholder="Göteborg" size="30" />
        </div>
      <br />
      </div>
        <div id="sokbox">
          <input class="button" type="submit" value="Sök resa" />
        </div>
      <!--<input type="reset" />-->
    </form>
    <p id="error"></p>

END;
echo $header;
echo $content;
echo $footer;

?>