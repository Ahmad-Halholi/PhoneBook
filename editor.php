<!DOCTYPE HTML>
<html>
<head>
<title>Control Panel - Editor </title>
<link rel="shortcut icon" type="image/x-icon" href="resourses/images/title_icon.png">
<link rel="stylesheet" href="resourses/styles/editor_style.css">
</head>
<body>
<?php
session_start();
include "config.php";
if(!isset($_SESSION["id"]))
{
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php?error=4');
die("<br><h1>logged to the server ~!</h1><br>");
}
/* to do : prevent users from viewing and removing contacts via id */
?>
<?php
include "config.php";
$connect=mysql_connect ($db_host,$db_user,$db_pass);
mysql_select_db($db_name);
if (!empty($_GET['id'])){
$id=mysql_real_escape_string($_GET['id']);
}
elseif (!empty($_GET['rem'])){
$id=mysql_real_escape_string($_GET['rem']);
mysql_query("delete from contacts where contact_id='$id'");
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Manage.php');
}
if (!empty($_POST['firstname'])){
$contact_first_name=mysql_real_escape_string($_POST['firstname']);
$contact_second_name= mysql_real_escape_string($_POST['secondname']);
$contact_number= mysql_real_escape_string($_POST['phonenumber']);
$contact_email= mysql_real_escape_string($_POST['email']);
$id = mysql_real_escape_string($_POST['contact_id']);
mysql_query("update contacts set contact_first_name='$contact_first_name',contact_second_name='$contact_second_name',contact_number='$contact_number' , contact_email='$contact_email' where contact_id='$id'");
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Manage.php'); 
}
?>
<section class="add_new">
<div class="upper_title">
<div class="go_back">
<a href="
<?php
include "config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Manage.php';?>">
<img src="resourses/images/back.png" alt="Go back">
</a> </div>
<div class="title">Edit Contact</div>
</div>
<form action="editor.php" method="post" >
<input type="text" name="firstname" title="Contact First Name" value="<?php
$row = mysql_fetch_array(mysql_query("SELECT * FROM contacts where contact_id='$id'"));
echo $row['contact_first_name'];?>" autocomplete="off">
<input type="text" name="secondname" title="Contact Second Name" value="<?php echo $row['contact_second_name'];?>" autocomplete="off">
<input type="text" name="phonenumber" title="Contact Phone Number"value="<?php echo $row['contact_number'];?>" autocomplete="off">
<input type="email" name="email" title="Contact Email" value="<?php echo $row['contact_email'];?>" autocomplete="off" >
<input type="text" name="contact_id" value="<?php echo $row['contact_id'];?>" hidden="hidden">
<input type="submit" class="submit" value="Update Contact !" title="Be Brave !">
</form>
</section>
 </body>
</html>
