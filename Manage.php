<!DOCTYPE HTML>
<html>
<head>
<title>Control Panel - Manage</title>
<link rel="shortcut icon" type="image/x-icon" href="resourses/images/title_icon.png">
<link rel="stylesheet" href="resourses/styles/manage_style.css">
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["id"]))
{
include "config.php";
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php?error=4');
die("<br><h1>logged to the server ~!</h1><br>");
}
?>
<section class="view_all">
<div class="upper_title">
<div class="go_back">
<a href="
<?php
include "config.php";
echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Control.php';?>">
<img src="resourses/images/back.png" alt="Go back">
</a> </div>
<div class="title">
Contacts Manager </div>
</div>
<table>
<?php
$connect=mysql_connect ($db_host,$db_user,$db_pass);
mysql_select_db ($db_name);
$userid=$_SESSION['id'];
$query = "SELECT * FROM contacts WHERE user_id='$userid'";
$result=mysql_query($query);
$number=mysql_num_rows($result);
if ($number == 0) {
echo "<div style='margin:auto; padding-top:110px;font-family:Arial;color:#bfbfbf; font-weight: bold;font-size: 17px;
    text-align:center;width: 550px;
    height: 340px;'>You have no contacts !</div>";}
    else {
    // print the table
    include "config.php";
    $editorlink =  'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'editor.php';
    echo "
  <tr><th>First Name</th><th>Second Name</th><th>Number</th><th>Email</th><th>Action</th></tr>";
 while($row = mysql_fetch_array($result)){
   echo "<tr class='hover'><td>" . $row['contact_first_name'] . "</td><td>" . $row['contact_second_name'] . "</td><td>" . $row['contact_number']. "</td><td>" .$row['contact_email']. "</td>"."<td>"."<a href=".$editorlink."?id=". $row['contact_id']."><img src='resourses/images/edit.png' class='side_image'></a>"."<a href=".$editorlink."?rem=". $row['contact_id']."><img src='resourses/images/delete.png' class='side_image'></a>"."</td>"."</tr>";

 }



    }
?>

</table>
</section>
 </body>
</html>
