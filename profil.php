<?php
include_once('inc/include.php');
include_once('inc/connstring.php');

$content = <<<END
   
        <div id="leftbox" class="loginbox">
          <form action="index.php" method="post" id="login-form">
<a href="logout.php">logga ut</a>
          </form>
        </div>
END;

echo $header;
echo $content;
echo $footer;
