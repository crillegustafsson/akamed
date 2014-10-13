<?php 

$header = <<<END

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
     <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
   <script type="text/javascript" src="js/calc.js"></script>
   <script type="text/javascript" src="js/language.js"></script>

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
          <li><a href="index.php" class="sok active"></a></li>
          <li><a href="add.php" class="add"></a></li>
          <li><a href="#" class="stars"></a></li>
          <li><a href="loggain.php" class="profile"></a></li>
        </ul>
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