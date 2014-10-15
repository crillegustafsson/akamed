<?php
include_once('inc/include.php');
include_once('inc/connstring.php');


$fnamn = $_SESSION["Fnamn"];
$enamn = $_SESSION["Enamn"];

$content = <<<END
   
        <div id="leftbox" class="loginbox">
          <div id="userbox">
          	<div id="userboxheader">
				<div id="userleft"><p>{$fnamn} {$enamn}</p></div>
				<div id="logoutright"><p><a href="logout.php">Logga ut</a></p></div>
			</div>
			<div id="userboxcontent">
				<p>Information om användaren</p>
			</div>
          </div>
        </div>
END;

echo $header;
echo $content;
echo $footer;
