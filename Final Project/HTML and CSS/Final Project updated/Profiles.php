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

$sql = "SELECT * FROM user WHERE 
                userID = '" . mysql_real_escape_string($userID) . "'"; 

$data = mysql_query($sql) or die ("false");

while($i = mysql_fetch_array($data)){
        $fname = $i['fname']; 
        $lname = $i['lname']; 
        $email = $i['email']; 

}



 mysql_close( $connect );
?>

<!DOCTYPE html>

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
</style>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
		<script src="profile.js"></script>
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

    <div id="container" style="margin-top:10px">
        <div id="left" style="border:solid">
           <?php echo "<h2>Welcome $fname  $lname</h2>"?>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Smiley.svg/220px-Smiley.svg.png" alt="funny face" style="width:250px;height:250px" />
        </div>
        <div>
            <?php 
            $user = "uateam15"; 
            $pass = "uateam15"; 
            $host = "localhost"; 
            $db = "uateam15"; 
            $connect = mysql_connect( $host, $user, $pass ) or die ("Cannot connect"); 
            mysql_select_db($db, $connect) or die ("failed"); 
            $sqlTweet = "SELECT * FROM tweet WHERE
                       userID = '" . mysql_real_escape_string($userID) . "'"; 

            $dataTweet = mysql_query($sqlTweet) or die ("false"); 
            while($row = mysql_fetch_array($dataTweet)){
            $tweetbody = $row['tweetbody'];
            $tweetID = $row['tweetID']; 
            //if($tweetbody != ""){
            //echo "<textarea name=""tweetbody"" cols=""50"" rows=""5"" id=""tweetbody""> $tweetbody; </textarea>"; 
            echo 
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
           // }
            }
             mysql_close( $connect );
            
            ?>
            </div>
    </div>
</body>

