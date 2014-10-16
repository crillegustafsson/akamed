<?php 
include_once("inc/include.php");

if(!isset($_SESSION["Fnamn"])){
	header ("location: index.php");
	exit();
}

$CFnamn = "";
$CEnamn ="";
$Ctele = "";
$CEmail = "";
$password = "";
$Emptyfeedback = "";
$error = "";


if(!empty($_POST)) {

$CFnamn = isset($_POST['Fnamn']) ? $_POST['Fnamn'] : '';
$CEnamn = isset($_POST['Enamn']) ? $_POST['Enamn'] : '';
$Ctele = isset($_POST['tele']) ? $_POST['tele'] : '';
$CEmail = isset($_POST['Email']) ? $_POST['Email'] : '';

 $CEmail = utf8_encode($mysqli->real_escape_string($CEmail)); 
 $Ctele = utf8_encode($mysqli->real_escape_string($Ctele));
 $CEnamn = utf8_encode($mysqli->real_escape_string($CEnamn));
 $CFnamn = utf8_encode($mysqli->real_escape_string($CFnamn));


 if( $CFnamn == '' || $CEnamn == '' || $Ctele == '' || $CEmail == ''){
 	echo "FEL";
 }else{

$query =<<<END

	UPDATE user
	SET Fnamn = '{$CFnamn}', Enamn = '{$CEnamn}', tele = '{$Ctele}', Email = '{$CEmail}' 
	WHERE Aid = '{$_SESSION["Aid"]}';

END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);

header("Location: profil.php");
}

};



$query =<<<END

	SELECT tele, Fnamn, Enamn, Email
	FROM  `user`
	WHERE Aid =  '{$_SESSION["Aid"]}'

END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);

$row = $res->fetch_object();



 utf8_decode($row->tele);
utf8_decode($row->Fnamn);
utf8_decode($row->Enamn);
utf8_decode($row->Email);


 
$c =<<<END

 <br>
<div id="probox">
	<div class="regTop">							


		<h2>Ändra uppgifter</h2>
		<hr class="hr"><br>

			<form action="change.php" class="regTop" name="reg" method="post">
			<div id="widebox"><p>Förnamn</p></div>
			<input type="text" id="Fnamn" name="Fnamn" value="{$row->Fnamn}"><br><br><br>
			<div id="widebox"><p>Efternamn</p></div>
			<input type="text" id="ename" name="Enamn"  value="{$row->Enamn}"><br><br><br>
			<div id="widebox"><p>Telefonnummer</p></div>
			<input type="text" id="stor" name="tele" value="{$row->tele}"><br><br><br>
			<div id="widebox"><p>Email adress</p></div>
			<input type="text" id="p1" name="Email" value="{$row->Email}"><p>{$error}</p>
			<br>
			
			<p>{$Emptyfeedback}</p>

			<input type="submit" class="button" name="submit" id="submit" value="Slutför ändringar">
			<br><br><br><br>
		</form>

	</div>

</div>

END;


echo $header;
echo $c;
echo $footer;
?>