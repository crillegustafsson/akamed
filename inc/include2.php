<?php 
session_start();

$user = "";
$logout = "";
$login = "";
$feedback = "";

if(isset($_SESSION["fname"])){


	$user = <<<END
	<div class="logg">Välkommen {$_SESSION["fname"]} {$_SESSION["ename"]}</div>
END;

	$logout=<<<END
	<a href=logout.php><img src="img/loggaut.png"></a>
END;

}else{

	$login=<<<END
	<img src="img/loggain.png" class="loginDiv">
END;
/*-------============= Logga in ==========---------------*/

	include_once("inc/connstring.php");
	
	$tablePost = "kund";

	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';

	if($email == '' || $password == ''){
		$feedback = "";
	}else{

							$email = utf8_encode($mysqli->real_escape_string($email)); 
							$password = utf8_encode($mysqli->real_escape_string($password)); 


						$query = <<<END
							SELECT fname, ename, password, kundId, email 
							FROM {$tablePost} 
							WHERE email = "{$email}"; 
END;
						
						$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
						" : " . $mysqli->error); //Performs query 

						if($res->num_rows == 1) {
							
							/*$pswmd5 = md5($password);*/ 

							$row = $res->fetch_object();
							if($row->password == $password){

session_regenerate_id(); 
 
$_SESSION["email"] = $email; 
$_SESSION["kundId"] = $row->kundId; 
$_SESSION["fname"] = $row->fname; 
$_SESSION["ename"] = $row->ename; 
 
header("Location: index.php"); 


							}else{
							$feedback = "Lösenord är fel";
							}
							$res->close();
						}else{
							$feedback = "E-postadress är fel";
						}
						$mysqli->close();
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="js/jq.js" type="text/javascript"></script>
	<script src="js/js.js" type="text/javascript"></script>
</head>
<body>
	{$user}
		<header>
	<div id="wrapper">
			<img src="img/logo.png" class="logo">

			<nav>
			<img src="img/profil.png">
			<img src="img/annons.png">
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
		<footer>
	<div id="wrapper">

	</div>
		</footer>
	</div>
</body>
</html>
END;



 ?>