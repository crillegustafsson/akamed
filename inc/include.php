<?php 
session_start();
include_once('inc/connstring.php');

$inloggad = "";
$utloggad = "";

if(isset($_SESSION["Fnamn"])){

  $inloggad = <<<END
          <ul>
          <li><a href="http://localhost/akamed/index.php" class="sok"></a></li>
          <li><a href="http://localhost/akamed/add.php" class="add"></a></li>
          <li><a href="#" class="stars"></a></li>
          <li><a href="http://localhost/akamed/profil.php" class="profile"></a></li>
        </ul>
END;

}else {

    $utloggad = <<<END
        <ul class="utloggad">
          <li><a class="sok"></a></li>
          <li><a class="add"></a></li>
          <li><a class="stars"></a></li>
          <li><a href="http://localhost/akamed/loggain.php" class="profile"></a></li>
        </ul>
END;
}

$header = <<<END

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
   <script type="text/javascript" src="js/calc.js"></script>
   <script type="text/javascript" src="js/language.js"></script>
   <script type="text/javascript" src="js/showMap.js"></script>

    <title>Åkamed | Tillsammans sparar vi på miljön</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
  </head>
  <body>
  <div id="body">
  <div id="wrapper">
      <header>
        <img src="img/logo.png">
      </header>
      <div id="menu">
        {$inloggad}{$utloggad}
      </div>
    <div id="content">

END;

$footer = <<<END

    </div>

  </div>
  </div>
  </body>
</html>

END;


?>