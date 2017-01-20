<?php
session_start(); 
if( !isset($_SESSION["userID"])){
    header("location: error.html"); 
}
$userID = $_SESSION["userID"];

$user = "uateam15"; 
$pass = "uateam15"; 
$host = "localhost"; 
$db = "uateam15"; 

$connect = mysql_connect( $host, $user, $pass ) or die ("Cannot connect"); 
mysql_select_db($db, $connect) or die ("failed"); 

$sql = "SELECT * FROM user";
$data = mysql_query($sql) or die ("false");

?>

<html>

<link rel="stylesheet" type="text/css" href="Final.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<head>
<style>
    body {
        background-image: url(http://www.carolinamaterialhandling.com/Fade-background_rot_180.gif);
        background-repeat: no-repeat;
        background-size: cover;
    }
    #allprofilediv{
    margin: auto;
    margin-top: 10px;
    width: 50%;
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}

#allprofilea{
     display: block;
     color: black;
     text-align: center;
     padding: 10px 10px;
     text-decoration: none;
}
</style>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
		<script src="tweets.js"></script>
</head>

<body>
    <div id="header">
        <div align="center" style="border:solid; margin-bottom: 4px; font:bold 28px times new roman;">
            <b>UA Tweetbook</b>
        </div>

    </div>
    <div>
        <ul>
               <li><a href="Profiles.php">Your Profile</a></li>
            <li><a href="EditProfile.html">Edit Profile</a></li>
            <li><a href="ContactUs.html">Contact Us</a></li>
             <li><a href="tweets.php">all Tweets</a></li>
              <li><a href="addtweet.html">Add Tweets</a></li>
              <li><a href="allprofiles.php">All Profiles</a></li>
            <li style="float:right"><a href="Login.html">Log Off</a></li>
        </ul>
    </div>
    <div>
    <?php 
      while($i = mysql_fetch_array($data)){
        $fname = $i['fname']; 
        $lname = $i['lname']; 
        $email = $i['email'];
        $profileUserID = $i['userID'];
        $private = $i['private'];   
       if($private != 1){    
       echo
       '<div id="allprofilediv">',
       '<a id="allprofilea" href="userprofile.php?userID=', $profileUserID,'">',$fname, ' ', $lname,' profile</a>',
       '<br>',
       '</div>';
       }
      }
       mysql_close( $connect );
    ?>
    </div>
</body>