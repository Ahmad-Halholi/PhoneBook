<!DOCTYPE HTML>
<html>
<head>
<title>Control Panel - Add New</title>
<link rel="shortcut icon" type="image/x-icon" href="resourses/images/title_icon.png">
<link rel="stylesheet" href="resourses/styles/add_style.css">
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
if (!empty($_POST['firstname']) || !empty($_POST['secondname']) || !empty($_POST['phonenumber']) || !empty($_POST['email']) )
{
include('config.php');
$connect=mysql_connect ($db_host,$db_user,$db_pass);
mysql_select_db($db_name);
$phonenumber=mysql_real_escape_string($_POST['phonenumber']);
$current_user_id=mysql_real_escape_string($_SESSION["id"]);
$sqlQuery="select * from contacts where contact_number='$phonenumber' && user_id='$current_user_id'";
$result=mysql_num_rows(mysql_query($sqlQuery));
if ($result > 0){
 header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Add.php?error=1');
 die();
}
$firstname=mysql_real_escape_string($_POST['firstname']);
$secondname=mysql_real_escape_string($_POST['secondname']);
$email=mysql_real_escape_string($_POST['email']);
$sqlQuery="insert into contacts values(null,'$firstname' ,'$secondname', '$phonenumber' , '$email' , '$current_user_id')";
if ($result=mysql_query($sqlQuery)){
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Add.php?error=2');
 die(); }


}

if (!empty($_GET['error'])){
if ($_GET['error']==1) {
    echo "<script>alert(\"You already have a user with the same number !\")</script>";
}
if ($_GET['error']==2) {
    echo "<script>alert(\"Contact has been added successfully \")</script>";
}
}
?>
<section class="add_new">
<div class="upper_title">

<div class="go_back">
<a href="
<?php
include "config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Control.php';?>">
<img src="resourses/images/back.png" alt="Go back">
</a> </div>
<div class="title">
Add New Contact </div>
</div>
<form action="Add.php" method="post" >
<input type="text" name="firstname" title="Contact First Name" placeholder="Fisrt Name" autocomplete="off">
<input type="text" name="secondname" title="Contact Second Name" placeholder="Second Name" autocomplete="off">
<input type="text" name="phonenumber" title="Contact Phone Number" placeholder="+9620700000000" autocomplete="off">
<input type="email" name="email" title="Contact Email" placeholder="example@gmail.com" autocomplete="off" >

<input type="submit" class="submit" value="Add Contact !" title="Be Brave !">
</form>
</section>
 </body>
</html>
