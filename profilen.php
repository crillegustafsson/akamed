<?php 
include_once("inc/include.php");

if(!isset($_SESSION["Fname"])){
	header ("location: index.php");
	exit();
}
$x = "";
$row_cnt = "";
 $Title = "" ;
 $pPrice = "";
 $Adress = "" ;
 $PostalCode = "";
 $Tele = "";
 $cartid = "";
 $yes = "";
 $no = "";
 $Orderhistorik ="";

$query =<<<END

	SELECT *
	FROM  user
	WHERE UserID = '{$_SESSION["UserID"]}';

END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);

$row = $res->fetch_object();

	$City = utf8_decode(htmlspecialchars($row->City));
	$Adress = utf8_decode(htmlspecialchars($row->Adress));
	$PostalCode = utf8_decode(htmlspecialchars($row->PostalCode));
	$Tele = utf8_decode(htmlspecialchars($row->Tele));
	$Email = utf8_decode(htmlspecialchars($row->Email));
	$FName = utf8_decode(htmlspecialchars($row->FName));
	$LName = utf8_decode(htmlspecialchars($row->LName));



$c =<<<END

<br>
<div id="probox">

	<div id="Pcenter">

		<div class="Pleft">
		<h2>Profil</h2>
		<hr class="hr"><br>
			<strong>Förnamn:</strong> {$FName} <br>
			<strong>Efternamn:</strong> {$LName}<br>
			<strong>Adress:</strong> {$Adress}<br>
			<strong>Post adress:</strong> {$PostalCode}<br>
			<strong>Stad:</strong> {$City}<br>
			<strong>Tele:</strong> {$Tele}<br>
			<strong>E mail:</strong> {$Email}<br>
			<a href="change.php" class="Plink">Ändra uppgifter</a><br>

		</div>

END;




/*----===== query2 ställd i include rad 29  =====-----*/

while($row = $Profilres2->fetch_object()){


		if($Profilres2->num_rows >= 0){

	

			 $Title = utf8_decode(htmlspecialchars($row->title));
			 $pPrice = utf8_decode(htmlspecialchars($row->pPrice));
			 $cartid = utf8_decode(htmlspecialchars($row->cartid));

			$Date = strtotime($row->date);
			$Date = date("d M - Y", $Date); 

			$yes .=<<<END
			<div class="KundVinfo">
			{$row_cnt}
			<strong>Annons rubrik:</strong> {$Title}<br>
			<strong>Skapad:</strong> {$Date}<br>
			<strong>Annons kostnad:</strong> {$pPrice} Kr<br>
			<a href="betala.php?cartId={$cartid}" class="Plink">Betala och publicera</a>
			</div>
END;

		}


};



$query2 =<<<END

SELECT Title, Description, Price, Date, AdID
FROM ad
WHERE UserID = '{$_SESSION["UserID"]}';


END;

$res2 = $mysqli->query($query2) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);





while($row2 = $res2->fetch_object()) {

			if($res2->num_rows > 0){

		 $AdID = utf8_decode(htmlspecialchars($row2->AdID));
		 $Title = substr(utf8_decode(htmlspecialchars($row2->Title)) , 0, 20);
		 $Description = substr(utf8_decode(htmlspecialchars($row2->Description)), 0, 20) . "...";
		 $Price = utf8_decode(htmlspecialchars($row2->Price));
		 $Date = utf8_decode(htmlspecialchars($row2->Date));

		$Date = strtotime($row2->Date);
		$Date = date("d M  - Y", $Date); 

/*----=== Kollar om x är jämt delbart med 2, om det är sant är det ett jämt nummer och klassen ($class) White att visas i diven ===---*/
		$x++; 

		$class = ($x%2 == 0)? 'white': 'gray';


				$Orderhistorik .=<<<END
	<a href="ad.php?ad={$AdID}" class="OrderLink"><div class="$class">
	
	<div id="title">{$Title}</div><div id="description">{$Description}</div><div id="price">{$Price} Kr</div><div id="date">{$Date}</div>

	</div></a>
END;

		}

}



		$c .=<<<END
				<div class="Pright">
					<h2>Kundvagn</h2>
					<hr class="hr"><br>
					{$no} {$yes}

				</div>
				<hr class="clear">
				<h2>Orderhistorik</h2><br>
				<div id="title"><b>Titel</div><div id="description">Annons beskrivning</div><div id="price">Pris</div><div id="date">Utlägnings datum</b
				></div>
				{$Orderhistorik}
				</div> </div>

END;

		



echo $head;
echo $c;
echo $footer;

 ?>
	
