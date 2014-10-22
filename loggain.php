<?php

include_once('inc/include.php');
include_once('inc/connstring.php');

/*-------============= Logga in ==========---------------*/


  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  if($email == '' || $password == ''){
    $feedback = "";
  }else{

              $email = utf8_encode($mysqli->real_escape_string($email)); 
              $password = utf8_encode($mysqli->real_escape_string($password)); 


            $query = <<<END
              SELECT Fnamn, Enamn, password, Aid, Email 
              FROM user
              WHERE Email = '{$email}'; 
END;
            
            $res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
            " : " . $mysqli->error); //Performs query 

            if($res->num_rows == 1) {
              
              /*$pswmd5 = md5($password);*/ 

              $row = $res->fetch_object();
              if($row->password == $password){

session_regenerate_id(); 
 
$_SESSION["Email"] = $email; 
$_SESSION["Aid"] = $row->Aid; 
$_SESSION["Fnamn"] = $row->Fnamn; 
$_SESSION["Enamn"] = $row->Enamn;
$_SESSION["tele"] = $row->tele;
 
header("Location: profil.php"); 


              }else{
              $feedback = "<div id='feedbox'>Lösenordet är fel</div>";
              }

            }else{
              
              $feedback = "<div id='feedbox'>Epost adressen är fel</div>";

            }
            
          }

$email = htmlspecialchars($email);
$password = htmlspecialchars($password);

/*-------============= Logga in SLUT =====---------------*/
$content = <<<END
    <p align="center">Välkommen till Åkamed.se!</p><br>
    <p align="center">Logga in för att skapa eller sök på en sammåknings resa.</p><br>

        <div id="leftbox" class="loginbox">
          <form action="#" method="post" id="login-form">
            <div id="leftbox">
            <label for="from" class="passbox">Epost adress:</label>
            <input type="text" class="user" id="indexUser" name="email" value="" placeholder=""/>
            </div>
            <div id="leftbox">
            <label for="from" class="passbox">Lösenord:</label>
              <input type="password" class="pass" id="indexPass" name="password" value="" placeholder=""/>
            </div>
            <div id="sokbox">
              <input type="submit" class="button" id="LogginButton" value="Login" id="button"><br><br>
            </div>
            <p align="center">Inget konto? registrera dig <a href="#">här</a></p>
            <div id="feedback">
              {$feedback}
            </div>
          </form>
       </div>
END;

echo $header;
echo $content;
echo $footer;

?>