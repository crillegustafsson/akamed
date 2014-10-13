<?php 
if(isset($_REQUEST))
{
        mysql_connect("localhost","root","");
mysql_select_db("json");
error_reporting(E_ALL && ~E_NOTICE);

$startLat=$_POST['startLat'];
$startLong=$_POST['startLong'];
$endLat=$_POST['endLat'];
$endLong=$_POST['endLong'];
//end=$_POST['end'];

$sql="INSERT INTO student_info(startLat, startLong, endLat, endLong) VALUES ( '$startLat', '$startLong', '$endLat', '$endLong')";
$result=mysql_query($sql);
if($result){
echo "You have been successfully subscribed.";
}
}
?>