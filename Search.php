<!DOCTYPE HTML>
<html>
<head>
<title>Control Panel - Search</title>
<link rel="shortcut icon" type="image/x-icon" href="resourses/images/title_icon.png">
<link rel="stylesheet" href="resourses/styles/search_style.css">
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
<section class="search">
<div class="upper_title">
<div class="go_back">
<a href="
<?php
include "config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Control.php';?>">
<img src="resourses/images/back.png" alt="Go back">
</a> </div>
<div class="title">
Search Contacts  </div>
</div>
<form method="post">
    <input type="text" name="search" placeholder="Search.." autocomplete="off " required="required" title="Enter Atribute ..">
</form>
<?
if (!isset($_POST['search'])){
echo "<div style='margin:auto; padding-top:110px;font-family:Arial;color:#bfbfbf; font-weight:400; font-size: 17px;
    text-align:center;width: 550px;
    height: 340px;'>Specify Search Attribute !</div>";
}
?>
<br><br><br><br>
<label class="label">Search Results: </label>
<br><br>

<?
if (isset($_POST['search'])){
$connect=mysql_connect ($db_host,$db_user,$db_pass);
mysql_select_db ($db_name);
$userid=$_SESSION['id'];
$search=$_POST['search'];
$query = "SELECT contact_first_name,contact_second_name,contact_number,contact_email FROM contacts WHERE user_id='$userid' AND contact_first_name LIKE '%$search%' OR contact_second_name LIKE '%$search%' OR contact_number LIKE '%$search%' OR contact_email LIKE '%$search%' ";
$result=mysql_query($query);
$number=mysql_num_rows($result);
if ($number > 0){
echo "<table>";
 echo "<tr><th>First Name</th><th>Second Name</th><th>Number</th><th>Email</th></tr>";
 while($row = mysql_fetch_array($result)){
   echo "<tr class='hover'><td>" . $row['contact_first_name'] . "</td><td>" . $row['contact_second_name'] . "</td><td>" . $row['contact_number']. "</td><td>" .$row['contact_email']. "</td></tr>";

}
echo "</table>"; }
else {
  echo "<div style='margin:auto; padding-top:10px;font-family:Arial;color:#bfbfbf; font-weight:400; font-size: 17px;
    text-align:center;width: 550px;
    height: 340px;'>No Match Found !</div>";
}
}
?>

</section>
 </body>
</html>
