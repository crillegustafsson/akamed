<?php 

if(isset($_REQUEST))
{
  mysql_connect("localhost","root","");
mysql_select_db("akamed");
error_reporting(E_ALL && ~E_NOTICE);

mysql_query( "SET NAMES SET 'utf8'"); 
mysql_query( "SET CHARACTER SET 'utf8'");


$id=$_POST['id'];
$startLat=$_POST['startLat'];
$startLong=$_POST['startLong'];
$endLat=$_POST['endLat'];
$endLong=$_POST['endLong'];
$date=$_POST['date'];
$platser=$_POST['platser'];
$beskrivning=$_POST['beskrivning'];
$till=$_POST['till'];
$fran=$_POST['fran'];

//end=$_POST['end'];

$sql="INSERT INTO resa(startLat, startLong, endLat, endLong, datum, platser, beskrivning, till, fran, Aid) VALUES ( '$startLat', '$startLong', '$endLat', '$endLong', '$date', '$platser', '$beskrivning', '$till', '$fran', $id)";
$result=mysql_query($sql);
if($result){
echo "You have been successfully subscribed.";
}
}
?>