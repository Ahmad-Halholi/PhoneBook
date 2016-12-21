<? session_start();
if ($_SESSION["is_admin"] != "true"){
include "../config.php";
$index='http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php';
echo "Are you lost ? here ,"."<a href=$index>"." back to index"."</a>";
die();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel - Statistics</title>
<link rel="shortcut icon" type="image/x-icon" href="../resourses/images/title_icon.png">
<link rel="stylesheet" href="../resourses/styles/statistics_style.css">
</head>
<body>
<?php
if(!isset($_SESSION["id"]))
{
include "../config.php";
header('Location: '.'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'index.php?error=4');
die("<br><h1>logged to the server ~!</h1><br>");
}
?>
<section class="statistics">
<div class="upper_title">
<div class="go_back">
<a href="
<?php
include "../config.php";echo 'http://'.$_SERVER['SERVER_NAME'].$scriptfolder.'Control.php';?>">
<img src="../resourses/images/back.png" alt="Go back">
</a> </div>
<div class="title">
Statistics </div>
</div>
<br><label class="label">&curren;&nbsp;Number Of Admins :
<?
include "../config.php";
mysql_connect ($db_host,$db_user,$db_pass);mysql_select_db($db_name);
echo mysql_num_rows(mysql_query("select * from members Where is_admin='true'"));
?>
</label><br>
<label class="label">&curren;&nbsp;Number Of Users :
<?
include "../config.php";
mysql_connect ($db_host,$db_user,$db_pass);mysql_select_db($db_name);
echo mysql_num_rows(mysql_query("select * from members"));
?>
</label><br>
<label class="label">&curren;&nbsp;Total Contacts :
<?
include "../config.php";
mysql_connect ($db_host,$db_user,$db_pass);mysql_select_db($db_name);
echo mysql_num_rows(mysql_query("select * from contacts"));
?>
</label> <br>
</section>
 </body>
</html>
