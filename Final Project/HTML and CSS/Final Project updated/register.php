<?php
$strFirstName = $_POST['FirstName']; 
$strLastName = $_POST['LastName'];
$strEmail = $_POST['Email'];
$strPassword = $_POST['Password'];
$intPrivate = $_POST['Private'];
$user = "uateam15"; 
$pass = "uateam15"; 
$host = "localhost"; 
$db = "uateam15"; 

$connect = mysql_connect( $host, $user, $pass ) or die ("Cannot connect"); 
mysql_select_db($db, $connect) or die ("failed"); 

//$sql = "INSERT INTO USER (fname, lname, email, password) VALUES('$strFirstName', '$strLastName', '$strEmail', '$strPassword')"; 

$sql = "INSERT INTO user SET 
                fname = '" . mysql_real_escape_string($strFirstName) . "',
                lname = '" . mysql_real_escape_string($strLastName) . "',
                email = '" . mysql_real_escape_string($strEmail) . "',
                private = '" . mysql_real_escape_string ($intPrivate) . "',
                password = '" . mysql_real_escape_string($strPassword) . "'";  
        
echo $sql; 


mysql_query($sql) or die ("false"); 

mysql_close( $connect ); 

  
?>