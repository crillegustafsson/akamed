<?php 
session_start();
include_once("inc/connstring.php");

$ProfilRes ="";
$Prow_cnt = "";
$user = "";
$logout = "";
$login = "";
$feedback = "";
$reg = "";
$annons = "";

if(isset($_SESSION["Fname"])){
	

	$user = <<<END
	<div class="logg">Välkommen {$_SESSION["Fname"]} {$_SESSION["Lname"]}</div>
END;

	$logout=<<<END
	<a href=logout.php><img src="img/loggaut.png" id="navImg"></a>
END;
$annons = <<<END
<a href="annons.php"><img src="img/annons.png" id="navImg"></a>
END;


$query2 =<<<END
	
	SELECT title, pPrice, cartid, date
	FROM cart
	WHERE UserID = '{$_SESSION["UserID"]}';

END;

/*---==== Profile =====-----------*/

$Profilres2 = $mysqli->query($query2) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);




if($Profilres2->num_rows >= 1){
$ProfilRes = <<<END
	<img src="img/cart_icon.png" class="cartImg">
END;

}else{
	$ProfilRes = " ";
}

/*---- Slut profil -----*/
/*
$query =<<<END
	SELECT * 
	FROM cart
	WHERE UserID = {$_SESSION["UserID"]};
END;

$res2 = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);


$row_cnt = $res2->num_rows;

if($res2->num_rows >= 1){
$CartNumber = <<<END
	<span>{$row_cnt}</span>
END;


}else{
	$CartNumber = "";
}
*/

}else{

	$login=<<<END
	<img src="img/loggain.png" id="navImg" class="loginDiv" alt="polaroid">
END;

$reg =<<<END
<a href="register.php" class="reg navImg">Registrera Dig</a>
END;
/*-------============= Logga in ==========---------------*/


	$tablePost = "user";

	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';

	if($email == '' || $password == ''){
		$feedback = "";
	}else{

							$email = utf8_encode($mysqli->real_escape_string($email)); 
							$password = utf8_encode($mysqli->real_escape_string($password)); 


						$query = <<<END
							SELECT Fname, Lname, Password, UserID, Email 
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
$_SESSION["UserID"] = $row->UserID; 
$_SESSION["Fname"] = $row->Fname; 
$_SESSION["Lname"] = $row->Lname; 
 
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

}
$head = <<<END
<!DOCTYPE html>
<html>
<head>
	<title>Sellit</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
	<script src="js/jq.js" type="text/javascript"></script>
	<script src="js/js.js" type="text/javascript"></script>
</head>
<body>
	{$user}
		<header>
	<div id="wrapper">
			<div id="logo">
			<a href="index.php"><img src="img/logo.png" class="logo"></a>
			</div>
			<nav>
			{$reg} 
			<a href="contact.php"><img src="img/kontakt.png" id="navImg"></a>
			{$ProfilRes}
			<a href="profil.php"><img src="img/profil.png" id="navImg"></a>
			{$annons}
			{$login}{$logout}
			<div class="loginEx">
			{$feedback}
		<form action="index.php" method="post" id="login-form">
		<input type="text" id="indexUser" name="email" value="" placeholder="Din E-postadress"/>
		<input type="password" id="indexPass" name="password" value="" placeholder="Ditt lösenord"/>
		<input type="submit" id="LogginButton" value="Login" id="button">
		</form>
			</div>
			</nav>

	</div>		
		</header>
			<div id="wrapper">
			<div id="content">
END;

$search =<<<END


			<!-- SÖKFUNKTION -->
			<div id="padding">
			<form id="searchbox" method="get" action="http://www.google.com">
			        <input type="text" class="searchbox" name="q" size="21" maxlength="120">
			</form>
		
			</div>
			<!-- SÖKFUNKTION SLUT -->

END;

$footer =<<<END
		</div> 	<!-- CONTENT SLUT -->
	</div>		<!-- WRAPPER SLUT -->
	</div>
	</div>
		<footer>
	<div id="wrapper">
		<div id="footertext">
		<img src="img/logo.png" class="imgfooter"><br><br>
		<p>Copyright © 2014 - <script type="text/javascript">
                                var today = new Date();
                                function takeYear(theDate) {
                                    x = theDate.getYear();
                                    var y = x % 100;
                                    y += (y < 38) ? 2000 : 1900;
                                    return y;
                                }
                                document.write(takeYear(today));
                                </script>
                                | sellit.se</p>
        </div>
	</div>
		</footer>
	</div>
</body>
</html>
END;



 ?>