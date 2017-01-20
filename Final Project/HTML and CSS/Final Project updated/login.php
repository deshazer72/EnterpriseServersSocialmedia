<?php
$strEmail = $_POST['Email'];
$strPassword = $_POST['Password'];
$user = "uateam15"; 
$pass = "uateam15"; 
$host = "localhost"; 
$db = "uateam15"; 

$connect = mysql_connect( $host, $user, $pass ) or die ("Cannot connect"); 
mysql_select_db($db, $connect) or die ("failed"); 

//$sql = "INSERT INTO USER (fname, lname, email, password) VALUES('$strFirstName', '$strLastName', '$strEmail', '$strPassword')"; 

$sql = "SELECT * FROM user WHERE 
                email = '" . mysql_real_escape_string($strEmail) . "' AND
                password = '" . mysql_real_escape_string($strPassword) . "'";  
        


$data = mysql_query($sql) or die ("false");
$userID = 0; 
$results = array(); 
while($i = mysql_fetch_array($data)){
        $userID = $i['userID']; 
}
if($userID != 0){
session_start();
$_SESSION["userID"] = $userID; 
echo $userID; 
}
mysql_close( $connect ); 

  
?>