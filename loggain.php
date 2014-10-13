<?php
/*-------============= Logga in ==========---------------*/


$ProfilRes ="";
$Prow_cnt = "";
$user = "";
$logout = "";
$login = "";
$feedback = "";
$reg = "";
$annons = "";


  $tablePost = "user";

  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  if($email == '' || $password == ''){
    $feedback = "";
  }else{

              $email = utf8_encode($mysqli->real_escape_string($email)); 
              $password = utf8_encode($mysqli->real_escape_string($password)); 


            $query = <<<END
              SELECT Fnamn, Enamn, Email, Aid, tele, password 
              FROM {$tablePost} 
              WHERE Email = '{$email}'; 
END;
            
            $res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
            " : " . $mysqli->error); //Performs query 

            if($res->num_rows == 1) {
              
              /*$pswmd5 = md5($password);*/ 

              $row = $res->fetch_object();
              if($row->Password == $password){

session_regenerate_id(); 
 
$_SESSION["Email"] = $email; 
$_SESSION["Aid"] = $row->Aid; 
$_SESSION["Fnamn"] = $row->Fnamn; 
$_SESSION["Enamn"] = $row->Lnamn; 
 
header("Location: index.php"); 


              }else{
              $feedback = "Lösenord är fel";
              }

            }else{
              
              $feedback = "E-postadress är fel";
            }
            
          }

$email = htmlspecialchars($email);
$password = htmlspecialchars($password);

/*-------============= Logga in SLUT =====---------------*/
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Destination</title>
  </head>
  <body>
  <div id="body">
  <div id="wrapper">
      <header>
        <img src="img/logo.png">
      </header>
      <div id="menu">
        <ul>
          <li><a href="index.html" class="sok"></a></li>
          <li><a href="add.html" class="add"></a></li>
          <li><a href="#" class="stars"></a></li>
          <li><a href="profil.html" class="profile active"></a></li>
        </ul>
      </div>

    <div id="content">
      {$login}{$logout}
      {$feedback}
    
        <div id="leftbox" class="loginbox">
          <form action="profil.php" method="post" id="login-form">
            <div id="leftbox">
            <label for="from" class="passbox">Användarnamn:</label>
            <input type="text" class="user" id="indexUser" name="email" value="" placeholder=""/>
            </div>
            <div id="rightbox">
            <label for="from" class="passbox">Lösenord:</label>
            <input type="password" class="pass" id="indexPass" name="password" value="" placeholder=""/>
            <input type="submit" class="button" id="LogginButton" value="Login" id="button">
            </div>
          </form>
       </div>
      </div>
    </div>
    </div>
  </body>
</html>