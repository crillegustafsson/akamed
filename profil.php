<?php
include_once('inc/include.php');
include_once('inc/connstring.php');

$id = $_SESSION["Aid"];

$query = <<<END

SELECT * FROM `user`
WHERE Aid = '{$id}'

END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);

$row = $res->fetch_object();

$fnamn = $row->Fnamn;
$enamn = $row->Enamn;
$email = $row->Email;
$tele = $row->tele;


$content = <<<END
   
        <div id="leftbox" class="loginbox">
          <div id="userbox">
          	<div id="userboxheader">
				<div id="userleft"><p><img src="img/profilevit.png" width="15"> {$fnamn} {$enamn}</p></div>
				<div id="logoutright"><p><a href="logout.php">Logga ut</a></p></div>
			</div>
			<div id="userboxcontent">
				<div id="ubcontent">
					<div class="row"><div class="mail"></div><p> {$email}</p></div>
					<div class="row"><div class="tele"></div><p> {$tele}</p></div>
					<div id="center">
						 <a href="change.php" class="button" id="change">Ändra profiluppgifter</a>
					</div>
				</div>
			</div>
          </div>
        </div>
END;

echo $header;
echo $content;
echo $footer;
