<?php
$userID = $_POST['userID']; 
$strFirstName = $_POST['FirstName']; 
$strLastName = $_POST['LastName'];
$strEmail = $_POST['Email'];
$intPrivate = $_POST['Private'];
$user = "uateam15"; 
$pass = "uateam15"; 
$host = "localhost"; 
$db = "uateam15"; 

$connect = mysql_connect( $host, $user, $pass ) or die ("Cannot connect"); 
mysql_select_db($db, $connect) or die ("failed"); 


$sql = "UPDATE user SET 
                fname = '" . mysql_real_escape_string($strFirstName) . "',
                lname = '" . mysql_real_escape_string($strLastName) . "',
                private = '" . mysql_real_escape_string ($intPrivate) . "',
                email = '" . mysql_real_escape_string($strEmail) . "' WHERE
                userID = '" . mysql_real_escape_string($userID) . "'";        
echo $sql; 


mysql_query($sql) or die ("false"); 

mysql_close( $connect ); 

  
?>