<?php 
$update = $_POST['update']; 
$delete = $_POST['delete'];
$strTweet = $_POST['tweet']; 
$intTweetID = $_POST['tweetID'];
$user = "uateam15"; 
$pass = "uateam15"; 
$host = "localhost"; 
$db = "uateam15";  
if($update == "update" && $delete == ""){
$connect = mysql_connect( $host, $user, $pass ) or die ("Cannot connect"); 
mysql_select_db($db, $connect) or die ("failed");
$sql = "UPDATE tweet SET 
                tweetbody = '" . mysql_real_escape_string($strTweet) . "' WHERE 
                tweetID = '" . mysql_real_escape_string($intTweetID) . "'"; 

mysql_query($sql) or die ("false in update"); 

mysql_close( $connect );  
}
else {
$connect = mysql_connect( $host, $user, $pass ) or die ("Cannot connect"); 
mysql_select_db($db, $connect) or die ("failed");
$sql = "DELETE FROM tweet WHERE 
                tweetID = " .mysql_real_escape_string($intTweetID);

echo $sql;  

mysql_query($sql) or die ("false in delete"); 


mysql_close( $connect );         
}

?>