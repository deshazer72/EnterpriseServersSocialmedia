<?php 
$strUserID = $_POST['userID']; 
$strTweet = $_POST['tweet']; 
$user = "uateam15"; 
$pass = "uateam15"; 
$host = "localhost"; 
$db = "uateam15"; 

$connect = mysql_connect( $host, $user, $pass ) or die ("Cannot connect"); 
mysql_select_db($db, $connect) or die ("failed");
$sql = "INSERT INTO tweet SET 
                tweetbody = '" . mysql_real_escape_string($strTweet) . "',
                userID = '" . mysql_real_escape_string($strUserID) . "'"; 

mysql_query($sql) or die ("false"); 

mysql_close( $connect );  

?>