<?php 
session_start(); 
if( !isset($_SESSION["userID"])){
    header("location: error.html"); 
}
$userID = $_SESSION["userID"]; 
$profileUserID = $_GET["userID"]; 
$user = "uateam15"; 
$pass = "uateam15"; 
$host = "localhost"; 
$db = "uateam15"; 
$connect = mysql_connect( $host, $user, $pass ) or die ("Cannot connect"); 
mysql_select_db($db, $connect) or die ("failed"); 
$sqlTweet = "SELECT u.fname, u.lname, t.tweetbody, t.tweetID FROM tweet t LEFT JOIN user u ON u.userID = t.userID 
             WHERE u.userID = '" . mysql_real_escape_string($profileUserID) . "'"; 

            $dataTweet = mysql_query($sqlTweet) or die ("false"); 
          
           
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
    #alltweetbody {
        border: 2px solid black; 
        margin: auto;
        position: relative;
        width: 600px;  
    }
    #paratweetbody{
        text-align: center;
        font-weight: bold; 
    }
</style>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
		<script src="userprofile.js"></script>
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
      while($row = mysql_fetch_array($dataTweet)){
            $tweetbody = $row['tweetbody']; 
            $fname = $row['fname']; 
            $lname = $row['lname']; 
            $tweetID = $row['tweetID']; 
            

            if($fname == "" || $lname == ""){
            $fname = "Unregistered"; 
            $lname = "User"; 
            }
            if($userID == 1 || $userID == 14) {
       echo
            '<h1 style="text-align:center;">',$fname, ' ', $lname, ' ', 'Tweets</h1>', 
            '<table align="center">',
            '<tr>', 
            '<td>', 
            '<textarea name ="',$tweetID,'" cols="50" rows="5" id="',$tweetID,'" maxlength="140">', $tweetbody, '</textarea>',
            '<input type="hidden" id="tweetID" value="',$tweetID,'">',
            '</td>',
            '</tr>',
            '<tr>',
            '<td>',
            '<spand id="textarea_feedback"></span>',
            '</td>',
            '</tr>',
            '<tr>',
            '<td>',
            '<button type="button" onclick="updateFunction(',$tweetID,')" id="update" name="update">Update</button>',
            '&nbsp;', 
            '<button type="button" onclick="deleteFunction(',$tweetID,')" id="delete" name="delete">Delete</button>',
            '</td>',
            '</tr>',
            '</table>'; 
            }
            else {
             echo
             '<h1 style="text-align:center;">',$fname, ' ', $lname, ' ', 'Tweets:</h1>', 
             '<div id="alltweetbody">',
             '<p id="paratweetbody">', $tweetbody, '</p>', 
             '</div>'; 
            }
      }
       mysql_close( $connect );
    ?>
    </div>
    <div id="afterForm"></div>
</body>
