<?php

include_once('inc/include.php');
include_once('inc/connstring.php');

$content = <<<END
    
        <div id="leftbox" class="loginbox">
          <form action="profil.php" method="post" id="login-form">
            <div id="leftbox">
            <label for="from" class="passbox">Användarnamn:</label>
            <input type="text" class="user" id="indexUser" name="email" value="" placeholder=""/>
            </div>
            <div id="rightbox">
            <label for="from" class="passbox">Lösenord:</label>
              <input type="password" class="pass" id="indexPass" name="password" value="" placeholder=""/>
            </div>
            <div id="sokbox">
              <input type="submit" class="button" id="LogginButton" value="Login" id="button">
            </div>
          </form>
       </div>
END;

echo $header;
echo $content;
echo $footer;

?>